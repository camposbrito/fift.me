unit FExercicio3_Pessoas;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, FMTBcd, DB, uBanco, DBCtrls,
  SqlExpr, DBClient, Provider, Mask;

type
  TFormExercicio3_Pessoas = class(TFormExercicio_base)
    grpCadastro: TGroupBox;
    pnlBotoes: TPanel;
    btnNovo: TButton;
    btnSalvar: TButton;
    btnEditar: TButton;
    btnExcluir: TButton;
    btnPesquisar: TButton;
    btnSair: TButton;
    btnPesquisarCidade: TButton;
    lblNome: TLabel;
    edtNMPESSOA: TDBEdit;
    dsPessoa: TDataSource;
    lblLogradouro: TLabel;
    edtDELOGRADOURO: TDBEdit;
    lblBairro: TLabel;
    edtDEBAIRRO: TDBEdit;
    lblCidade: TLabel;
    edtNMCIDADE: TDBEdit;
    edtUF: TDBEdit;
    qryAux: TSQLQuery;
    qryPessoa: TSQLDataSet;
    dspPessoa: TDataSetProvider;
    cdsPessoa: TClientDataSet;
    cdsPessoaCDPESSOA: TIntegerField;
    cdsPessoaNMPESSOA: TStringField;
    cdsPessoaDELOGRADOURO: TStringField;
    cdsPessoaDEBAIRRO: TStringField;
    cdsPessoaCDCIDADE: TIntegerField;
    cdsPessoaNMCIDADE: TStringField;
    cdsPessoaUF: TStringField;
    SQLConnection1: TSQLConnection;
    procedure btnSairClick(Sender: TObject);
    procedure btnNovoClick(Sender: TObject);
    procedure btnSalvarClick(Sender: TObject);
    procedure cdsPessoaNewRecord(DataSet: TDataSet);
    procedure btnEditarClick(Sender: TObject);
    procedure btnPesquisarClick(Sender: TObject);
    procedure btnExcluirClick(Sender: TObject);
    procedure btnPesquisarCidadeClick(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure qryPessoaParseDeleteSql(var FieldNames: TStrings; SQL: string;
      var TableName: string);
    procedure qryPessoaParseInsertSql(var FieldNames: TStrings; SQL: string;
      var BindAllFields: Boolean; var TableName: string);
    procedure qryPessoaParseSelectSql(var FieldNames: TStrings; SQL: string;
      var TableName: string);
    procedure qryPessoaParseUpdateSql(var FieldNames: TStrings; SQL: string;
      var TableName: string);
  private
    { Private declarations }
    Testado : (Normal,Inserindo, Alterando);
    function RetornaCdCidade(nmcidade, UF: String): Integer;
    procedure ControleBotoes(Novo, Editar, Salvar, Sair, Excluir, Pesquisar, PesquisarCidade: boolean);
  public
    { Public declarations }
  end;

var
  FormExercicio3_Pessoas: TFormExercicio3_Pessoas;

implementation

{$R *.dfm}
uses FExercicio3_Cidades_Pesquisa, FExercicio3_Pessoas_Pesquisa;
{ TFormExercicio3_Pessoas }

procedure TFormExercicio3_Pessoas.btnEditarClick(Sender: TObject);
begin
  inherited;
  Testado := Alterando;
  cdsPessoa.Edit;
  ControleBotoes(False, False, True, True, False, False, True);
end;

procedure TFormExercicio3_Pessoas.btnExcluirClick(Sender: TObject);
begin
  inherited;
  try
    if Testado = Normal then
      if MessageDlg('Excluir Registro?', mtWarning, mbOKCancel, 1) = mrok then
      begin
        qryAux.SQL.Text := 'delete from pessoa where cdPessoa = :cdPessoa';
        qryAux.ParamByName('cdPessoa').AsInteger := cdsPessoaCDPESSOA.AsInteger;
        qryAux.ExecSQL;
        cdsPessoa.Close;
        ControleBotoes(True, False,False, True, False, True, False);
      end;
  except
    MessageDlg('Operação Indisponivel' + #13 + '  para este Registro', mtError,
      mbOKCancel, 1);
  end;
end;

procedure TFormExercicio3_Pessoas.btnNovoClick(Sender: TObject);
begin
  inherited;
  Testado := Inserindo;
  cdsPessoa.Close;
  cdsPessoa.Params.ParamByName('cdPessoa').asinteger := -1 ;
  cdsPessoa.open;
  cdsPessoa.Insert;

  ControleBotoes(False, False, True, True, False, False, True);
end;

procedure TFormExercicio3_Pessoas.btnPesquisarClick(Sender: TObject);
begin
  inherited;
  FormExercicio3_Pessoas_Pesquisa := tFormExercicio3_Pessoas_Pesquisa.create(self);
  FormExercicio3_Pessoas_Pesquisa.showmodal;
  with FormExercicio3_Pessoas_Pesquisa do
  begin
    if bSelecionou and (not cdsPesquisa.IsEmpty) then
    begin
      cdsPessoa.Close;
      cdsPessoa.Params.ParamByName('cdPessoa').asinteger := cdsPesquisaCDPESSOA.AsInteger ;
      cdsPessoa.Open;
      ControleBotoes(True, True, False, True, True, True, False);
    end;
  end;
end;

procedure TFormExercicio3_Pessoas.btnSairClick(Sender: TObject);
begin
  inherited;
  Close;
end;

function TFormExercicio3_Pessoas.RetornaCdCidade(nmcidade, UF: String): Integer;
begin
  qryAux.Close;
  qryAux.SQL.Clear;
  qryAux.SQL.Append('SELECT  * ');
  qryAux.SQL.Append('FROM    cidade c ');
  qryAux.SQL.Append('WHERE   c.nmcidade = :nmcidade');
  qryAux.SQL.Append('AND     c.UF = :UF');
  qryAux.ParamByName('nmcidade').AsString := nmcidade;
  qryAux.ParamByName('UF').AsString := UF;
  qryAux.Open;

  result := qryAux.FieldByName('CDCIDADE').AsInteger;
end;

procedure TFormExercicio3_Pessoas.btnSalvarClick(Sender: TObject);
var
  CodCidade, CodPessoa: Integer;
begin
  inherited;
  if (cdsPessoaNMCIDADE.OldValue <> cdsPessoaNMCIDADE.NewValue)
  or (cdsPessoaUF.OldValue <> cdsPessoaUF.NewValue) then
  begin
    codCidade := RetornaCdCidade(cdsPessoaNMCIDADE.AsString, cdsPessoaUF.AsString);
    cdsPessoaCDCIDADE.AsInteger := codCidade;
  end
  else
    codCidade := cdsPessoaCDCIDADE.AsInteger;

  if codCidade = 0 then
  begin
    qryAux.Close;
    qryAux.SQL.Clear;
    qryAux.SQL.Append('SELECT  gen_id(gen_cidade,1) ');
    qryAux.SQL.Append('FROM    rdb$database');
    qryAux.Open;

    codCidade := qryAux.FieldByName('gen_id').AsInteger;

    qryAux.Close;
    qryAux.SQL.Clear;
    qryAux.SQL.Append('INSERT INTO Cidade ');
    qryAux.SQL.Append('( ');
    qryAux.SQL.Append('   cdCidade, ');
    qryAux.SQL.Append('   nmCidade, ');
    qryAux.SQL.Append('   UF');
    qryAux.SQL.Append(') ');
    qryAux.SQL.Append('VALUES ');
    qryAux.SQL.Append('( ');
    qryAux.SQL.Append('   :cdCidade, ');
    qryAux.SQL.Append('   :nmCidade, ');
    qryAux.SQL.Append('   :UF');
    qryAux.SQL.Append(') ');

    qryAux.ParamByName('cdcidade').AsInteger := codCidade;
    qryAux.ParamByName('nmcidade').AsString := cdsPessoaNMCIDADE.AsString;
    qryAux.ParamByName('UF').AsString := cdsPessoaUF.AsString;
    qryAux.ExecSQL;

    cdsPessoaCDCIDADE.AsInteger := codCidade;
  end;

  if Trim(cdsPessoaNMPESSOA.AsString) = '' then
    cdsPessoaNMPESSOA.Clear;

  if Trim(cdsPessoaNMCIDADE.AsString) = '' then
    cdsPessoaNMCIDADE.Clear;

  if cdsPessoa.State in dsEditModes then
    cdsPessoa.Post;

//  qryAux.SQLConnection.BeginTransaction;
  if Testado = Inserindo then
  begin
    qryAux.Close;
    qryAux.SQL.Clear;
    qryAux.SQL.Append('SELECT  gen_id(gen_pessoa,1) ');
    qryAux.SQL.Append('FROM    rdb$database');
    qryAux.Open;

    CodPessoa := qryAux.FieldByName('gen_id').AsInteger;

    cdsPessoa.Edit;
    cdsPessoaCDPESSOA.AsInteger := CodPessoa;
    cdsPessoa.Post;

    qryAux.Close;
    qryAux.SQL.Clear;
    qryAux.SQL.Append('INSERT INTO Pessoa ');
    qryAux.SQL.Append('( ');
    qryAux.SQL.Append('   CDPESSOA, ');
    qryAux.SQL.Append('   NMPESSOA, ');
    qryAux.SQL.Append('   DELOGRADOURO, ');
    qryAux.SQL.Append('   DEBAIRRO, ');
    qryAux.SQL.Append('   CDCIDADE');
    qryAux.SQL.Append(') ');
    qryAux.SQL.Append('VALUES ');
    qryAux.SQL.Append('( ');
    qryAux.SQL.Append('   :CDPESSOA, ');
    qryAux.SQL.Append('   :NMPESSOA, ');
    qryAux.SQL.Append('   :DELOGRADOURO, ');
    qryAux.SQL.Append('   :DEBAIRRO, ');
    qryAux.SQL.Append('   :CDCIDADE');
    qryAux.SQL.Append(') ');


    qryAux.ParamByName('CDPESSOA').AsInteger := CodPessoa;
    qryAux.ParamByName('NMPESSOA').AsString := cdsPessoaNMPESSOA.AsString;
    qryAux.ParamByName('DELOGRADOURO').AsString := cdsPessoaDELOGRADOURO.AsString;
    qryAux.ParamByName('DEBAIRRO').AsString := cdsPessoaDEBAIRRO.AsString;
    qryAux.ParamByName('CDCIDADE').AsString := cdsPessoaCDCIDADE.AsString;
    qryAux.ExecSQL;


  end
  else
  if Testado = Alterando then
  begin
    qryAux.Close;
    qryAux.SQL.Clear;
    qryAux.SQL.Append('UPDATE Pessoa ');
    qryAux.SQL.Append('SET    NMPESSOA = :NMPESSOA, ');
    qryAux.SQL.Append('       DELOGRADOURO = :DELOGRADOURO, ');
    qryAux.SQL.Append('       DEBAIRRO = :DEBAIRRO, ');
    qryAux.SQL.Append('       CDCIDADE = :CDCIDADE');
    qryAux.SQL.Append('WHERE  CDPESSOA = :CDPESSOA');

    qryAux.ParamByName('CDPESSOA').AsInteger := cdsPessoaCDPESSOA.AsInteger;
    qryAux.ParamByName('NMPESSOA').AsString := cdsPessoaNMPESSOA.AsString;
    qryAux.ParamByName('DELOGRADOURO').AsString := cdsPessoaDELOGRADOURO.AsString;
    qryAux.ParamByName('DEBAIRRO').AsString := cdsPessoaDEBAIRRO.AsString;
    qryAux.ParamByName('CDCIDADE').AsString := cdsPessoaCDCIDADE.AsString;
    qryAux.ExecSQL;
  end;
//  qryAux.SQLConnection.CommitFreeAndNil(qryAux.SQLConnection.BeginTransaction);
  TEstado := Normal;
  ControleBotoes(True, True, False, True, True, True, False);
end;

procedure TFormExercicio3_Pessoas.btnPesquisarCidadeClick(Sender: TObject);
begin
  inherited;
  FormExercicio3_Cidades_Pesquisa := TFormExercicio3_Cidades_Pesquisa.create(self);
  FormExercicio3_Cidades_Pesquisa.showmodal;
  with FormExercicio3_Cidades_Pesquisa do
  begin
    if bSelecionou and (not cdsPesquisa.IsEmpty) then
    begin
      if not (cdsPessoa.State in dsEditModes) then
        cdsPessoa.edit;

      cdsPessoaCDCIDADE.AsInteger  := cdsPesquisaCDCIDADE.AsInteger;
      cdsPessoaNMCIDADE.AsString  := cdsPesquisaNMCIDADE.AsString ;
      cdsPessoaUF.AsString  := cdsPesquisaUF.AsString ;
    end;
  end;
end;

procedure TFormExercicio3_Pessoas.cdsPessoaNewRecord(DataSet: TDataSet);
begin
  inherited;
  cdsPessoaCDPESSOA.Value := 0;
  cdsPessoaCDCIDADE.Value := 0;
end;

procedure TFormExercicio3_Pessoas.ControleBotoes(Novo, Editar, Salvar, Sair, Excluir,
  Pesquisar, PesquisarCidade: boolean);
begin
  btnNovo.Enabled := Novo;
  btnEditar.Enabled := Editar;
  btnSalvar.Enabled := Salvar;
  btnSair.Enabled := Sair;
  btnExcluir.Enabled := Excluir;
  btnPesquisar.Enabled := Pesquisar;
  btnpesquisarCidade.Enabled := PesquisarCidade;

  edtNMPESSOA.Enabled := Salvar;
  edtDELOGRADOURO.Enabled := Salvar;
  edtDEBAIRRO.Enabled := Salvar;
  edtNMCIDADE.Enabled := Salvar;
  edtUF.Enabled := Salvar;



end;

procedure TFormExercicio3_Pessoas.FormCreate(Sender: TObject);
begin
  inherited;
  if not(dmBanco.connDB1.Connected) then
    dmBanco.connDB1.Open;
  ControleBotoes(True, False,False, True, False, True, False);
end;

procedure TFormExercicio3_Pessoas.qryPessoaParseDeleteSql(
  var FieldNames: TStrings; SQL: string; var TableName: string);
begin
  inherited;
  ;
end;

procedure TFormExercicio3_Pessoas.qryPessoaParseInsertSql(
  var FieldNames: TStrings; SQL: string; var BindAllFields: Boolean;
  var TableName: string);
begin
  inherited;
  ;
end;

procedure TFormExercicio3_Pessoas.qryPessoaParseSelectSql(
  var FieldNames: TStrings; SQL: string; var TableName: string);
begin
  inherited;
  ;
end;

procedure TFormExercicio3_Pessoas.qryPessoaParseUpdateSql(
  var FieldNames: TStrings; SQL: string; var TableName: string);
begin
  inherited;
  ;
end;

end.
