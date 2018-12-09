object FormExercicio3_Pessoas: TFormExercicio3_Pessoas
  Left = 0
  Top = 0
  Caption = 'Exerc'#237'cio 3 - Tela de Cadastro'
  ClientHeight = 197
  ClientWidth = 537
  Color = clBtnFace
  Constraints.MinHeight = 236
  Constraints.MinWidth = 553
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  OnCreate = FormCreate
  DesignSize = (
    537
    197)
  PixelsPerInch = 96
  TextHeight = 13
  object grpCadastro: TGroupBox
    Left = 8
    Top = 8
    Width = 521
    Height = 181
    Anchors = [akLeft, akTop, akRight, akBottom]
    Caption = ' Cadastro de Pessoas: '
    TabOrder = 0
    ExplicitWidth = 876
    ExplicitHeight = 504
    DesignSize = (
      521
      181)
    object Label1: TLabel
      Left = 43
      Top = 27
      Width = 31
      Height = 13
      Caption = 'Nome:'
      FocusControl = edtNMPESSOA
    end
    object Label2: TLabel
      Left = 15
      Top = 54
      Width = 59
      Height = 13
      Caption = 'Logradouro:'
      FocusControl = edtDELOGRADOURO
    end
    object Label3: TLabel
      Left = 42
      Top = 81
      Width = 32
      Height = 13
      Caption = 'Bairro:'
      FocusControl = edtDEBAIRRO
    end
    object Label4: TLabel
      Left = 37
      Top = 108
      Width = 37
      Height = 13
      Caption = 'Cidade:'
      FocusControl = edtNMCIDADE
    end
    object Panel1: TPanel
      Left = 8
      Top = 130
      Width = 503
      Height = 44
      Anchors = [akLeft, akRight, akBottom]
      BevelInner = bvLowered
      TabOrder = 1
      ExplicitTop = 453
      ExplicitWidth = 858
      object btnNovo: TButton
        Left = 12
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Novo'
        TabOrder = 0
        OnClick = btnNovoClick
      end
      object btnSalvar: TButton
        Left = 93
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Salvar'
        TabOrder = 1
        OnClick = btnSalvarClick
      end
      object btnEditar: TButton
        Left = 174
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Editar'
        TabOrder = 2
        OnClick = btnEditarClick
      end
      object btnExcluir: TButton
        Left = 255
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Excluir'
        TabOrder = 3
        OnClick = btnExcluirClick
      end
      object btnPesquisar: TButton
        Left = 336
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Pesquisar'
        TabOrder = 4
        OnClick = btnPesquisarClick
      end
      object btnSair: TButton
        Left = 417
        Top = 11
        Width = 75
        Height = 25
        Caption = 'Sair'
        TabOrder = 5
        OnClick = btnSairClick
      end
    end
    object btnPesquisarCidade: TButton
      Left = 436
      Top = 103
      Width = 75
      Height = 25
      Anchors = [akTop, akRight]
      Caption = 'Pesquisar'
      TabOrder = 0
      OnClick = btnPesquisarCidadeClick
      ExplicitLeft = 791
    end
    object edtNMPESSOA: TDBEdit
      Left = 80
      Top = 24
      Width = 431
      Height = 21
      Anchors = [akLeft, akTop, akRight]
      DataField = 'NMPESSOA'
      DataSource = dsPessoa
      TabOrder = 2
      ExplicitWidth = 786
    end
    object edtDELOGRADOURO: TDBEdit
      Left = 80
      Top = 51
      Width = 431
      Height = 21
      Anchors = [akLeft, akTop, akRight]
      DataField = 'DELOGRADOURO'
      DataSource = dsPessoa
      TabOrder = 3
      ExplicitWidth = 786
    end
    object edtDEBAIRRO: TDBEdit
      Left = 80
      Top = 78
      Width = 431
      Height = 21
      Anchors = [akLeft, akTop, akRight]
      DataField = 'DEBAIRRO'
      DataSource = dsPessoa
      TabOrder = 4
      ExplicitWidth = 786
    end
    object edtNMCIDADE: TDBEdit
      Left = 80
      Top = 105
      Width = 314
      Height = 21
      Anchors = [akLeft, akTop, akRight]
      DataField = 'NMCIDADE'
      DataSource = dsPessoa
      TabOrder = 5
      ExplicitWidth = 669
    end
    object edtUF: TDBEdit
      Left = 400
      Top = 105
      Width = 30
      Height = 21
      Anchors = [akTop, akRight]
      CharCase = ecUpperCase
      DataField = 'UF'
      DataSource = dsPessoa
      TabOrder = 6
    end
  end
  object dsPessoa: TDataSource
    DataSet = cdsPessoa
    Left = 200
  end
  object qryAux: TSQLQuery
    MaxBlobSize = -1
    Params = <>
    SQLConnection = dmBanco.connDB1
    Left = 24
    Top = 96
  end
  object qryPessoa: TSQLDataSet
    SchemaName = 'sysdba'
    CommandText = 
      'SELECT  p.cdpessoa, '#13#10'              p.nmpessoa, '#13#10'              ' +
      'p.delogradouro, '#13#10'              p.debairro, '#13#10'              p.cd' +
      'cidade, '#13#10'              c.nmcidade,   '#13#10'              c.uf '#13#10'FRO' +
      'M    PESSOA p '#13#10'INNER JOIN Cidade c  ON c.cdcidade = p.cdcidade ' +
      #13#10'WHERE  p.cdpessoa =  :cdpessoa'
    DbxCommandType = 'Dbx.SQL'
    MaxBlobSize = -1
    Params = <
      item
        DataType = ftInteger
        Name = 'cdpessoa'
        ParamType = ptInput
      end>
    SQLConnection = dmBanco.connDB1
    Left = 168
    Top = 1
  end
  object dspPessoa: TDataSetProvider
    DataSet = qryPessoa
    Options = [poAllowCommandText, poUseQuoteChar]
    UpdateMode = upWhereChanged
    Left = 256
  end
  object cdsPessoa: TClientDataSet
    Aggregates = <>
    Params = <
      item
        DataType = ftInteger
        Name = 'cdpessoa'
        ParamType = ptInput
      end>
    ProviderName = 'dspPessoa'
    OnNewRecord = cdsPessoaNewRecord
    Left = 296
    object cdsPessoaCDPESSOA: TIntegerField
      FieldName = 'CDPESSOA'
      ProviderFlags = [pfInUpdate, pfInWhere, pfInKey]
      Required = True
    end
    object cdsPessoaNMPESSOA: TStringField
      DisplayLabel = 'Nome'
      FieldName = 'NMPESSOA'
      ProviderFlags = [pfInUpdate]
      Required = True
      Size = 100
    end
    object cdsPessoaDELOGRADOURO: TStringField
      DisplayLabel = 'Logradouro'
      FieldName = 'DELOGRADOURO'
      ProviderFlags = [pfInUpdate]
      Size = 100
    end
    object cdsPessoaDEBAIRRO: TStringField
      DisplayLabel = 'Bairro'
      FieldName = 'DEBAIRRO'
      ProviderFlags = [pfInUpdate]
      Size = 100
    end
    object cdsPessoaCDCIDADE: TIntegerField
      DisplayLabel = 'C'#243'd Cidade'
      FieldName = 'CDCIDADE'
      ProviderFlags = [pfInUpdate]
    end
    object cdsPessoaNMCIDADE: TStringField
      DisplayLabel = 'Cidade'
      FieldName = 'NMCIDADE'
      ProviderFlags = [pfInUpdate]
      Required = True
      Size = 100
    end
    object cdsPessoaUF: TStringField
      FieldName = 'UF'
      ProviderFlags = [pfInUpdate]
      FixedChar = True
      Size = 2
    end
  end
end
