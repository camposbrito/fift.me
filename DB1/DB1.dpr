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
  FExercicio1_CadastroNomesArrays in 'FExercicio1_CadastroNomesArrays.pas' {FormExercicio1_CadastroNomesArrays};

{$R *.RES}

begin
  Application.Initialize;
  Application.CreateForm(TFormPrincipal, FormPrincipal);
  Application.CreateForm(TFormExercicio1_CadastroNomesArrays, FormExercicio1_CadastroNomesArrays);
  Application.Run;
end.
