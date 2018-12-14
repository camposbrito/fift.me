unit Calculo;

interface

uses StrUtils, Dialogs, Math;

type
  TFigura = class
  private
    ATipoCalculo: String; //(Á)rea ou (P)erímetro
  public
    constructor Create;
    destructor Destroy; Override;
    property TipoCalculo: String read ATipoCalculo write ATipoCalculo;
  end;

  TQuadrado = class(TFigura)
  private
    iLado: Integer;
  public
    constructor Create;
    function Calcular: Integer;
    property Lado: Integer read iLado write iLado;
  end;

  TCirculo = class(TFigura)
  private
    iRaio: Integer;
  public
    constructor Create;
    function Calcular: Double; overload;
    property Raio: Integer read iRaio write iRaio;
  end;
  Const
    PI = 3.14;
implementation

{ TCirculo }

function TCirculo.Calcular: Double;
begin
  Result := 0;
  if ATipoCalculo = 'A' then
    Result := PI * Math.Power(iRaio, 2)
  else
  if ATipoCalculo = 'P' then
    Result := 2 * PI * iRaio;
end;

constructor TCirculo.Create;
begin
  iRaio := 0;
end;

{ TQuadrado }

function TQuadrado.Calcular: Integer;
begin
  Result := 0;
  if ATipoCalculo = 'A' then
    Result := iLado * iLado
  else
  if ATipoCalculo = 'P' then
    Result := iLado * 4;
end;

constructor TQuadrado.Create;
begin
  iLado := 0;
end;

{ TFigura }

constructor TFigura.Create;
begin
  ATipoCalculo := '';
end;

destructor TFigura.Destroy;
begin
  inherited;
end;

end.
