program Commander;

uses
  Forms,
  frmFormPrincipal in 'frmFormPrincipal.pas' {FormPrincipal},
  RunElevatedSupport in 'RunElevatedSupport.pas';

{$R *.res}

begin
  Application.Initialize;
  Application.MainFormOnTaskbar := True;
  Application.Title := 'Gerenciador de Comandos SGE ';
  Application.CreateForm(TFormPrincipal, FormPrincipal);
  Application.Run;
end.
