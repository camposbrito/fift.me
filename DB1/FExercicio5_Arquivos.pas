unit FExercicio5_Arquivos;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, FMTBcd, ExtDlgs, DBClient,
  Provider, DB, SqlExpr, uDB1Data;

type
  TFormExercicio5_Arquivos = class(TFormExercicio_base)
    pnlGeral: TPanel;
    pnlBotoes: TPanel;
    lblLocal: TLabel;
    edtLocal: TEdit;
    btnSelecionar: TButton;
    btnSalvar: TButton;
    btnSair: TButton;
    db1Consulta: TSQLDataSet;
    dsConsulta: TDataSource;
    dspConsulta: TDataSetProvider;
    cdsConsulta: TClientDataSet;
    OpenTextFileDialog1: TOpenTextFileDialog;
    cdsConsultaNMPESSOA: TStringField;
    cdsConsultaNMCIDADE: TStringField;
    cdsConsultaUF: TStringField;
    procedure btnSelecionarClick(Sender: TObject);
    procedure btnSalvarClick(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure btnSairClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FormExercicio5_Arquivos: TFormExercicio5_Arquivos;

implementation

uses uBanco;

{$R *.dfm}

procedure TFormExercicio5_Arquivos.btnSelecionarClick(Sender: TObject);
begin
  inherited;
  if OpenTextFileDialog1.Execute then
      edtLocal.Text := OpenTextFileDialog1.FileName;
end;

procedure TFormExercicio5_Arquivos.btnSalvarClick(Sender: TObject);
var
  Lista: TStringList;
  i: Integer;
  Nome, Cidade, UF: string;
begin
  inherited;
  Lista := TStringList.Create;
  if trim(edtLocal.Text) = '' then
    btnSelecionarClick(nil);
  try
    cdsConsulta.Open;

    for i := 0 to cdsConsulta.RecordCount -1 do
    begin
      Nome   := Copy(cdsConsultaNMPESSOA.AsString, 1, 50);
      Cidade := Copy(cdsConsultaNMCIDADE.AsString, 1, 30);
      UF     := Copy(cdsConsultaUF.AsString,       1, 02);
      Lista.Add( Nome   + StringOfChar(' ', 50 - Length(Nome))+
                 Cidade + StringOfChar(' ', 30 - Length(Cidade))+
                 UF     + StringOfChar(' ',  2 - Length(UF)));
      cdsConsulta.Next;
    end;
    lista.SaveToFile(edtLocal.Text, TEncoding.UTF8);
  finally
    Lista.Free;
    cdsConsulta.Close;
    ShowMessage('Arquivo salvo no diretório informado.');
  end;

end;

procedure TFormExercicio5_Arquivos.btnSairClick(Sender: TObject);
begin
  inherited;
  Close;
end;

procedure TFormExercicio5_Arquivos.FormCreate(Sender: TObject);
begin
  inherited;
  if not(dmBanco.connDB1.Connected) then
    dmBanco.connDB1.Open;
end;

end.
