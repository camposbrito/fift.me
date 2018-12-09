unit uDB1Data;

interface

uses
  SysUtils, Classes, Controls, StdCtrls, graphics, messages, db, SqlExpr;

type
  TDB1Data = class(TSQLDataSet)
  private
    FListaTabelas: TStrings;
    FListaCampos: TStrings;
    FListaCondicoes: TStrings;
  protected
    { Protected declarations }
  public
    constructor Create(AOwner: TComponent); override;
    { Public declarations }
  published
    { Published declarations }
    property ListaTabelas: TStrings read FListaTabelas write FListaTabelas;
    property ListaCampos: TStrings read FListaCampos write FListaCampos;
    property ListaCondicoes: TStrings read FListaCondicoes
      write FListaCondicoes;
    procedure Open;
  end;

procedure Register;

implementation

procedure Register;
begin
  RegisterComponents('DB1 Avaliação', [TDB1Data]);
end;

constructor TDB1Data.Create(AOwner: TComponent);
begin
  inherited;
end;

procedure TDB1Data.Open;
var
  sql: string;
  i: Integer;
begin
  Self.Active := False;
  sql := 'SELECT ';
  if trim(ListaCampos.Text) = '' then
  sql := sql + ' * ';
  sql := sql + ListaCampos[0];
  for i := 1 to ListaCampos.Count - 1 do
   if Trim(ListaCampos[i]) <> '' then
      sql := sql + ', ' + ListaCampos[i];

  sql := sql + ' FROM ' + ListaTabelas[0];
  for i := 1 to ListaTabelas.Count - 1 do
    if Trim(ListaTabelas[i]) <> '' then
      sql := sql + ', ' + ListaTabelas[i];

  if trim(ListaCondicoes.Text) <> '' then
    sql := sql + ' WHERE ' + ListaCondicoes[0];
  for i := 1 to ListaCondicoes.Count - 1 do
  begin
    if Trim(ListaCondicoes[i]) <> '' then
      sql := sql + ' AND ' + ListaCondicoes[i];
  end;

  Self.CommandText := sql;
  Self.Active := True;
end;

end.
