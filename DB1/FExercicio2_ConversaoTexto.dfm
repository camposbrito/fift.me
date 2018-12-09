object FormExercicio2_ConversaoTexto: TFormExercicio2_ConversaoTexto
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 2 - Classes de convers'#227'o de texto'
  ClientHeight = 268
  ClientWidth = 821
  Color = clBtnFace
  Constraints.MinHeight = 307
  Constraints.MinWidth = 837
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  FormStyle = fsMDIChild
  OldCreateOrder = False
  Visible = True
  OnCreate = FormCreate
  OnDestroy = FormDestroy
  DesignSize = (
    821
    268)
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 8
    Top = 8
    Width = 74
    Height = 13
    Caption = 'Texto Original: '
  end
  object Label2: TLabel
    Left = 532
    Top = 8
    Width = 91
    Height = 13
    Caption = 'Texto Convertido: '
  end
  object lbl1: TLabel
    Left = 301
    Top = 188
    Width = 108
    Height = 13
    Caption = 'Quantidade de Letras:'
  end
  object mmoTextoOriginal: TMemo
    Left = 8
    Top = 24
    Width = 281
    Height = 236
    Anchors = [akLeft, akTop, akBottom]
    TabOrder = 0
  end
  object mmoTextoConvertido: TMemo
    Left = 532
    Top = 24
    Width = 281
    Height = 236
    Anchors = [akLeft, akTop, akBottom]
    TabOrder = 1
  end
  object edtQuantidadeLetras: TEdit
    Left = 301
    Top = 207
    Width = 222
    Height = 21
    NumbersOnly = True
    TabOrder = 2
  end
  object Button1: TButton
    Left = 301
    Top = 234
    Width = 222
    Height = 25
    Caption = 'Converter'
    TabOrder = 3
    OnClick = Button1Click
  end
  object RadioGroup1: TRadioGroup
    Left = 301
    Top = 24
    Width = 222
    Height = 145
    Caption = ' Op'#231#245'es de Convers'#227'o: '
    Items.Strings = (
      'Invertido'
      'Primeira mai'#250'scula'
      'Ordem Alfab'#233'tica')
    TabOrder = 4
  end
end
