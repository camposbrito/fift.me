unit FExercicio3_Pessoas_Pesquisa;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, uBanco, FMTBcd, DB, DBClient, Provider, SqlExpr,
  Grids, DBGrids, ExtCtrls, StdCtrls;

type
  TFormExercicio3_Pessoas_Pesquisa = class(TForm)
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
    cdsPesquisaCDPESSOA: TIntegerField;
    cdsPesquisaNMPESSOA: TStringField;
    cdsPesquisaDELOGRADOURO: TStringField;
    cdsPesquisaDEBAIRRO: TStringField;
    cdsPesquisaCDCIDADE: TIntegerField;
    cdsPesquisaNMCIDADE: TStringField;
    cdsPesquisaUF: TStringField;
    btnSelecionar: TButton;
    Cancelar: TButton;
    procedure btnPesquisarClick(Sender: TObject);
    procedure btnSelecionarClick(Sender: TObject);
    procedure CancelarClick(Sender: TObject);
    procedure grdResultadoDblClick(Sender: TObject);
    procedure FormShow(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
    bSelecionou: Boolean;
  end;

var
  FormExercicio3_Pessoas_Pesquisa: TFormExercicio3_Pessoas_Pesquisa;

implementation

{$R *.dfm}

procedure TFormExercicio3_Pessoas_Pesquisa.btnSelecionarClick(Sender: TObject);
begin
  bSelecionou := True;
  Close;
end;

procedure TFormExercicio3_Pessoas_Pesquisa.CancelarClick(Sender: TObject);
begin
  Close;
end;

procedure TFormExercicio3_Pessoas_Pesquisa.btnPesquisarClick(Sender: TObject);
begin
  cdsPesquisa.Close;
  cdsPesquisa.Params.ParamByName('nmpessoa').AsString := Edit1.Text;
  cdsPesquisa.Open;
end;

procedure TFormExercicio3_Pessoas_Pesquisa.grdResultadoDblClick(Sender: TObject);
begin
  btnSelecionarClick(nil);
end;

procedure TFormExercicio3_Pessoas_Pesquisa.FormShow(Sender: TObject);
begin
  btnPesquisarClick(nil);
end;

end.
