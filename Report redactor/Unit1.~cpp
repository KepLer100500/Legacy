//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "Unit1.h"
#include <stdio.h>
#include <string.h>
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
#include <FileCtrl.hpp>
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
        : TForm(Owner)
{
}
//---------------------------------------------------------------------------


void __fastcall TForm1::Button2Click(TObject *Sender)
{
// для папок
if(Edit1->Text=="" || Edit2->Text==""){
        Application->MessageBoxA("Вы заполнили не все необходимые поля!", "Ошибка", 0);
} else {

Memo2->Clear();
Memo1->Clear();
FILE *in;
char str[100]; 
int pos=0, len = 0, err = 0, i = 0;
AnsiString FirstName = "", SecondName = "";
AnsiString www = "", ddd = "";
AnsiString dir_name1 = "", dir_name2 = "";
AnsiString massiv[1000];

in = fopen(Edit1->Text.c_str(), "r");
while(fgets(str,100,in)){
        www = str;
        pos = www.Pos(Edit3->Text.c_str());
        FirstName = www.SubString(0,pos-1);
        len = www.Length();
        SecondName = www.SubString(pos+1, len - pos - 1);
        dir_name1 = Edit2->Text + "\\" + FirstName;
        dir_name2 = Edit2->Text + "\\" + SecondName;
        StringReplace(dir_name1,"\\","\\\\",TReplaceFlags()<<rfReplaceAll);
        StringReplace(dir_name2,"\\","\\\\",TReplaceFlags()<<rfReplaceAll);
        err = rename(dir_name1.c_str(), dir_name2.c_str());
        ddd = "Начальное название: \"" + FirstName + "\"\t\tпереименован в: \"" + SecondName + "\"";
        if(err==0){
                massiv[i] = SecondName;
                i++;
                Memo1->Lines->Add(ddd);
        } else {
        ddd = FirstName + " - указанная дирректория не существует";
                Memo2->Lines->Add(ddd);
        }
}
fclose(in);


TSearchRec sr;
int flag = 0;
AnsiString fff = Edit2->Text + "\\*.*";
if(FindFirst(fff, faDirectory, sr) == 0){
        do {
                if(sr.Attr == faDirectory){
                        for(int j=0;j<i;j++){
                               if(massiv[j]==sr.Name) {
                                flag++;
                               }
                        }
                        if(flag==0){
                                if (sr.Name!="." && sr.Name!=".."){
                                        ddd = sr.Name + " - данная дирректория отсутствует в конфигурационном файле";
                                        Memo2->Lines->Add(ddd);
                                }
                                
                        }
                }                     
        } while (FindNext(sr)==0);
        FindClose(sr);
}


}
}
//---------------------------------------------------------------------------
void __fastcall TForm1::Button3Click(TObject *Sender)
{
if(OpenDialog1->Execute()){
        Edit1->Text = OpenDialog1->FileName;
}
}
//---------------------------------------------------------------------------
void __fastcall TForm1::Button4Click(TObject *Sender)
{
AnsiString Dir = "";
SelectDirectory("Выберите папку", "", Dir);
Edit2->Text = Dir;
}
//---------------------------------------------------------------------------
void __fastcall TForm1::Button1Click(TObject *Sender)
{
// для файлов xlsx
if(Edit1->Text=="" || Edit2->Text==""){
        Application->MessageBoxA("Вы заполнили не все необходимые поля!", "Ошибка", 0);
} else {

Memo2->Clear();
Memo1->Clear();
FILE *in;
char str[100]; 
int pos=0, len = 0, err = 0, i = 0;
AnsiString FirstName = "", SecondName = "";
AnsiString www = "", ddd = "";
AnsiString dir_name1 = "", dir_name2 = "";
AnsiString massiv[1000];

AnsiString smeta_name;
AnsiString smeta_path;

TSearchRec sr, sr_smeta;
AnsiString fff = Edit2->Text + "\\*.*";
AnsiString folder_smeta = "";
if(FindFirst(fff, faDirectory, sr) == 0){
        do {
                if(sr.Attr == faDirectory){
                                if (sr.Name!="." && sr.Name!=".."){
                                        folder_smeta = Edit2->Text + "\\" + sr.Name + "\\Смета\\*.xlsx";
                                        if(FindFirst(folder_smeta, faAnyFile, sr_smeta) == 0){
                                                do {
                                                        smeta_name = StringReplace(sr_smeta.Name,".xlsx","",TReplaceFlags()<<rfReplaceAll);
                                                        smeta_path = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + sr_smeta.Name;
                                                        in = fopen(Edit1->Text.c_str(), "r");
                                                        while(fgets(str,100,in)){
                                                                www = str;
                                                                pos = www.Pos(Edit3->Text.c_str());
                                                                FirstName = www.SubString(0,pos-1);
                                                                len = www.Length();
                                                                SecondName = www.SubString(pos+1, len - pos - 1);
                                                                if(smeta_name == FirstName){
                                                                        ddd = "Начальное название: \"" + FirstName + "\"\t\tпереименован в: \"" + SecondName + "\"";
                                                                        dir_name1 = smeta_path;
                                                                        dir_name2 = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + SecondName + ".xlsx";
                                                                        err = rename(dir_name1.c_str(), dir_name2.c_str());
                                                                        if(err==0){
                                                                                Memo1->Lines->Add(ddd);
                                                                        } else {
                                                                                ddd = FirstName + " - указанный файл xlsx не существует";
                                                                                Memo2->Lines->Add(ddd);
                                                                        }
                                                                }
                                                        }
                                                        fclose(in);
                                                        i++;
                                                } while (FindNext(sr_smeta)==0);
                                                FindClose(sr_smeta);
                                        }
                                }
                }
        } while (FindNext(sr)==0);
        FindClose(sr);
}






/*

in = fopen(Edit1->Text.c_str(), "r");
while(fgets(str,100,in)){
        www = str;
        pos = www.Pos(Edit3->Text.c_str());
        FirstName = www.SubString(0,pos-1);
        len = www.Length();
        SecondName = www.SubString(pos+1, len - pos - 1);
        dir_name1 = Edit2->Text + "\\" + FirstName;
        dir_name2 = Edit2->Text + "\\" + SecondName;
        StringReplace(dir_name1,"\\","\\\\",TReplaceFlags()<<rfReplaceAll);
        StringReplace(dir_name2,"\\","\\\\",TReplaceFlags()<<rfReplaceAll);
        err = rename(dir_name1.c_str(), dir_name2.c_str());
        ddd = "Начальное название: \"" + FirstName + "\"\t\tпереименован в: \"" + SecondName + "\"";
        if(err==0){
                massiv[i] = SecondName;
                i++;
                Memo1->Lines->Add(ddd);
        } else {
        ddd = FirstName + " - указанная дирректория не существует";
                Memo2->Lines->Add(ddd);
        }
}
fclose(in);



*/

}

}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button5Click(TObject *Sender)
{
// для файлов pdf
if(Edit1->Text=="" || Edit2->Text==""){
        Application->MessageBoxA("Вы заполнили не все необходимые поля!", "Ошибка", 0);
} else {

Memo2->Clear();
Memo1->Clear();
FILE *in;
char str[100]; 
int pos=0, len = 0, err = 0, i = 0;
AnsiString FirstName = "", SecondName = "";
AnsiString www = "", ddd = "";
AnsiString dir_name1 = "", dir_name2 = "";
AnsiString massiv[1000];

AnsiString smeta_name;
AnsiString smeta_path;

TSearchRec sr, sr_smeta;
AnsiString fff = Edit2->Text + "\\*.*";
AnsiString folder_smeta = "";
if(FindFirst(fff, faDirectory, sr) == 0){
        do {
                if(sr.Attr == faDirectory){
                                if (sr.Name!="." && sr.Name!=".."){
                                        folder_smeta = Edit2->Text + "\\" + sr.Name + "\\Смета\\*.pdf";
                                        if(FindFirst(folder_smeta, faAnyFile, sr_smeta) == 0){
                                                do {
                                                        smeta_name = StringReplace(sr_smeta.Name,".pdf","",TReplaceFlags()<<rfReplaceAll);
                                                        smeta_path = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + sr_smeta.Name;
                                                        in = fopen(Edit1->Text.c_str(), "r");
                                                        while(fgets(str,100,in)){
                                                                www = str;
                                                                pos = www.Pos(Edit3->Text.c_str());
                                                                FirstName = www.SubString(0,pos-1);
                                                                len = www.Length();
                                                                SecondName = www.SubString(pos+1, len - pos - 1);
                                                                if(smeta_name == FirstName){
                                                                        ddd = "Начальное название: \"" + FirstName + "\"\t\tпереименован в: \"" + SecondName + "\"";
                                                                        dir_name1 = smeta_path;
                                                                        dir_name2 = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + SecondName + ".pdf";
                                                                        err = rename(dir_name1.c_str(), dir_name2.c_str());
                                                                        if(err==0){
                                                                                Memo1->Lines->Add(ddd);
                                                                        } else {
                                                                                ddd = FirstName + " - указанный файл pdf не существует";
                                                                                Memo2->Lines->Add(ddd);
                                                                        }



                                                                }
                                                        }
                                                        fclose(in);
                                                        i++;
                                                } while (FindNext(sr_smeta)==0);
                                                FindClose(sr_smeta);
                                        }
                                }
                }
        } while (FindNext(sr)==0);
        FindClose(sr);
}
}

}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button6Click(TObject *Sender)
{
// xlsx->pdf
if(Edit1->Text=="" || Edit2->Text==""){
        Application->MessageBoxA("Вы заполнили не все необходимые поля!", "Ошибка", 0);
} else {

Memo2->Clear();
Memo1->Clear();
FILE *in;
char str[100]; 
int pos=0, len = 0, err = 0, i = 0, j = 0;
AnsiString FirstName = "", SecondName = "";
AnsiString www = "", ddd = "";
AnsiString dir_name1 = "", dir_name2 = "";
AnsiString massiv[1000];

AnsiString smeta_name;
AnsiString smeta_path, smeta_path_s;

TSearchRec sr, sr_smeta;
AnsiString fff = Edit2->Text + "\\*.*";
AnsiString folder_smeta = "";
if(FindFirst(fff, faDirectory, sr) == 0){
        do {
                if(sr.Attr == faDirectory){
                                if (sr.Name!="." && sr.Name!=".."){
                                        folder_smeta = Edit2->Text + "\\" + sr.Name + "\\Смета\\*.xlsx";
                                        if(FindFirst(folder_smeta, faAnyFile, sr_smeta) == 0){
                                                do {
                                                        smeta_path = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + sr_smeta.Name;
                                                        smeta_name = StringReplace(sr_smeta.Name,".xlsx","",TReplaceFlags()<<rfReplaceAll);
                                                        ddd = smeta_path + "\t" + smeta_name;
                                                        massiv[i] = smeta_name;
                                                        i++;
                                                        Memo2->Lines->Add(ddd);
                                                } while (FindNext(sr_smeta)==0);
                                                FindClose(sr_smeta);
                                        }
                                }
                }
        } while (FindNext(sr)==0);
        FindClose(sr);
}

if(FindFirst(fff, faDirectory, sr) == 0){
        do {
                if(sr.Attr == faDirectory){
                                if (sr.Name!="." && sr.Name!=".."){
                                        folder_smeta = Edit2->Text + "\\" + sr.Name + "\\Смета\\*.pdf";
                                        if(FindFirst(folder_smeta, faAnyFile, sr_smeta) == 0){
                                                do {
                                                        smeta_path = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + sr_smeta.Name;

                                                        if(j<i){
                                                                www = smeta_path + " -> " + Edit2->Text + "\\" + sr.Name + "\\Смета\\" + massiv[j] + ".pdf";
                                                                dir_name1 = smeta_path;
                                                                dir_name2 = Edit2->Text + "\\" + sr.Name + "\\Смета\\" + massiv[j] + ".pdf";
                                                                err = rename(dir_name1.c_str(), dir_name2.c_str());
                                                                        if(err==0){
                                                                                Memo1->Lines->Add(ddd);
                                                                        } else {
                                                                                ddd = FirstName + " - ошибка соответствия";
                                                                                Memo2->Lines->Add(ddd);
                                                                        }
                                                                //Memo1->Lines->Add(www);
                                                                j++;
                                                        }
                                                        
                                                } while (FindNext(sr_smeta)==0);
                                                FindClose(sr_smeta);
                                        }
                                }
                }
        } while (FindNext(sr)==0);
        FindClose(sr);
}



}
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button7Click(TObject *Sender)
{
Memo1->Clear();
FILE *in;
char str[100];
in = fopen(Edit1->Text.c_str(), "r");
AnsiString path="", normal_name="", www="";

while(fgets(str,100,in)){
        www = str;
        normal_name = www.SubString(0,www.Length() -1);
        path = Edit2->Text + "\\" + normal_name;
        CreateDir(path);
        Memo1->Lines->Append(path);
}



}
//---------------------------------------------------------------------------


