program CCU;





uses
  Forms,
  uFrmCCU in 'uFrmCCU.pas' {frmCCU},
  Funcoes in 'Funcoes.pas',
  FExportaExcel in 'FExportaExcel.pas' {FormExportaExcel};
 {$R *.RES}
begin

  Application.Initialize;
  Application.Title := 'Gerenciador de CCU';
  Application.HelpFile := 'C:\Rodrigo\Files\Gerenciador de CCU\CCU.hlp';
  Application.ProcessMessages;
  Application.CreateForm(TfrmCCU, frmCCU);
  Application.CreateForm(TFormExportaExcel, FormExportaExcel);
  Application.Run;
end.
