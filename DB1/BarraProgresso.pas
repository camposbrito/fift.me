unit BarraProgresso;

interface

uses
  Classes, Gauges;

type
  TBarraProgresso = class(TThread)
  protected
    _Gauge: TGauge;
    iSleep: Integer;
    procedure Execute; override;
  public
    _Posicao: integer;
    constructor Create( var gauge: TGauge; Sleep: integer);
    function Cancelou: boolean;
  end;

implementation

{ BarraProgresso }

function TBarraProgresso.Cancelou: boolean;
begin
  Result := (Terminated) And (_Posicao < 100);
end;

constructor TBarraProgresso.Create(var gauge: TGauge; Sleep: integer);
begin
  inherited Create (false);
  _Gauge := Gauge;
  iSleep := Sleep;
  FreeOnTerminate := false;
end;

procedure TBarraProgresso.Execute;
begin
  { Place thread code here }
  while (not Terminated) and (_Posicao < 100) do
  begin
    Inc (_Posicao);
    _Gauge.AddProgress(1);
    Sleep (iSleep);
  end;
end;

end.
