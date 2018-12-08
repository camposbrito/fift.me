unit ConverteInvertido;

interface

uses ConverteTexto, SysUtils, StrUtils;

type
  TConverteInvertido = class(TConverteTexto)
  private
  public
    function Converter: String; override;
  end;
implementation

{ TConverteInvertido }

function TConverteInvertido.Converter: String;
begin
  Result := ReverseString(Texto);

  if QuantidadeLetras > 0 then
    Result := copy(Result, 1, QuantidadeLetras)
end;

end.
