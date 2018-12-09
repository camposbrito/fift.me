object FormExercicio6_UtilizacaoBibliotecasDinamicas: TFormExercicio6_UtilizacaoBibliotecasDinamicas
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 6 - Utiliza'#231#227'o de bibliotecas din'#226'micas'
  ClientHeight = 113
  ClientWidth = 676
  Color = clBtnFace
  Constraints.MaxHeight = 152
  Constraints.MaxWidth = 692
  Constraints.MinHeight = 152
  Constraints.MinWidth = 692
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object grpQuadrado: TGroupBox
    Left = 0
    Top = 0
    Width = 676
    Height = 57
    Align = alTop
    Caption = ' Quadrado: '
    TabOrder = 0
    object edtLado: TLabeledEdit
      Left = 64
      Top = 18
      Width = 121
      Height = 21
      EditLabel.Width = 30
      EditLabel.Height = 13
      EditLabel.Caption = 'Lado: '
      LabelPosition = lpLeft
      NumbersOnly = True
      TabOrder = 0
    end
    object rdgCalculoQuadrado: TRadioGroup
      Left = 201
      Top = 8
      Width = 185
      Height = 41
      Caption = ' C'#225'lculo: '
      Columns = 2
      Items.Strings = (
        #193'rea'
        'Per'#237'metro')
      TabOrder = 1
    end
    object btnCalcularQuadrado: TButton
      Left = 407
      Top = 16
      Width = 75
      Height = 25
      Caption = 'Calcular'
      TabOrder = 2
      OnClick = btnCalcularQuadradoClick
    end
    object edtResultadoQuadrado: TLabeledEdit
      Left = 544
      Top = 18
      Width = 121
      Height = 21
      EditLabel.Width = 55
      EditLabel.Height = 13
      EditLabel.Caption = 'Resultado: '
      LabelPosition = lpLeft
      NumbersOnly = True
      TabOrder = 3
    end
  end
  object grpCirculo: TGroupBox
    Left = 0
    Top = 57
    Width = 676
    Height = 57
    Align = alTop
    Caption = 'C'#237'rculo: '
    TabOrder = 1
    object edtRaio: TLabeledEdit
      Left = 64
      Top = 18
      Width = 121
      Height = 21
      EditLabel.Width = 31
      EditLabel.Height = 13
      EditLabel.Caption = ' R'#225'io: '
      LabelPosition = lpLeft
      NumbersOnly = True
      TabOrder = 0
    end
    object rdgCalculoCirculo: TRadioGroup
      Left = 201
      Top = 8
      Width = 185
      Height = 41
      Caption = ' C'#225'lculo: '
      Columns = 2
      Items.Strings = (
        #193'rea'
        'Per'#237'metro')
      TabOrder = 1
    end
    object btnCalcularCirculo: TButton
      Left = 407
      Top = 16
      Width = 75
      Height = 25
      Caption = 'Calcular'
      TabOrder = 2
      OnClick = btnCalcularCirculoClick
    end
    object edtResultadoCirculo: TLabeledEdit
      Left = 544
      Top = 18
      Width = 121
      Height = 21
      EditLabel.Width = 55
      EditLabel.Height = 13
      EditLabel.Caption = 'Resultado: '
      LabelPosition = lpLeft
      NumbersOnly = True
      TabOrder = 3
    end
  end
end
