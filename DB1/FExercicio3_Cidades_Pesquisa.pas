unit FExercicio3_Cidades_Pesquisa;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, uBanco, FMTBcd, DB, DBClient, Provider, SqlExpr,
  Grids, DBGrids, ExtCtrls, StdCtrls;

type
  TFormExercicio3_Cidades_Pesquisa = class(TForm)
    Label1: TLabel;
    btnPesquisar: TButton;
    Edit1: TEdit;
    pnlBotoes: TPanel;
    pnlTopo: TPanel;
    grdResultado: TDBGrid;
    qryPesquisa: TSQLDataSet;
    dsPesquisa: TDataSource;
    dspPesquisa: TDataSetProvider;
    cdsPesquisa: TClientDataSet;
    cdsPesquisaCDCIDADE: TIntegerField;
    cdsPesquisaNMCIDADE: TStringField;
    btnSelecionar: TButton;
    btnCancelar: TButton;
    cdsPesquisaUF: TStringField;
    procedure btnPesquisarClick(Sender: TObject);
    procedure btnSelecionarClick(Sender: TObject);
    procedure btnCancelarClick(Sender: TObject);
    procedure grdResultadoDblClick(Sender: TObject);
    procedure FormShow(Sender: TObject);
    procedure Edit1KeyDown(Sender: TObject; var Key: Word; Shift: TShiftState);
    procedure FormCreate(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
    bSelecionou: Boolean;
  end;

var
  FormExercicio3_Cidades_Pesquisa: TFormExercicio3_Cidades_Pesquisa;

implementation

{$R *.dfm}

procedure TFormExercicio3_Cidades_Pesquisa.btnSelecionarClick(Sender: TObject);
begin
  bSelecionou := True;
  Close;
end;

procedure TFormExercicio3_Cidades_Pesquisa.btnCancelarClick(Sender: TObject);
begin
  Close;
end;

procedure TFormExercicio3_Cidades_Pesquisa.btnPesquisarClick(Sender: TObject);
begin
  cdsPesquisa.Close;
  cdsPesquisa.Params.ParamByName('nmcidade').AsString := Edit1.Text;
  cdsPesquisa.Open;
end;

procedure TFormExercicio3_Cidades_Pesquisa.grdResultadoDblClick(Sender: TObject);
begin
  btnSelecionarClick(nil);
end;

procedure TFormExercicio3_Cidades_Pesquisa.Edit1KeyDown(Sender: TObject;
  var Key: Word; Shift: TShiftState);
begin
  if key = 13 then
    btnPesquisarClick(nil);
end;

procedure TFormExercicio3_Cidades_Pesquisa.FormCreate(Sender: TObject);
begin
  if not(dmBanco.connDB1.Connected) then
    dmBanco.connDB1.Open;
end;

procedure TFormExercicio3_Cidades_Pesquisa.FormShow(Sender: TObject);
begin
  btnPesquisarClick(nil);
end;

end.
