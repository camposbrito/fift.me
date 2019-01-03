unit FExportaExcel;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, Buttons, StdCtrls, ExtCtrls;

type
  TFormExportaExcel = class(TForm)
    Panel1: TPanel;
    Ckb1: TCheckBox;
    Ckb3: TCheckBox;
    Ckb2: TCheckBox;
    Ckb6: TCheckBox;
    Ckb5: TCheckBox;
    Ckb4: TCheckBox;
    Ckb9: TCheckBox;
    Ckb8: TCheckBox;
    Ckb7: TCheckBox;
    Ckb11: TCheckBox;
    Ckb10: TCheckBox;
    SpeedButton2: TSpeedButton;
    edtAno: TEdit;
    procedure SpeedButton2Click(Sender: TObject);
  private
   XLApplication, WorkSheets: Variant;
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FormExportaExcel: TFormExportaExcel;

implementation

uses uFrmCCu, ComObj;

{$R *.dfm}

procedure TFormExportaExcel.SpeedButton2Click(Sender: TObject);
var
  Sheet: Variant;
  j,i,k,l: integer;

  Fields, Tipo: array[1..13] of String;
  Exportar: array[1..13] of Boolean;
begin

  Fields[1]  := 'Dia';
  Fields[2]  := 'HoraInicial';
  Fields[3]  := 'HoraFinal';
  Fields[4]  := 'Total';
  Fields[5]  := 'CodCCU';
  Fields[6]  := 'CodRT';
  Fields[7]  := 'CodAtividade';
  Fields[8]  := 'Solicitante';
  Fields[9]  := 'TelaProcedimento';
  Fields[10] := 'Solicitacao';
  Fields[11] := 'Solucao';
  Fields[12] := 'Cod';   //Não Precisa
  Fields[13] := 'CodDia'; //Não Precisa

  Tipo[1]  := '@';
  Tipo[2]  := '@';
  Tipo[3]  := '@';
  Tipo[4]  := '@';
  Tipo[5]  := '@';
  Tipo[6]  := '@';
  Tipo[7]  := '@';
  Tipo[8]  := '@';
  Tipo[9]  := '@';
  Tipo[10] := '@';
  Tipo[11] := '@';
  Tipo[12] := '@';
  Tipo[13] := '@';

  Exportar[1]  := ckb1.checked;
  Exportar[2]  := ckb2.checked;
  Exportar[3]  := ckb3.checked;
  Exportar[4]  := ckb4.checked;
  Exportar[5]  := ckb5.checked;
  Exportar[6]  := ckb6.checked;
  Exportar[7]  := ckb7.checked;
  Exportar[8]  := ckb8.checked;
  Exportar[9]  := ckb9.checked;
  Exportar[10] := ckb10.checked;
  Exportar[11] := ckb11.checked;
  Exportar[12] := true;
  Exportar[13] := true;

  XLApplication := CreateOleObject('Excel.Application');
  XLApplication.Workbooks.Add;
  XLApplication.DisplayAlerts := False;
  XLApplication.Workbooks[1].WorkSheets[1].Name := 'CCU';
  Sheet := XLApplication.Workbooks[1].WorkSheets['CCU'];

  XLApplication.Visible := True;
  frmCCU.cdsCCU.First;
  frmCCU.cdsCCU.Filtered := False;
  l:=1;
  while not frmCCU.cdsCCU.Eof do
  begin
    j := 0;
    for i := 1 to frmCCU.cdsCCU.Fields.Count -1  do
    begin
      if Exportar[i] then
      begin
        inc(j);
        Sheet.Cells[l,j].NumberFormat := Tipo[i];
        if i in [2,3] then
          Sheet.Cells[l,j] := frmCCU.cdsCCU.Fields.FieldByName(Fields[i]).Value
        else
        if i in [1] then
          Sheet.Cells[l,j] := frmCCU.cdsCCU.Fields.FieldByName(Fields[i]).Value + '/' + edtAno.Text
        else
          Sheet.Cells[l,j] := frmCCU.cdsCCU.Fields.FieldByName(Fields[i]).Value
      end;
    end;
    inc(l);
    frmCCU.cdsCCU.Next;
  end;






  Close;
end;

end.
