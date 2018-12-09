unit FExercicio7_ProcessosConcorrentes;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, Gauges, BarraProgresso;

type
  TFormExercicio7_ProcessosConcorrentes = class(TFormExercicio_base)
    pnlProgresso: TPanel;
    pnlBotoes: TPanel;
    Button1: TButton;
    Button2: TButton;
    edtSleep1: TLabeledEdit;
    edtSleep2: TLabeledEdit;
    gThread1: TGauge;
    lblThread1: TLabel;
    gThread2: TGauge;
    lblThread2: TLabel;
    procedure Button2Click(Sender: TObject);
    procedure Button1Click(Sender: TObject);
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
  private
    { Private declarations }
    thr1, thr2: TBarraProgresso;
  public
    { Public declarations }
  end;

var
  FormExercicio7_ProcessosConcorrentes: TFormExercicio7_ProcessosConcorrentes;

implementation

{$R *.dfm}

procedure TFormExercicio7_ProcessosConcorrentes.Button1Click(Sender: TObject);

begin
  inherited;
  gThread1.Progress := 0;
  gThread2.Progress := 0;

  thr1 := TBarraProgresso.Create(gThread1, StrToIntDef(edtSleep1.Text, 0));
  thr2 := TBarraProgresso.Create(gThread2, StrToIntDef(edtSleep2.Text, 0));
end;

procedure TFormExercicio7_ProcessosConcorrentes.Button2Click(Sender: TObject);
begin
  inherited;
  Close;
end;

procedure TFormExercicio7_ProcessosConcorrentes.FormClose(Sender: TObject;
  var Action: TCloseAction);
begin
  inherited;
  FreeAndNil(thr1);
  FreeAndNil(thr2);
end;

end.
