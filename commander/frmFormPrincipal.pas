unit frmFormPrincipal;

interface

uses
  Windows, SysUtils, Classes, Controls, Forms, Buttons, ComCtrls, StdCtrls,
  ShellAPI, XPMan, IniFiles, DBCtrls, ExtCtrls, DB, ADODB, StrUtils, IdHTTP,
   Menus, AppEvnts, JvMenus, JvComponentBase, JvBalloonHint,
  ImgList, IdIOHandler, IdIOHandlerSocket, IdIOHandlerStack, IdSSL,IdSSLOpenSSL,
  IdBaseComponent, IdComponent, IdTCPConnection, IdTCPClient;

type
  TStringArray = array of string;

  TFormPrincipal = class(TForm)
    trvArvores: TTreeView;
    btnExecutar: TSpeedButton;
    trvOpcao: TTreeView;
    trvTipoVersao: TTreeView;
    trvModulos: TTreeView;
    trvApp: TTreeView;
    SpeedButton2: TSpeedButton;
    XPManifest1: TXPManifest;
    stat1: TStatusBar;
    pnlGeraCCU: TPanel;
    Label2: TLabel;
    Label16: TLabel;
    Label17: TLabel;
    edtRt: TEdit;
    edtTelaProcedimento: TEdit;
    DBLookupListBox1: TDBLookupListBox;
    cdsDias: TADODataSet;
    cdsDiasCod: TIntegerField;
    cdsDiasDia: TStringField;
    cdsDiasHoras: TTimeField;
    cdsDiasDiferenca: TTimeField;
    cdsDiasDiferenteUltimaHora: TIntegerField;
    cdsDiasErros: TIntegerField;
    cdsCCU: TADODataSet;
    cdsCCUCod: TIntegerField;
    cdsCCUCodCCU: TStringField;
    cdsCCUCodRT: TStringField;
    cdsCCUCodAtividade: TStringField;
    cdsCCUSolicitante: TStringField;
    cdsCCUTelaProcedimento: TStringField;
    cdsCCUSolicitacao: TStringField;
    cdsCCUSolucao: TStringField;
    cdsCCUCodDia: TIntegerField;
    cdsCCUDia: TStringField;
    cdsCCUHoraInicial: TTimeField;
    cdsCCUHoraFinal: TTimeField;
    cdsCCUTotal: TTimeField;
    cdsCCUDiferenteUltimaHora: TStringField;
    cdsCCUCodCCUCorreto: TStringField;
    cdsCCUMarcado: TStringField;
    cdsCCUInconsistente: TBooleanField;
    dtsCCU: TDataSource;
    dtsDias: TDataSource;
    cdsTotal: TADODataSet;
    cdsTotalTotalCumprir: TStringField;
    cdsTotalTotal: TStringField;
    cdsTotalDiferenca: TStringField;
    cdsTotalHoraPadrao: TTimeField;
    dtsTotal: TDataSource;
    dtsAtividade: TDataSource;
    cdsAtividade: TADODataSet;
    cdsAtividadeCod: TStringField;
    cdsAtividadeDescricao: TStringField;
    cdsRT: TADODataSet;
    cdsRTCod: TIntegerField;
    cdsRTCodRT: TStringField;
    cdsRTTotal: TTimeField;
    cdsRTOnline: TBooleanField;
    cdsResRT: TADODataSet;
    cdsResRTid: TIntegerField;
    cdsResRTSubject: TStringField;
    cdsResRTCFAbertura: TStringField;
    cdsResRTCFNatureza: TStringField;
    cdsResRTCFModulo: TStringField;
    cdsResRTCFProjeto: TStringField;
    cdsResRTOwner: TStringField;
    cdsResRTRequestors: TStringField;
    cdsResRTCodAtividade: TStringField;
    cdsProjetos: TADODataSet;
    cdsProjetosid: TStringField;
    cdsProjetosdescricao: TStringField;
    cdsNatureza: TADODataSet;
    cdsNaturezaid: TStringField;
    cdsNaturezadescricao: TStringField;
    dtsNatureza: TDataSource;
    dtsProjetos: TDataSource;
    dtsResRT: TDataSource;
    dtsRT: TDataSource;
    IdHTTP1: TIdHTTP;
    IdSSLIOHandlerSocketOpenSSL1: TIdSSLIOHandlerSocketOpenSSL;
    Label15: TLabel;
    edtLinhaDigitavel: TEdit;
    ilImg: TImageList;
//    aplctnvnts1: TApplicationEvents;
//    tryicon: TTrayIcon;
    cdsAtividadeDescricaoCompleta: TStringField;
    procedure btnExecutarClick(Sender: TObject);
    procedure trvOpcaoClick(Sender: TObject);
    procedure trvTipoVersaoClick(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure SpeedButton2Click(Sender: TObject);
    procedure trvOpcaoDblClick(Sender: TObject);
    procedure trvModulosClick(Sender: TObject);
    procedure trvAppClick(Sender: TObject);
    procedure trvArvoresClick(Sender: TObject);
    procedure trvArvoresDblClick(Sender: TObject);
    procedure aplctnvnts1Minimize(Sender: TObject);
    procedure tryIconDblClick(Sender: TObject; Button: TMouseButton; Shift: TShiftState; X, Y: Integer);
    procedure tryIconContextPopup(Sender: TObject; MousePos: TPoint; var Handled: Boolean);
    procedure edtLinhaDigitavelClick(Sender: TObject);
  private
    { Private declarations }
    PATH, npp: PWideChar;
    idxAPP: integer;
    CurrentyDir, ConfigDir, IniFileName: string;
//    IgnoreDataChange: Boolean;
    Logar: Boolean;
    Token: string;
//    function ShowMsg(const Msg: String;
//                  DlgType: TMsgDlgType = mtInformation; Buttons: TMsgDlgButtons = [mbok];
//    HelpCtx: Longint = 0): Word;
//    function BuscaSolicitante(CodRT: String): String;

    procedure HabilitarExecutar;
    procedure FecharCds;
    procedure CarregarNaturezas;
    procedure CarregarProjetos;
    procedure CarregarGridRts;
    function Split(const Str: string; Delimiter: Char; Max: integer = 0): TStringArray;
    procedure BuscarInforRTOnline(RT: string);
    function BuscaSolicitante(CodRT: string): string;
    procedure ExecAPP(Sender: TObject);
  public
    { Public declarations }
  end;

var
  FormPrincipal: TFormPrincipal;

implementation


{$R *.dfm}

procedure TFormPrincipal.FormCreate(Sender: TObject);
var
  ArquivoINI: TIniFile;
  iniLogin: TIniFile;
  Memo1: TMemo;
  i,j: integer;
  Lista: TStrings;
  item: array[0..50] of TMenuItem;
  procedure SubDiretorios(Diretorio: string; Lista: TStrings);
  var
    SearchRec: TSearchRec;
  begin
      i:=0;
      if FindFirst(Diretorio + '*.*', faDirectory, SearchRec) = 0 then
      repeat
        if (SearchRec.Attr and faDirectory = faDirectory) and
          (SearchRec.Name <> '.') and (SearchRec.Name <> '..') then
        begin
          Lista.Add(SearchRec.Name);
//          SubDiretorios(Diretorio + SearchRec.Name + '\', Lista);
        end
      until FindNext(SearchRec) <> 0;
    FindClose(SearchRec);
  end;
begin
  IniFileName := GetCurrentDir + '\config.ini';
  FormPrincipal.Width := 450;
  Constraints.MinHeight := Height;
  Constraints.MinWidth := Width;
  Memo1 := TMemo.Create(Self);
  Memo1.Parent := self;
  CurrentyDir := GetCurrentDir;
  iniLogin := TIniFile.Create(CurrentyDir + '\config.ini');
  ConfigDir := iniLogin.ReadString('CONFIG', 'txt', '');
  if FileExists(IniFileName) then
  begin
    ArquivoINI := TIniFile.Create(IniFileName);
    stat1.Panels[0].Text := 'Carregando arquivo ' + IniFileName;
    PATH := pwidechar(ArquivoINI.readstring('CONFIG', 'PATH', ''));  //'C:\Projetos\Editora\';
    npp := pwidechar(ArquivoINI.readstring('CONFIG', 'NPP', '')); // 'c:\Program Files (x86)\Notepad++\notepad++.exe';
    ArquivoINI.ReadSection('BRANCHES', Memo1.Lines);
    trvArvores.Items.Clear;
    stat1.Panels[0].Text := 'Carregando branches ';
    Lista := TStringList.Create;
    SubDiretorios('C:\Projetos\Editora\branches\',Lista);
    for i := Lista.Count -1 downto 0 do
    begin
      trvArvores.items.Add(nil, lista[i]);
    end;
    for j := 0 to Memo1.Lines.Count - 1 do
    begin
      trvArvores.items.Add(nil, Memo1.Lines[j]);
    end;

    IdxAPP := Lista.Count+Memo1.Lines.Count;

    trvArvores.items.Add(nil, '               ');
    trvArvores.Items.Item[IdxAPP].Enabled := False;

    Memo1.Lines.Clear;
    stat1.Panels[0].Text := 'Carregando aplicativos ';
    ArquivoINI.ReadSection('APP', Memo1.Lines);
    for i := 0 to Memo1.Lines.Count - 1 do
    begin
      trvArvores.items.Add(nil, Memo1.Lines[i]);
      item[i] := TMenuItem.Create(PopupMenu);
      item[i].Caption := Memo1.Lines[i];
      item[i].Name := 'teste' + IntToStr(i);
      item[i].OnClick := ExecAPP;
      item[i].Tag := i;
      item[i].AutoHotkeys := maManual;
//      pmMnu.Items.Add(item[i]);


//
//      PopupMenu.Items[0].Items['1'].Add(item[I]);

//    MyItem[i] := TMenuItem.Create(Self);
//    MyItem[i].Name:='Teste' + IntToStr(i);
//    MyItem[i].Caption := '&Teste'  + IntToStr(i);
////    MyItem[i].OnClick := MenuClick;
//    MyMainMenu.Items.Add(MyItem[i]);

    end;
//          tryIcon.PopupMenu := pmMnu;
//    tryIcon.PopupMenu.PopupComponent := MyMainMenu;
    Memo1.Lines.Clear;
    stat1.Panels[0].Text := 'Carregando WANTs ';
    ArquivoINI.ReadSection('WANT', Memo1.Lines);
    for i := 0 to Memo1.Lines.Count - 1 do
    begin
      trvApp.items.Add(nil, Memo1.Lines[i]);
    end;
    Memo1.free;
    ArquivoINI.Free;
    stat1.Panels[0].Text := '';

  end;

  Logar := True;
  if not cdsAtividade.Active then
  begin
    cdsatividade.CreateDataSet;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*TI*';
    cdsAtividadeDescricao.AsString := 'Teste Inicial';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*PR*';
    cdsAtividadeDescricao.AsString := 'Programa��o';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*IN*';
    cdsAtividadeDescricao.AsString := 'Indefinido';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*SU*';
    cdsAtividadeDescricao.AsString := 'Suporte';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*LI*';
    cdsAtividadeDescricao.AsString := 'Libera��o de Vers�o';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*EF*';
    cdsAtividadeDescricao.AsString := 'Especifica��o Funcional';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*ET*';
    cdsAtividadeDescricao.AsString := 'Especifica��o T�cnica';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*GP*';
    cdsAtividadeDescricao.AsString := 'Gerenciamento de Projeto';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*TF*';
    cdsAtividadeDescricao.AsString := 'Teste Final';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*RQ*';
    cdsAtividadeDescricao.AsString := 'Levantamento de Requisitos';
    cdsAtividade.Post;

    cdsatividade.Insert;
    cdsAtividadeCod.AsString := '*OU*';
    cdsAtividadeDescricao.AsString := 'Outros';
    cdsAtividade.Post;

    cdsatividade.First;
    while not cdsatividade.Eof do
    begin
      cdsatividade.Edit;
      cdsAtividadeDescricaoCompleta.AsString := cdsAtividadeCod.AsString + ' - ' +cdsAtividadeDescricao.AsString ;
      cdsatividade.Next;
    end;
    cdsatividade.IndexFieldNames := 'Cod';
  end;
end;

procedure TFormPrincipal.HabilitarExecutar;
begin
  btnExecutar.enabled := (trvArvores.Selected.Index > idxAPP) or ((trvOpcao.Selected.Index >= 0) and (trvOpcao.Selected.Enabled)) and ((trvTipoVersao.Visible) and (trvTipoVersao.Selected.Index >= 0) or not (trvTipoVersao.Visible)) and ((trvApp.Visible) and (trvApp.Selected.Index >= 0) or not (trvApp.Visible)) and ((trvModulos.Visible) and (trvModulos.Selected.Index >= 0) or not (trvModulos.Visible));
end;

function TFormPrincipal.BuscaSolicitante(CodRT: string): string;
var
  retorno: string;
begin
  if cdsResRTCFAbertura.AsString <> '' then
    retorno := cdsResRTCFAbertura.AsString
  else if cdsResRTRequestors.AsString <> '' then
    retorno := cdsResRTRequestors.AsString
  else
    retorno := '';
  result := retorno;
end;

procedure TFormPrincipal.FecharCds;
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

procedure TFormPrincipal.CarregarNaturezas;
var
  fileData: TStringList;
  saveLine: string;
  i: Integer;
begin
  fileData := TStringList.Create;        // Create the TSTringList object
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

procedure TFormPrincipal.CarregarProjetos;
var
  fileData: TStringList;
  saveLine: string;
  i: Integer;
begin
  fileData := TStringList.Create;        // Create the TSTringList object
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

procedure TFormPrincipal.edtLinhaDigitavelClick(Sender: TObject);
begin
  edtLinhaDigitavel.SelectAll;
end;

function TFormPrincipal.Split(const Str: string; Delimiter: Char; Max: integer): TStringArray;
var
  Size, i: integer;
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

procedure TFormPrincipal.CarregarGridRts;
var
  fileData, s1: TStringList;
  tmp: string;
//   lines, i, j : Integer;
  i: Integer;
  CharDelimiter: char;
  Ret: TStringArray;
begin
  if FileExists(CurrentyDir + '\ccu.txt') then
  begin
    s1 := TStringList.Create;
    fileData := TStringList.Create;        // Create the TSTringList object
    fileData.StrictDelimiter := true;
    if cdsResRT.Active then
      cdsResRT.close;
    cdsResRT.CreateDataSet;
    cdsResRT.Open;
    CharDelimiter := #9;
    fileData.Delimiter := CharDelimiter; //TAB
    s1.LoadFromFile(CurrentyDir + '\ccu.txt', TEncoding.UTF8);     // Load from Testing.txt file
    for i := 1 to s1.Count - 1 do
    begin
      ret := Split(s1[i], CharDelimiter);
      cdsResRT.Insert;
      cdsResRTid.AsString := ret[0];
      cdsResRTSubject.AsString := ret[1];
      cdsResRTOwner.AsString := ret[2];
       //cdsResRTCFAbertura.AsString :=  ret[18];
      cdsResRTRequestors.AsString := ifthen(trim(Ret[5]) <> '', Ret[5], Ret[6]); //copy(Ret[3],0,(Pos('@',Ret[3])-1));
      // cdsResRTCFProjeto.AsString :=  ret[20];
       //cdsResRTCFModulo.AsString :=  ret[23];
      cdsResRTCFNatureza.AsString := ret[8];
      if Pos('(-PRJ-)', cdsResRTSubject.AsString) > 0 then
      begin
        tmp := copy(cdsResRTSubject.AsString, Pos('(-PRJ-)', cdsResRTSubject.AsString), Pos(' - ', cdsResRTSubject.AsString));
        if trim(tmp) = '' then
          tmp := copy(cdsResRTSubject.AsString, Pos('(-PRJ-)', cdsResRTSubject.AsString), Pos(': ', cdsResRTSubject.AsString)-1);
        if cdsProjetos.Locate('descricao', tmp, [loCaseInsensitive]) then
          cdsResRTCodAtividade.AsString := cdsProjetosid.AsString;
      end
      else
      begin
        if cdsNatureza.Locate('descricao', ret[8], [loCaseInsensitive, loPartialKey]) then
          cdsResRTCodAtividade.AsString := cdsNaturezaid.AsString;
      end;

      cdsResRT.Post;
    end;
  end;

end;

procedure TFormPrincipal.BuscarInforRTOnline(RT: string);
var
  lParams: TStringList;
  lResponse: TStringStream;
  iniLogin: TIniFile;
  pass, user, url, query, linha: string;
  arquivo, temp: TextFile;
begin
  if not (cdsResRT.Active) then
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
      token := iniLogin.ReadString('CONFIG', 'Token', '');
      lResponse := TStringStream.Create('');

      try
//        if Logar then
//        begin
        lParams.Add('pass=' + pass);
        lParams.Add('user=' + user);
//          Logar := False;
//        end;
        lParams.Add('Rows=0');
        lParams.Add('Format=''__id__'',''__Subject__'',Owner,''__Requestors__'',''__OwnerName__'',''__CustomField.{Solicitante}__'',''__CreatedBy__'',''__CustomField.{Tela/Procedimento}__'',''__CustomField.{Natureza}__'',''__CustomField.{Situa��o}__'',''__CustomField.{Vers�o}__''');
        lParams.Add('Query=  ' + query);
        idHttp1.Post(url + 'CSRF_Token=' + token, lParams, lResponse);
      finally
        lResponse.Position := 0;
        Cursor := crDefault;
        Screen.Cursor := crDefault;
        begin
          lResponse.SaveToFile(CurrentyDir + '\tempccu.txt');
          AssignFile(arquivo, CurrentyDir + '\ccu.txt');
          AssignFile(temp, CurrentyDir + '\tempccu.txt');
          Reset(temp);   //Abre arquivo somente leitura
          Append(arquivo);
          Readln(temp, linha);
          while not eof(temp) do
          begin
            Readln(temp, linha); //le do arquivo e desce uma linha. O conte�do lido � transferido para a vari�vel linha
            Writeln(arquivo, linha);
          end;
          CloseFile(temp);
          CloseFile(arquivo);
          DeleteFile(CurrentyDir + '\tempccu.txt');
        end;
        lParams.Free();
        lResponse.Free();
      end;
    end;
    CarregarGridRTs;

  end;
end;

procedure TFormPrincipal.ExecAPP(Sender: TObject);
var
  Command: PWideChar;
  iniLogin: TIniFile;
  APP: PWideChar;
begin
  iniLogin := TIniFile.Create(IniFileName);
  PATH := pwidechar(iniLogin.readstring('CONFIG', 'PATH', ''));  //'C:\Projetos\Editora\';
  APP := PWideChar(iniLogin.ReadString('APP', ReplaceStr(TMenuItem(Sender).Caption, '&', ''), ''));
  Command := PWideChar(' /k @echo off && call ' + APP);
  Command := StrCat(Command, PWideChar(' && exit'));
  if APP = 'C:\Windows\System32\cmd.exe' then
    ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_SHOW)
  else
  begin
    ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_HIDE);
    Command := PWideChar(' /k @echo off && taskkill /f /im cmd.exe ');
    ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_HIDE);
  end;
end;

procedure TFormPrincipal.aplctnvnts1Minimize(Sender: TObject);
begin
//  Self.Hide();
//  Self.WindowState := wsMinimized;
//  tryIcon.Active := True;
//  tryIcon.Animated := True;
//  tryIcon.AcceptBalloons := True;
//  tryIcon.BalloonHint('Dicas','Estou aqui',btInfo);
end;

procedure TFormPrincipal.btnExecutarClick(Sender: TObject);
var
  Command: PWideChar;
  i: integer;
  iniLogin: TIniFile;
  APP: PWideChar;
  Arq, ArqBU, FileLocate, branches: string;
begin
  iniLogin := TIniFile.Create(IniFileName);
  PATH := pwidechar(iniLogin.readstring('CONFIG', 'PATH', ''));  //'C:\Projetos\Editora\';
  if uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('Gera CCU')) then
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
        if not (cdsResRT.Locate('id', edtRt.Text, [loCaseInsensitive])) then
          BuscarInforRTOnline(edtRt.Text);
        if cdsResRT.Locate('id', edtRt.Text, [loCaseInsensitive]) then
        begin
          edtLinhaDigitavel.text := cdsResRTCodAtividade.AsString + ' ' + 'RT ' + edtRt.Text + ' ' + cdsAtividadeCod.AsString + ' Solicitante: ' + BuscaSolicitante(edtRt.Text) + '.' + ' Tela/Procedimento: ' + edtTelaProcedimento.Text + '.' + ' Solicita��o: ' + cdsResRTSubject.AsString + '.' + ' Solu��o: ' + cdsAtividadeDescricao.AsString + '.' + '~' + edtRt.Text;
        end;
      end;
    finally
      if edtLinhaDigitavel.CanFocus then
      begin
        edtLinhaDigitavel.setFocus;
        edtLinhaDigitavel.SelectAll;
        edtLinhaDigitavel.CopyToClipboard;
      end;
    end;
  end
  else if trvArvores.Selected.Index > idxAPP then
  begin
    APP := PWideChar(iniLogin.ReadString('APP', trvArvores.Selected.Text, ''));
    Command := PWideChar(' /k @echo off && call ' + APP);
    Command := StrCat(Command, PWideChar(' && exit'));
    if APP = 'C:\Windows\System32\cmd.exe' then
      ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_SHOW)
    else
      ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_HIDE);
  end
  else
  begin
    begin
      if (uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('trunk'))) then
        branches := ''
      else
        branches := 'branches';

      if (uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('trunk'))) or (uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('documentos'))) then
        Command := PWideChar(' /k CD ' + PATH + PWideChar(trvArvores.Selected.Text) + '\ && c:')
      else
        Command := PWideChar(' /k CD ' + PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\ && c:');
      if trvOpcao.Selected.Index = 0 then
      begin
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\Versao\'));

        if trvTipoVersao.Selected.Text = 'Teste' then
          Command := StrCat(Command, PWideChar(' && GeraVersaoTeste'))
        else if trvTipoVersao.Selected.Text = 'Completa' then
          Command := StrCat(Command, PWideChar(' && GeraVersao'))
        else if trvTipoVersao.Selected.Text = 'Want' then
        begin
          Command := StrCat(Command, PWideChar(' && want '));
          Command := StrCat(Command, pwidechar((trvApp.Selected.Text)));
        end;
      end
      else if trvOpcao.Selected.Index = 1 then
      begin
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Instalador\'));
        if trvModulos.Items.Item[9].Selected then
        begin

          for i := 0 to trvModulos.Items.Count - 2 do
          begin
            filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + trvModulos.Items.Item[i].Text + '_Instalar_Servidor.wsf';
            if FileExists(FileLocate) then
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_Instalar_Servidor.wsf'))
            else
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_InstalarServidor.wsf'));
          end;
        end
        else
        begin
          filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + (trvModulos.Selected.Text) + '_Instalar_Servidor.wsf';
          if FileExists(FileLocate) then
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_Instalar_Servidor.wsf'))
          else
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_InstalarServidor.wsf'));
        end;
        ;
      end
      else if trvOpcao.Selected.Index = 2 then
      begin
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Instalador\'));
        if trvModulos.Items.Item[9].Selected then
        begin

          for i := 0 to trvModulos.Items.Count - 2 do
          begin
            filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + trvModulos.Items.Item[i].Text + '_Remover_Servidor.wsf';
            if FileExists(FileLocate) then
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_Remover_Servidor.wsf'))
            else
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_RemoverServidor.wsf'));
          end;
        end
        else
        begin
          filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + (trvModulos.Selected.Text) + '_Remover_Servidor.wsf';
          if FileExists(FileLocate) then
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_Remover_Servidor.wsf'))
          else
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_RemoverServidor.wsf'));
        end;
      end
      else if trvOpcao.Selected.Index = 3 then
      begin
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Instalador\'));
        if trvModulos.Items.Item[9].Selected then
        begin

          for i := 0 to trvModulos.Items.Count - 2 do
          begin
            filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + trvModulos.Items.Item[i].Text + '_Remover_Servidor.wsf';
            if FileExists(FileLocate) then
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_Remover_Servidor.wsf'))
            else
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_RemoverServidor.wsf'));
          end;
        end
        else
        begin
          filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + (trvModulos.Selected.Text) + '_Remover_Servidor.wsf';
          if FileExists(FileLocate) then
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_Remover_Servidor.wsf'))
          else
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_RemoverServidor.wsf'));
        end;

        if trvModulos.Items.Item[9].Selected then
        begin

          for i := 0 to trvModulos.Items.Count - 2 do
          begin
            filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + trvModulos.Items.Item[i].Text + '_Instalar_Servidor.wsf';
            if FileExists(FileLocate) then
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_Instalar_Servidor.wsf'))
            else
              Command := strcat(Command, PwideChar(' && ' + (trvModulos.Items.Item[i].Text) + '_InstalarServidor.wsf'));
          end;
        end
        else
        begin
          filelocate := PATH + branches + '\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Instalador\' + (trvModulos.Selected.Text) + '_Instalar_Servidor.wsf';
          if FileExists(FileLocate) then
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_Instalar_Servidor.wsf'))
          else
            Command := strcat(Command, PwideChar(' && ' + (trvModulos.Selected.Text) + '_InstalarServidor.wsf'));
        end;

      end
      else if trvOpcao.Selected.Index = 4 then
      begin
        Command := strcat(Command, pwidechar(' && "' + npp + '"'));
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Fontes\Servidor\Dados\' + trvModulos.Selected.Text));
        Command := strcat(Command, PwideChar(' && "' + npp + '" '));
        Command := strcat(Command, PwideChar(trvModulos.Selected.Text + 'DadosInt.xml'));
        Command := strcat(Command, PwideChar(' && cd ..\..\Classes\' + trvModulos.Selected.Text));
        Command := strcat(Command, PwideChar(' && "' + npp + '" '));
        Command := strcat(Command, PwideChar(trvModulos.Selected.Text + 'Int.xml'));
      end
      else if (trvOpcao.Selected.Index = 5) and (trvModulos.selected.index = 4) then
      begin
        Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Selected.Text));
        begin
          arq := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Selected.Text+'\' + trvModulos.Selected.Text + 'Int.bat';
          if FileExists(arq) then
            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'Int.bat'))
          else
            Command := strcat(Command, PwideChar(' && call "' + trvModulos.Selected.Text + 'Int .bat"'));
          Command := strcat(Command, PwideChar(' && cd ..\..\Dados\' + trvModulos.Selected.Text));
          Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'DadosInt.bat'));
        end;

      end
      else if (trvOpcao.Selected.Index = 5) then
      begin
        if trvModulos.Selected.Text <> 'All' then
        begin
          Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Selected.Text));
          arq := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Selected.Text+'\' + trvModulos.Selected.Text + 'Int.bat';
          arqBU := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Selected.Text+'\' + trvModulos.Selected.Text + 'BU.bat';
          if FileExists(arq) then
            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'Int.bat'))
          else
          if FileExists(arqBU) then
            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'BU.bat'))
          else
            Command := strcat(Command, PwideChar(' && call "' + trvModulos.Selected.Text + 'Int .bat"'));

          Command := strcat(Command, PwideChar(' && cd ..\..\Dados\' + trvModulos.Selected.Text));
          arq := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Dados\' + trvModulos.Selected.Text+'\' + trvModulos.Selected.Text + 'DadosInt.bat';
          if FileExists(arq) then
            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'DadosInt.bat'))
          else
            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Selected.Text + 'Dados.bat'));
        end
        else
        begin
          Command := strcat(Command, PwideChar(' && cd DISTRIBUIDORA\3C\Fontes\Servidor\Classes\'));
          for i := 0 to trvModulos.Items.Count - 2 do
          begin
            Command := strcat(Command, PwideChar(' && cd '+trvModulos.Items.Item[i].Text ));
            arq := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Items.Item[i].Text+'\' + trvModulos.Items.Item[i].Text + 'Int.bat';
            arqBU := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Classes\' + trvModulos.Items.Item[i].Text+'\' + trvModulos.Items.Item[i].Text + 'BU.bat';
            if FileExists(arq) then
              Command := strcat(Command, PwideChar(' && call ' + trvModulos.Items.Item[i].Text + 'Int.bat'))
            else
            if FileExists(arqBU) then
              Command := strcat(Command, PwideChar(' && call ' + trvModulos.Items.Item[i].Text + 'BU.bat'))
            else
              Command := strcat(Command, PwideChar(' && call "' + trvModulos.Items.Item[i].Text + 'Int .bat"'));
            Command := strcat(Command, PwideChar(' && cd ..\..\Dados\' + trvModulos.Items.Item[i].Text));


            arq := PATH+branches+'\'+trvArvores.Selected.Text+'\DISTRIBUIDORA\3C\Fontes\Servidor\Dados\' + trvModulos.Items.Item[i].Text+'\' + trvModulos.Items.Item[i].Text + 'DadosInt.bat';
            if FileExists(arq) then
              Command := strcat(Command, PwideChar(' && call ' + trvModulos.Items.Item[i].Text + 'DadosInt.bat'))
            else
              Command := strcat(Command, PwideChar(' && call ' + trvModulos.Items.Item[i].Text + 'Dados.bat'));


//            Command := strcat(Command, PwideChar(' && call ' + trvModulos.Items.Item[i].Text + 'DadosInt.bat'));
            Command := strcat(Command, PwideChar(' && cd ..\..\classes\'));
          end;

        end;
      end
      else if trvOpcao.Selected.Index = 6 then
      begin
        Command := strcat(Command, PwideChar(' && svn update ../' + trvArvores.Selected.Text));
      end
      else if trvOpcao.Selected.Index = 7 then
      begin
        Command := PWideChar(' /k @echo off && cd ' + PATH + 'branches\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\3C\Fontes\ ');
        Command := strcat(Command, PwideChar(' && dir /b /s *.pas > c:\allFiles.cs && dir /b /s *.dfm >> c:\allFiles.cs '));
        Command := strcat(Command, PwideChar(' && cd '));
        Command := strcat(Command, PwideChar(PATH + 'branches\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\Fontes\ '));

        Command := strcat(Command, PwideChar(' && dir /b /s *.pas >> c:\allFiles.cs && dir /b /s *.dfm >> c:\allFiles.cs '));
        Command := strcat(Command, PwideChar(' && cd '));
        Command := strcat(Command, PwideChar(PATH + 'branches\' + PWideChar(trvArvores.Selected.Text) + '\Databases\ '));

        Command := strcat(Command, PwideChar(' && dir /b /s *.sql >> c:\allFiles.cs '));
        Command := strcat(Command, PwideChar(' && svn add --targets c:\allfiles.cs '));
        Command := strcat(Command, PwideChar(' && cd\ '));
        Command := strcat(Command, PwideChar(' && svn add --force --auto-props '));
        Command := strcat(Command, PWideChar(PATH + 'branches\' + PWideChar(trvArvores.Selected.Text + '\ ')));
      end;
      if (trvOpcao.Selected.Index in [8]) then
      begin
        if (uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('trunk'))) then
          Command := PWideChar(' /k @echo off && explorer ' + PATH + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\versao\Enviada\ ')
        else if (uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('documentos'))) then
          Command := PWideChar(' /k @echo off && explorer ' + PATH + 'documentos\')
        else
          Command := PWideChar(' /k @echo off && explorer ' + PATH + 'branches\' + PWideChar(trvArvores.Selected.Text) + '\DISTRIBUIDORA\versao\Enviada\ ')
      end;
    end;
//    if not (trvOpcao.Selected.Index in [4, 5, 8]) and (trvArvores.Selected.Index < idxAPP) then
    Command := StrCat(Command, PWideChar(' && pause'));
    Command := StrCat(Command, PWideChar(' && exit'));
    ShellExecute(Handle, '', 'cmd', Command, nil, SW_SHOWNORMAL)
//    if not (trvOpcao.Selected.Index in [8]) then
//      ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_SHOWNORMAL)
//    else
//    begin
//      ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_HIDE);
//      Command := PWideChar(' /k @echo off && taskkill /f /im cmd.exe ');
//      ShellExecute(Handle, 'runas', 'cmd', Command, nil, SW_HIDE);
//    end;

  end;
end;

procedure TFormPrincipal.SpeedButton2Click(Sender: TObject);
begin
  close;
end;

procedure TFormPrincipal.trvAppClick(Sender: TObject);
begin
  HabilitarExecutar;
end;

procedure TFormPrincipal.trvArvoresClick(Sender: TObject);
begin
  if trvarvores.Selected.Index < idxAPP then
  begin
    trvOpcao.Show;
    pnlGeraCCU.Hide;
    FormPrincipal.Width := 583;
    trvOpcao.Items.Item[0].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[1].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[2].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[3].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[4].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[5].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    trvOpcao.Items.Item[7].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
    //trvOpcao.Items.Item[8].Enabled := uppercase(trim(trvArvores.Selected.Text)) <> uppercase(trim('documentos'));
  end
  else if uppercase(trim(trvArvores.Selected.Text)) = uppercase(trim('Gera CCU')) then
  begin
    pnlGeraCCU.Show;
    FormPrincipal.Width := 775;
    trvOpcao.Hide;
    trvApp.Hide;
    trvTipoVersao.Hide;
  end
  else
  begin
    trvOpcao.Hide;
    pnlGeraCCU.Hide;
    FormPrincipal.Width := 450;
  end;
  trvOpcao.Items.Item[7].Enabled := False;
  HabilitarExecutar;
end;

procedure TFormPrincipal.trvArvoresDblClick(Sender: TObject);
begin
//  if trvarvores.Selected.Index < idxAPP then
  begin
    if btnExecutar.Enabled then
      btnExecutarClick(nil);
  end;
end;

procedure TFormPrincipal.trvModulosClick(Sender: TObject);
begin
  HabilitarExecutar;
end;

procedure TFormPrincipal.trvOpcaoClick(Sender: TObject);
begin
  if trvOpcao.Selected.Enabled then
  begin
    if trvOpcao.Selected.Index in [0] then
    begin
      trvModulos.Hide;
      trvapp.Hide;
      trvTipoVersao.Show;
  //    trvTipoVersao.top := 8;
      //trvTipoVersao.Left := 278;
      FormPrincipal.Width := 775;
      trvTipoVersaoClick(trvTipoVersao);
    end
    else if trvOpcao.Selected.Index in [1, 2, 3, 4, 5] then
    begin
      trvTipoVersao.Hide;
      trvapp.Hide;
      trvModulos.Show;
  //    trvModulos.top := 8;
     // trvModulos.Left := 278;
      FormPrincipal.Width := 775;
    end
    else
    begin
      trvTipoVersao.Hide;
      trvModulos.Hide;
      trvapp.Hide;
      FormPrincipal.Width := 585;
    end;
  end;
  HabilitarExecutar;
end;

procedure TFormPrincipal.trvOpcaoDblClick(Sender: TObject);
begin
  if btnExecutar.Enabled then
    btnExecutarClick(nil);
end;

procedure TFormPrincipal.trvTipoVersaoClick(Sender: TObject);
begin
  if (trvTipoVersao.Selected <> nil) and (trvTipoVersao.Selected.text = 'Want') then
  begin
    trvapp.Show;
  //  trvapp.top := 84;
//    trvapp.Left := 278;
  end
  else
    trvapp.Hide;
  HabilitarExecutar;
end;

procedure TFormPrincipal.tryIconContextPopup(Sender: TObject; MousePos: TPoint; var Handled: Boolean);
begin
// pmMnu.Popup(100,100);
end;

procedure TFormPrincipal.tryIconDblClick(Sender: TObject; Button: TMouseButton; Shift: TShiftState; X, Y: Integer);
begin
//  tryIcon.Active := False;
  Show();
  WindowState := wsNormal;
  Application.BringToFront();
end;

end.

