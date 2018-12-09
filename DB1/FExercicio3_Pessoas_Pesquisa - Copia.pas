unit FExercicio3_Cidade_Pesquisa;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, uBanco, FMTBcd, DB, DBClient, Provider, SqlExpr,
  Grids, DBGrids, ExtCtrls, StdCtrls;

type
  TFormExercicio3_Cidade_Pesquisa = class(TForm)
    Label1: TLabel;
    Button7: TButton;
    Edit1: TEdit;
    Panel1: TPanel;
    Panel2: TPanel;
    DBGrid1: TDBGrid;
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
    Button1: TButton;
    Button2: TButton;
    procedure Button7Click(Sender: TObject);
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure DBGrid1DblClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
    bSelecionou: Boolean;
  end;

var
  FormExercicio3_Cidade_Pesquisa: TFormExercicio3_Cidade_Pesquisa;

implementation

{$R *.dfm}

procedure TFormExercicio3_Cidade_Pesquisa.Button1Click(Sender: TObject);
begin
  bSelecionou := True;
  Close;
end;

procedure TFormExercicio3_Cidade_Pesquisa.Button2Click(Sender: TObject);
begin
  Close;
end;

procedure TFormExercicio3_Cidade_Pesquisa.Button7Click(Sender: TObject);
begin
  cdsPesquisa.Close;
  cdsPesquisa.Params.ParamByName('nmpessoa').AsString := Edit1.Text;
  cdsPesquisa.Open;
end;

procedure TFormExercicio3_Cidade_Pesquisa.DBGrid1DblClick(Sender: TObject);
begin
  Button1Click(nil);
end;

end.
