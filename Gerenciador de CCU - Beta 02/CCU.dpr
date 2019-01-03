program CCU;





uses
  Forms,
  uFrmCCU in 'uFrmCCU.pas' {frmCCU},
  Funcoes in 'Funcoes.pas',
  FExportaExcel in 'FExportaExcel.pas' {FormExportaExcel};

begin

  Application.Initialize;
  Application.Title := 'Gerenciador de CCU';
  Application.HelpFile := '';
//  Application.Icon.Handle := LoadIcon(HInstance, 'GifImage_1');
  Application.ProcessMessages;
  Application.CreateForm(TfrmCCU, frmCCU);
  Application.CreateForm(TFormExportaExcel, FormExportaExcel);
  Application.Run;
end.
