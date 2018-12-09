object FormPrincipal: TFormPrincipal
  Left = 194
  Top = 111
  Caption = 'Avalia'#231#227'o T'#233'cnica DB1 - Rodrigo de Campos Brito'
  ClientHeight = 408
  ClientWidth = 856
  Color = clWindow
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clBlack
  Font.Height = -11
  Font.Name = 'Default'
  Font.Style = []
  FormStyle = fsMDIForm
  Menu = MainMenu1
  OldCreateOrder = False
  Position = poDefault
  WindowState = wsMaximized
  PixelsPerInch = 96
  TextHeight = 13
  object StatusBar: TStatusBar
    Left = 0
    Top = 389
    Width = 856
    Height = 19
    Margins.Left = 2
    Margins.Top = 2
    Margins.Right = 2
    Margins.Bottom = 2
    AutoHint = True
    Panels = <>
    SimplePanel = True
  end
  object MainMenu1: TMainMenu
    Left = 16
    Top = 8
    object Exerccios1: TMenuItem
      Caption = '&Exerc'#237'cios'
      object Exerccio1Cadastrodenomescomarraydinmico1: TMenuItem
        Action = actExerc1
      end
      object Exerccio2Classesdeconversodetexto1: TMenuItem
        Action = actExerc2
      end
      object Exerccio3Formulriodecadastrodepessoas1: TMenuItem
        Action = actExerc3
      end
      object Exerccio4Componenteparaconsultadedados1: TMenuItem
        Action = actExerc4
      end
      object Exerccio5Criaodearquivos1: TMenuItem
        Action = actExerc5
      end
      object Exerccio6Utilizaodebibliotecasdinmicas1: TMenuItem
        Action = actExerc6
      end
      object Exerccio7Processosconcorrentes1: TMenuItem
        Action = actExerc7
      end
      object N1: TMenuItem
        Caption = '-'
      end
      object FileExitItem: TMenuItem
        Caption = '&Sair'
        Hint = 'Exit|Exit application'
        OnClick = FileExitItemClick
      end
    end
  end
  object ActionList1: TActionList
    Left = 48
    Top = 8
    object actExerc1: TAction
      Caption = 'Exerc'#237'cio 1 - Trabalhando com arrays'
      OnExecute = actExerc1Execute
    end
    object actExerc2: TAction
      Caption = 'Exerc'#237'cio 2 - Classes de convers'#227'o de texto'
      OnExecute = actExerc2Execute
    end
    object actExerc3: TAction
      Caption = 'Exerc'#237'cio 3 - Formul'#225'rio de cadastro de pessoas'
      OnExecute = actExerc3Execute
    end
    object actExerc4: TAction
      Caption = 'Exerc'#237'cio 4 - Componente para consulta de dados'
      OnExecute = actExerc4Execute
    end
    object actExerc5: TAction
      Caption = 'Exerc'#237'cio 5 - Cria'#231#227'o de arquivos'
      OnExecute = actExerc5Execute
    end
    object actExerc6: TAction
      Caption = 'Exerc'#237'cio 6 - Utiliza'#231#227'o de bibliotecas din'#226'micas'
      OnExecute = actExerc6Execute
    end
    object actExerc7: TAction
      Caption = 'Exerc'#237'cio 7 - Processos concorrentes'
      OnExecute = actExerc7Execute
    end
  end
end
