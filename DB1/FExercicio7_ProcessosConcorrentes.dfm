object FormExercicio7_ProcessosConcorrentes: TFormExercicio7_ProcessosConcorrentes
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 7 - Processos concorrentes'
  ClientHeight = 160
  ClientWidth = 519
  Color = clBtnFace
  Constraints.MaxHeight = 199
  Constraints.MaxWidth = 535
  Constraints.MinHeight = 199
  Constraints.MinWidth = 535
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  FormStyle = fsMDIChild
  OldCreateOrder = False
  Visible = True
  OnClose = FormClose
  PixelsPerInch = 96
  TextHeight = 13
  object pnlProgresso: TPanel
    Left = 0
    Top = 0
    Width = 519
    Height = 120
    Align = alClient
    TabOrder = 0
    object gThread1: TGauge
      Left = 16
      Top = 32
      Width = 410
      Height = 21
      Progress = 0
    end
    object lblThread1: TLabel
      Left = 16
      Top = 16
      Width = 50
      Height = 13
      Caption = 'Thread 1: '
    end
    object gThread2: TGauge
      Left = 16
      Top = 72
      Width = 410
      Height = 21
      Progress = 0
    end
    object lblThread2: TLabel
      Left = 16
      Top = 56
      Width = 50
      Height = 13
      Caption = 'Thread 2: '
    end
    object edtSleep1: TLabeledEdit
      Left = 432
      Top = 32
      Width = 73
      Height = 21
      EditLabel.Width = 54
      EditLabel.Height = 13
      EditLabel.Caption = 'Sleep (ms):'
      TabOrder = 0
    end
    object edtSleep2: TLabeledEdit
      Left = 432
      Top = 72
      Width = 73
      Height = 21
      EditLabel.Width = 54
      EditLabel.Height = 13
      EditLabel.Caption = 'Sleep (ms):'
      TabOrder = 1
    end
  end
  object pnlBotoes: TPanel
    Left = 0
    Top = 120
    Width = 519
    Height = 40
    Align = alBottom
    TabOrder = 1
    object btnExecutar: TButton
      Left = 168
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Executar'
      TabOrder = 0
      OnClick = btnExecutarClick
    end
    object btnSair: TButton
      Left = 272
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Sair'
      TabOrder = 1
      OnClick = btnSairClick
    end
  end
end
