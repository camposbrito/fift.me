unit FExercicio6_UtilizacaoBibliotecasDinamicas;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls, StrUtils ;

type
  TFormExercicio6_UtilizacaoBibliotecasDinamicas = class(TFormExercicio_base)
    grpQuadrado: TGroupBox;
    edtLado: TLabeledEdit;
    rdgCalculoQuadrado: TRadioGroup;
    btnCalcularQuadrado: TButton;
    edtResultadoQuadrado: TLabeledEdit;
    grpCirculo: TGroupBox;
    edtRaio: TLabeledEdit;
    rdgCalculoCirculo: TRadioGroup;
    btnCalcularCirculo: TButton;
    edtResultadoCirculo: TLabeledEdit;
    procedure btnCalcularQuadradoClick(Sender: TObject);
    procedure btnCalcularCirculoClick(Sender: TObject);
  private
    function CarregarDLL(NomeArquivo, NomeFuncao: String;
      AParams: array of Variant; AObjetos: array of TObject): Variant;
    { Private declarations }
  public
    { Public declarations }
  end;

  TFuncCarregarDLL = function(AParams: array of Variant; AObjetos: array of TObject): Variant;
var
  FormExercicio6_UtilizacaoBibliotecasDinamicas: TFormExercicio6_UtilizacaoBibliotecasDinamicas;

implementation

{$R *.dfm}
procedure TFormExercicio6_UtilizacaoBibliotecasDinamicas.btnCalcularQuadradoClick(
  Sender: TObject);
var
  TipoCalculo: string;
begin
  inherited;
  TipoCalculo := IfThen(rdgCalculoQuadrado.ItemIndex = 0, 'A', IfThen(rdgCalculoQuadrado.ItemIndex = 1, 'P', ''));
  edtResultadoQuadrado.Text := CarregarDLL('DB1FigurasGeometricas.dll','Calcular',['Q', TipoCalculo, StrToIntDef(edtLado.Text, 0)],[]);
end;

procedure TFormExercicio6_UtilizacaoBibliotecasDinamicas.btnCalcularCirculoClick(
  Sender: TObject);
var
  TipoCalculo: string;
begin
  inherited;
  TipoCalculo := IfThen(rdgCalculoCirculo.ItemIndex = 0, 'A', IfThen(rdgCalculoCirculo.ItemIndex = 1, 'P', ''));
  edtResultadoCirculo.Text := CarregarDLL('DB1FigurasGeometricas.dll','Calcular',['C', TipoCalculo, StrToIntDef(edtRaio.Text, 0)],[]);
end;

function TFormExercicio6_UtilizacaoBibliotecasDinamicas.CarregarDLL(NomeArquivo, NomeFuncao: String;
  AParams: array of Variant; AObjetos: array of TObject): Variant;
var
  LibHandle: THandle;
  Func: TFuncCarregarDLL;

begin
  Result := Null;
  LibHandle := LoadLibrary(PChar(NomeArquivo));
  if LibHandle <> 0 then
    try
      @Func := GetProcAddress(LibHandle, PChar(NomeFuncao));
      if Assigned(Func) then
        begin
          try
            Result := Func(AParams, AObjetos);
          except
            on E: Exception do
              if E is EAbort then
                Abort
              else
                raise Exception.Create(E.Message);
          end;
        end
      else
        raise Exception.Create(
          'Erro ao carregar função.'#13 +
          'Erro n.º: ' + inttostr(GetLastError) + #13 +
          SysErrorMessage(GetLastError));
    finally
      FreeLibrary(LibHandle);
    end
  else
    raise Exception.Create(
      'Erro ao carregar ''' + NomeArquivo + '''.'#13 +
      'Erro n.º: ' + inttostr(GetLastError) + #13 +
      SysErrorMessage(GetLastError));
end;
end.
