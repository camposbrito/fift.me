object FormExportaExcel: TFormExportaExcel
  Left = 0
  Top = 0
  BorderIcons = [biSystemMenu]
  Caption = 'Exportar para Excel'
  ClientHeight = 257
  ClientWidth = 138
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Panel1: TPanel
    Left = 0
    Top = 0
    Width = 138
    Height = 257
    Align = alClient
    BevelInner = bvRaised
    BevelOuter = bvLowered
    TabOrder = 0
    ExplicitWidth = 134
    ExplicitHeight = 244
    object SpeedButton2: TSpeedButton
      Left = 16
      Top = 187
      Width = 105
      Height = 45
      Caption = '&Exportar xls'
      Flat = True
      Glyph.Data = {
        D6010000424DD60100000000000076000000280000001E000000160000000100
        04000000000060010000C30E0000C30E00001000000000000000000000000000
        8000008000000080800080000000800080008080000080808000C0C0C0000000
        FF0000FF000000FFFF00FF000000FF00FF00FFFF0000FFFFFF00F77777777777
        77777777777777777F0077FFFFFFFFFFFFFFFFFFFFFFFFFF77007FF888888888
        888888888888888FF7007F88888888888888888888888888F7007F8888888777
        7777777778888888F7007F88888878F88888888878888888F7007F8888887844
        4444448878888888F7007F8888887848888F848878888888F7007F8888887848
        8899848878888888F7007F888888884F9999F48878888888F7007F8888888849
        9FF9948878888888F7007F888888884FF888978878888888F7007FFFFFFF8F4F
        FFFF99887FFFFFFFF7007FFFFFFF8F44444449987FFFFFFFF7007FFFFFFF8FFF
        FFFFF7999FFFFFFFF7007FFFFFFF8FFFFFFFF7889FFFFFFFF7007FFFFFFF8FFF
        FFFFF788FFFFFFFFF7007FFFFFFF8FFFFFFFF78FFFFFFFFFF7007FFFFFFF8888
        888887FFFFFFFFFFF7007FFFFFFFFFFFFFFFFFFFFFFFFFFFF70077FFFFFFFFFF
        FFFFFFFFFFFFFFFF7700F7777777777777777777777777777F00}
      Margin = 0
      OnClick = SpeedButton2Click
    end
    object Ckb1: TCheckBox
      Left = 16
      Top = 8
      Width = 97
      Height = 17
      Caption = 'Data dd/mm'
      TabOrder = 0
    end
    object Ckb3: TCheckBox
      Left = 16
      Top = 39
      Width = 97
      Height = 17
      Caption = 'Hora Final'
      TabOrder = 1
    end
    object Ckb2: TCheckBox
      Left = 16
      Top = 24
      Width = 97
      Height = 17
      Caption = 'Hora Inicial'
      TabOrder = 2
    end
    object Ckb9: TCheckBox
      Left = 16
      Top = 133
      Width = 122
      Height = 17
      Caption = 'Tela/Procedimento'
      TabOrder = 3
    end
    object Ckb8: TCheckBox
      Left = 16
      Top = 118
      Width = 97
      Height = 17
      Caption = 'Solicitante'
      TabOrder = 4
    end
    object Ckb7: TCheckBox
      Left = 16
      Top = 102
      Width = 97
      Height = 17
      Caption = 'C'#243'd. Atividade'
      TabOrder = 5
    end
    object Ckb11: TCheckBox
      Left = 16
      Top = 164
      Width = 97
      Height = 17
      Caption = 'Solu'#231#227'o'
      TabOrder = 6
    end
    object Ckb10: TCheckBox
      Left = 16
      Top = 149
      Width = 97
      Height = 17
      Caption = 'Solicita'#231#227'o'
      TabOrder = 7
    end
  end
  object Ckb6: TCheckBox
    Left = 16
    Top = 87
    Width = 97
    Height = 17
    Caption = 'Id. RT'
    Checked = True
    State = cbChecked
    TabOrder = 1
  end
  object Ckb5: TCheckBox
    Left = 16
    Top = 72
    Width = 97
    Height = 17
    Caption = 'C'#243'd. Projeto'
    Checked = True
    State = cbChecked
    TabOrder = 2
  end
  object Ckb4: TCheckBox
    Left = 16
    Top = 56
    Width = 97
    Height = 17
    Caption = 'Hora Total'
    TabOrder = 3
  end
end
