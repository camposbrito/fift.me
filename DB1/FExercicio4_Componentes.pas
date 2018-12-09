unit FExercicio4_Componentes;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, FMTBcd, DB, Grids, DBGrids, SqlExpr,
  uDB1Data,  Provider, DBClient, uBanco;

type
  TFormExercicio4_Componentes = class(TFormExercicio_base)
    GroupBox1: TGroupBox;
    GroupBox2: TGroupBox;
    mmoCampos: TMemo;
    Label1: TLabel;
    mmoTabelas: TMemo;
    lblTabelas: TLabel;
    mmoCondicoes: TMemo;
    Label3: TLabel;
    Button1: TButton;
    db1Consulta: TDB1Data;
    DBGrid1: TDBGrid;
    dsConsulta: TDataSource;
    cdsConsulta: TClientDataSet;
    dspConsulta: TDataSetProvider;
    procedure Button1Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FormExercicio4_Componentes: TFormExercicio4_Componentes;

implementation

{$R *.dfm}

procedure TFormExercicio4_Componentes.Button1Click(Sender: TObject);
begin
  inherited;
  if cdsConsulta.Active then
    cdsConsulta.Active := False;
  db1Consulta.ListaTabelas    := mmoTabelas.Lines;
  db1Consulta.ListaCampos     := mmoCampos.Lines;
  db1Consulta.ListaCondicoes  := mmoCondicoes.Lines;
  db1Consulta.Open;

  cdsConsulta.Active := true;
end;

end.