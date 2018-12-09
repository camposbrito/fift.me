object FormExercicio3_Cidades_Pesquisa: TFormExercicio3_Cidades_Pesquisa
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 3 - Formul'#225'rio de Pesquisa'
  ClientHeight = 251
  ClientWidth = 442
  Color = clBtnFace
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
    Top = 210
    Width = 442
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
    object btnCancelar: TButton
      Left = 114
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Cancelar'
      TabOrder = 1
      OnClick = btnCancelarClick
    end
  end
  object pnlTopo: TPanel
    Left = 0
    Top = 0
    Width = 442
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
    Width = 442
    Height = 169
    Align = alClient
    Constraints.MinHeight = 169
    Constraints.MinWidth = 442
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
        FieldName = 'CDCIDADE'
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
      'SELECT  c.cdCidade,'#13#10'              c.nmcidade,   '#13#10'             ' +
      ' c.uf '#13#10'FROM     Cidade c '#13#10'WHERE  c.nmcidade containing  :nmcid' +
      'ade'
    DbxCommandType = 'Dbx.SQL'
    MaxBlobSize = -1
    Params = <
      item
        DataType = ftInteger
        Name = 'nmcidade'
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
        DataType = ftInteger
        Name = 'nmcidade'
        ParamType = ptInput
      end>
    ProviderName = 'dspPesquisa'
    Left = 296
    Top = 144
    object cdsPesquisaCDCIDADE: TIntegerField
      DisplayLabel = 'Cidade'
      FieldName = 'CDCIDADE'
      ProviderFlags = [pfInUpdate, pfInWhere, pfInKey]
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
      FixedChar = True
      Size = 2
    end
  end
end
