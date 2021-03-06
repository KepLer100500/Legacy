object Form1: TForm1
  Left = 310
  Top = 61
  Width = 995
  Height = 556
  BorderIcons = [biSystemMenu, biMinimize]
  Caption = 'OPC Client'
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  Icon.Data = {
    0000010001002020100000000000E80200001600000028000000200000004000
    0000010004000000000080020000000000000000000000000000000000000000
    000000008000008000000080800080000000800080008080000080808000C0C0
    C0000000FF0000FF000000FFFF00FF000000FF00FF00FFFF0000FFFFFF000000
    0900000000000000000000900000000009000000000000000000009000000000
    0900000000000000000000900000000009000000000000000000009000000000
    0900000000000000000000900000999999999999999999999999999999990000
    0000000000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000900000000000000000
    0000000000000090000000000000000000000000000000900000000000000090
    0000900099900090990000999000009000090009000900990090090009000090
    0009000900090090009009000000009000900009000900900090090000000099
    9999000900090090009009000000009000009009000900990090090009000090
    0000900099900090990000999000009000009000000000000000000000000090
    0000900000000000000000000000009999990000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000000000
    0000000000000000000000000000000000000000000000000000000000009999
    9999999999999999999999999999000009000000000000000000009000000000
    0900000000000000000000900000000009000000000000000000009000000000
    090000000000000000000090000000000900000000000000000000900000FBFF
    FFDFFBFFFFDFFBFFFFDFFBFFFFDFFBFFFFDF00000000FFFFFFFFFFFFFFFFFFFF
    FFFFFFFFDFFFFFFFDFFFFFFFDFFFDF71D3C7DEEECDBBDEEEDDBFDDEEDDBFC0EE
    DDBFDF6ECDBBDF71D3C7DF7FFFFFDF7FFFFFC0FFFFFFFFFFFFFFFFFFFFFFFFFF
    FFFFFFFFFFFF00000000FBFFFFDFFBFFFFDFFBFFFFDFFBFFFFDFFBFFFFDF}
  OldCreateOrder = False
  Position = poDesktopCenter
  OnCreate = FormCreate
  OnShow = FormShow
  PixelsPerInch = 96
  TextHeight = 13
  object Label2: TLabel
    Left = 170
    Top = 178
    Width = 108
    Height = 21
    Caption = 'General Query'
    Font.Charset = RUSSIAN_CHARSET
    Font.Color = clWindowText
    Font.Height = -19
    Font.Name = 'Times New Roman'
    Font.Style = []
    ParentFont = False
  end
  object Label3: TLabel
    Left = 706
    Top = 178
    Width = 95
    Height = 21
    Caption = 'Data Change'
    Font.Charset = RUSSIAN_CHARSET
    Font.Color = clWindowText
    Font.Height = -19
    Font.Name = 'Times New Roman'
    Font.Style = []
    ParentFont = False
  end
  object TopPanel: TPanel
    Left = 0
    Top = 0
    Width = 987
    Height = 105
    Align = alTop
    BevelOuter = bvNone
    TabOrder = 0
    object Label1: TLabel
      Left = 10
      Top = 19
      Width = 56
      Height = 13
      Caption = 'OPC Server'
    end
    object Label4: TLabel
      Left = 832
      Top = -5
      Width = 57
      Height = 13
      Caption = 'Update time'
      Visible = False
    end
    object Label5: TLabel
      Left = 451
      Top = 83
      Width = 83
      Height = 21
      Caption = 'SQL query'
      Font.Charset = RUSSIAN_CHARSET
      Font.Color = clWindowText
      Font.Height = -19
      Font.Name = 'Times New Roman'
      Font.Style = []
      ParentFont = False
    end
    object ServerCombo: TComboBox
      Left = 77
      Top = 16
      Width = 324
      Height = 21
      ItemHeight = 13
      TabOrder = 0
      Text = 'Schneider-Aut.OFS.2'
      OnDropDown = ServerComboDropDown
    end
    object bConnect: TButton
      Left = 15
      Top = 56
      Width = 98
      Height = 25
      Caption = 'Start'
      TabOrder = 1
      OnClick = bConnectClick
    end
    object cDataType: TComboBox
      Left = 981
      Top = 2
      Width = 117
      Height = 21
      Style = csDropDownList
      ItemHeight = 13
      TabOrder = 2
      Visible = False
      Items.Strings = (
        'vtEMPTY      '
        'vtNULL       '
        'vtI2         '
        'vtI4         '
        'vtR4         '
        'vtR8         '
        'vtCY         '
        'vtDATE       '
        'vtBSTR       '
        'vtDISPATCH   '
        'vtERROR      '
        'vtBOOL       '
        'vtVARIANT    '
        'vtUNKNOWN    '
        'vtDECIMAL    '
        'vtundef'
        'vtI1         '
        'vtUI1        '
        'vtUI2        '
        'vtUI4        '
        'vtI8         '
        'vtUI8        '
        'vtINT        '
        'vtUINT       '
        'vtVOID       '
        'vtHRESULT    '
        'vtPTR        '
        'vtSAFEARRAY  '
        'vtCARRAY     '
        'vtUSERDEFINED'
        'vtLPSTR  '
        'vtLPWSTR ')
    end
    object eFilter: TEdit
      Left = 982
      Top = 26
      Width = 98
      Height = 21
      TabOrder = 3
      Visible = False
    end
    object cbRead: TCheckBox
      Left = 939
      Top = 30
      Width = 59
      Height = 13
      Caption = 'Read'
      TabOrder = 4
      Visible = False
    end
    object cbWrite: TCheckBox
      Left = 938
      Top = 6
      Width = 59
      Height = 13
      Caption = 'Write'
      TabOrder = 5
      Visible = False
    end
    object Edit1: TEdit
      Left = 885
      Top = 56
      Width = 52
      Height = 21
      TabOrder = 6
      Text = '10000'
      Visible = False
    end
    object Button1: TButton
      Left = 835
      Top = 56
      Width = 54
      Height = 20
      Caption = 'Set'
      TabOrder = 7
      Visible = False
      OnClick = Button1Click
    end
    object Memo4: TMemo
      Left = 832
      Top = 8
      Width = 105
      Height = 51
      Font.Charset = RUSSIAN_CHARSET
      Font.Color = clBlack
      Font.Height = -19
      Font.Name = 'Times New Roman'
      Font.Style = []
      ParentFont = False
      TabOrder = 8
      Visible = False
    end
    object Button2: TButton
      Left = 112
      Top = 56
      Width = 97
      Height = 25
      Caption = 'Minimize to tray'
      TabOrder = 9
      OnClick = Button2Click
    end
    object Memo6: TMemo
      Left = 984
      Top = 48
      Width = 73
      Height = 17
      TabOrder = 10
      Visible = False
    end
    object Button3: TButton
      Left = 304
      Top = 56
      Width = 97
      Height = 25
      Caption = 'General Query'
      Enabled = False
      TabOrder = 11
      Visible = False
      OnClick = Button3Click
    end
    object Button4: TButton
      Left = 208
      Top = 56
      Width = 97
      Height = 25
      Caption = 'Stop'
      Enabled = False
      TabOrder = 12
      OnClick = Button4Click
    end
    object GroupBox1: TGroupBox
      Left = 416
      Top = 8
      Width = 569
      Height = 73
      Caption = 'MySQL options'
      TabOrder = 13
      object Label6: TLabel
        Left = 54
        Top = 21
        Width = 22
        Height = 13
        Caption = 'Host'
      end
      object Label7: TLabel
        Left = 166
        Top = 21
        Width = 26
        Height = 13
        Caption = 'Login'
      end
      object Label8: TLabel
        Left = 270
        Top = 21
        Width = 46
        Height = 13
        Caption = 'Password'
      end
      object Label9: TLabel
        Left = 390
        Top = 21
        Width = 24
        Height = 13
        Caption = 'Base'
      end
      object Edit2: TEdit
        Left = 22
        Top = 37
        Width = 105
        Height = 21
        TabOrder = 0
        Text = '192.168.100.245'
      end
      object Edit3: TEdit
        Left = 134
        Top = 37
        Width = 105
        Height = 21
        TabOrder = 1
        Text = 'opc'
      end
      object Edit4: TEdit
        Left = 246
        Top = 37
        Width = 105
        Height = 21
        TabOrder = 2
        Text = 'opcpass'
      end
      object Edit5: TEdit
        Left = 358
        Top = 37
        Width = 105
        Height = 21
        TabOrder = 3
        Text = 'opc'
      end
      object Button5: TButton
        Left = 480
        Top = 24
        Width = 73
        Height = 17
        Caption = 'localhost'
        TabOrder = 4
        OnClick = Button5Click
      end
      object Button6: TButton
        Left = 480
        Top = 40
        Width = 73
        Height = 17
        Caption = '10.11.200.12'
        TabOrder = 5
        OnClick = Button6Click
      end
    end
  end
  object Memo1: TMemo
    Left = 0
    Top = 200
    Width = 489
    Height = 321
    ScrollBars = ssBoth
    TabOrder = 1
  end
  object Memo2: TMemo
    Left = 976
    Top = 72
    Width = 265
    Height = 17
    TabOrder = 2
    Visible = False
  end
  object Memo3: TMemo
    Left = 0
    Top = 104
    Width = 985
    Height = 73
    ScrollBars = ssBoth
    TabOrder = 3
  end
  object Memo5: TMemo
    Left = 496
    Top = 200
    Width = 481
    Height = 321
    ScrollBars = ssBoth
    TabOrder = 4
  end
  object OPCServer: TdOPCServer
    Active = False
    KeepAlive = 0
    Version = '3.9 trial'
    Protocol = coCOM
    Params.Strings = (
      'xml-user='
      'xml-pass='
      'xml-proxy=')
    OPCGroups = <
      item
        Name = 'test'
        IsActive = True
        UpdateRate = 1000
        LocaleId = 0
        TimeBias = 0
        DefaultItem.RequestDataType = vtEMPTY
        OPCItems = <>
        XMLHoldtime = 0
        XMLWaittime = 0
        Tag = 0
      end>
    OPCGroupDefault.IsActive = False
    OPCGroupDefault.UpdateRate = 1000
    OPCGroupDefault.LocaleId = 0
    OPCGroupDefault.TimeBias = 0
    ConnectDelay = 300
    Left = 72
    Top = 32
  end
  object Timer1: TTimer
    Enabled = False
    Interval = 100
    Left = 192
    Top = 32
  end
  object TrayIcon1: TTrayIcon
    Hide = True
    RestoreOn = imDoubleClick
    PopupMenuOn = imNone
    OnClick = TrayIcon1Click
    Left = 112
    Top = 32
  end
  object OPCServer0: TdOPCServer
    ServerName = 'Schneider-Aut.OFS.2'
    Active = False
    KeepAlive = 0
    Version = '3.9 trial'
    Protocol = coCOM
    Params.Strings = (
      'xml-user='
      'xml-pass='
      'xml-proxy=')
    OPCGroups = <
      item
        Name = 'TdOPCGroup0'
        IsActive = True
        UpdateRate = 1000
        LocaleId = 0
        TimeBias = 0
        DefaultItem.RequestDataType = vtEMPTY
        OPCItems = <>
        XMLHoldtime = 0
        XMLWaittime = 0
        Tag = 0
      end>
    OPCGroupDefault.IsActive = True
    OPCGroupDefault.UpdateRate = 1000
    OPCGroupDefault.LocaleId = 0
    OPCGroupDefault.TimeBias = 0
    ConnectDelay = 300
    OnDatachange = OPCServer0Datachange
    Left = 152
    Top = 32
  end
end
