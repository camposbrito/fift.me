object FormExercicio5_Arquivos: TFormExercicio5_Arquivos
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 5 - Cria'#231#227'o de arquivos'
  ClientHeight = 91
  ClientWidth = 621
  Color = clBtnFace
  Constraints.MinHeight = 130
  Constraints.MinWidth = 637
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  OnCreate = FormCreate
  PixelsPerInch = 96
  TextHeight = 13
  object Panel1: TPanel
    Left = 0
    Top = 0
    Width = 621
    Height = 50
    Align = alClient
    TabOrder = 0
    object Label1: TLabel
      Left = 16
      Top = 18
      Width = 85
      Height = 13
      Caption = 'Local do arquivo: '
    end
    object Edit1: TEdit
      Left = 104
      Top = 15
      Width = 425
      Height = 21
      TabOrder = 0
    end
    object Button1: TButton
      Left = 535
      Top = 13
      Width = 75
      Height = 25
      Caption = 'Selecionar'
      TabOrder = 1
      OnClick = Button1Click
    end
  end
  object Panel2: TPanel
    Left = 0
    Top = 50
    Width = 621
    Height = 41
    Align = alBottom
    TabOrder = 1
    object Button2: TButton
      Left = 231
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Salvar'
      TabOrder = 0
      OnClick = Button2Click
    end
    object Button3: TButton
      Left = 312
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Sair'
      TabOrder = 1
      OnClick = Button3Click
    end
  end
  object db1Consulta: TSQLDataSet
    SchemaName = 'sysdba'
    CommandText = 
      'SELECT  FIRST 100'#13#10'              p.nmpessoa,'#13#10'              c.nm' +
      'cidade,'#13#10'              c.uf'#13#10'FROM    PESSOA p '#13#10'INNER JOIN Cidad' +
      'e c  ON c.cdcidade = p.cdcidade'#13#10'ORDER BY  p.nmpessoa'
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
  object dspConsulta: TDataSetProvider
    DataSet = db1Consulta
    Options = [poReadOnly, poAllowCommandText, poUseQuoteChar]
    UpdateMode = upWhereChanged
    Left = 256
    Top = 8
  end
  object cdsConsulta: TClientDataSet
    Aggregates = <>
    Params = <>
    ProviderName = 'dspConsulta'
    Left = 296
    Top = 8
    object cdsConsultaNMPESSOA: TStringField
      FieldName = 'NMPESSOA'
      Required = True
      Size = 100
    end
    object cdsConsultaNMCIDADE: TStringField
      FieldName = 'NMCIDADE'
      Required = True
      Size = 100
    end
    object cdsConsultaUF: TStringField
      FieldName = 'UF'
      FixedChar = True
      Size = 2
    end
  end
  object OpenTextFileDialog1: TOpenTextFileDialog
    DefaultExt = '*.txt'
    Filter = 'Arquivo de Texto|*.txt'
    Encodings.Strings = (
      'ANSI')
    Left = 568
    Top = 40
  end
end
