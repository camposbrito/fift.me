unit ConverteTexto;

interface

uses Conversao, Dialogs ;

type
  TConverteTexto = class(TConversao)
  private
    iQuantidadeLetras : Integer;
    aTexto: String;
    function GetTexto: String;
    procedure SetTexto(const Value: String);
  public
    function Converter: String; override;
    property QuantidadeLetras: Integer read iQuantidadeLetras write iQuantidadeLetras;
    property Texto: String read GetTexto write SetTexto;
    constructor Create;
    destructor  Destroy; Override;
  end;

implementation

{ TConverteTexto }

function TConverteTexto.Converter: String;
begin

end;

constructor TConverteTexto.Create;
begin
  iQuantidadeLetras := 0;
  aTexto := '';
end;

destructor TConverteTexto.Destroy;
begin
  inherited;
end;

function TConverteTexto.GetTexto: String;
begin
  Result := aTexto;
end;

procedure TConverteTexto.SetTexto(const Value: String);
begin
  if Value <> '' then
    aTexto := Value
  else
    MessageDlg('Valor inválido para conversão.',mtError, [mbOK], 0);
end;

end.
