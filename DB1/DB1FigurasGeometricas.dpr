library DB1FigurasGeometricas;

{ Important note about DLL memory management: ShareMem must be the
  first unit in your library's USES clause AND your project's (select
  Project-View Source) USES clause if your DLL exports any procedures or
  functions that pass strings as parameters or function results. This
  applies to all strings passed to and from your DLL--even those that
  are nested in records and classes. ShareMem is the interface unit to
  the BORLNDMM.DLL shared memory manager, which must be deployed along
  with your DLL. To avoid using BORLNDMM.DLL, pass string information
  using PChar or ShortString parameters. }

uses
  SysUtils,
  Classes,
  Dialogs,
  Calculo in 'Calculo.pas';
var
  Quadrado: TQuadrado;
  Circulo: TCirculo;
{$R *.res}
function Calcular(AParams: array of Variant; AObjetos: array of TObject): Variant;
begin
  if AParams[0] = 'Q' then
  begin
    Quadrado := TQuadrado.Create;
    Quadrado.TipoCalculo := AParams[1];
    Quadrado.Lado := AParams[2];
    Result := Quadrado.Calcular;
  end
  else
  if AParams[0] = 'C' then
  begin
    Circulo := TCirculo.Create;
    Circulo.TipoCalculo := AParams[1];
    Circulo.Raio := AParams[2];
    Result := Circulo.Calcular;
  end
  else
    Result := varEmpty;
end;

exports Calcular;

begin
end.
