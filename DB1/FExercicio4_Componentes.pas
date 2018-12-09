unit FExercicio4_Componentes;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, FMTBcd, DB, DBGrids,
  uDB1Data,  Provider, DBClient, SqlExpr, Grids;

type
  TFormExercicio4_Componentes = class(TFormExercicio_base)
    grpParametros: TGroupBox;
    grpResultado: TGroupBox;
    mmoCampos: TMemo;
    lblCampos: TLabel;
    mmoTabelas: TMemo;
    lblTabelas: TLabel;
    mmoCondicoes: TMemo;
    lblCondicoes: TLabel;
    btnConsultar: TButton;
    db1Consulta: TDB1Data;
    grdResultado: TDBGrid;
    dsConsulta: TDataSource;
    cdsConsulta: TClientDataSet;
    dspConsulta: TDataSetProvider;
    procedure btnConsultarClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FormExercicio4_Componentes: TFormExercicio4_Componentes;

implementation

{$R *.dfm}

procedure TFormExercicio4_Componentes.btnConsultarClick(Sender: TObject);
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