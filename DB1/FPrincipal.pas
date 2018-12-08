unit FPrincipal;

interface

uses Windows, SysUtils, Classes, Graphics, Forms, Controls, Menus,
  StdCtrls, Dialogs, Buttons, Messages, ExtCtrls, ComCtrls, StdActns,
  ActnList, ToolWin, ImgList, FExercicio1_CadastroNomesArrays;

type
  TFormPrincipal = class(TForm)
    MainMenu1: TMainMenu;
    N1: TMenuItem;
    FileExitItem: TMenuItem;
    OpenDialog: TOpenDialog;
    StatusBar: TStatusBar;
    ActionList1: TActionList;
    ImageList1: TImageList;
    Exerccios1: TMenuItem;
    actExerc1: TAction;
    actExerc2: TAction;
    actExerc3: TAction;
    actExerc4: TAction;
    actExerc5: TAction;
    actExerc6: TAction;
    actExerc7: TAction;
    Exerccio1Cadastrodenomescomarraydinmico1: TMenuItem;
    Exerccio2Classesdeconversodetexto1: TMenuItem;
    Exerccio3Formulriodecadastrodepessoas1: TMenuItem;
    Exerccio4Componenteparaconsultadedados1: TMenuItem;
    Exerccio5Criaodearquivos1: TMenuItem;
    Exerccio6Utilizaodebibliotecasdinmicas1: TMenuItem;
    Exerccio7Processosconcorrentes1: TMenuItem;
    procedure FileExit1Execute(Sender: TObject);
    procedure actExerc1Execute(Sender: TObject);
    procedure actExerc2Execute(Sender: TObject);
    procedure actExerc3Execute(Sender: TObject);
    procedure actExerc4Execute(Sender: TObject);
    procedure actExerc5Execute(Sender: TObject);
    procedure actExerc6Execute(Sender: TObject);
    procedure actExerc7Execute(Sender: TObject);
  private
    procedure CriarMDI(MainForm: TForm; FormClass: TFormClass; var Reference);
    { Private declarations }

  public
    { Public declarations }
  end;

var
  FormPrincipal: TFormPrincipal;

implementation

{$R *.dfm}

uses CHILDWIN, about, FExercicio2_ConversaoTexto, FExercicio3_Pessoas,
  FExercicio4_Componentes, FExercicio5_Arquivos,
  FExercicio6_UtilizacaoBibliotecasDinamicas, FExercicio7_Processosconcorrentes;

procedure TFormPrincipal.CriarMDI(MainForm: TForm; FormClass: TFormClass; var Reference);
var
  i: Integer;
begin
  for i := 0 to MainForm.MDIChildCount-1 do
    if MainForm.MDIChildren[i].ClassName=FormClass.ClassName then
    begin
      MainForm.MDIChildren[i].BringToFront;
      Exit;
    end;
  Application.CreateForm(FormClass, Reference);
end;

procedure TFormPrincipal.actExerc1Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio1_CadastroNomesArrays, FormExercicio1_CadastroNomesArrays);
end;

procedure TFormPrincipal.actExerc2Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio2_ConversaoTexto, FormExercicio2_ConversaoTexto);
end;

procedure TFormPrincipal.actExerc3Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio3_Pessoas, FormExercicio3_Pessoas);
end;

procedure TFormPrincipal.actExerc4Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio4_Componentes, FormExercicio4_Componentes);
end;

procedure TFormPrincipal.actExerc5Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio5_Arquivos, FormExercicio5_Arquivos);
end;

procedure TFormPrincipal.actExerc6Execute(Sender: TObject);
var
  Child: TFormExercicio6_UtilizacaoBibliotecasDinamicas;
begin
  { create a new MDI child window }
  Child := FormExercicio6_UtilizacaoBibliotecasDinamicas.Create(Application);
  Child.Show;
end;

procedure TFormPrincipal.actExerc7Execute(Sender: TObject);
var
  Child: TFormExercicio7_ProcessosConcorrentes;
begin
  { create a new MDI child window }
  Child := TFormExercicio7_ProcessosConcorrentes.Create(Application);
  Child.Show;
end;

procedure TFormPrincipal.FileExit1Execute(Sender: TObject);
begin
  Close;
end;

end.
