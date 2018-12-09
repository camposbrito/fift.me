unit FExercicio5_Arquivos;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, FMTBcd, ExtDlgs, DBClient,
  Provider, DB, SqlExpr, uDB1Data;

type
  TFormExercicio5_Arquivos = class(TFormExercicio_base)
    Panel1: TPanel;
    Panel2: TPanel;
    Label1: TLabel;
    Edit1: TEdit;
    Button1: TButton;
    Button2: TButton;
    Button3: TButton;
    db1Consulta: TSQLDataSet;
    dsConsulta: TDataSource;
    dspConsulta: TDataSetProvider;
    cdsConsulta: TClientDataSet;
    OpenTextFileDialog1: TOpenTextFileDialog;
    cdsConsultaNMPESSOA: TStringField;
    cdsConsultaNMCIDADE: TStringField;
    cdsConsultaUF: TStringField;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure Button3Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FormExercicio5_Arquivos: TFormExercicio5_Arquivos;

implementation

uses uBanco;

{$R *.dfm}

procedure TFormExercicio5_Arquivos.Button1Click(Sender: TObject);
begin
  inherited;
  if OpenTextFileDialog1.Execute then
      Edit1.Text := OpenTextFileDialog1.FileName;
end;

procedure TFormExercicio5_Arquivos.Button2Click(Sender: TObject);
var
  Lista: TStringList;
  i: Integer;
  Nome, Cidade, UF: string;
begin
  inherited;
  Lista := TStringList.Create;
  if trim(Edit1.Text) = '' then
    Button1Click(nil);
  try
    cdsConsulta.Open;

    for i := 0 to cdsConsulta.RecordCount -1 do
    begin
      Nome   := Copy(cdsConsultaNMPESSOA.AsString, 1, 50);
      Cidade := Copy(cdsConsultaNMCIDADE.AsString, 1, 30);
      UF     := Copy(cdsConsultaUF.AsString,       1, 02);
      Lista.Add( Nome   + StringOfChar(' ', 50 - Length(Nome))+
                 Cidade + StringOfChar(' ', 30 - Length(Cidade))+
                 UF     + StringOfChar(' ',  2 - Length(UF)));
      cdsConsulta.Next;
    end;
    lista.SaveToFile(Edit1.Text, TEncoding.UTF8);
  finally
    Lista.Free;
    cdsConsulta.Close;
    ShowMessage('Arquivo salvo no diretório informado.');
  end;

end;

procedure TFormExercicio5_Arquivos.Button3Click(Sender: TObject);
begin
  inherited;
  Close;
end;

procedure TFormExercicio5_Arquivos.FormCreate(Sender: TObject);
begin
  inherited;
  if not(dmBanco.connDB1.Connected) then
    dmBanco.connDB1.Open;
end;

end.
