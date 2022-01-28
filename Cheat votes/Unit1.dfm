object Form1: TForm1
  Left = 234
  Top = 106
  BorderIcons = [biSystemMenu, biMinimize]
  BorderStyle = bsSingle
  Caption = 'Glas Naroda'
  ClientHeight = 424
  ClientWidth = 555
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Button1: TButton
    Left = 376
    Top = 8
    Width = 57
    Height = 25
    Caption = '2'
    TabOrder = 0
    OnClick = Button1Click
  end
  object Button2: TButton
    Left = 312
    Top = 8
    Width = 57
    Height = 25
    Caption = '1'
    TabOrder = 1
    OnClick = Button2Click
  end
  object Edit1: TEdit
    Left = 8
    Top = 8
    Width = 297
    Height = 21
    TabOrder = 2
  end
  object ListBox1: TListBox
    Left = 312
    Top = 40
    Width = 233
    Height = 193
    ItemHeight = 13
    TabOrder = 3
  end
  object Memo1: TMemo
    Left = 312
    Top = 352
    Width = 233
    Height = 65
    TabOrder = 4
  end
  object Button3: TButton
    Left = 344
    Top = 296
    Width = 73
    Height = 25
    Caption = 'Insert Manual'
    TabOrder = 5
    OnClick = Button3Click
  end
  object Button4: TButton
    Left = 440
    Top = 8
    Width = 41
    Height = 25
    Caption = 'Stop'
    TabOrder = 6
    OnClick = Button4Click
  end
  object Button5: TButton
    Left = 344
    Top = 320
    Width = 73
    Height = 25
    Caption = 'Clear Memo'
    TabOrder = 7
    OnClick = Button5Click
  end
  object CppWebBrowser1: TCppWebBrowser
    Left = 8
    Top = 40
    Width = 297
    Height = 377
    TabOrder = 8
    ControlData = {
      4C000000B21E0000F72600000000000000000000000000000000000000000000
      000000004C000000000000000000000001000000E0D057007335CF11AE690800
      2B2E12620A000000000000004C0000000114020000000000C000000000000046
      8000000000000000000000000000000000000000000000000000000000000000
      00000000000000000100000000000000000000000000000000000000}
  end
  object Button6: TButton
    Left = 432
    Top = 296
    Width = 75
    Height = 25
    Caption = 'Get Proxy 1'
    TabOrder = 9
    OnClick = Button6Click
  end
  object Edit2: TEdit
    Left = 392
    Top = 240
    Width = 153
    Height = 21
    TabOrder = 10
    Text = '3128'
  end
  object Edit3: TEdit
    Left = 312
    Top = 240
    Width = 73
    Height = 21
    Enabled = False
    TabOrder = 11
    Text = 'Port'
  end
  object Edit4: TEdit
    Left = 312
    Top = 264
    Width = 233
    Height = 21
    Enabled = False
    TabOrder = 12
    Text = '3128, 3129, 8089, 1080, 8080, 443, 7808'
  end
  object Button7: TButton
    Left = 432
    Top = 320
    Width = 75
    Height = 25
    Caption = 'Get Proxy 2'
    TabOrder = 13
    OnClick = Button7Click
  end
  object IdHTTP1: TIdHTTP
    Request.Accept = 'text/html, */*'
    Request.ContentLength = 0
    Request.ContentRangeEnd = 0
    Request.ContentRangeStart = 0
    Request.ProxyPort = 0
    Request.UserAgent = 'Mozilla/3.0 (compatible; Indy Library)'
    Left = 264
    Top = 352
  end
  object IdHTTP2: TIdHTTP
    Request.Accept = 'text/html, */*'
    Request.ContentLength = 0
    Request.ContentRangeEnd = 0
    Request.ContentRangeStart = 0
    Request.ProxyPort = 0
    Request.UserAgent = 'Mozilla/3.0 (compatible; Indy Library)'
    Left = 296
    Top = 384
  end
  object Timer1: TTimer
    Enabled = False
    Interval = 30000
    OnTimer = Timer1Timer
    Left = 520
    Top = 296
  end
end
