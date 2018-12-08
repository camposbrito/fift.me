unit FExercicio2_ConversaoTexto;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, StrUtils, Math;

type
  TFormExercicio2_ConversaoTexto = class(TFormExercicio_base)
    mmoTextoOriginal: TMemo;
    Label1: TLabel;
    mmoTextoConvertido: TMemo;
    Label2: TLabel;
    lbl1: TLabel;
    edtQuantidadeLetras: TEdit;
    Button1: TButton;
    RadioGroup1: TRadioGroup;
    procedure Button1Click(Sender: TObject);
    procedure FormCreate(Sender: TObject);
    procedure FormDestroy(Sender: TObject);
  private
    { Private declarations }
    procedure InverterTexto;
    procedure PrimeiraMaiuscula;
    procedure OrdemAlfabetica;
  public
    { Public declarations }
  end;

var
  FormExercicio2_ConversaoTexto: TFormExercicio2_ConversaoTexto;

implementation

{$R *.dfm}

uses ConverteOrdenado, ConverteInvertido, ConvertePrimeiraMaiuscula;
var
  ConverteOrdenado          : TConverteOrdenado;
  ConverteInvertido         : TConverteInvertido ;
  ConvertePrimeiraMaiuscula : TConvertePrimeiraMaiuscula;

procedure TFormExercicio2_ConversaoTexto.Button1Click(Sender: TObject);
begin
  inherited;
  if RadioGroup1.ItemIndex = 0 then
    InverterTexto
  else
  if RadioGroup1.ItemIndex = 1 then
    PrimeiraMaiuscula
  else
  if RadioGroup1.ItemIndex = 2 then
    OrdemAlfabetica;
end;

procedure TFormExercicio2_ConversaoTexto.FormCreate(Sender: TObject);
begin
  inherited;
  ConvertePrimeiraMaiuscula := TConvertePrimeiraMaiuscula.Create;
  ConverteInvertido := TConverteInvertido.Create;
  ConverteOrdenado := TConverteOrdenado.Create;
end;

procedure TFormExercicio2_ConversaoTexto.FormDestroy(Sender: TObject);
begin
  inherited;
  ConvertePrimeiraMaiuscula.Destroy;
  ConverteInvertido.Destroy;
  ConverteOrdenado.Destroy;
end;

procedure TFormExercicio2_ConversaoTexto.InverterTexto;
begin
  ConverteInvertido.Texto := mmoTextoOriginal.Lines.Text;
  ConverteInvertido.QuantidadeLetras := 0;
  if Length(Trim(edtQuantidadeLetras.Text)) > 0 then
    ConverteInvertido.QuantidadeLetras := StrToInt(edtQuantidadeLetras.Text);
  mmoTextoConvertido.Lines.Clear;
  mmoTextoConvertido.Lines.Add(ConverteInvertido.Converter);
end;

procedure TFormExercicio2_ConversaoTexto.OrdemAlfabetica;
begin
  ConverteOrdenado.Texto := mmoTextoOriginal.Lines.Text;
  ConverteOrdenado.QuantidadeLetras := 0;
  if Length(Trim(edtQuantidadeLetras.Text)) > 0 then
    ConverteOrdenado.QuantidadeLetras := StrToInt(edtQuantidadeLetras.Text);
  mmoTextoConvertido.Lines.Clear;
  mmoTextoConvertido.Lines.Add(ConverteOrdenado.Converter);
end;

procedure TFormExercicio2_ConversaoTexto.PrimeiraMaiuscula;
begin
  ConvertePrimeiraMaiuscula.Texto := mmoTextoOriginal.Lines.Text;
  ConvertePrimeiraMaiuscula.QuantidadeLetras := 0;
  if Length(Trim(edtQuantidadeLetras.Text)) > 0 then
    ConvertePrimeiraMaiuscula.QuantidadeLetras := StrToInt(edtQuantidadeLetras.Text);
  mmoTextoConvertido.Lines.Clear;
  mmoTextoConvertido.Lines.Add(ConvertePrimeiraMaiuscula.Converter);
end;

end.
