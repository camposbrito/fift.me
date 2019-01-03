unit Funcoes;

interface

uses MaskUtils, DateUtils, ComObj, SysUtils;

// type TFuncoes = Class(TAutoObject)

function Dias_Uteis(DataI, DataF: TDateTime): Integer;
function DecimalHoras(valorDecimal: real): real;
function FormataMinutos(QdtMinutos: Cardinal): string;
function FormataHoras(Valor: String): String;
function FormatarHoras(VHora: String): String;
function ValidarData(hr: String): boolean;
function ValidarHora(hr: String): boolean;
function ArrumaString(txt: String): String;
//function RetornaHora(DataHora: DateTime): TTime;
//function RetornaData(DataHora: DateTime): TDate;
// end;

{enow := Now;
    edate := DateOf(enow);
    etime := TimeOf(enow);
}
implementation

{ TFuncoes }

function ArrumaString(txt: String): String;
var
  i: Integer;
begin
//  Result := txt;
//  for i := 0 to Length(Result) do
//    case Result[i] of
//      'Ã¡':  Result[i] := 'á';
//      'Ã£':  Result[i] := 'ã';
//    end;
end;

function DecimalHoras(valorDecimal: real): real;
var
  a, b, c, d: real;
begin
  a := valorDecimal / 60;
  b := Int(a);
  c := a - b;
  d := c * 60;
  result := StrToFloat(FormatFloat('0', a) + ',' + FormatFloat('00', d));
end;

function Dias_Uteis(DataI, DataF: TDateTime): Integer;
var
  contador: Integer;
begin
  if DataI > DataF then
  begin
    result := 0;
    exit
  end;
  contador := 0;
  while (DataI <= DataF) do
  begin
    if ((DayOfWeek(DataI) <> 1) and (DayOfWeek(DataI) <> 7)) then
      inc(contador);
    DataI := DataI + 1
  end;
  result := contador;
end;

function FormataHoras(Valor: String): String;
begin
  result := Format('%.2d:%.2d', [Valor]);
end;

function FormataMinutos(QdtMinutos: Cardinal): string;
begin
  result := Format('%.2d:%.2d', [QdtMinutos div 60, QdtMinutos mod 60]);
end;

function FormatarHoras(VHora: String): String;
begin
  case Length(VHora) of
    0: result := '';
    1: result := '0:0' + VHora;
    2: result := '0:' + VHora;
    3: result := FormatMaskText('0:00;0', VHora);
    4: result := FormatMaskText('00:00;0', VHora);
    5: result := FormatMaskText('000:00;0', VHora);
  else
    result :=  VHora;
  end;
end;

function ValidarData(hr: String): boolean;
begin
  result := true;
  if trim(hr) <> '' then
  begin
    try
      StrToDate(trim(hr));
    except
      on EConvertError do
      begin
        // Application.MessageBox('Data Inválida!', 'Erro!', MB_ICONERROR + MB_OK);
        result := false;
      end;
    end;
  end;
end;

function ValidarHora(hr: String): boolean;
begin
  result := true;
  if trim(hr) <> '' then
  begin
    try
      StrToTime(trim(hr));
    except
      on EConvertError do
      begin
        // Application.MessageBox('Data Inválida!', 'Erro!', MB_ICONERROR + MB_OK);
        result := false;
      end;
    end;
  end;
end;

end.
