unit uFrmCCU;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, ExtDlgs, StdCtrls, Buttons, Grids, ExtCtrls, ComCtrls, DB, ADODB,
  DBGrids, Mask, DBCtrls;

type
  TfrmCCU = class(TForm)
    Label1: TLabel;
    Edit1: TEdit;
    OpenTextFileDialog1: TOpenTextFileDialog;
    SaveTextFileDialog1: TSaveTextFileDialog;
    Panel1: TPanel;
    SpeedButton1: TSpeedButton;
    btnAbrir: TSpeedButton;
    btnSalvarArquivo: TSpeedButton;
    btnLimpar: TSpeedButton;
    Panel2: TPanel;
    cdsCCU: TADODataSet;
    cdsCCUCodCCU: TStringField;
    cdsCCUCodAtividade: TStringField;
    cdsCCUSolicitante: TStringField;
    cdsCCUTelaProcedimento: TStringField;
    cdsCCUSolicitacao: TStringField;
    cdsCCUSolucao: TStringField;
    dtsCCU: TDataSource;
    cdsCCUCodRT: TStringField;
    Panel3: TPanel;
    DBGrid1: TDBGrid;
    Label3: TLabel;
    DBEdit1: TDBEdit;
    Label4: TLabel;
    DBEdit2: TDBEdit;
    Label5: TLabel;
    DBEdit3: TDBEdit;
    Label6: TLabel;
    DBEdit4: TDBEdit;
    Label7: TLabel;
    Label8: TLabel;
    DBEdit6: TDBEdit;
    Label9: TLabel;
    DBEdit7: TDBEdit;
    Label10: TLabel;
    DBEdit8: TDBEdit;
    Label11: TLabel;
    DBEdit9: TDBEdit;
    Panel4: TPanel;
    dtsDias: TDataSource;
    cdsDias: TADODataSet;
    DBGrid2: TDBGrid;
    cdsDiasDia: TStringField;
    dtsTotal: TDataSource;
    cdsDiasCod: TIntegerField;
    cdsCCUCod: TIntegerField;
    cdsCCUDia: TStringField;
    cdsCCUCodDia: TIntegerField;
    DBEdit12: TDBEdit;
    Label14: TLabel;
    DBEdit11: TDBEdit;
    Label13: TLabel;
    DBEdit10: TDBEdit;
    Label12: TLabel;
    CheckBox1: TCheckBox;
    btnCarregar: TSpeedButton;
    cdsCCUHoraInicial: TTimeField;
    cdsCCUHoraFinal: TTimeField;
    cdsCCUTotal: TTimeField;
    cdsDiasHoras: TTimeField;
    cdsDiasDiferenca: TTimeField;
    cdsTotal: TADODataSet;
    cdsTotalTotalCumprir: TStringField;
    cdsTotalTotal: TStringField;
    cdsTotalDiferenca: TStringField;
    cdsTotalHoraPadrao: TTimeField;
    dtsAtividade: TDataSource;
    StatusBar1: TStatusBar;
    cdsAtividade: TADODataSet;
    cdsAtividadeCod: TStringField;
    cdsAtividadeDescricao: TStringField;
    DBLookupComboBox1: TDBLookupComboBox;
    btnExportar: TSpeedButton;
    cdsRT: TADODataSet;
    dtsRT: TDataSource;
    Panel5: TPanel;
    DBGrid3: TDBGrid;
    cdsRTCod: TIntegerField;
    cdsRTCodRT: TStringField;
    cdsRTTotal: TTimeField;
    Edit2: TEdit;
    cdsCCUDiferenteUltimaHora: TStringField;
    cdsDiasDiferenteUltimaHora: TIntegerField;
    cdsDiasErros: TIntegerField;

    procedure SpeedButton1Click(Sender: TObject);
    procedure btnAbrirClick(Sender: TObject);
    procedure btnSalvarArquivoClick(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure btnLimparClick(Sender: TObject);
    procedure Edit1Click(Sender: TObject);
    procedure Memo1Click(Sender: TObject);
    procedure FormResize(Sender: TObject);
    procedure PreencheCampos(Edit: TEdit; Linha: string;
      Inicial, Count: Integer);
    procedure SalvarTxt(Arquivo: String);
    procedure ExportarTxt(Arquivo: String);
    procedure PreencheCamposDataSet(cds: TADODataSet; Field, Linha: String;
      Inicial, Count: Integer);
    procedure DesativaCampos(Edit: TEdit; Ativo: Boolean);
    procedure ValidaDados(CodCCU: String);
    function EstaVazio(Edit: TEdit): Boolean;
    Function Empty(inString: String): Boolean;
    procedure cdsCCUNewRecord(DataSet: TDataSet);
    procedure cdsDiasNewRecord(DataSet: TDataSet);
    procedure dtsDiasDataChange(Sender: TObject; Field: TField);
    procedure CarregarGrid;
    procedure CheckBox1Click(Sender: TObject);
    procedure DBGrid2CellClick(Column: TColumn);
    procedure FiltrarGrid;
    procedure btnCarregarClick(Sender: TObject);
    procedure DBGrid2DrawColumnCell(Sender: TObject; const Rect: TRect;
      DataCol: Integer; Column: TColumn; State: TGridDrawState);
    procedure dtsCCUDataChange(Sender: TObject; Field: TField);
    procedure dtsTotalDataChange(Sender: TObject; Field: TField);
    procedure dtsAtividadeDataChange(Sender: TObject; Field: TField);
    procedure FormCloseQuery(Sender: TObject; var CanClose: Boolean);
    procedure cdsCCUHoraInicialValidate(Sender: TField);
    procedure cdsCCUHoraFinalValidate(Sender: TField);
    procedure btnExportarClick(Sender: TObject);
    procedure cdsRTNewRecord(DataSet: TDataSet);
    procedure Edit2Change(Sender: TObject);
    procedure DBGrid1DrawColumnCell(Sender: TObject; const Rect: TRect;
      DataCol: Integer; Column: TColumn; State: TGridDrawState);
  private
    IgnoreDataChange: Boolean;

    { Private declarations }
  public
    { Public declarations }


  end;

var
  frmCCU: TfrmCCU;

implementation

uses MaskUtils, DateUtils, Funcoes, FExportaExcel;
{$R *.dfm}

procedure SelecionarLinha(Memo: TCustomMemo);
var
  Linha: Integer;
begin
  with Memo do
  begin
    Linha := Perform(EM_LINEFROMCHAR, SelStart, 0);
    SelStart := Perform(EM_LINEINDEX, Linha, 0);
    SelLength := Length(Lines[Linha]);
  end;
end;

procedure TfrmCCU.CarregarGrid;
var
  Texto: TStringList;
  i, TotalCumprir, TotalMinutos, Hr, Mi: Integer;
  Linha: String;
  PosicaoAtividade, Solicitante, Tela_Procedimento, Solicitacao, Solucao: Integer;
  today: TDateTime;
  UltimaHora, vUltimaHora: String;
begin
    TotalMinutos :=0;
  try
    IgnoreDataChange := True;
    cdsCCU.Filtered := False;
    cdsCCU.Filter := '';
    Texto := TStringList.Create;
    Texto.LoadFromFile(OpenTextFileDialog1.FileName);
//    Texto.Encoding <> nil;
    cdsCCU.CreateDataSet;
    cdsDias.CreateDataSet;
    cdsTotal.CreateDataSet;
    cdsRT.CreateDataSet;
    cdsCCU.DisableControls;
    cdsDias.DisableControls;
    cdsTotal.DisableControls;
    cdsRT.Open;
    cdsCCU.Open;
    cdsDias.Open;
    cdsTotal.Open;

    cdsTotal.Insert;
    cdsTotalTotal.AsString := FormataMinutos(0);
    cdsTotalHoraPadrao.AsDateTime := StrToTime('08:00:00');

    cdsTotal.Post;
    for i := 0 to Texto.Count - 1 do
    begin
      Linha := Texto[i];
      if trim(Linha) <> '' then
        if Copy(Linha, 1, 1) = '*' then
        begin
          cdsDias.Insert;
          cdsDiasDia.AsString := Copy(Linha, 3, 5);
          cdsDiasHoras.Value := 0;
          UltimaHora :=  '08:00:00';
          vUltimaHora :=  '08:00:00';
          cdsDias.Post;
        end
        else if Copy(Linha, 1, 1) = '.' then
        begin
          Abort;
        end
        else
        begin
          cdsCCU.Insert;

          cdsCCUHoraInicial.Value := StrToTime(FormatarHoras(Copy(Linha, 1, 4)));
          cdsCCUHoraFinal.Value := StrToTime(FormatarHoras(Copy(Linha, 6, 4)));
          cdsCCUCodCCU.AsString := Copy(Linha, 11, 10);
          cdsCCUCodDia.Value := cdsDiasCod.AsInteger;
          cdsCCUDia.AsString := cdsDiasDia.AsString;

          {cdsCCUTotal.Value :=
            StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
            cdsCCUHoraFinal.Value))); }
          TotalMinutos := TotalMinutos + MinutesBetween(cdsCCUHoraInicial.Value,
            cdsCCUHoraFinal.Value);
          {if (Copy(Linha, 31, 1) <> '*') and (Copy(Linha, 34, 1) <> '*') then
          begin
            cdsCCUSolucao.AsString := Copy(Linha, 22, Length(Linha));
          end
          else}
          begin
            cdsCCUCodRT.AsString := TRIM(Copy(Linha, 24, Pos('*', Linha)-24));
            if Pos('*', Linha) > 0 then
              cdsCCUCodAtividade.AsString := Copy(Linha, Pos('*', Linha), 4)
            else
              cdsCCUSolucao.AsString := Copy(Linha, 22, Length(Linha));
            Solicitante := Pos('Solicitante:', Linha);
            Tela_Procedimento := Pos('Tela/Procedimento:', Linha);
            Solicitacao := Pos('Solicitação:', Linha);
            Solucao := Pos('Solução:', Linha);
            if Solicitante > 0 then
              cdsCCUSolicitante.AsString := Trim(Copy(Linha, Solicitante + 12, Tela_Procedimento - Solicitante -12));
            if Tela_Procedimento >  0 then
              cdsCCUTelaProcedimento.AsString := Trim(Copy(Linha, Tela_Procedimento + 18, solicitacao - Tela_Procedimento-18));
            if Solicitacao > 0 then
              cdsCCUSolicitacao.AsString := Trim(Copy(Linha, Solicitacao + 12, Solucao - Solicitacao-12));
            if Solucao > 0 then
              cdsCCUSolucao.AsString := Trim(Copy(Linha, Solucao + 8, Length(Linha)));
            if ((UltimaHora <>  vUltimaHora) and (cdsCCUHoraInicial.AsString <> UltimaHora)) then
            begin
              cdsCCUDiferenteUltimaHora.AsString :=   'S';
              cdsDias.Edit;
              cdsDiasDiferenteUltimaHora.Value := cdsDiasDiferenteUltimaHora.AsInteger + 1;
              cdsDias.Post;
            end
            else
              cdsCCUDiferenteUltimaHora.AsString :=   'N';
            if 1=2 then
              MessageDlg('',mtWarning,[mbok],0);


          end;
          cdsCCU.Post;
          UltimaHora := cdsCCUHoraFinal.AsString;
          cdsDias.Edit;
          cdsDiasHoras.Value := cdsDiasHoras.Value + cdsCCUTotal.Value;
          cdsDias.Post;

          if cdsCCUCodRT.AsString <> '' then
            if cdsRT.Locate('CodRT',cdsCCUCodRT.AsString,[loCaseInsensitive]) then
            begin
              cdsRT.Edit;
              cdsRTTotal.AsDateTime :=  cdsRTTotal.Value + StrToTime(FormataMinutos( MinutesBetween(cdsCCUHoraInicial.Value, cdsCCUHoraFinal.Value)));
              cdsRT.Post;
            end
            else
            begin
              cdsRT.Insert;
              cdsRTCodRT.asString := cdsCCUCodRT.AsString;
              cdsRTTotal.AsDateTime :=  StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value, cdsCCUHoraFinal.Value)));
              cdsRT.Post;
            end;
        end;
    end;
  finally
    IgnoreDataChange := False;
    today := Time;

    Mi := MinuteOf(today);
    Hr := HourOf(today);

    if (Hr > 8) and (Hr < 12) then
    begin
      hr := hr -8;
    end
    else
    if (Hr > 12) and (Hr < 18) then
    begin
      Hr := Hr - 10;
    end
    else
    begin
      Hr := 8;
      Mi := 60;
    end;




    TotalCumprir := cdsDias.RecordCount * 8 * 60;
    cdsTotal.Edit;
    cdsTotalTotal.AsString := FormataMinutos(TotalMinutos);
    cdsTotalTotalCumprir.AsString := FormataMinutos(TotalCumprir);
    //cdsDias.DisableControls;
    cdsdias.First;
    while not cdsdias.Eof do
    begin
        cdsDias.Edit;
        cdsDiasDiferenca.Value := cdsTotalHoraPadrao.AsDateTime  - cdsDiasHoras.AsDateTime;
        cdsdias.Post;
      cdsdias.Next;
    end;
    if TotalCumprir > TotalMinutos then
    begin
      cdsTotalDiferenca.AsString := FormataMinutos(TotalCumprir - TotalMinutos);
      DBEdit12.Font.Style := [fsBold];
      DBEdit12.Font.Color := clRed
    end
    else
    begin
      cdsTotalDiferenca.AsString := FormataMinutos(TotalMinutos - TotalCumprir);
      DBEdit12.Font.Style := [fsBold];
      DBEdit12.Font.Color := clBlue;
    end;
    cdsTotal.Post;
    cdsCCU.First;
    cdsDias.First;
    cdsDias.Last;
    cdsCCU.EnableControls;
    cdsDias.EnableControls;
    cdsTotal.EnableControls;
    FreeAndNil(Texto);
  end;

end;



procedure TfrmCCU.cdsCCUHoraFinalValidate(Sender: TField);
var
  Tempo: TTime;
begin
  if cdsCCUHoraInicial.AsDateTime < cdsCCUHoraFinal.AsDateTime then
    cdsCCUTotal.AsDateTime :=
      StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
      cdsCCUHoraFinal.Value)))
    else
    begin
      cdsDias.Edit;
      cdsDiasErros.AsInteger := cdsDiasErros.AsInteger + 1;
      cdsDias.Post;
    end;


end;

procedure TfrmCCU.cdsCCUHoraInicialValidate(Sender: TField);
begin
  if cdsCCUHoraInicial.AsDateTime < cdsCCUHoraFinal.AsDateTime then
  cdsCCUTotal.AsDateTime :=
    StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
    cdsCCUHoraFinal.Value)));
//  if cdsCCUHoraInicial.AsDateTime < cdsCCUHoraFinal.AsDateTime then
//      begin
//
//    end
//    else
//    begin
//
//    end;
end;

procedure TfrmCCU.cdsCCUNewRecord(DataSet: TDataSet);
var
  cdsclone : TADODataSet;
begin
  cdsClone := TADODataSet.Create(nil);
  cdsClone.Clone(cdsCCU);
  cdsCCUCod.Value := cdsClone.RecordCount + 1;
  cdsCCUDia.AsString := cdsDiasDia.AsString;
  cdsCCUCodDia.AsInteger := cdsDiasCod.AsInteger;
  if not IgnoreDataChange then
    DBEdit1.SetFocus;
end;

procedure TfrmCCU.cdsDiasNewRecord(DataSet: TDataSet);
begin
  cdsDiasCod.Value := cdsDias.RecordCount + 1;
end;

procedure TfrmCCU.cdsRTNewRecord(DataSet: TDataSet);
begin
  cdsRTCod.Value := cdsRT.RecordCount + 1;
end;

procedure TfrmCCU.CheckBox1Click(Sender: TObject);
begin
  if not IgnoreDataChange then
  begin
    cdsCCU.Filtered := False;
    cdsCCU.Filter := '';
    CheckBox1.Checked := False;
    CheckBox1.Enabled := False;
  end;

end;

procedure TfrmCCU.DBGrid1DrawColumnCell(Sender: TObject; const Rect: TRect;
  DataCol: Integer; Column: TColumn; State: TGridDrawState);
begin
    if cdsCCUHoraInicial.AsDateTime > cdsCCUHoraFinal.AsDateTime then
    begin
      DBGrid1.Canvas.Font.Color := clMaroon;
      DBGrid1.Canvas.Font.Style := [fsBold];
      DBGrid1.Canvas.FillRect(Rect);
      DBGrid1.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end
    else if cdsCCUDiferenteUltimaHora.AsString = 'S' then
    begin
      DBGrid1.Canvas.Font.Color := clGray;
      DBGrid1.Canvas.Font.Style := [];
      DBGrid1.Canvas.FillRect(Rect);
      DBGrid1.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end
    else
    begin
      DBGrid1.Canvas.Font.Color := clWindowText;
      DBGrid1.Canvas.Font.Style := [];
      DBGrid1.Canvas.FillRect(Rect);
      DBGrid1.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end;
end;

procedure TfrmCCU.DBGrid2CellClick(Column: TColumn);
begin
  FiltrarGrid;
end;

procedure TfrmCCU.DBGrid2DrawColumnCell(Sender: TObject; const Rect: TRect;
  DataCol: Integer; Column: TColumn; State: TGridDrawState);
begin
  if Column.Field.FieldName = 'Diferenca' then
    if cdsDiasHoras.Value >= cdsTotalHoraPadrao.AsDateTime then
    begin
      DBGrid2.Canvas.Font.Color := clBlue;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end
    else
    begin
      DBGrid2.Canvas.Font.Color := clRed;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end;
  if cdsDiasDiferenteUltimaHora.value > 1 then
  if Column.Field.FieldName <> 'Diferenca' then
  begin
      DBGrid2.Canvas.Font.Color := clGreen;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
  end;
  if cdsDiasErros.value > 0 then
//    if Column.Field.FieldName = 'Diferenca' then
  begin
      DBGrid2.Canvas.Brush.Color := clSilver;
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
  end;

end;

procedure TfrmCCU.DesativaCampos(Edit: TEdit; Ativo: Boolean);
begin
  Edit.Enabled := Ativo;
  if Ativo = False then
    Edit.Clear;
end;

procedure TfrmCCU.dtsAtividadeDataChange(Sender: TObject; Field: TField);
begin
  if cdsAtividade.Active then
    case cdsAtividade.State of
      dsBrowse: StatusBar1.Panels[7].Text := 'Browse';
      dsEdit:   StatusBar1.Panels[7].Text:= 'Edit';
      dsInsert: StatusBar1.Panels[7].Text := 'Insert';
    else
      StatusBar1.Panels[7].Text:= 'Other state';
    end;
end;

procedure TfrmCCU.dtsCCUDataChange(Sender: TObject; Field: TField);
begin
  if cdsCCU.Active then
    case cdsCCU.State of
      dsBrowse: StatusBar1.Panels[1].Text := 'Browse';
      dsEdit:   StatusBar1.Panels[1].Text:= 'Edit';
      dsInsert: StatusBar1.Panels[1].Text := 'Insert';
    else
      StatusBar1.Panels[1].Text:= 'Other state';
    end;
end;

procedure TfrmCCU.dtsDiasDataChange(Sender: TObject; Field: TField);
begin
  FiltrarGrid;
  if cdsDias.Active then
    case cdsDias.State of
      dsBrowse: StatusBar1.Panels[3].Text := 'Browse';
      dsEdit:   StatusBar1.Panels[3].Text:= 'Edit';
      dsInsert: StatusBar1.Panels[3].Text := 'Insert';
    else
      StatusBar1.Panels[3].Text:= 'Other state';
    end;
end;

procedure TfrmCCU.dtsTotalDataChange(Sender: TObject; Field: TField);
begin
  if cdsTotal.Active then
    case cdsTotal.State of
      dsBrowse: StatusBar1.Panels[5].Text := 'Browse';
      dsEdit:   StatusBar1.Panels[5].Text:= 'Edit';
      dsInsert: StatusBar1.Panels[5].Text := 'Insert';
    else
      StatusBar1.Panels[5].Text:= 'Other state';
    end;
end;

procedure TfrmCCU.Edit1Click(Sender: TObject);
begin
  btnAbrir.Click;
end;

procedure TfrmCCU.Edit2Change(Sender: TObject);
begin
  if cdsRT.Active then
    cdsRT.Locate('CodRT',Edit2.Text,[loPartialKey]);
end;

function TfrmCCU.Empty(inString: String): Boolean;

{ Testa se a variavel está vazia ou não }
Var
  index: Byte;
Begin
  index := 1;
  Empty := True;
  while (index <= Length(inString)) and (index <> 0) do
  begin
    if inString[index] = ' ' Then
    begin
      inc(index)
    end
    else
    Begin
      Empty := False;
      index := 0
    end;
  end;

end;

function TfrmCCU.EstaVazio(Edit: TEdit): Boolean;
var
  Texto: string;
begin
  Texto := Edit.Text;
  EstaVazio := Empty(Edit.Text);
end;

procedure TfrmCCU.FiltrarGrid;
begin
  if not IgnoreDataChange then
  begin
    IgnoreDataChange := True;
    CheckBox1.State := cbChecked;
    CheckBox1.Enabled := True;
    IgnoreDataChange := False;
    cdsCCU.Filtered := False;
    cdsCCU.Filter := ' codDia = ''' + cdsDiasCod.AsString + '''';
    cdsCCU.Filtered := True;
  end;
end;

procedure TfrmCCU.FormCloseQuery(Sender: TObject; var CanClose: Boolean);
begin
{   CanClose := True;
  if cdsCCU.UpdateRecord then
    CanClose := (MessageDlg('Updates are still pending' + #13 +
      'Close anyway?', mtConfirmation, [mbYes, mbNo], 0) = mrYes);}
end;

procedure TfrmCCU.FormCreate(Sender: TObject);
begin
  {
    Initialize the dialog filters to open/save *.txt files
    and also files with arbitrary extensions.
  }
  OpenTextFileDialog1.Filter := 'Text files (*.txt;*.ccu)|*.txt;*.ccu|Any file (*.*)|*.*';
  // OpenTextFileDialog1.FileName := 'h:\teste.txt';
  // Memo1.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
  Edit1.Text := OpenTextFileDialog1.FileName;
  //Label2.Caption := '';
  SaveTextFileDialog1.Filter := 'Text files (*.txt)|*.TXT|Any file (*.*)|*.*|CCU file (*.ccu)|*.ccu';

  if not cdsAtividade.Active then
  begin
    cdsatividade.CreateDataSet;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*TI*';
    cdsAtividadeDescricao.AsString := 'Teste Inicial';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*PR*';
    cdsAtividadeDescricao.AsString := 'Programação';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*SU*';
    cdsAtividadeDescricao.AsString := 'Suporte';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*LI*';
    cdsAtividadeDescricao.AsString := 'Liberação de Versão';
    cdsAtividade.Post;

  end;

end;

procedure TfrmCCU.FormResize(Sender: TObject);
begin
  { Edit1.Width := frmCCU.Width - 160;
    Memo1.Width := frmCCU.Width - 160;
    Panel2.Width := frmCCU.Width - 160;
    Panel1.Left := frmCCU.Width - 140; }
end;

procedure TfrmCCU.Memo1Click(Sender: TObject);
begin
  { SelecionarLinha(Memo1);
    Linha := Memo1.SelText;
    Label2.Caption := Linha;

    PreencheCampos(edtHoraInicial, Linha, 1, 4);
    PreencheCampos(edtHoraFinal, Linha, 6, 4);
    PreencheCampos(edtCodCCU, Linha, 11, 10);

    CodCCU := UpperCase(Copy(edtCodCCU.Text, 0, 3));


    if CodCCU = 'XCO' then
    begin
    PreencheCampos(edtSolucao, Linha, 22, Length(Linha));

    DesativaCampos(edtSolicitante, False);
    DesativaCampos(edtTelaProcedimento, False);
    DesativaCampos(edtSolicitacao, False);
    DesativaCampos(edtCodRT, False);
    DesativaCampos(edtCodAtividade, False);
    end
    else
    begin
    DesativaCampos(edtSolicitante, True);
    DesativaCampos(edtTelaProcedimento, True);
    DesativaCampos(edtSolicitacao, True);
    DesativaCampos(edtCodRT, True);
    DesativaCampos(edtCodAtividade, True);

    PreencheCampos(edtCodRT, Linha, 25, 5);
    PreencheCampos(edtCodAtividade, Linha, 25, 5);
    Solicitante := Pos('Solicitante:', Linha);
    Tela_Procedimento := Pos('Tela/Procedimento:', Linha);
    Solicitacao := Pos('Solicitação:', Linha);
    Solucao := Pos('Solução:', Linha);

    PreencheCampos(edtSolicitante, Linha, Solicitante + 12,
    Tela_Procedimento - Solicitante);
    PreencheCampos(edtTelaProcedimento, Linha, Tela_Procedimento + 18,
    Solicitacao - Tela_Procedimento);
    PreencheCampos(edtSolicitacao, Linha, Solicitacao + 12,
    Solucao - Solicitacao);
    PreencheCampos(edtSolucao, Linha, Solucao + 8, Length(Linha));
    end;
    ValidaDados(CodCCU); }
end;

procedure TfrmCCU.PreencheCampos(Edit: TEdit; Linha: string;
  Inicial, Count: Integer);
begin
  Edit.Text := Copy(Linha, Inicial, Count);
end;

procedure TfrmCCU.PreencheCamposDataSet(cds: TADODataSet; Field, Linha: String;
  Inicial, Count: Integer);
begin
  cdsCCU.FieldByName(Field).Value := Copy(Linha, Inicial, Count);
end;


procedure TfrmCCU.ExportarTxt(Arquivo: String);
var
  ArquivoTXT: TStringList;
  Linha: String;
begin
  cdsDias.First;
  cdsCCU.First;
  ArquivoTXT := TStringList.Create;
  while not Cdsdias.Eof do
  begin
    ArquivoTXT.Add('* ' + cdsDiasDia.AsString);
    while not cdsCCU.Eof do
    begin
      Linha := '';
      Linha := StringReplace(copy(cdsCCUHoraInicial.AsString,1,5),':', '',[rfReplaceAll,rfIgnoreCase]) + '-';
      Linha := Linha + StringReplace(copy(cdsCCUHoraFinal.AsString,1,5),':', '',[rfReplaceAll,rfIgnoreCase]) + ' ';
      Linha := Linha + cdsCCUCodCCU.AsString + ' ';
      if trim(cdsCCUCodRT.AsString) <> ''  then
      begin
        Linha := Linha + 'RT ' + cdsCCUCodRT.AsString + ' ';
        Linha := Linha + cdsCCUCodAtividade.AsString + ' ';
        Linha := Linha + 'Solicitante: ' + cdsCCUSolicitante.AsString + ' ';
        Linha := Linha + 'Tela/Procedimento: ' + cdsCCUTelaProcedimento.AsString + ' ';
        Linha := Linha + 'Solicitação: ' + cdsCCUSolicitacao.AsString + ' ';
        Linha := Linha + 'Solução: ' + Trim(cdsCCUSolucao.AsString);
      end
      else
        Linha := Linha + cdsCCUSolucao.AsString;
      ArquivoTXT.Add(Linha);
      cdsCCU.Next;
    end;
    cdsDias.Next;
    ArquivoTXT.Add('');
  end;
  ArquivoTXT.SaveToFile(Arquivo);
  ShowMessage('Arquivo ''' + Arquivo +''' exportado com Sucesso ');
end;

procedure TfrmCCU.SalvarTxt(Arquivo: String);
var
  ArquivoTXT: TStringList;
  Linha: String;
begin
  cdsDias.First;
  cdsCCU.First;
  ArquivoTXT := TStringList.Create;
  while not Cdsdias.Eof do
  begin
    ArquivoTXT.Add('* ' + cdsDiasDia.AsString);
    while not cdsCCU.Eof do
    begin
      Linha := '';
      Linha := StringReplace(copy(cdsCCUHoraInicial.AsString,1,5),':', '',[rfReplaceAll,rfIgnoreCase]) + '-';
      Linha := Linha + StringReplace(copy(cdsCCUHoraFinal.AsString,1,5),':', '',[rfReplaceAll,rfIgnoreCase]) + ' ';
      Linha := Linha + cdsCCUCodCCU.AsString + ' ';
      if trim(cdsCCUCodRT.AsString) <> ''  then
      begin
        Linha := Linha + 'RT ' + cdsCCUCodRT.AsString + ' ';
        Linha := Linha + cdsCCUCodAtividade.AsString + ' ';
        Linha := Linha + 'Solicitante: ' + cdsCCUSolicitante.AsString + ' ';
        Linha := Linha + 'Tela/Procedimento: ' + cdsCCUTelaProcedimento.AsString + ' ';
        Linha := Linha + 'Solicitação: ' + cdsCCUSolicitacao.AsString + ' ';
        Linha := Linha + 'Solução: ' + Trim(cdsCCUSolucao.AsString);
      end
      else
        Linha := Linha + cdsCCUSolucao.AsString;
      ArquivoTXT.Add(Linha);
      cdsCCU.Next;
    end;
    cdsDias.Next;
    ArquivoTXT.Add('');
  end;
  ArquivoTXT.SaveToFile(Arquivo);
  ShowMessage('Arquivo ''' + Arquivo +''' salvo com Sucesso ');
end;

procedure TfrmCCU.SpeedButton1Click(Sender: TObject);
begin
  Close;
end;

procedure TfrmCCU.btnExportarClick(Sender: TObject);
begin
  FormExportaExcel.ShowModal();
end;

procedure TfrmCCU.btnAbrirClick(Sender: TObject);
begin
  { Execute an open file dialog. }
  if OpenTextFileDialog1.Execute then
    { First check if the file exists. }
    if FileExists(OpenTextFileDialog1.FileName) then
    begin
      { If it exists, load the data into the memo box. }
      // Memo1.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
      // StringGrid1.    ;
      Edit1.Text := OpenTextFileDialog1.FileName;
      btnCarregar.Enabled := True;
      btnSalvarArquivo.Enabled := True;
      btnLimpar.Enabled := True;
      btnExportar.Enabled := True;
      btnCarregar.Click;

    end
    else
      { Otherwise, raise an exception. }
      raise Exception.Create('File does not exist.');
end;

procedure TfrmCCU.btnSalvarArquivoClick(Sender: TObject);
begin
  if SaveTextFileDialog1.Execute then
    if FileExists(SaveTextFileDialog1.FileName) then
    begin
      if MessageDlg('Arquivo já existe, deseja sobrescrever?',mtConfirmation,[mbYes, mbNo],0) = mrYes then
        SalvarTxt(SaveTextFileDialog1.FileName)
      else
        MessageDlg('Operação Cancelada', mtInformation, [mbOK],0);
    end
    else
     SalvarTxt(SaveTextFileDialog1.FileName)
end;

procedure TfrmCCU.btnCarregarClick(Sender: TObject);
begin
  if trim(OpenTextFileDialog1.FileName) <> '' then
  begin
    if cdsCCU.Active then
      cdsCCU.close;
    if cdsTotal.Active then
      cdsTotal.close;
    if cdsDias.Active then
      cdsDias.close;
    if cdsRT.Active then
      cdsRT.close;
    CarregarGrid;
  end;

end;

procedure TfrmCCU.btnLimparClick(Sender: TObject);
begin
  if cdsCCU.Active then
    cdsCCU.close;
  if cdsTotal.Active then
    cdsTotal.close;
  if cdsDias.Active then
    cdsDias.close;
//  btnCarregar.Enabled := False;
  btnSalvarArquivo.Enabled := False;
  btnLimpar.Enabled := False;
  btnExportar.Enabled := False;
end;

procedure TfrmCCU.ValidaDados(CodCCU: String);
begin
  { if CodCCU = 'XCO' then
    begin
    if EstaVazio(edtHoraInicial) or EstaVazio(edtHoraFinal) or
    EstaVazio(edtCodCCU) or EstaVazio(edtSolucao) then
    Label2.Caption := 'Linha Inválida'
    else
    Label2.Caption := 'Linha Válida';
    end
    else
    begin
    if EstaVazio(edtHoraInicial) or EstaVazio(edtHoraFinal) or
    EstaVazio(edtCodCCU) or EstaVazio(edtCodRT) or EstaVazio(edtCodAtividade)
    or EstaVazio(edtSolicitante) or EstaVazio(edtTelaProcedimento) or
    EstaVazio(edtSolicitacao) or EstaVazio(edtSolucao) then
    Label2.Caption := 'Linha Inválida'
    else
    Label2.Caption := 'Linha Válida';
    end }
end;

end.



{

  *TI* - Teste Inicial
  *PR* - Programação
  *SU* - Suporte
  *LI* - Liberação de Versão

  POS1340101 - CORRETIVA
  POS1340193 - LIBERAÇÃO DE VERSÃO - geração de versao, tirando warnings, baixando versao
  POS1340194 - SUPORTE
  POS1340196 - GERENCIAMENTO (reunião)
  POS1340198 - MELHORIAS / ALTERAÇÕES / NOVAS IMPLEMENTAÇÕES
  POS1340199 - TREINAMENTO
  POS3161260 - NOVAS TELAS
  999101 - ********** EM DESUSO ********** GERAÇÃO DE VERSÕES + ACOMPANHAMENTO DE BAIXA DE VERSÕES.
  999102 - PORTS ENTRE ÁRVORES DO SVN
  999103 - CRIAÇÃO DE ÁRVORE NO SVN
  999104 - ATUALIZAÇÕES DE RTS
  999105 - INSTALAÇÃO/UPGRADE DE SOFTWARE (DELPHI, ETC)
  999106 - PROBLEMA COM EQUIPAMENTO/ACESSO
  999107 - TECNICAS AVALIAÇÃO DE INFRAESTRUTURA - 3 CAMADAS, ETC.
  XCO0000000 - ATIVIDADES GERAIS
  XCO0000010 - TREINAMENTO RECEBIDO
  XCO0000012 - MANUTENCAO DE EQUIPAMENTOS
  XCO0000014 - TREINAMENTO MINISTRADO
  XCO0000015 - REUNIOES INTERNAS
  XCO0000016 - SUPORTE NOVOS NEGOCIOS
  XCO0000017 - LANC. HORAS/SUPER PROJ.
  XCO0000019 - LEITURA INFORMATIVOS
  XCO0000029 - AVALIACAO DE DESEMPENHO
  XCO0000032 - ESTUDO DE SOFTWARE
  XCO0000050 - IMPRODUTIVO
  XCO0000051 - FERIAS
  XCO0000054 - ESTUDOS UNIVERSIDADE
  XCO0000057 - LICENCA
  XCO0000076 - 2:00 hrs da 4a. feira cinzas
  XCO0000082 - DISPENSA JUSTICA ELEITORAL
  XCO0000084 - ACERTO FINAL DE ANO - 4:00
  XCO0000103 - GINASTICA LABORAL
  XCO0000119 - AUDIENCIA TRABALHISTA
}
