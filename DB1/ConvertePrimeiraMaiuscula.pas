unit ConvertePrimeiraMaiuscula;

interface
uses ConverteTexto, Classes, SysUtils;

type
  TConvertePrimeiraMaiuscula = class(TConverteTexto)
  private
  public
    function Converter: String; override;
  end;
implementation

{ TConvertePrimeiraMaiuscula }

function TConvertePrimeiraMaiuscula.Converter: String;
var
  Lista: TStringList;
  i: Integer;
begin
  Lista := TStringList.Create;
  Lista.Delimiter := ' ';
  Lista.DelimitedText := Texto;

  Result := Uppercase(Copy(Lista[0],1,1))+Lowercase(Copy(Lista[0],2,Length(Lista[0])));
  for i := 1 to Lista.Count -1 do
  begin
    Result := Result + Lista.Delimiter + Uppercase(Copy(Lista[i],1,1))+Lowercase(Copy(Lista[i],2,Length(Lista[i])))
  end;

  if QuantidadeLetras > 0 then
    Result := copy(Result, 1, QuantidadeLetras);
end;

end.
