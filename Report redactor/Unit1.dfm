object Form1: TForm1
  Left = 294
  Top = 133
  BorderIcons = [biSystemMenu, biMinimize]
  BorderStyle = bsSingle
  Caption = 'ReCreator'
  ClientHeight = 405
  ClientWidth = 707
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 399
    Top = 12
    Width = 66
    Height = 13
    Caption = #1056#1072#1079#1076#1077#1083#1080#1090#1077#1083#1100
  end
  object Label2: TLabel
    Left = 7
    Top = 76
    Width = 99
    Height = 13
    Caption = #1059#1076#1072#1095#1085#1099#1077' '#1086#1087#1077#1088#1072#1094#1080#1080':'
  end
  object Label3: TLabel
    Left = 7
    Top = 220
    Width = 43
    Height = 13
    Caption = #1054#1096#1080#1073#1082#1080':'
  end
  object Memo2: TMemo
    Left = 8
    Top = 240
    Width = 689
    Height = 113
    ScrollBars = ssVertical
    TabOrder = 0
  end
  object Button2: TButton
    Left = 8
    Top = 368
    Width = 121
    Height = 25
    Caption = #1055#1077#1088#1077#1080#1084#1077#1085#1086#1074#1072#1090#1100' '#1087#1072#1087#1082#1080
    TabOrder = 1
    OnClick = Button2Click
  end
  object Button3: TButton
    Left = 512
    Top = 8
    Width = 185
    Height = 25
    Caption = #1047#1072#1075#1088#1091#1079#1080#1090#1100' '#1092#1072#1081#1083' '#1089#1086#1086#1090#1074#1077#1090#1089#1074#1080#1081
    TabOrder = 2
    OnClick = Button3Click
  end
  object Edit1: TEdit
    Left = 8
    Top = 8
    Width = 385
    Height = 21
    ReadOnly = True
    TabOrder = 3
  end
  object Edit2: TEdit
    Left = 8
    Top = 40
    Width = 497
    Height = 21
    ReadOnly = True
    TabOrder = 4
  end
  object Button4: TButton
    Left = 512
    Top = 40
    Width = 185
    Height = 25
    Caption = #1042#1099#1073#1088#1072#1090#1100' '#1094#1077#1083#1077#1074#1091#1102' '#1076#1080#1088#1088#1077#1082#1090#1086#1088#1080#1102
    TabOrder = 5
    OnClick = Button4Click
  end
  object Edit3: TEdit
    Left = 472
    Top = 8
    Width = 33
    Height = 21
    TabOrder = 6
    Text = '$'
  end
  object Memo1: TMemo
    Left = 8
    Top = 96
    Width = 689
    Height = 113
    ScrollBars = ssVertical
    TabOrder = 7
  end
  object Button1: TButton
    Left = 584
    Top = 368
    Width = 113
    Height = 25
    Caption = #1055#1077#1088#1077#1080#1084#1077#1085#1086#1074#1072#1090#1100' xlsx'
    TabOrder = 8
    OnClick = Button1Click
  end
  object Button5: TButton
    Left = 464
    Top = 368
    Width = 113
    Height = 25
    Caption = #1055#1077#1088#1077#1080#1084#1077#1085#1086#1074#1072#1090#1100' pdf'
    TabOrder = 9
    OnClick = Button5Click
  end
  object Button6: TButton
    Left = 136
    Top = 368
    Width = 129
    Height = 25
    Caption = 'XLSX name -> PDF name'
    TabOrder = 10
    OnClick = Button6Click
  end
  object Button7: TButton
    Left = 304
    Top = 368
    Width = 129
    Height = 25
    Caption = #1057#1086#1079#1076#1072#1090#1100' '#1087#1072#1087#1082#1080
    TabOrder = 11
    OnClick = Button7Click
  end
  object OpenDialog1: TOpenDialog
    Filter = '*.txt|*.txt'
    Left = 464
    Top = 64
  end
end
