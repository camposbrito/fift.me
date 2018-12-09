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
    procedure AtualizaTela;
  public
    _Posicao: integer;
    constructor Create( var gauge: TGauge; Sleep: integer);
    function Cancelou: boolean;
  end;

implementation

{ BarraProgresso }

procedure TBarraProgresso.AtualizaTela;
//var _gauge : TForm1;
begin
//  lForm1 := _Form As TForm1;
//  lForm1.pbProgresso.Position := _Posicao;

end;

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
    _Posicao := 0;
  while (not Terminated) and (_Posicao < 100) do begin
    Inc (_Posicao);
    _Gauge.AddProgress(1);
//    Synchronize (AtualizaTela);
    Sleep (iSleep);
  end;
end;

end.
