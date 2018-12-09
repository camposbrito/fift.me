unit FPrincipal;

interface

uses Windows, SysUtils, Classes, Graphics, Forms, Controls, Menus, Dialogs,
Buttons, Messages, ExtCtrls, ComCtrls, ActnList;

type
  TFormPrincipal = class(TForm)
    MainMenu1: TMainMenu;
    N1: TMenuItem;
    FileExitItem: TMenuItem;
    StatusBar: TStatusBar;
    ActionList1: TActionList;
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
    procedure actExerc1Execute(Sender: TObject);
    procedure actExerc2Execute(Sender: TObject);
    procedure actExerc3Execute(Sender: TObject);
    procedure actExerc4Execute(Sender: TObject);
    procedure actExerc5Execute(Sender: TObject);
    procedure actExerc6Execute(Sender: TObject);
    procedure actExerc7Execute(Sender: TObject);
    procedure FileExitItemClick(Sender: TObject);
  private
    { Private declarations }
    procedure CriarMDI(MainForm: TForm; FormClass: TFormClass; var Reference);
  public
    { Public declarations }
  end;

var
  FormPrincipal: TFormPrincipal;

implementation

{$R *.dfm}

uses FExercicio1_Arrays, FExercicio2_ConversaoTexto, FExercicio3_Pessoas,
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

procedure TFormPrincipal.FileExitItemClick(Sender: TObject);
begin
  Close;
end;

procedure TFormPrincipal.actExerc1Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio1_Arrays, FormExercicio1_Arrays);
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
begin
 CriarMDI(Self, TFormExercicio6_UtilizacaoBibliotecasDinamicas, FormExercicio6_UtilizacaoBibliotecasDinamicas);
end;

procedure TFormPrincipal.actExerc7Execute(Sender: TObject);
begin
  CriarMDI(Self, TFormExercicio7_ProcessosConcorrentes, FormExercicio7_ProcessosConcorrentes);
end;

end.
