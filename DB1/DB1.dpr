program DB1;

uses
  Forms,
  FPrincipal in 'FPrincipal.pas' {FormPrincipal},
  FExercicio_Base in 'FExercicio_Base.pas' {FormExercicio_base},
  FExercicio2_ConversaoTexto in 'FExercicio2_ConversaoTexto.pas' {FormExercicio2_ConversaoTexto},
  FExercicio3_Pessoas in 'FExercicio3_Pessoas.pas' {FormExercicio3_Pessoas},
  FExercicio3_Pessoas_Pesquisa in 'FExercicio3_Pessoas_Pesquisa.pas' {FormExercicio3_Pessoas_Pesquisa},
  FExercicio4_Componentes in 'FExercicio4_Componentes.pas' {FormExercicio4_Componentes},
  FExercicio5_Arquivos in 'FExercicio5_Arquivos.pas' {FormExercicio5_Arquivos},
  FExercicio6_UtilizacaoBibliotecasDinamicas in 'FExercicio6_UtilizacaoBibliotecasDinamicas.pas' {FormExercicio6_UtilizacaoBibliotecasDinamicas},
  FExercicio7_ProcessosConcorrentes in 'FExercicio7_ProcessosConcorrentes.pas' {FormExercicio7_ProcessosConcorrentes},
  FExercicio1_Arrays in 'FExercicio1_Arrays.pas' {FormExercicio1_Arrays},
  Conversao in 'Conversao.pas',
  ConverteTexto in 'ConverteTexto.pas',
  ConverteInvertido in 'ConverteInvertido.pas',
  ConvertePrimeiraMaiuscula in 'ConvertePrimeiraMaiuscula.pas',
  ConverteOrdenado in 'ConverteOrdenado.pas',
  uBanco in 'uBanco.pas' {dmBanco: TDataModule},
  FExercicio3_Cidades_Pesquisa in 'FExercicio3_Cidades_Pesquisa.pas' {FormExercicio3_Cidades_Pesquisa};

{$R *.RES}

begin
  Application.Initialize;
  Application.CreateForm(TdmBanco, dmBanco);
  Application.CreateForm(TFormPrincipal, FormPrincipal);
  Application.Run;
end.
