unit FExercicio1_Arrays;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, FExercicio_Base, StdCtrls, ExtCtrls;

type
  TFormExercicio1_Arrays = class(TFormExercicio_base)
    grpInserir: TGroupBox;
    edtNome: TLabeledEdit;
    btnInserir: TButton;
    grpLista: TGroupBox;
    grpOperacoes: TGroupBox;
    btnRemoverPrimeiro: TButton;
    btnRemoverUltimo: TButton;
    btnContar: TButton;
    btnSair: TButton;
    btnExibir: TButton;
    lstNomes: TListBox;
    procedure btnInserirClick(Sender: TObject);
    procedure btnExibirClick(Sender: TObject);
    procedure btnRemoverPrimeiroClick(Sender: TObject);
    procedure btnRemoverUltimoClick(Sender: TObject);
    procedure btnContarClick(Sender: TObject);
    procedure btnSairClick(Sender: TObject);
    procedure edtNomeKeyDown(Sender: TObject; var Key: Word;
      Shift: TShiftState);
  private
    { Private declarations }
    aNomes: array of string;
    procedure PopularLista(str: String);
    procedure RemoverUltimo;
  public
    { Public declarations }
  end;

var
  FormExercicio1_Arrays: TFormExercicio1_Arrays;

implementation

{$R *.dfm}

procedure TFormExercicio1_Arrays.btnInserirClick(Sender: TObject);
begin
  inherited;
  PopularLista(edtNome.Text);
end;

procedure TFormExercicio1_Arrays.btnRemoverPrimeiroClick(Sender: TObject);
var
  i: Integer;
begin
  inherited;
  for i := Low(aNomes) to High(aNomes)  do
    aNomes[i] := aNomes[i+1];
  RemoverUltimo;
end;

procedure TFormExercicio1_Arrays.btnRemoverUltimoClick(Sender: TObject);
begin
  inherited;
  RemoverUltimo;
end;

procedure TFormExercicio1_Arrays.btnContarClick(Sender: TObject);
begin
  inherited;
  ShowMessage(format('Existe(m) %d nome(s) na lista',[Length(aNomes)]));
end;

procedure TFormExercicio1_Arrays.btnSairClick(Sender: TObject);
begin
  inherited;
  Close;
end;

procedure TFormExercicio1_Arrays.btnExibirClick(Sender: TObject);
var
  Lista: TStringList;
  i: Integer;
begin
  inherited;
  Lista := TStringList.Create;
  for i := Low(aNomes) to High(aNomes) do
    Lista.Add(aNomes[i]);
  Lista.Sort;
  lstNomes.Clear;
  lstNomes.Items.AddStrings(Lista);
end;

procedure TFormExercicio1_Arrays.edtNomeKeyDown(
  Sender: TObject; var Key: Word; Shift: TShiftState);
begin
  inherited;
  if key = 13 then
    PopularLista(edtNome.Text);
end;

procedure TFormExercicio1_Arrays.PopularLista(str: String);
begin
  if Trim(str) = '' then
    Exit;

  SetLength(aNomes, Length(aNomes) + 1);
  aNomes[Length(aNomes)-1] := str;
  edtNome.Clear;
  edtNome.SetFocus;
end;

procedure TFormExercicio1_Arrays.RemoverUltimo;
begin
  if Length(aNomes) > 0 then
    SetLength(aNomes, High(aNomes));
end;

end.
