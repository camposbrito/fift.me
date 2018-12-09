object FormExercicio4_Componentes: TFormExercicio4_Componentes
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 4 - Cria'#231#227'o de Componentes'
  ClientHeight = 406
  ClientWidth = 713
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  DesignSize = (
    713
    406)
  PixelsPerInch = 96
  TextHeight = 13
  object GroupBox1: TGroupBox
    Left = 8
    Top = 8
    Width = 258
    Height = 391
    Anchors = [akLeft, akTop, akBottom]
    Caption = 'Gera'#231#227'o da Consulta: '
    TabOrder = 0
    DesignSize = (
      258
      391)
    object Label1: TLabel
      Left = 16
      Top = 15
      Width = 45
      Height = 13
      Caption = 'Campos: '
    end
    object lblTabelas: TLabel
      Left = 16
      Top = 128
      Width = 41
      Height = 13
      Caption = 'Tabelas:'
    end
    object Label3: TLabel
      Left = 16
      Top = 233
      Width = 56
      Height = 13
      Caption = 'Condi'#231#245'es: '
    end
    object mmoCampos: TMemo
      Left = 11
      Top = 32
      Width = 238
      Height = 89
      Anchors = [akLeft, akTop, akRight]
      TabOrder = 0
    end
    object mmoTabelas: TMemo
      Left = 11
      Top = 144
      Width = 238
      Height = 89
      Anchors = [akLeft, akTop, akRight]
      TabOrder = 1
    end
    object mmoCondicoes: TMemo
      Left = 11
      Top = 249
      Width = 238
      Height = 89
      Anchors = [akLeft, akTop, akRight]
      TabOrder = 2
    end
    object Button1: TButton
      Left = 56
      Top = 352
      Width = 137
      Height = 25
      Caption = 'Consultar'
      TabOrder = 3
      OnClick = Button1Click
    end
  end
  object GroupBox2: TGroupBox
    Left = 272
    Top = 8
    Width = 433
    Height = 391
    Anchors = [akLeft, akTop, akRight, akBottom]
    Caption = 'Resultado: '
    TabOrder = 1
    object DBGrid1: TDBGrid
      Left = 2
      Top = 15
      Width = 429
      Height = 374
      Align = alClient
      DataSource = dsConsulta
      TabOrder = 0
      TitleFont.Charset = DEFAULT_CHARSET
      TitleFont.Color = clWindowText
      TitleFont.Height = -11
      TitleFont.Name = 'Tahoma'
      TitleFont.Style = []
    end
  end
  object db1Consulta: TDB1Data
    SchemaName = 'sysdba'
    DbxCommandType = 'Dbx.SQL'
    MaxBlobSize = -1
    Params = <>
    SQLConnection = dmBanco.connDB1
    Left = 112
    Top = 8
  end
  object dsConsulta: TDataSource
    DataSet = cdsConsulta
    Left = 184
    Top = 8
  end
  object cdsConsulta: TClientDataSet
    Aggregates = <>
    Params = <>
    ProviderName = 'dspConsulta'
    Left = 296
    Top = 8
  end
  object dspConsulta: TDataSetProvider
    DataSet = db1Consulta
    Options = [poReadOnly, poAllowCommandText, poUseQuoteChar]
    UpdateMode = upWhereChanged
    Left = 256
    Top = 8
  end
end
