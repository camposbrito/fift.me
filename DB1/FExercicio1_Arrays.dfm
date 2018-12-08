object FormExercicio1_Arrays: TFormExercicio1_Arrays
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 1 - Trabalhando com arrays'
  ClientHeight = 255
  ClientWidth = 655
  Color = clBtnFace
  Constraints.MinHeight = 294
  Constraints.MinWidth = 671
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  FormStyle = fsMDIChild
  OldCreateOrder = False
  Position = poMainFormCenter
  Visible = True
  DesignSize = (
    655
    255)
  PixelsPerInch = 96
  TextHeight = 13
  object grpInserir: TGroupBox
    Left = 8
    Top = 8
    Width = 353
    Height = 65
    Anchors = [akLeft, akTop, akRight]
    Caption = ' Inserir nomes: '
    TabOrder = 0
    DesignSize = (
      353
      65)
    object edtNome: TLabeledEdit
      Left = 56
      Top = 32
      Width = 202
      Height = 21
      Anchors = [akLeft, akTop, akRight]
      EditLabel.Width = 31
      EditLabel.Height = 13
      EditLabel.Caption = 'Nome:'
      LabelPosition = lpLeft
      TabOrder = 0
      OnKeyDown = edtNomeKeyDown
    end
    object btnInserir: TButton
      Left = 264
      Top = 30
      Width = 75
      Height = 25
      Anchors = [akTop, akRight]
      Caption = '&Inserir'
      TabOrder = 1
      OnClick = btnInserirClick
    end
  end
  object grpLista: TGroupBox
    Left = 367
    Top = 8
    Width = 280
    Height = 239
    Anchors = [akTop, akRight, akBottom]
    Caption = ' Lista de nomes: '
    TabOrder = 1
    ExplicitHeight = 246
    DesignSize = (
      280
      239)
    object btnExibir: TButton
      Left = 24
      Top = 30
      Width = 233
      Height = 25
      Caption = '&Exibir nomes'
      Constraints.MinHeight = 25
      Constraints.MinWidth = 233
      TabOrder = 0
      OnClick = btnExibirClick
    end
    object lstNomes: TListBox
      Left = 24
      Top = 61
      Width = 233
      Height = 158
      Anchors = [akLeft, akTop, akBottom]
      ItemHeight = 13
      TabOrder = 1
    end
  end
  object grpOperacoes: TGroupBox
    Left = 8
    Top = 79
    Width = 353
    Height = 168
    Anchors = [akLeft, akTop, akRight, akBottom]
    Caption = ' Opera'#231#245'es: '
    TabOrder = 2
    ExplicitHeight = 175
    DesignSize = (
      353
      168)
    object btnRemoverPrimeiro: TButton
      Left = 48
      Top = 30
      Width = 257
      Height = 25
      Anchors = [akLeft, akTop, akRight]
      Caption = 'Remover &primeiro inserido'
      TabOrder = 0
      OnClick = btnRemoverPrimeiroClick
    end
    object btnRemoverUltimo: TButton
      Left = 48
      Top = 61
      Width = 257
      Height = 25
      Anchors = [akLeft, akTop, akRight]
      Caption = 'Remover &'#250'ltimo inserido'
      TabOrder = 1
      OnClick = btnRemoverUltimoClick
    end
    object btnContar: TButton
      Left = 48
      Top = 92
      Width = 257
      Height = 25
      Anchors = [akLeft, akTop, akRight]
      Caption = '&Contar nomes'
      TabOrder = 2
      OnClick = btnContarClick
    end
    object btnSair: TButton
      Left = 48
      Top = 123
      Width = 257
      Height = 25
      Anchors = [akLeft, akTop, akRight]
      Caption = '&Sair'
      TabOrder = 3
      OnClick = btnSairClick
    end
  end
end
