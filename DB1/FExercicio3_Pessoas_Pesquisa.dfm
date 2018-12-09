object FormExercicio3_Pessoas_Pesquisa: TFormExercicio3_Pessoas_Pesquisa
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 3 - Formul'#225'rio de Pesquisa'
  ClientHeight = 274
  ClientWidth = 581
  Color = clBtnFace
  Constraints.MinHeight = 313
  Constraints.MinWidth = 597
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  Position = poMainFormCenter
  OnCreate = FormCreate
  OnShow = FormShow
  PixelsPerInch = 96
  TextHeight = 13
  object pnlBotoes: TPanel
    Left = 0
    Top = 233
    Width = 581
    Height = 41
    Align = alBottom
    TabOrder = 1
    object btnSelecionar: TButton
      Left = 18
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Selecionar'
      TabOrder = 0
      OnClick = btnSelecionarClick
    end
    object Cancelar: TButton
      Left = 114
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Cancelar'
      TabOrder = 1
      OnClick = CancelarClick
    end
  end
  object pnlTopo: TPanel
    Left = 0
    Top = 0
    Width = 581
    Height = 41
    Align = alTop
    TabOrder = 0
    object Label1: TLabel
      Left = 8
      Top = 14
      Width = 31
      Height = 13
      Caption = 'Nome:'
    end
    object btnPesquisar: TButton
      Left = 234
      Top = 9
      Width = 75
      Height = 25
      Caption = 'Pesquisar'
      TabOrder = 1
      OnClick = btnPesquisarClick
    end
    object Edit1: TEdit
      Left = 45
      Top = 11
      Width = 183
      Height = 21
      TabOrder = 0
      OnKeyDown = Edit1KeyDown
    end
  end
  object grdResultado: TDBGrid
    Left = 0
    Top = 41
    Width = 581
    Height = 192
    Align = alClient
    DataSource = dsPesquisa
    TabOrder = 2
    TitleFont.Charset = DEFAULT_CHARSET
    TitleFont.Color = clWindowText
    TitleFont.Height = -11
    TitleFont.Name = 'Tahoma'
    TitleFont.Style = []
    OnDblClick = grdResultadoDblClick
    Columns = <
      item
        Expanded = False
        FieldName = 'NMPESSOA'
        Title.Alignment = taCenter
        Visible = True
      end
      item
        Expanded = False
        FieldName = 'DELOGRADOURO'
        Title.Alignment = taCenter
        Visible = True
      end
      item
        Expanded = False
        FieldName = 'DEBAIRRO'
        Title.Alignment = taCenter
        Visible = True
      end
      item
        Expanded = False
        FieldName = 'NMCIDADE'
        Title.Alignment = taCenter
        Visible = True
      end
      item
        Expanded = False
        FieldName = 'UF'
        Title.Alignment = taCenter
        Visible = True
      end>
  end
  object qryPesquisa: TSQLDataSet
    SchemaName = 'sysdba'
    CommandText = 
      'SELECT  p.cdpessoa, '#13#10'              p.nmpessoa, '#13#10'              ' +
      'p.delogradouro, '#13#10'              p.debairro, '#13#10'              p.cd' +
      'cidade, '#13#10'              c.nmcidade,   '#13#10'              c.uf '#13#10'FRO' +
      'M    PESSOA p '#13#10'INNER JOIN Cidade c  ON c.cdcidade = p.cdcidade ' +
      #13#10'WHERE  p.nmpessoa containing  :nmpessoa'
    DbxCommandType = 'Dbx.SQL'
    MaxBlobSize = -1
    Params = <
      item
        DataType = ftString
        Name = 'nmpessoa'
        ParamType = ptInput
      end>
    SQLConnection = dmBanco.connDB1
    Left = 168
    Top = 145
  end
  object dsPesquisa: TDataSource
    DataSet = cdsPesquisa
    Left = 216
    Top = 144
  end
  object dspPesquisa: TDataSetProvider
    DataSet = qryPesquisa
    Options = [poReadOnly, poAllowCommandText, poUseQuoteChar]
    UpdateMode = upWhereChanged
    Left = 256
    Top = 144
  end
  object cdsPesquisa: TClientDataSet
    Aggregates = <>
    Params = <
      item
        DataType = ftString
        Name = 'nmpessoa'
        ParamType = ptInput
      end>
    ProviderName = 'dspPesquisa'
    Left = 296
    Top = 144
    object cdsPesquisaCDPESSOA: TIntegerField
      FieldName = 'CDPESSOA'
      ProviderFlags = [pfInUpdate, pfInWhere, pfInKey]
      Required = True
    end
    object cdsPesquisaNMPESSOA: TStringField
      DisplayLabel = 'Nome'
      DisplayWidth = 25
      FieldName = 'NMPESSOA'
      ProviderFlags = [pfInUpdate]
      Required = True
      Size = 100
    end
    object cdsPesquisaDELOGRADOURO: TStringField
      DisplayLabel = 'Logradouro'
      DisplayWidth = 20
      FieldName = 'DELOGRADOURO'
      ProviderFlags = [pfInUpdate]
      Size = 100
    end
    object cdsPesquisaDEBAIRRO: TStringField
      DisplayLabel = 'Bairro'
      DisplayWidth = 20
      FieldName = 'DEBAIRRO'
      ProviderFlags = [pfInUpdate]
      Size = 100
    end
    object cdsPesquisaCDCIDADE: TIntegerField
      DisplayLabel = 'Cidade'
      FieldName = 'CDCIDADE'
      ProviderFlags = [pfInUpdate]
      Required = True
    end
    object cdsPesquisaNMCIDADE: TStringField
      DisplayLabel = 'Cidade'
      DisplayWidth = 20
      FieldName = 'NMCIDADE'
      ProviderFlags = [pfInUpdate]
      Required = True
      Size = 100
    end
    object cdsPesquisaUF: TStringField
      FieldName = 'UF'
      ProviderFlags = [pfInUpdate]
      FixedChar = True
      Size = 2
    end
  end
end
