//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop
#include <string>
#include <string.h>
#include <stdio.h>
#include <pcreposi.h>
#include <stdlib.h>
#include <conio.h>
#include <iostream>
#include <fstream>
#include "Unit1.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma link "SHDocVw_OCX"
#pragma resource "*.dfm"
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
        : TForm(Owner)
{
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button1Click(TObject *Sender)
{

AnsiString prox = ListBox1->Items->Strings[ListBox1->ItemIndex] + ":" + Edit2->Text;

char szBuf[4096] = { 0 };
INTERNET_PROXY_INFO *PIInfo= (INTERNET_PROXY_INFO*)szBuf;
BOOL (WINAPI * _UrlMkSetSessionOption)(DWORD, LPVOID, DWORD, DWORD);
HINSTANCE hPsApi = LoadLibrary(_T("URLMON.DLL"));
*(FARPROC *)&_UrlMkSetSessionOption = GetProcAddress(hPsApi, "UrlMkSetSessionOption");
 PIInfo->dwAccessType = INTERNET_OPEN_TYPE_PROXY;
  //  ���������  �������� ������
  PIInfo->lpszProxy = PChar("some.proxy:someport");
  //  �������  ������  ����.
  PIInfo->lpszProxy = PChar(prox.c_str());
  PIInfo->lpszProxyBypass = PChar("");

 _UrlMkSetSessionOption(INTERNET_OPTION_PROXY, PIInfo, sizeof(INTERNET_PROXY_INFO),0);
 CppWebBrowser1->Refresh();


WideString URL = Edit1->Text;
Variant Flag = 2;
CppWebBrowser1->Navigate(URL,Flag,NULL,NULL,NULL);

//Edit1->Text = "";
//CppWebBrowser1->Navigate(WideString(Edit1->Text));

}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button2Click(TObject *Sender)
{

IdHTTP1->Disconnect();
Timer1->Enabled=true;
TMemoryStream *result = new TMemoryStream();
result->Clear();
//IdHTTP1->Request->ProxyServer=Edit2->Text;
IdHTTP1->Request->ProxyServer=ListBox1->Items->Strings[ListBox1->ItemIndex];
IdHTTP1->Request->ProxyPort=Edit2->Text.ToInt();
IdHTTP1->HandleRedirects=true;
IdHTTP1->Get("http://astrgorod.ru/node/5017", result);
result->SaveToFile("1.html");


FILE *fp;
String ss,tt;
fp = fopen("1.html", "r");
if(fp) {
        while (fgets(ss.c_str(), 255, fp)) {
                if(strstr(ss.c_str(),"/vote/node/5017/1/vote/alternate")) {
                        tt = strstr(ss.c_str(),"/vote/node/5017/1/vote/alternate");
                        Edit1->Text = "http://astrgorod.ru" + tt.SubString(0,65);
                }
        }
}
fclose(fp);

}
//---------------------------------------------------------------------------


void __fastcall TForm1::Button3Click(TObject *Sender)
{
ListBox1->Items->Clear();
for (int i=0;i<Memo1->Lines->Count;i++) {
        ListBox1->Items->Add(Memo1->Lines->Strings[i]);
}

}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button4Click(TObject *Sender)
{
CppWebBrowser1->Stop();
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button5Click(TObject *Sender)
{
Memo1->Text="";
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button6Click(TObject *Sender)
{
ListBox1->Clear();
TMemoryStream *result = new TMemoryStream();
result->Clear();
IdHTTP2->HandleRedirects=true;
IdHTTP2->Request->UserAgent="Opera/9,80 (Windows NT 5,1; U; ru) Presto/2.5.22 Version/10,51";
IdHTTP2->Request->Referer="http://hideme.ru/proxy-list/?maxtime=1000&ports="+Edit2->Text+"&anon=4";
IdHTTP2->Request->Accept="text/html, application/rss+xml";
IdHTTP2->Request->AcceptLanguage="ru-RU,ru";
IdHTTP2->Request->AcceptCharSet="windows-1251";
IdHTTP2->Request->Connection="Keep-Alive";
IdHTTP2->Request->ContentType="";

IdHTTP2->Get("http://hideme.ru/proxy-list/?maxtime=1000&ports="+Edit2->Text+"&anon=4", result);
result->SaveToFile("proxy.html");


FILE *fp;
String ss,tt;
int posit1=0,posit2=0;
AnsiString temp="";
fp = fopen("proxy.html", "r");
if(fp) {
        while (fgets(ss.c_str(), 255, fp)) {
                if(strstr(ss.c_str(),"</span></td></tr><tr class=d><td>")) {
                        tt = strstr(ss.c_str(),"</span></td></tr><tr class=d><td>");
                        posit2 =  tt.Pos("</td><td>");
                        temp = tt.SubString(34,posit2-34);
                        if(temp!="") {
                                ListBox1->Items->Add(temp);
                                }
                }

                if(strstr(ss.c_str(),"</span></td></tr><tr><td>")) {
                        tt = strstr(ss.c_str(),"</span></td></tr><tr><td>");
                        posit1 =  tt.Pos("</td><td>");
                        temp = tt.SubString(26,posit1-26);
                        if(temp!="") {
                                ListBox1->Items->Add(temp);
                                }
                }
        }
}
fclose(fp);


}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button7Click(TObject *Sender)
{
//  http://www.freeproxylists.net/ru/?c=&pt=3128&pr=&a[]=1&a[]=2&u=50

ListBox1->Clear();
TMemoryStream *result = new TMemoryStream();
result->Clear();
IdHTTP2->HandleRedirects=true;
IdHTTP2->Request->UserAgent="Opera/9,80 (Windows NT 5,1; U; ru) Presto/2.5.22 Version/10,51";
IdHTTP2->Request->Referer="http://www.freeproxylists.net/ru/?c=&pt="+Edit2->Text+"&pr=&a[]=1&a[]=2&u=40";
IdHTTP2->Request->Accept="text/html, application/rss+xml";
IdHTTP2->Request->AcceptLanguage="ru-RU,ru";
IdHTTP2->Request->AcceptCharSet="windows-1251";
IdHTTP2->Request->Connection="Keep-Alive";
IdHTTP2->Request->ContentType="";

IdHTTP2->Get("http://www.freeproxylists.net/ru/?c=&pt="+Edit2->Text+"&pr=&a[]=1&a[]=2&u=40", result);
result->SaveToFile("proxy1.html");


FILE *fp;
String ss,tt;
int posit2=0;
AnsiString temp="",temp2="";
fp = fopen("proxy1.html", "r");
if(fp) {
        while (fgets(ss.c_str(), 255, fp)) {
                if(strstr(ss.c_str(),"IPDecode(\"")) {
                        tt = strstr(ss.c_str(),"IPDecode(\"");
                        posit2 =  tt.Pos("</script>");
                        temp = tt.SubString(11,posit2-13);
                        if(temp!="") {
                                temp = StringReplace(temp,"%3","",TReplaceFlags()<<rfReplaceAll);
                                temp = StringReplace(temp,"%2e",".",TReplaceFlags()<<rfReplaceAll);
                                ListBox1->Items->Add(temp);
                                }
                }

        }
}
fclose(fp);

}
//---------------------------------------------------------------------------

void __fastcall TForm1::Timer1Timer(TObject *Sender)
{
IdHTTP1->Disconnect();
Timer1->Enabled=false;
}
//---------------------------------------------------------------------------

