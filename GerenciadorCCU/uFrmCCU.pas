unit uFrmCCU;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, ExtDlgs, StdCtrls, Buttons, Grids, ExtCtrls, ComCtrls, DB, ADODB,
  DBGrids, Mask, DBCtrls, IdBaseComponent, IdComponent, IdTCPConnection,
  IdTCPClient, IdHTTP, OleCtrls, SHDocVw, XPMan, ActnList, IdIOHandler,
  IdIOHandlerSocket, IdIOHandlerStack, IdSSL, IdSSLOpenSSL;

type
  TStringArray = array of string;

  TfrmCCU = class(TForm)
    Label1: TLabel;
    Edit1: TEdit;
    OpenTextFileDialog1: TOpenTextFileDialog;
    SaveTextFileDialog1: TSaveTextFileDialog;
    Panel1: TPanel;
    SpeedButton1: TSpeedButton;
    btnSalvarArquivo: TSpeedButton;
    btnLimpar: TSpeedButton;
    cdsCCU: TADODataSet;
    cdsCCUCodCCU: TStringField;
    cdsCCUCodAtividade: TStringField;
    cdsCCUSolicitante: TStringField;
    cdsCCUTelaProcedimento: TStringField;
    cdsCCUSolicitacao: TStringField;
    cdsCCUSolucao: TStringField;
    dtsCCU: TDataSource;
    cdsCCUCodRT: TStringField;
    dtsDias: TDataSource;
    cdsDias: TADODataSet;
    cdsDiasDia: TStringField;
    dtsTotal: TDataSource;
    cdsDiasCod: TIntegerField;
    cdsCCUCod: TIntegerField;
    cdsCCUDia: TStringField;
    cdsCCUCodDia: TIntegerField;
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
    cdsAtividade: TADODataSet;
    cdsAtividadeCod: TStringField;
    cdsAtividadeDescricao: TStringField;
    btnExportar: TSpeedButton;
    cdsRT: TADODataSet;
    dtsRT: TDataSource;
    cdsRTCod: TIntegerField;
    cdsRTCodRT: TStringField;
    cdsRTTotal: TTimeField;
    cdsCCUDiferenteUltimaHora: TStringField;
    cdsDiasDiferenteUltimaHora: TIntegerField;
    cdsDiasErros: TIntegerField;
    SpeedButton2: TSpeedButton;
    IdHTTP1: TIdHTTP;
    reResp: TRichEdit;
    v: TSpeedButton;
    WebBrowser1: TWebBrowser;
    SpeedButton3: TSpeedButton;
    SpeedButton4: TSpeedButton;
    SpeedButton5: TSpeedButton;
    PageControl1: TPageControl;
    TabSheet1: TTabSheet;
    TabSheet2: TTabSheet;
    Panel4: TPanel;
    Label14: TLabel;
    Label13: TLabel;
    Label12: TLabel;
    DBGrid2: TDBGrid;
    DBEdit12: TDBEdit;
    DBEdit11: TDBEdit;
    DBEdit10: TDBEdit;
    Panel3: TPanel;
    DBGrid1: TDBGrid;
    CheckBox1: TCheckBox;
    Panel2: TPanel;
    Label3: TLabel;
    Label4: TLabel;
    Label5: TLabel;
    Label6: TLabel;
    Label7: TLabel;
    Label8: TLabel;
    Label9: TLabel;
    Label10: TLabel;
    Label11: TLabel;
    DBEdit1: TDBEdit;
    DBEdit2: TDBEdit;
    DBEdit3: TDBEdit;
    DBEdit4: TDBEdit;
    DBEdit6: TDBEdit;
    DBEdit7: TDBEdit;
    DBEdit8: TDBEdit;
    DBEdit9: TDBEdit;
    DBLookupComboBox1: TDBLookupComboBox;
    Panel5: TPanel;
    DBGrid3: TDBGrid;
    Edit2: TEdit;
    TabSheet3: TTabSheet;
    TabSheet4: TTabSheet;
    Panel6: TPanel;
    DBGrid4: TDBGrid;
    Panel7: TPanel;
    DBGrid5: TDBGrid;
    Panel8: TPanel;
    TabSheet5: TTabSheet;
    dtsResRT: TDataSource;
    cdsResRT: TADODataSet;
    cdsResRTid: TIntegerField;
    cdsResRTSubject: TStringField;
    cdsResRTCFAbertura: TStringField;
    cdsResRTCFNatureza: TStringField;
    dtsProjetos: TDataSource;
    cdsProjetos: TADODataSet;
    cdsProjetosid: TStringField;
    cdsProjetosdescricao: TStringField;
    dtsNatureza: TDataSource;
    cdsNatureza: TADODataSet;
    btnCarregarRTs: TSpeedButton;
    cdsNaturezaid: TStringField;
    cdsNaturezadescricao: TStringField;
    cdsResRTCFModulo: TStringField;
    cdsResRTCFProjeto: TStringField;
    cdsResRTOwner: TStringField;
    Panel9: TPanel;
    Edit7: TEdit;
    Edit5: TEdit;
    Edit6: TEdit;
    Edit4: TEdit;
    Edit3: TEdit;
    cdsResRTRequestors: TStringField;
    btnAbrir: TSpeedButton;
    btnCompletar: TSpeedButton;
    cdsResRTCodAtividade: TStringField;
    cdsCCUCodCCUCorreto: TStringField;
    Edit8: TEdit;
    btnExportarTxt: TSpeedButton;
    TabSheet6: TTabSheet;
    Memo1: TMemo;
    lblCodCorreto: TLabel;
    edtCodCorreto: TDBEdit;
    XPManifest1: TXPManifest;
    StatusBar1: TStatusBar;
    cdsCCUMarcado: TStringField;
    ActionList1: TActionList;
    Next: TAction;
    Previous: TAction;
    cdsRTOnline: TBooleanField;
    DBGrid6: TDBGrid;
    CheckBox2: TCheckBox;
    cdsCCUInconsistente: TBooleanField;
    TabSheet7: TTabSheet;
    Panel10: TPanel;
    Label2: TLabel;
    edtRt: TEdit;
    SpeedButton6: TSpeedButton;
    Label15: TLabel;
    edtLinhaDigitavel: TEdit;
    Label16: TLabel;
    Label17: TLabel;
    edtTelaProcedimento: TEdit;
    TabSheet8: TTabSheet;
    Panel11: TPanel;
    mmAjustar: TMemo;
    edtAjustar: TEdit;
    btnAjustar: TSpeedButton;
    SpeedButton7: TSpeedButton;
    DBLookupListBox1: TDBLookupListBox;
    IdSSLIOHandlerSocketOpenSSL1: TIdSSLIOHandlerSocketOpenSSL;
    cdsDiasIgnorarDiaPrevisto: TStringField;

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
    procedure SalvarTxt(Arquivo: String; Tipo: String);
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
    procedure CarregarNaturezas;
    procedure ProcessarProjetos;
    procedure FecharCds;
    procedure CarregarProjetos;
    procedure CarregarGridRts;
    procedure CheckBox1Click(Sender: TObject);
    procedure DBGrid2CellClick(Column: TColumn);
    procedure FiltrarGrid;
    function MontarQuery(Parcial: Boolean): String;
    function Split(const Str: string; Delimiter: Char; Max: Integer = 0)
      : TStringArray;
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
    procedure SpeedButton2Click(Sender: TObject);
    procedure vClick(Sender: TObject);
    procedure SpeedButton3Click(Sender: TObject);
    procedure btnCarregarRTsClick(Sender: TObject);
    procedure btnCompletarClick(Sender: TObject);
    procedure DBLookupComboBox1Exit(Sender: TObject);
    procedure btnExportarTxtClick(Sender: TObject);
    procedure DBGrid1CellClick(Column: TColumn);
    procedure cdsCCUBeforeEdit(DataSet: TDataSet);
    procedure cdsCCUBeforeInsert(DataSet: TDataSet);
    procedure DBEdit7Exit(Sender: TObject);
    procedure DBEdit9Exit(Sender: TObject);
    procedure DBEdit3Exit(Sender: TObject);
    procedure DBEdit6Exit(Sender: TObject);
    procedure DBEdit8Exit(Sender: TObject);
    procedure NextExecute(Sender: TObject);
    procedure PreviousExecute(Sender: TObject);
    procedure DBGrid1TitleClick(Column: TColumn);
    procedure Button1Click(Sender: TObject);
    procedure CheckBox2Click(Sender: TObject);
    procedure SpeedButton6Click(Sender: TObject);
    procedure BuscarInforRTOnline(RT: String);
    procedure FormShow(Sender: TObject);
    procedure btnAjustarClick(Sender: TObject);
    procedure SpeedButton7Click(Sender: TObject);
  private
    IgnoreDataChange: Boolean;
    Logar: Boolean;
    CurrentyDir, ConfigDir, Token: String;
    function BuscaSolicitante(CodRT: String): String;
    function ShowMsg(const Msg: String; DlgType: TMsgDlgType = mtInformation;
      Buttons: TMsgDlgButtons = [mbok]; HelpCtx: Longint = 0): Word;

    { Private declarations }
  public
    { Public declarations }

  end;

var
  frmCCU: TfrmCCU;

implementation

uses MaskUtils, DateUtils, Funcoes, FExportaExcel, iniFiles, strutils;
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
  i, TotalCumprir, TotalMinutos, DiasIgnorarPrevisto,{ Hr, Mi, } PosRTi, PosRTf: Integer;
  Linha: String;
  { PosicaoAtividade, }
  Solicitante, Tela_Procedimento, Solicitacao, Solucao: Integer;
  // today: TDateTime;
  UltimaHora, vUltimaHora: String;
begin
  TotalMinutos := 0;
  DiasIgnorarPrevisto := 0;
  try
    IgnoreDataChange := True;
    cdsCCU.Filtered := False;
    cdsCCU.Filter := '';
    Texto := TStringList.Create;
    Texto.LoadFromFile(OpenTextFileDialog1.FileName, TEncoding.UTF8);
    cdsCCU.CreateDataSet;
    cdsDias.CreateDataSet;
    cdsTotal.CreateDataSet;
    cdsRT.CreateDataSet;
    cdsNatureza.CreateDataSet;
    cdsProjetos.CreateDataSet;
    CarregarProjetos;
    CarregarNaturezas;
    CarregarGridRts;
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
        if (Copy(Linha, 1, 1) = '*') or
          ((Copy(Linha, 3, 1) = '/') and (Length(Linha) = 5))
        then
        begin
          if ((Copy(Linha, 3, 1) = '/') and (Length(Linha) = 5)) then
            Linha := '* ' + Linha;

          cdsDias.Insert;
          cdsDiasDia.AsString := Copy(Linha, 3, 5);
          cdsDiasIgnorarDiaPrevisto.AsString := Copy(Linha, 9, 2);
          if Copy(Linha, 9, 2) = 'NP' then
          Inc(DiasIgnorarPrevisto);
          cdsDiasHoras.Value := 0;
          UltimaHora := '08:00:00';
          vUltimaHora := '08:00:00';
          cdsDias.Post;
        end
        else if Copy(Linha, 1, 1) = '.' then
        begin
          Abort;
        end
        else
        begin
          cdsCCU.Insert;
          cdsCCUHoraInicial.Value :=
            StrToTime(FormatarHoras(Copy(Linha, 1, 4)));
          cdsCCUHoraFinal.Value := StrToTime(FormatarHoras(Copy(Linha, 6, 4)));
          cdsCCUCodCCU.AsString := Copy(Linha, 11, 10);
          cdsCCUCodDia.Value := cdsDiasCod.AsInteger;
          TotalMinutos := TotalMinutos + MinutesBetween(cdsCCUHoraInicial.Value,
            cdsCCUHoraFinal.Value);
          begin
            PosRTi := Pos('RT', Linha);

            if PosRTi > 0 then
              Inc(PosRTi, 2)
            else
              PosRTi := 22;

            Solicitante := Pos('Solicitante:', Linha);
            Tela_Procedimento := Pos('Tela/Procedimento:', Linha);

            Solicitacao := Pos('Solicitação:', Linha);
            if Solicitacao = 0 then
              Solicitacao := Pos('Solicitacao:', Linha);

            Solucao := Pos('Solução:', Linha);
            if Solucao = 0 then
              Solucao := Pos('Solucao:', Linha);

            if (Solicitacao > 0) and (Solucao = 0) then
              Solucao := Length(Linha);

            PosRTf := Length(Linha);
            if Pos('*', Linha) > 0 then
              PosRTf := Pos('*', Linha);

            if Solicitante = 0 then
              if Pos('RT', Linha) > 0 then
                PosRTf := Pos(' ', Copy(Linha, PosRTi + 1, Length(Linha))
                  ) + PosRTi;

            if Pos('RT', Linha) > 0 then
              cdsCCUCodRT.AsString :=
                trim(StringReplace(trim(Copy(Linha, PosRTi, PosRTf - (PosRTi))),
                '.', '', [rfReplaceAll, rfIgnoreCase]));
            if Pos('*', Linha) > 0 then
              cdsCCUCodAtividade.AsString := Copy(Linha, Pos('*', Linha), 4)
            else
            begin
              if Pos('RT', Linha) > 0 then
                cdsCCUSolucao.AsString := Copy(Linha, PosRTf, Length(Linha))
              else
                cdsCCUSolucao.AsString := Copy(Linha, PosRTi, Length(Linha))
            end;

            if Solicitante > 0 then
              cdsCCUSolicitante.AsString :=
                trim(Copy(Linha, Solicitante + 12,
                Tela_Procedimento - Solicitante - 12));
            if Tela_Procedimento > 0 then
              cdsCCUTelaProcedimento.AsString :=
                trim(Copy(Linha, Tela_Procedimento + 18,
                Solicitacao - Tela_Procedimento - 18));
            if Solicitacao > 0 then
              cdsCCUSolicitacao.AsString :=
                trim(Copy(Linha, Solicitacao + 12, Solucao - Solicitacao - 12));
            if Solucao > 0 then
              cdsCCUSolucao.AsString :=
                trim(Copy(Linha, Solucao + 8, Length(Linha)))
            else if Pos('*', Linha) > 0 then
              cdsCCUSolucao.AsString :=
                trim(Copy(Linha, Pos('*', Linha) + 4, Length(Linha)));
            if ((UltimaHora <> vUltimaHora) and
              (cdsCCUHoraInicial.AsString <> UltimaHora)) then
            begin
              cdsCCUDiferenteUltimaHora.AsString := 'S';
              cdsDias.Edit;
              cdsDiasDiferenteUltimaHora.Value :=
                cdsDiasDiferenteUltimaHora.AsInteger + 1;
              cdsDias.Post;
            end
            else
              cdsCCUDiferenteUltimaHora.AsString := 'N';
            if 1 = 2 then
              MessageDlg('', mtWarning, [mbok], 0);

            if Pos('RT', cdsCCUCodCCU.AsString) > 0 then
            begin
              cdsCCUSolucao.Clear;
              cdsCCUCodRT.AsString :=
                trim(Copy(cdsCCUCodCCU.AsString, 3,
                Length(cdsCCUCodCCU.AsString)));
              cdsCCUCodCCU.Clear;
            end;
          end;

          cdsCCU.Post;
          UltimaHora := cdsCCUHoraFinal.AsString;
          cdsDias.Edit;
          cdsDiasHoras.Value := cdsDiasHoras.Value + cdsCCUTotal.Value;
          cdsDias.Post;

          if cdsCCUCodRT.AsString <> '' then
            if cdsRT.Locate('CodRT', cdsCCUCodRT.AsString,
              [loCaseInsensitive]) then
            begin
              cdsRT.Edit;
              cdsRTTotal.AsDateTime := cdsRTTotal.Value +
                StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
                cdsCCUHoraFinal.Value)));
              cdsRT.Post;
            end
            else
            begin
              cdsRT.Insert;
              cdsRTCodRT.AsString := cdsCCUCodRT.AsString;
              cdsRTTotal.AsDateTime :=
                StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
                cdsCCUHoraFinal.Value)));
              cdsRTOnline.AsBoolean :=
                cdsResRT.Locate('id', trim(cdsCCUCodRT.AsString),
                [loCaseInsensitive]);
              cdsRT.Post;
            end;

        end;
    end;
  finally
    IgnoreDataChange := False;
    TotalCumprir := (cdsDias.RecordCount - DiasIgnorarPrevisto) * 8 * 60;
    StatusBar1.Panels.Items[0].Text := 'Dias Previstos: ' + IntToStr(cdsDias.RecordCount);
    StatusBar1.Panels.Items[1].Text := 'Dias Ignorados: ' + IntToStr(DiasIgnorarPrevisto);
    cdsTotal.Edit;
    cdsTotalTotal.AsString := FormataMinutos(TotalMinutos);
    cdsTotalTotalCumprir.AsString := FormataMinutos(TotalCumprir);
    cdsDias.First;
    while not cdsDias.Eof do
    begin
      cdsDias.Edit;
      if cdsDiasIgnorarDiaPrevisto.AsString = 'NP' then
        cdsDiasDiferenca.Value :=   cdsDiasHoras.AsDateTime
      else
        cdsDiasDiferenca.Value := cdsTotalHoraPadrao.AsDateTime - cdsDiasHoras.AsDateTime;
      cdsDias.Post;
      cdsDias.Next;
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
    ProcessarProjetos;
    cdsCCU.EnableControls;
    cdsDias.EnableControls;
    cdsTotal.EnableControls;
    FreeAndNil(Texto);
    btnSalvarArquivo.Enabled := True;
    btnLimpar.Enabled := True;
    btnExportar.Enabled := True;
    btnExportarTxt.Enabled := True;
    btnCarregarRTs.Enabled := True;
    btnCarregar.Enabled := True;
    btnCompletar.Enabled := True;
    dtsDias.OnDataChange := dtsDiasDataChange;
    FiltrarGrid;
  end;
end;

procedure TfrmCCU.CarregarGridRts;
var
  fileData, s1: TStringList;
  tmp: String;
  // lines, i, j : Integer;
  i: Integer;
  CharDelimiter: Char;
  Ret: TStringArray;

begin
  if FileExists(CurrentyDir + '\ccu.txt') then
  begin
    s1 := TStringList.Create;
    fileData := TStringList.Create; // Create the TSTringList object
    fileData.StrictDelimiter := True;
    if cdsResRT.Active then
      cdsResRT.close;
    cdsResRT.CreateDataSet;
    cdsResRT.Open;
    CharDelimiter := #9;
    fileData.Delimiter := CharDelimiter; // TAB
    s1.LoadFromFile(CurrentyDir + '\ccu.txt', TEncoding.UTF8);
    // Load from Testing.txt file
    for i := 1 to s1.Count - 1 do
    begin
      Ret := Split(s1[i], CharDelimiter);
      cdsResRT.Insert;
      cdsResRTid.AsString := Ret[0];
      cdsResRTSubject.AsString := Ret[1];
      cdsResRTOwner.AsString := Ret[2];
      // cdsResRTCFAbertura.AsString :=  ret[18];
      cdsResRTRequestors.AsString := ifthen(trim(Ret[5]) <> '', Ret[5], Ret[6]);
      // copy(Ret[3],0,(Pos('@',Ret[3])-1));
      // cdsResRTCFProjeto.AsString :=  ret[20];
      // cdsResRTCFModulo.AsString :=  ret[23];
      cdsResRTCFNatureza.AsString := Ret[8];
      if Pos('(-PRJ-)', cdsResRTSubject.AsString) > 0 then
      begin
        tmp := Copy(cdsResRTSubject.AsString,
          Pos('(-PRJ-)', cdsResRTSubject.AsString),
          Pos(' - ', cdsResRTSubject.AsString));
        if cdsProjetos.Locate('descricao', tmp, [loCaseInsensitive]) then
          cdsResRTCodAtividade.AsString := cdsProjetosid.AsString;
      end
      else
      begin
        if cdsNatureza.Locate('descricao', Ret[8],
          [loCaseInsensitive, loPartialKey]) then
          cdsResRTCodAtividade.AsString := cdsNaturezaid.AsString;
      end;

      cdsResRT.Post;
    end;
  end;

end;

procedure TfrmCCU.CarregarNaturezas;
var
  fileData: TStringList;
  saveLine: String;
  i: Integer;
begin
  fileData := TStringList.Create; // Create the TSTringList object
  if FileExists(ConfigDir + '\Natureza.txt') then
    fileData.LoadFromFile(ConfigDir + '\Natureza.txt')
  else
    fileData.LoadFromFile(CurrentyDir + '\Natureza.txt');
  for i := 0 to fileData.Count - 1 do
  begin
    saveLine := fileData[i];
    cdsNatureza.Insert;
    cdsNaturezaid.AsString := Copy(saveLine, 1, 10);
    cdsNaturezadescricao.AsString := Copy(saveLine, 14, Length(saveLine));
    cdsNatureza.Post;
  end;
end;

procedure TfrmCCU.CarregarProjetos;
var
  fileData: TStringList;
  saveLine: String;
  i: Integer;
begin
  fileData := TStringList.Create; // Create the TSTringList object
  if FileExists(ConfigDir + '\Projetos.txt') then
    fileData.LoadFromFile(ConfigDir + '\Projetos.txt')
  else
    fileData.LoadFromFile(CurrentyDir + '\Projetos.txt');
  for i := 0 to fileData.Count - 1 do
  begin
    saveLine := fileData[i];
    cdsProjetos.Insert;
    cdsProjetosid.AsString := Copy(saveLine, 1, 10);
    cdsProjetosdescricao.AsString := Copy(saveLine, 14, Length(saveLine));
    cdsProjetos.Post;
  end;
end;

procedure TfrmCCU.cdsCCUBeforeEdit(DataSet: TDataSet);
begin
  if not cdsCCU.Active then
    Abort;
end;

procedure TfrmCCU.cdsCCUBeforeInsert(DataSet: TDataSet);
begin
  if not cdsCCU.Active then
    Abort;
end;

procedure TfrmCCU.cdsCCUHoraFinalValidate(Sender: TField);
{ var
  Tempo: TTime; }
begin
  dtsDias.OnDataChange := nil;
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
  dtsDias.OnDataChange := dtsDiasDataChange;
end;

procedure TfrmCCU.cdsCCUHoraInicialValidate(Sender: TField);
begin
  dtsDias.OnDataChange := nil;
  if cdsCCUHoraInicial.AsDateTime < cdsCCUHoraFinal.AsDateTime then
    cdsCCUTotal.AsDateTime :=
      StrToTime(FormataMinutos(MinutesBetween(cdsCCUHoraInicial.Value,
      cdsCCUHoraFinal.Value)));
  dtsDias.OnDataChange := dtsDiasDataChange;
end;

procedure TfrmCCU.cdsCCUNewRecord(DataSet: TDataSet);
var
  cdsclone: TADODataSet;
begin
  if not cdsCCU.Active then
    Abort;

  cdsclone := TADODataSet.Create(nil);
  cdsclone.Clone(cdsCCU);
  cdsCCUCod.Value := cdsclone.RecordCount + 1;
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
  if not cdsCCU.Active then
    Abort;
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

procedure TfrmCCU.CheckBox2Click(Sender: TObject);
begin
  if not IgnoreDataChange and CheckBox2.Checked then
  begin
    cdsCCU.Filtered := False;
    cdsCCU.Filter := ' Inconsistente = True ';
    cdsCCU.Filtered := True;
    CheckBox1.Checked := False;
    CheckBox1.Enabled := False;
  end
  else
  begin
    cdsCCU.Filtered := False;
    cdsCCU.Filter := '';
  end;
end;

procedure TfrmCCU.DBEdit3Exit(Sender: TObject);
var
  i: Integer;
  CodCCU: String;
begin
  if not cdsCCU.Active then
    Abort;
  CodCCU := cdsCCUCodCCU.AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUCodCCU.AsString := CodCCU;
    cdsCCU.Post;
  end;
end;

procedure TfrmCCU.DBEdit6Exit(Sender: TObject);
var
  i: Integer;
  Solicitante: String;
begin
  if not cdsCCU.Active then
    Abort;
  Solicitante := cdsCCUSolicitante.AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUSolicitante.AsString := Solicitante;
    cdsCCU.Post;
  end;
end;

procedure TfrmCCU.DBEdit7Exit(Sender: TObject);
var
  i: Integer;
  Tela: String;
begin
  if not cdsCCU.Active then
    Abort;
  Tela := cdsCCUTelaProcedimento.AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUTelaProcedimento.AsString := Tela;
    cdsCCU.Post;
  end;
end;

procedure TfrmCCU.DBEdit8Exit(Sender: TObject);
var
  i: Integer;
  Solicitacao: String;
begin
  if not cdsCCU.Active then
    Abort;
  Solicitacao := cdsCCUSolicitacao.AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUSolicitacao.AsString := Solicitacao;
    cdsCCU.Post;
  end;
end;

procedure TfrmCCU.DBEdit9Exit(Sender: TObject);
var
  i: Integer;
  Solucao: String;
begin
  if not cdsCCU.Active then
    Abort;
  Solucao := cdsCCUSolucao.AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUSolucao.AsString := Solucao;
    cdsCCU.Post;
  end;
end;

procedure TfrmCCU.DBGrid1CellClick(Column: TColumn);
begin
  { if not cdsCCU.Active then
    Abort;
    if Column.FieldName = 'Marcado' then
    begin
    cdsCCU.Edit;
    if cdsCCUMarcado.AsString = 'X' then
    cdsCCUMarcado.AsString := ''
    else
    cdsCCUMarcado.AsString := 'X';
    cdsCCU.Post;
    end; }
end;

procedure TfrmCCU.DBGrid1DrawColumnCell(Sender: TObject; const Rect: TRect;
  DataCol: Integer; Column: TColumn; State: TGridDrawState);
var
  Check: Integer;
  R: TRect;
begin
  if not cdsCCU.Active then
    Abort;
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
  if (cdsCCUCodCCU.AsString <> '') and (cdsCCUCodCCUCorreto.AsString <> '') and
    (trim(cdsCCUCodCCU.AsString) <> trim(cdsCCUCodCCUCorreto.AsString)) then
  begin
    DBGrid1.Canvas.Font.Color := clFuchsia;
    DBGrid1.Canvas.Font.Style := [];
    DBGrid1.Canvas.FillRect(Rect);
    DBGrid1.DefaultDrawColumnCell(Rect, DataCol, Column, State);

    CheckBox2.Visible := True;
  end

  // Desenha um checkbox no dbgrid
  { if Column.FieldName = 'Marcado' then
    begin
    DBGrid1.Canvas.FillRect(Rect);
    Check := 0;
    if cdsCCUMarcado.AsString = 'X' then
    Check := DFCS_CHECKED
    else
    Check := 0;
    R:=Rect;
    InflateRect(R,-2,-2); {Diminue o tamanho do CheckBox }
  { DrawFrameControl(DBGrid1.Canvas.Handle,R,DFC_BUTTON, DFCS_BUTTONCHECK or Check);
    end; }
end;

procedure TfrmCCU.DBGrid1TitleClick(Column: TColumn);
begin
  if (Pos(Column.FieldName, cdsCCU.IndexName) > 0) and
    (Pos('DESC', cdsCCU.IndexFieldNames) = 0) then
    cdsCCU.IndexFieldNames := cdsCCU.IndexFieldNames + ' DESC'
  else
    cdsCCU.IndexFieldNames := Column.FieldName;

  // restaurando a cor do título
  DBGrid1.Columns[DBGrid1.Tag].Title.Color := clBtnFace;
  DBGrid1.Columns[DBGrid1.Tag].Title.Font.Color := clWindowText;
  DBGrid1.Columns[DBGrid1.Tag].Title.Font.Style := [];
  DBGrid1.Columns[DBGrid1.Tag].Color := clWindow;
  // guarda a coluna selecionada
  DBGrid1.Tag := Column.Index;
  // alterando a cor do título do campo ordenado
  DBGrid1.Columns[DBGrid1.Tag].Title.Color := $00BE7C7C;
  DBGrid1.Columns[DBGrid1.Tag].Title.Font.Color := clBlack;
  DBGrid1.Columns[DBGrid1.Tag].Title.Font.Style := [fsBold];
  DBGrid1.Columns[DBGrid1.Tag].Color := clScrollBar;
end;

procedure TfrmCCU.DBGrid2CellClick(Column: TColumn);
begin
  FiltrarGrid;
end;

procedure TfrmCCU.DBGrid2DrawColumnCell(Sender: TObject; const Rect: TRect;
  DataCol: Integer; Column: TColumn; State: TGridDrawState);
begin
  if not cdsCCU.Active then
    Abort;
  if Column.Field.FieldName = 'Diferenca' then
  begin
    if (cdsDiasHoras.Value >= cdsTotalHoraPadrao.AsDateTime) or (cdsDiasIgnorarDiaPrevisto.AsString = 'NP') then
    begin
      DBGrid2.Canvas.Font.Color := clBlue;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Hint := 'clBlue';
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end
    else
    begin
      DBGrid2.Canvas.Font.Color := clRed;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Hint := 'clRed';
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end;
  end;
  if cdsDiasDiferenteUltimaHora.Value > 1 then
  begin
    if Column.Field.FieldName <> 'Diferenca' then
    begin
      DBGrid2.Canvas.Font.Color := clGreen;
      DBGrid2.Canvas.Font.Style := [fsBold];
      DBGrid2.Hint := 'clGreen';
      DBGrid2.Canvas.FillRect(Rect);
      DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
    end;
  end;
  if (cdsDiasErros.Value > 0) or (cdsDiasIgnorarDiaPrevisto.AsString <> '') then
  // if Column.Field.FieldName = 'Diferenca' then
  begin
    DBGrid2.Canvas.Brush.Color := clSilver;
    DBGrid2.Hint := 'clSilver';
    DBGrid2.Canvas.FillRect(Rect);
    DBGrid2.DefaultDrawColumnCell(Rect, DataCol, Column, State);
  end;
end;

procedure TfrmCCU.DBLookupComboBox1Exit(Sender: TObject);
var
  i: Integer;
  atividade: String;
begin
  if not cdsCCU.Active then
    Abort;
  atividade := DBLookupComboBox1.ListSource.DataSet.FieldByName('Cod').AsString;
  for i := 0 to DBGrid1.SelectedRows.Count - 1 do
  begin
    cdsCCU.GotoBookmark(pointer(DBGrid1.SelectedRows.Items[i]));
    cdsCCU.Edit;
    cdsCCUCodAtividade.AsString := atividade;
    if cdsCCUSolucao.AsString = '' then
      cdsCCUSolucao.AsString := DBLookupComboBox1.ListSource.DataSet.FieldByName
        ('Descricao').AsString;
    cdsCCU.Post;
  end;

  // if cdsCCUSolucao.AsString = '' then
  // cdsCCUSolucao.AsString := DBLookupComboBox1.ListSource.DataSet.FieldByName('Descricao').AsString;
end;

procedure TfrmCCU.DesativaCampos(Edit: TEdit; Ativo: Boolean);
begin
  Edit.Enabled := Ativo;
  if Ativo = False then
    Edit.Clear;
end;

procedure TfrmCCU.dtsAtividadeDataChange(Sender: TObject; Field: TField);
begin
  // if cdsAtividade.Active then
  // case cdsAtividade.State of
  // dsBrowse: StatusBar1.Panels[7].Text := 'Browse';
  // dsEdit:   StatusBar1.Panels[7].Text:= 'Edit';
  // dsInsert: StatusBar1.Panels[7].Text := 'Insert';
  // else
  // StatusBar1.Panels[7].Text:= 'Other state';
  // end;
end;

procedure TfrmCCU.dtsCCUDataChange(Sender: TObject; Field: TField);
begin
  // FiltrarGrid;
  // if cdsCCU.Active then
  // case cdsCCU.State of
  // dsBrowse: StatusBar1.Panels[1].Text := 'Browse';
  // dsEdit:   StatusBar1.Panels[1].Text:= 'Edit';
  // dsInsert: StatusBar1.Panels[1].Text := 'Insert';
  // else
  // StatusBar1.Panels[1].Text:= 'Other state';
  // end;
end;

procedure TfrmCCU.dtsDiasDataChange(Sender: TObject; Field: TField);
begin
  FiltrarGrid;
  // if cdsDias.Active then
  // case cdsDias.State of
  // dsBrowse: StatusBar1.Panels[3].Text := 'Browse';
  // dsEdit:   StatusBar1.Panels[3].Text:= 'Edit';
  // dsInsert: StatusBar1.Panels[3].Text := 'Insert';
  // else
  // StatusBar1.Panels[3].Text:= 'Other state';
  // end;
end;

procedure TfrmCCU.dtsTotalDataChange(Sender: TObject; Field: TField);
begin
  // if cdsTotal.Active then
  // case cdsTotal.State of
  // dsBrowse: StatusBar1.Panels[5].Text := 'Browse';
  // dsEdit:   StatusBar1.Panels[5].Text:= 'Edit';
  // dsInsert: StatusBar1.Panels[5].Text := 'Insert';
  // else
  // StatusBar1.Panels[5].Text:= 'Other state';
  // end;
end;

procedure TfrmCCU.Edit1Click(Sender: TObject);
begin
  btnAbrir.Click;
end;

procedure TfrmCCU.Edit2Change(Sender: TObject);
begin
  if cdsRT.Active then
    cdsRT.Locate('CodRT', Edit2.Text, [loPartialKey]);
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
      Inc(index)
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
  { CanClose := True;
    if cdsCCU.UpdateRecord then
    CanClose := (MessageDlg('Updates are still pending' + #13 +
    'Close anyway?', mtConfirmation, [mbYes, mbNo], 0) = mrYes); }
end;

procedure TfrmCCU.FormCreate(Sender: TObject);
var
  iniLogin: TIniFile;
  // lParams: TStringList;
begin
  CurrentyDir := GetCurrentDir;

  {
    Initialize the dialog filters to open/save *.txt files
    and also files with arbitrary extensions.
  }
  OpenTextFileDialog1.Filter :=
    'Text files (*.txt;*.ccu)|*.txt;*.ccu|Any file (*.*)|*.*';
  // OpenTextFileDialog1.FileName := 'h:\teste.txt';
  // Memo1.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
  Edit1.Text := OpenTextFileDialog1.FileName;
  // Label2.Caption := '';
  SaveTextFileDialog1.Filter :=
    'Text files (*.txt)|*.TXT|Any file (*.*)|*.*|CCU file (*.ccu)|*.ccu';
  Logar := True;
  if not cdsAtividade.Active then
  begin
    cdsAtividade.CreateDataSet;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*TI*';
    cdsAtividadeDescricao.AsString := 'Teste Inicial';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*PR*';
    cdsAtividadeDescricao.AsString := 'Programação';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*IN*';
    cdsAtividadeDescricao.AsString := 'Indefinido';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*SU*';
    cdsAtividadeDescricao.AsString := 'Suporte';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*LI*';
    cdsAtividadeDescricao.AsString := 'Liberação de Versão';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*EF*';
    cdsAtividadeDescricao.AsString := 'Especificação Funcional';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*ET*';
    cdsAtividadeDescricao.AsString := 'Especificação Técnica';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*GP*';
    cdsAtividadeDescricao.AsString := 'Gerenciamento de Projeto';
    cdsAtividade.Post;

    cdsAtividade.Insert;
    cdsAtividadeCod.AsString := '*TF*';
    cdsAtividadeDescricao.AsString := 'Teste Final';
    cdsAtividade.Post;
  end;

  // lParams := TStringList.Create;
  iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
  ConfigDir := iniLogin.ReadString('CONFIG', 'txt', '');
  Token := iniLogin.ReadString('CONFIG', 'Token', '');
  if iniLogin.ReadString('CONFIG', 'local', '') <> '' then
    if FileExists(iniLogin.ReadString('CONFIG', 'local', '')) then
    begin
      Edit1.Text := iniLogin.ReadString('CONFIG', 'local', '');
      edtAjustar.Text := iniLogin.ReadString('CONFIG', 'local2', '');
      OpenTextFileDialog1.FileName := iniLogin.ReadString('CONFIG',
        'local', '');
      btnCarregar.Enabled := True;
    end;
end;

procedure TfrmCCU.FormResize(Sender: TObject);
begin
  { Edit1.Width := frmCCU.Width - 160;
    Memo1.Width := frmCCU.Width - 160;
    Panel2.Width := frmCCU.Width - 160;
    Panel1.Left := frmCCU.Width - 140; }
end;

procedure TfrmCCU.FormShow(Sender: TObject);
begin
  if edtRt.CanFocus then
    edtRt.SetFocus;
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

function TfrmCCU.MontarQuery(Parcial: Boolean): String;
var
  s, s1, s2: string;
begin
  s := ' ( ';
  s2 := s;
  cdsRT.First;
  cdsRT.Filter := 'Online = False';
  if Parcial then
    cdsRT.Filtered := True;
  while not cdsRT.Eof do
  begin
    s1 := s1 + s + ' id = ' + cdsRTCodRT.AsString;
    s := ' or ';
    cdsRT.Next;
  end;
  cdsRT.Filtered := False;
  if s <> s2 then
    Result := s1 + ' ) '
  else
    Result := '';
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

procedure TfrmCCU.PreviousExecute(Sender: TObject);
begin
  if cdsCCU.Active then
    cdsCCU.Prior;
end;

procedure TfrmCCU.ProcessarProjetos;
begin
  cdsCCU.First;
  while not cdsCCU.Eof do
  begin
    if trim(cdsCCUCodRT.AsString) <> '' then
      if cdsResRT.Locate('id', trim(cdsCCUCodRT.AsString),
        [loCaseInsensitive]) then
      begin
        cdsCCU.Edit;
        cdsCCUCodCCUCorreto.AsString := cdsResRTCodAtividade.AsString;
        cdsCCUInconsistente.AsBoolean := trim(cdsResRTCodAtividade.AsString) <>
          trim(cdsCCUCodCCU.AsString);
        if cdsCCUInconsistente.AsBoolean then
          CheckBox2.Visible := True;

        cdsCCU.Post;
      end;
    cdsCCU.Next;
  end;
end;

procedure TfrmCCU.ExportarTxt(Arquivo: String);
var
  ArquivoTXT: TStringList;
  Linha: String;
begin
  cdsDias.First;
  cdsCCU.First;
  ArquivoTXT := TStringList.Create;
  while not cdsDias.Eof do
  begin
    ArquivoTXT.Add('* ' + cdsDiasDia.AsString);
    while not cdsCCU.Eof do
    begin
      Linha := '';
      Linha := StringReplace(Copy(cdsCCUHoraInicial.AsString, 1, 5), ':', '',
        [rfReplaceAll, rfIgnoreCase]) + '-';
      Linha := Linha + StringReplace(Copy(cdsCCUHoraFinal.AsString, 1, 5), ':',
        '', [rfReplaceAll, rfIgnoreCase]) + ' ';
      Linha := Linha + cdsCCUCodCCU.AsString + ' ';
      if trim(cdsCCUCodRT.AsString) <> '' then
      begin
        Linha := Linha + 'RT ' + cdsCCUCodRT.AsString + ' ';
        Linha := Linha + cdsCCUCodAtividade.AsString + ' ';
        Linha := Linha + 'Solicitante: ' + cdsCCUSolicitante.AsString + ' ';
        Linha := Linha + 'Tela/Procedimento: ' +
          cdsCCUTelaProcedimento.AsString + ' ';
        Linha := Linha + 'Solicitação: ' + cdsCCUSolicitacao.AsString + ' ';
        Linha := Linha + 'Solução: ' + trim(cdsCCUSolucao.AsString);
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
  ShowMessage('Arquivo ''' + Arquivo + ''' exportado com Sucesso ');
end;

procedure TfrmCCU.SalvarTxt(Arquivo: String; Tipo: String);
var
  ArquivoTXT: TStringList;
  Linha: String;
  StringStrem: TStringStream;
begin
  cdsDias.First;
  cdsCCU.First;
  cdsCCU.IndexFieldNames := 'Cod';
  ArquivoTXT := TStringList.Create;
  while not cdsDias.Eof do
  begin
    ArquivoTXT.Add('* ' + cdsDiasDia.AsString);
    while not cdsCCU.Eof do
    begin
      Linha := '';
      Linha := StringReplace(Copy(cdsCCUHoraInicial.AsString, 1, 5), ':', '',
        [rfReplaceAll, rfIgnoreCase]) + '-';
      Linha := Linha + StringReplace(Copy(cdsCCUHoraFinal.AsString, 1, 5), ':',
        '', [rfReplaceAll, rfIgnoreCase]) + ' ';
      Linha := Linha + cdsCCUCodCCU.AsString + ' ';
      if (trim(cdsCCUCodRT.AsString) <> '') and
        (Copy(cdsCCUCodRT.AsString, 1, 3) <> '999') then
      begin
        Linha := Linha + 'RT ' + cdsCCUCodRT.AsString + ' ';
        Linha := Linha + cdsCCUCodAtividade.AsString + ' ';
        Linha := Linha + 'Solicitante: ' + cdsCCUSolicitante.AsString + ' ';
        Linha := Linha + 'Tela/Procedimento: ' +
          cdsCCUTelaProcedimento.AsString + ' ';
        Linha := Linha + 'Solicitação: ' + cdsCCUSolicitacao.AsString + ' ';
        Linha := Linha + 'Solução: ' + trim(cdsCCUSolucao.AsString);
      end
      else if (Copy(cdsCCUCodRT.AsString, 1, 3) = '999') then
      begin
        Linha := Linha + 'RT ' + cdsCCUCodRT.AsString + ' ';
        Linha := Linha + cdsCCUCodAtividade.AsString + ' ';
        Linha := Linha + cdsCCUSolucao.AsString;
      end
      else
        Linha := Linha + cdsCCUSolucao.AsString;
      ArquivoTXT.Add(Linha);
      cdsCCU.Next;
    end;
    cdsDias.Next;
    ArquivoTXT.Add('');
  end;
  if Tipo = 'save' then
  begin
    ArquivoTXT.SaveToFile(Arquivo);
    ShowMessage('Arquivo ''' + Arquivo + ''' salvo com Sucesso ');
  end
  else if Tipo = 'memo' then
  begin
    Memo1.Lines.Clear;
    Memo1.Lines.AddStrings(ArquivoTXT);
    PageControl1.ActivePage := TabSheet6;
  end;

end;

procedure TfrmCCU.SpeedButton1Click(Sender: TObject);
begin
  close;
end;

procedure TfrmCCU.SpeedButton2Click(Sender: TObject);
var
  lParams, Texto: TStringList;
  lResponse: TStringStream;
begin
  lParams := TStringList.Create;
  Texto := TStringList.Create;
  lResponse := TStringStream.Create('');

  try
    // lParams.Add('id='+cdsCCUCodRT.AsString);
    if Logar then
    begin
      lParams.Add('pass=campos83*');
      lParams.Add('user=rodrigo.brito');
      Logar := False;
    end;
    lParams.Add
      ('Query=(  id = 36861 or id = 36489 or id = 35743 or id = 34676 or id = 35883 or id = 35886 )');
    IdHTTP1.Post('http://rt.mps.com.br/Tools/Results.html', lParams, lResponse);

    { Exemplo de uso do response : carregar o conteúdo num RichEdit : }
    lResponse.Position := 0;
    Texto.LoadFromStream(lResponse);
    Texto.SaveToFile('tmp.txt');
    // reResp.Lines.LoadFromStream(lResponse);
    reResp.Lines.LoadFromFile(CurrentyDir + 'tmp.txt');
    reResp.Show;
    reResp.BringToFront;
  finally
    lParams.Free();
    lResponse.Free();
  end;
end;

procedure TfrmCCU.SpeedButton3Click(Sender: TObject);
begin
  WebBrowser1.Navigate('http://intranet');
end;

procedure TfrmCCU.SpeedButton6Click(Sender: TObject);
begin
  FecharCds;
  cdsNatureza.CreateDataSet;
  cdsProjetos.CreateDataSet;
  cdsResRT.CreateDataSet;
  CarregarProjetos;
  CarregarNaturezas;
  CarregarGridRts;
  try
    if edtRt.Text <> '' then
    begin
      if not(cdsResRT.Locate('id', edtRt.Text, [loCaseInsensitive])) then
        BuscarInforRTOnline(edtRt.Text);
      if cdsResRT.Locate('id', edtRt.Text, [loCaseInsensitive]) then
      begin
        edtLinhaDigitavel.Text := cdsResRTCodAtividade.AsString + ' ' + 'RT ' +
          edtRt.Text + ' ' + cdsAtividadeCod.AsString + ' Solicitante: ' +
          BuscaSolicitante(edtRt.Text) + '.' + ' Tela/Procedimento: ' +
          edtTelaProcedimento.Text + '.' + ' Solicitação: ' +
          cdsResRTSubject.AsString + '.' + ' Solução: ' +
          cdsAtividadeDescricao.AsString + '.' + '~' + edtRt.Text;
      end;
    end;
  finally
    if edtLinhaDigitavel.CanFocus then
    begin
      edtLinhaDigitavel.SetFocus;
      edtLinhaDigitavel.SelectAll;
      edtLinhaDigitavel.CopyToClipboard;
    end;
  end;
end;

procedure TfrmCCU.SpeedButton7Click(Sender: TObject);
var
  iniLogin: TIniFile;
begin
  { Execute an open file dialog. }
  iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
  OpenTextFileDialog1.FileName := iniLogin.ReadString('CONFIG', 'local2', '');
  if OpenTextFileDialog1.Execute then
    { First check if the file exists. }
    if FileExists(OpenTextFileDialog1.FileName) then
    begin
      { If it exists, load the data into the memo box. }
      // Memo1.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
      edtAjustar.Text := OpenTextFileDialog1.FileName;

      iniLogin.WriteString('CONFIG', 'local2', OpenTextFileDialog1.FileName);
      mmAjustar.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
    end
    else
      { Otherwise, raise an exception. }
      raise Exception.Create('File does not exist.');
end;

function TfrmCCU.Split(const Str: string; Delimiter: Char; Max: Integer)
  : TStringArray;
var
  Size, i: Integer;
begin
  Size := 0;
  SetLength(Result, 1);
  Result[0] := '';
  for i := 1 to Length(Str) do
  begin
    if Str[i] = Delimiter then
    begin
      Inc(Size);
      if (Max <> 0) and (Size = Max) then
        Break;
      SetLength(Result, Size + 1);
    end
    else
      Result[Size] := Result[Size] + Str[i];
  end;
end;

procedure TfrmCCU.vClick(Sender: TObject);
begin
  reResp.Hide;
end;

procedure TfrmCCU.btnExportarClick(Sender: TObject);
begin
  FormExportaExcel.ShowModal();
end;

procedure TfrmCCU.btnExportarTxtClick(Sender: TObject);
begin
  SalvarTxt('', 'memo');
end;

procedure TfrmCCU.NextExecute(Sender: TObject);
begin
  if cdsCCU.Active then
    cdsCCU.Next;
end;

procedure TfrmCCU.btnAbrirClick(Sender: TObject);
var
  iniLogin: TIniFile;
begin
  { Execute an open file dialog. }
  if OpenTextFileDialog1.Execute then
    { First check if the file exists. }
    if FileExists(OpenTextFileDialog1.FileName) then
    begin
      { If it exists, load the data into the memo box. }
      // Memo1.Lines.LoadFromFile(OpenTextFileDialog1.FileName);
      Edit1.Text := OpenTextFileDialog1.FileName;
      iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
      iniLogin.WriteString('CONFIG', 'local', OpenTextFileDialog1.FileName);
      btnCarregar.Enabled := True;
      btnSalvarArquivo.Enabled := True;
      btnLimpar.Enabled := True;
      btnExportar.Enabled := True;
      btnCarregarRTs.Enabled := True;
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
      if MessageDlg('Arquivo já existe, deseja sobrescrever?', mtConfirmation,
        [mbYes, mbNo], 0) = mrYes then
        SalvarTxt(SaveTextFileDialog1.FileName, 'save')
      else
        MessageDlg('Operação Cancelada', mtInformation, [mbok], 0);
    end
    else
      SalvarTxt(SaveTextFileDialog1.FileName, 'save')
end;

procedure TfrmCCU.FecharCds;
begin
  if cdsCCU.Active then
    cdsCCU.close;
  if cdsTotal.Active then
    cdsTotal.close;
  if cdsDias.Active then
    cdsDias.close;
  if cdsRT.Active then
    cdsRT.close;
  if cdsResRT.Active then
    cdsResRT.close;
  if cdsNatureza.Active then
    cdsNatureza.close;
  if cdsProjetos.Active then
    cdsProjetos.close;
end;

procedure TfrmCCU.btnAjustarClick(Sender: TObject);
var
  mmTxt, mm: TStringList;
  aux, tmp, line: String;
  i: Integer;
begin
  mm := TStringList.Create();
  mmTxt := TStringList.Create();
  mmTxt.LoadFromFile(edtAjustar.Text);
  for i := mmTxt.Count - 1 downto 0 do
  begin
    tmp := trim(mmTxt[i]);
    if Length(tmp) > 0 then
    begin
      if Length(tmp) = 5 then // Hora solta, fim do periodo
      begin
        aux := Copy(tmp, 1, 2) + Copy(tmp, 4, 2);
      end
      else if Length(tmp) = 7 then // Hora solta, fim do periodo
      begin
        mm.Append(tmp);
        // mmTeste.Lines.Append(tmp);
      end
      else
      begin
        line := Copy(tmp, 1, 2) + Copy(tmp, 4, 2) + '-' + aux + ' ' +
          Copy(tmp, 6, 10) + ' ' + Copy(tmp, 16, Length(tmp));
        mm.Append(line);
        aux := Copy(tmp, 1, 2) + Copy(tmp, 4, 2);
        // mmTeste.Lines.Append(line);
      end;
    end;
  end;
  mmAjustar.Lines.Clear;

  for i := mm.Count - 1 downto 0 do
  begin
    if Copy(mm[i], 1, 1) = '*' then
      mmAjustar.Lines.Append('');
    mmAjustar.Lines.Append(mm[i]);
  end;

end;

procedure TfrmCCU.btnCarregarClick(Sender: TObject);
begin
  if trim(OpenTextFileDialog1.FileName) <> '' then
  begin
    FecharCds;
    btnCarregar.Enabled := False;
    btnSalvarArquivo.Enabled := False;
    btnLimpar.Enabled := False;
    btnExportar.Enabled := False;
    btnCarregarRTs.Enabled := False;
    btnCompletar.Enabled := False;
    btnExportarTxt.Enabled := False;
    dtsDias.OnDataChange := nil;
    CarregarGrid;
  end;
end;

procedure TfrmCCU.btnLimparClick(Sender: TObject);
begin
  FecharCds;
  // btnCarregar.Enabled := False;
  btnSalvarArquivo.Enabled := False;
  btnLimpar.Enabled := False;
  btnExportar.Enabled := False;
  btnCarregarRTs.Enabled := False;
  btnCompletar.Enabled := False;
  btnExportarTxt.Enabled := False;
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

procedure TfrmCCU.btnCarregarRTsClick(Sender: TObject);
var
  lParams: TStringList;
  lResponse, ClonelResponse: TStringStream;
  iniLogin: TIniFile;
  pass, user, url, query, Linha: String;
  botao: Integer;
  Arquivo, temp: TextFile;
begin

  if (cdsRT.Active) and (cdsRT.RecordCount > 0) then
  begin

    lParams := TStringList.Create;
    iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
    botao := ShowMsg('Carregar informações online?', mtConfirmation,
      [mbok, mbYes, mbNo], 0);
    if (botao = mrYes) or (botao = mrOk) then
    // MessageDlg('Carregar informações online?',mtConfirmation,[mbYes,mbNo],0,mbNo) = mrYes then
    begin
      query := MontarQuery(botao = mrYes);
      Cursor := crSQLWait;
      Screen.Cursor := crSQLWait;
      pass := iniLogin.ReadString('CONFIG', 'pass', '');
      user := iniLogin.ReadString('CONFIG', 'user', '');
      url := iniLogin.ReadString('CONFIG', 'url', '');
      Token := iniLogin.ReadString('CONFIG', 'Token', '');
      lResponse := TStringStream.Create('');

      try
        // if Logar then
        // begin
        // lParams.Add('pass='+pass);
        // lParams.Add('user='+user);
        // Logar := False;
        // end;
        lParams.Add('pass=' + pass);
        lParams.Add('user=' + user);
        lParams.Add('Rows=0');
        lParams.Add
          ('Format=''__id__'',''__Subject__'',''__CustomField.{Natureza}__'',''__CustomField.{Solicitante}__'',''__CustomField.{Tela/Procedimento}__''');
        lParams.Add('Query=  ' + query);

        IdHTTP1.Post(url + 'CSRF_Token=' + Token, lParams, lResponse);

        lResponse.Position := 0;
        if botao = mrOk then
          lResponse.SaveToFile(CurrentyDir + '\ccu.txt')
        else
        begin
          lResponse.SaveToFile(CurrentyDir + '\tempccu.txt');
          AssignFile(Arquivo, CurrentyDir + '\ccu.txt');
          AssignFile(temp, CurrentyDir + '\tempccu.txt');
          Reset(temp); // Abre arquivo somente leitura
          Append(Arquivo);
          Readln(temp, Linha);
          While not Eof(temp) do
          begin
            Readln(temp, Linha);
            // le do arquivo e desce uma linha. O conteúdo lido é transferido para a variável linha
            Writeln(Arquivo, Linha);
          End;
          CloseFile(temp);
          CloseFile(Arquivo);
          DeleteFile(CurrentyDir + '\tempccu.txt');
        end
      finally
        lParams.Free();
        lResponse.Free();

      end;
    end;
    CarregarGridRts;
    Cursor := crDefault;
    Screen.Cursor := crDefault;
  end;
end;

procedure TfrmCCU.btnCompletarClick(Sender: TObject);
var
  bk: TBookmark;
begin
  try
    bk := cdsCCU.GetBookmark;
    cdsCCU.DisableControls;
    cdsCCU.Filtered := False;
    cdsCCU.First;
    while not cdsCCU.Eof do
    begin
      if cdsCCUCodCCU.AsString = '' then
      begin
        if cdsCCUCodRT.AsString <> '' then
          if cdsResRT.Locate('id', cdsCCUCodRT.AsString,
            [loCaseInsensitive]) then
          begin
            cdsCCU.Edit;
            cdsCCUCodCCU.AsString := cdsResRTCodAtividade.AsString;
            cdsCCUCodAtividade.AsString := '*IN*';
            cdsCCUSolicitante.AsString :=
              BuscaSolicitante(cdsCCUCodRT.AsString);
            cdsCCUSolicitacao.AsString := cdsResRTSubject.AsString;
            cdsCCU.Post;
          end;
      end;
      cdsCCU.Next;
    end;
  finally
    cdsCCU.Filtered := True;
    cdsCCU.GotoBookmark(bk);
    cdsCCU.EnableControls;
    cdsCCU.FreeBookmark(bk);
  end;

end;

procedure TfrmCCU.BuscarInforRTOnline(RT: String);
var
  lParams: TStringList;
  lResponse, ClonelResponse: TStringStream;
  iniLogin: TIniFile;
  pass, user, url, query, Linha: String;
  botao: Integer;
  Arquivo, temp: TextFile;
begin
  if not(cdsResRT.Active) then
  begin
    CarregarGridRts
  end;
  if (RT <> '') then
  begin
    lParams := TStringList.Create;
    iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
    begin
      query := ' id = ' + RT;
      Cursor := crSQLWait;
      Screen.Cursor := crSQLWait;
      pass := iniLogin.ReadString('CONFIG', 'pass', '');
      user := iniLogin.ReadString('CONFIG', 'user', '');
      url := iniLogin.ReadString('CONFIG', 'url', '');
      Token := iniLogin.ReadString('CONFIG', 'Token', '');
      lResponse := TStringStream.Create('');

      try
        // if Logar then
        // begin
        lParams.Add('pass=' + pass);
        lParams.Add('user=' + user);
        // Logar := False;
        // end;
        lParams.Add('Rows=0');
        lParams.Add
          ('Format=''__id__'',''__Subject__'',Owner,''__Requestors__'',''__OwnerName__'',''__CustomField.{Solicitante}__'',''__CreatedBy__'',''__CustomField.{Tela/Procedimento}__'',''__CustomField.{Natureza}__'',''__CustomField.{Situação}__'',''__CustomField.{Versão}__''');
        lParams.Add('Query=  ' + query);
        IdHTTP1.Post(url + 'CSRF_Token=' + Token, lParams, lResponse);
      finally
        lResponse.Position := 0;
        if botao = mrOk then
          lResponse.SaveToFile(CurrentyDir + '\ccu.txt')
        else
        begin
          lResponse.SaveToFile(CurrentyDir + '\tempccu.txt');
          AssignFile(Arquivo, CurrentyDir + '\ccu.txt');
          AssignFile(temp, CurrentyDir + '\tempccu.txt');
          Reset(temp); // Abre arquivo somente leitura
          Append(Arquivo);
          Readln(temp, Linha);
          While not Eof(temp) do
          begin
            Readln(temp, Linha);
            // le do arquivo e desce uma linha. O conteúdo lido é transferido para a variável linha
            Writeln(Arquivo, Linha);
          End;
          CloseFile(temp);
          CloseFile(Arquivo);
          DeleteFile(CurrentyDir + '\tempccu.txt');
        end;
        lParams.Free();
        lResponse.Free();
      end;
    end;
    CarregarGridRts;
    Cursor := crDefault;
    Screen.Cursor := crDefault;
  end;
end;

function TfrmCCU.BuscaSolicitante(CodRT: String): String;
var
  retorno: String;
begin
  if cdsResRTCFAbertura.AsString <> '' then
    retorno := cdsResRTCFAbertura.AsString
  else if cdsResRTRequestors.AsString <> '' then
    retorno := cdsResRTRequestors.AsString
  else
    retorno := '';
  Result := retorno;
end;

procedure TfrmCCU.Button1Click(Sender: TObject);
var
  j: Integer;
  DialogForm: TForm;
  botao: Integer;
begin
  Application.NormalizeTopMosts;
  // { No Condition Selected! }
  // DialogForm := CreateMessageDialog('No Condition definition selected!', mtWarning, [mbok]);
  // { Attention }
  // DialogForm.Caption := 'Attention';
  // DialogForm.ShowModal;
  // Application.RestoreTopMosts;
  // { Cannot Delete the 'always' condition }
  // DialogForm := CreateMessageDialog('Cannot delete the ''always'' condition.', mtWarning, [mbok]);
  // { Always }
  // DialogForm.Caption := 'Always';
  // DialogForm.ShowModal;
  // Application.RestoreTopMosts;
  // { Delete the condition? }
  // DialogForm := CreateMessageDialog('Delete the condition?', mtInformation,
  // [mbYes, mbNo, mbCancel]);
  // { confirmation }
  // DialogForm.Caption := 'Confirmation';
  // for j := 0 to DialogForm.controlCount - 1 do
  // begin
  // if DialogForm.Controls[j] is TButton then
  // with TButton(DialogForm.Controls[j]) do
  // begin
  // if Name = 'btnYes' then
  // Caption := 'Online Total';
  // if Name = 'btnNo' then
  // Caption := 'Online Parcial';
  // if Name = 'btnCancel' then
  // Caption := 'Não Carregar Online';
  // end;
  // end;
  // botao := DialogForm.ShowModal;
  // if botao = mrYes then
  // ShowMessage('Yes')
  // else
  // if botao = mrNo then
  // ShowMessage('No')
  // else
  // if botao = mrCancel then
  // ShowMessage('Calcel');
end;

function TfrmCCU.ShowMsg(const Msg: String;
  DlgType: TMsgDlgType = mtInformation; Buttons: TMsgDlgButtons = [mbok];
  HelpCtx: Longint = 0): Word;
var
  Btn: TButton;
  // LanguageID: TLanguage;
begin
  with CreateMessageDialog(Msg, DlgType, Buttons, mbNo) do
    try
      Btn := TButton(FindComponent('CANCEL'));
      if Btn <> nil then
        Btn.Caption := 'Não';

      Btn := TButton(FindComponent('OK'));
      if Btn <> nil then
        Btn.Caption := 'Total';

      Btn := TButton(FindComponent('YES'));
      if Btn <> nil then
        Btn.Caption := 'Parcial';

      Btn := TButton(FindComponent('NO'));
      if Btn <> nil then
        Btn.Caption := 'Não';

      Caption := Application.Title;
      Position := poMainFormCenter;
      Result := ShowModal;
    finally
      Free;
    end;
end; // ShowMsg

end.
