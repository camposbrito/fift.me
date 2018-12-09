unit ConverteOrdenado;

interface

uses ConverteTexto, Classes, SysUtils;

type
  TConverteOrdenado = class(TConverteTexto)
  private
    function OrdemAlfabetica(txt: String): string;
  public
    function Converter: String; override;
  end;

implementation

{ TConvertePrimeiraMaiuscula }
function TConverteOrdenado.OrdemAlfabetica(txt: String): string;
var
  ListaOrdem: TStringList;
  aux: string;
  i: Integer;
begin
  ListaOrdem := TStringList.Create;
  for i := 0 to Length(txt) - 1 do
  begin
    ListaOrdem.Add(copy(txt, i + 1, 1));
  end;
  ListaOrdem.Sort;

  for i := 0 to ListaOrdem.Count - 1 do
    aux := aux + ListaOrdem[i];

  Result := aux;
end;

function TConverteOrdenado.Converter: String;
var
  Lista: TStringList;
  i: Integer;
  Palavra: string;
begin
  Lista := TStringList.Create;
  Lista.Delimiter := ' ';
  Lista.DelimitedText := Texto;
  i := 0;
  Palavra := OrdemAlfabetica(Lista[i]);
  Result := Palavra;

  for i := 1 to Lista.Count - 1 do
  begin
    Palavra := OrdemAlfabetica(Lista[i]);
    Result := Result + ' ' + Palavra;
  end;
  if QuantidadeLetras > 0 then
    Result := copy(Result, 1, QuantidadeLetras)
end;

end.
