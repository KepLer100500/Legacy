//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop
#include <math.h>
#include "Unit1.h"
#include <Sysutils.hpp>
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma link "SHDocVw_OCX"
#pragma link "MSHTML_OCX"
#pragma resource "*.dfm"
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
        : TForm(Owner)
{
}
//---------------------------------------------------------------------------


void __fastcall TForm1::Timer1Timer(TObject *Sender)
{
TDateTime CurrentDate = Date();
Label3->Caption= CurrentDate;
//Form1->Caption=GetCurrentDir();
//Image1->Picture->LoadFromFile("1.jpg");

AnsiString c, b, a = ExtractFileDir(Application->ExeName);
c = a + "\\1.jpg";


//Image1->Align=alTop;
//Memo1->Align=alClient;
//Panel1->Align=alBottom;

//Memo1->Lines->Clear();
//Memo1->Lines->LoadFromFile("1.txt");

//CppWebBrowser1->Navigate(WideString("http://10.25.10.4/1.html"), navNoReadFromCache);
TVariant gg = {4};
CppWebBrowser1->Navigate(WideString("http://gpu-serv12/1.html"), gg);
//CppWebBrowser1->Refresh(); // <<<----------------------------------------------
TVariant vLevel = {3};
CppWebBrowser1->Refresh2(vLevel);
//Form1->Height = Form1->Height + Memo1->Lines->Count +50;
//Form1->Width = Image1->Width;

Timer1->Enabled=false;
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Label2Click(TObject *Sender)
{
Application->Terminate();        
}
//---------------------------------------------------------------------------
void __fastcall TForm1::FormCreate(TObject *Sender)
{
TDateTime CurrentDate = Date();
Label3->Caption= CurrentDate;
Form1->Caption=GetCurrentDir();
AnsiString c, b, a = ExtractFileDir(Application->ExeName);

//b = a + "\\1.txt";
//Memo1->Lines->Clear();
//Memo1->Lines->LoadFromFile(b);
        
}
//---------------------------------------------------------------------------

