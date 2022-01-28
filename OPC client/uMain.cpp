//---------------------------------------------------------------------------
#include <vcl.h>
#pragma hdrstop
#include "uMain.h"
#include <stdio.h>
#include <windows.h>
#include <iostream.h>
#include <conio.h>
#include <string>
#include <string.h>
#include <stdlib.h>
#define __LCC__
#pragma link "lib\\libmysql.lib"
#include <mysql.h>
#include <stdio.h>

//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma link "dOPC"
#pragma link "dOPCComn"
#pragma link "dOPCIntf"
#pragma link "trayicon"
#pragma resource "*.dfm"
TForm1 *Form1;

//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
        : TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TForm1::FormShow(TObject *Sender)
{
   cDataType->ItemIndex = 0;
}
//---------------------------------------------------------------------------
void __fastcall TForm1::ServerComboDropDown(TObject *Sender)
{
  if (ServerCombo->Items->Text.Trim() == "") // if no OPC Servernames loaded
  {
    Screen->Cursor = crHourGlass;
    GetOPCServers(ServerCombo->Items);        // get Servernames from registry
    Screen->Cursor = crDefault;
  }
}
//---------------------------------------------------------------------------


void __fastcall TForm1::ShowStatus(void)
{

  Memo1->Lines->Add("StartTime   :"+ DateTimeToStr(OPCServer->StartTime));
  Memo1->Lines->Add("Currenttime :"+ DateTimeToStr(OPCServer->CurrentTime));
  // Memo1->Lines->Add("LastUpdate  :"+ DateTimetoStr(dvOPCServer1->LastUpdateTime));
  //Memo1->Lines->Add("MajorVersion:"+ IntToStr(OPCServer->MajorVersion));
  //Memo1->Lines->Add("MinorVersion:"+ IntToStr(OPCServer->MinorVersion));
  //Memo1->Lines->Add("BuildNumber :"+ IntToStr(OPCServer->BuildNumber));
  //Memo1->Lines->Add("BandWidth   :"+ IntToStr(OPCServer->BandWidth));
  //Memo1->Lines->Add("GroupCount  :"+ IntToStr(OPCServer->GroupCount));
  //Memo1->Lines->Add("ServerState :"+ IntToStr(OPCServer->ServerState));
  Memo1->Lines->Add("ServerState :"+ OPCServer->ServerStateStr);
  //Memo1->Lines->Add("VendorInfo  :"+ OPCServer->VendorInfo);
  Memo1->Lines->Add("");
}



// shows all items and folder of the selected OPC server
void __fastcall GetAllItems(TdOPCBrowser *Browser,  TStrings *ItemList)
{
MYSQL *db;
db = mysql_init(NULL);
db = mysql_real_connect(db,Form1->Edit2->Text.c_str(),Form1->Edit3->Text.c_str(),Form1->Edit4->Text.c_str(),Form1->Edit5->Text.c_str(),0,NULL,0);

Browser->Browse(false);                   // get all Branches and Items in this level from OPC Server
TdOPCBrowseItems *BItems  = new TdOPCBrowseItems();     // create a new list
BItems->Assign(Browser->Items);           // save and copy Items in new List
TdOPCBrowseItem *BrowseItem;              // for one browser item
TdOPCItemProperties *Props;

//-----------------
int k=0;
AnsiString ss="(",sa="",sv=" VALUES (",sums="";
//Form1->Memo7->Clear();
for (int i = 0; i < BItems->Count ; i++)  // for all Items in List
{
BrowseItem = BItems->Items[i];

if (BrowseItem->IsItem && !strchr(BrowseItem->ItemId.c_str(), '#')){               // if browse item is not a folder
        ItemList->Add(BrowseItem->ItemId);
        Props = new TdOPCItemProperties(Form1->OPCServer,BrowseItem->ItemName);
        string a = BrowseItem->ItemName.c_str(), b = BrowseItem->ItemName.c_str();
        a = a.substr(0,4);
        b = b.substr(5,10);
Form1->Memo1->Lines->Add(DateTimeToStr(Form1->OPCServer->CurrentTime) + "  -  " + AnsiString(a.c_str()) + "  -  " + AnsiString(b.c_str()) + "  -  " + VarToAStr(Props->Items[1]->Value));

//----------------------insert first values//-----first general query
AnsiString query3;
Form1->Memo5->Lines->Add(BrowseItem->ItemName + " = " + VarToAStr(Props->Items[1]->Value));
string dateTbuff, dateT;
dateTbuff = AnsiString(Form1->OPCServer->CurrentTime).c_str();
dateT=dateTbuff.substr(6,4)+"-"+dateTbuff.substr(3,2)+"-"+dateTbuff.substr(0,2)+" "+dateTbuff.substr(11,8);

if(Props->Items[1]->Value.IsEmpty()){
        query3 = "INSERT INTO `" + Form1->Edit5->Text + "`.`bufferTable` (`ID`,`dataChange`,`tagName`) values ('0','" + dateT.c_str() + "','" + BrowseItem->ItemName + "')";
        }
else    {
        query3 = "INSERT INTO `" + Form1->Edit5->Text + "`.`bufferTable` (`ID`,`dataChange`,`tagName`,`valueTag`) values ('0','" + dateT.c_str() + "','" + BrowseItem->ItemName + "',replace('" + VarToAStr(Props->Items[1]->Value)+ "',',','.'))";
        }


Form1->Memo3->Lines->Add(query3);
if(!db)
        {
        Form1->Memo5->Lines->Add("Error MySQL");
        }
        else
        {
mysql_real_query(db,query3.c_str(),query3.Length());
        }
//----------------------


        if(k<4){
                sv+= "'" + AnsiString(VarToAStr(Props->Items[1]->Value)) + "',";
                ss+= "`" + AnsiString(b.c_str()) + "`,";
                k++;
                }
        if(k==4){
                sv.Delete(sv.Length(),1);
                ss.Delete(ss.Length(),1);
                sv+= ",'" + DateTimeToStr(Form1->OPCServer->CurrentTime) + "')";
                ss+=",`dataChange`)";
                sa="INSERT INTO `opc`.`" + AnsiString(a.c_str()) + "` ";
                Form1->Memo3->Lines->Add(AnsiString(sa + ss + sv));
                sums=sa + ss + sv;
// раскидывание        mysql_real_query(db,sums.c_str(),sums.Length());
                k=0;
                ss = "";
                sums="";
                }
delete Props;

// add Itemid to list
    } else
     {
       if (Browser->MoveDown(BrowseItem))  // one Level down
       {
         GetAllItems(Browser,ItemList);    // recursive call
         Browser->Moveup();                // back to old Level
       }
     }
  }
delete BItems;
mysql_close(db);
};

//---------------------------------------------------------------------------
void __fastcall TForm1::bConnectClick(TObject *Sender)
{
Hide();
TrayIcon1->Visible=true;
Application->Icon->LoadFromFile("Icon1.ico");
//-----------------clear bufferTable
MYSQL *db;
db = mysql_init(NULL);
db = mysql_real_connect(db,Form1->Edit2->Text.c_str(),Form1->Edit3->Text.c_str(),Form1->Edit4->Text.c_str(),Form1->Edit5->Text.c_str(),0,NULL,0);
        if(!db)
        {
        Memo5->Lines->Add("Error MySQL");
        }
        else
        {
AnsiString query2;
query2 = "TRUNCATE TABLE `" + Form1->Edit5->Text + "`.`bufferTable`";
mysql_real_query(db,query2.c_str(),query2.Length());
        }
mysql_close(db);
//-----------------

OPCServer->ServerName = ServerCombo->Text;
Memo1->Clear();
try
{
OPCServer->Active = true;

OPCServer->OPCGroups->Items[0]->OPCItems->RemoveAll();
OPCServer->Browser->ShowBranches();
OPCServer->Browser->ShowLeafs(true);
String tagName2;
for (int i = 0; i < OPCServer->Browser->Items->Count; i++)  {
        tagName2 = OPCServer->Browser->Items->Items[i]->ItemName.c_str();
        if(!strchr(tagName2.c_str(), '#')) {
           OPCServer->OPCGroups->Items[0]->OPCItems->AddItem(tagName2,false);
        }
}
      ShowStatus();
      OPCServer->Browser->Filter = eFilter->Text;
      OPCServer->Browser->Datatype = (dOPCADatatype) cDataType->ItemIndex;
      OPCServer->Browser->AccessRights.Clear();
      if (cbWrite->Checked)
         OPCServer->Browser->AccessRights = OPCServer->Browser->AccessRights << opcWritable;
      if (cbRead->Checked)
         OPCServer->Browser->AccessRights = OPCServer->Browser->AccessRights << opcReadable;
      GetAllItems(OPCServer->Browser,Memo2->Lines);

    }
    __finally
    {
      OPCServer->Active = false;
    }

    //Timer1->Enabled=true;

//-----------------------DataChange
OPCServer0->Active = true;
OPCServer0->OPCGroups->Items[0]->OPCItems->RemoveAll();
OPCServer0->Browser->ShowBranches();
OPCServer0->Browser->ShowLeafs(true);
String tagName3;
for (int i = 0; i < OPCServer0->Browser->Items->Count; i++)  {
        tagName3 = OPCServer0->Browser->Items->Items[i]->ItemName.c_str();
        if(!strchr(tagName3.c_str(), '#')) {
           OPCServer0->OPCGroups->Items[0]->OPCItems->AddItem(tagName3,false);
        }
}
//-----------------------

Button3->Enabled=true;
Button4->Enabled=true;
GroupBox1->Enabled=false;
bConnect->Enabled=false;
ServerCombo->Enabled=false;
}
//---------------------------------------------------------------------------




void __fastcall TForm1::Button1Click(TObject *Sender)
{
//Timer1->Interval=Edit1->Text.ToInt();
}
//---------------------------------------------------------------------------




void __fastcall TForm1::FormCreate(TObject *Sender)
{
Application->Icon->LoadFromFile("Icon1.ico");        
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button2Click(TObject *Sender)
{
Hide();
TrayIcon1->Visible=true;
Application->Icon->LoadFromFile("Icon1.ico");
}
//---------------------------------------------------------------------------

void __fastcall TForm1::TrayIcon1Click(TObject *Sender)
{
Show();
TrayIcon1->Visible=false;
Form1->Repaint();
}
//---------------------------------------------------------------------------

void __fastcall TForm1::OPCServer0Datachange(TObject *Sender,
      TdOPCItemList *ItemList)
{
MYSQL *db;
db = mysql_init(NULL);
db = mysql_real_connect(db,Form1->Edit2->Text.c_str(),Form1->Edit3->Text.c_str(),Form1->Edit4->Text.c_str(),Form1->Edit5->Text.c_str(),0,NULL,0);

Form1->Memo5->Clear();
Form1->Memo3->Clear();
AnsiString query;
for ( int i = 0; i < ItemList->Count; i++){
        string dateTbuff, dateT;
        dateTbuff = AnsiString(OPCServer0->CurrentTime).c_str();
dateT=dateTbuff.substr(6,4)+"-"+dateTbuff.substr(3,2)+"-"+dateTbuff.substr(0,2)+" "+dateTbuff.substr(11,8);
        //query = "INSERT INTO `" + Form1->Edit5->Text + "`.`bufferTable` (`ID`,`dataChange`,`tagName`,`valueTag`) values ('0','" + dateT.c_str() + "','" + ItemList->Items[i]->ItemID + "','" + ItemList->Items[i]->ValueStr()+ "')";
if(ItemList->Items[i]->Value == NULL){
        Memo5->Lines->Add(ItemList->Items[i]->ItemID + " = NULL");
        //query = "UPDATE `" + Form1->Edit5->Text + "`.`bufferTable` SET `dataChange` = '" + dateT.c_str() + "' WHERE `tagName` = '" + ItemList->Items[i]->ItemID + "'";
        query = "UPDATE `" + Form1->Edit5->Text + "`.`bufferTable` SET `dataChange` = '" + dateT.c_str() + "' WHERE `tagName` = '" + ItemList->Items[i]->ItemID + "'";
        }
else    {
        Memo5->Lines->Add(ItemList->Items[i]->ItemID + " = " + ItemList->Items[i]->Value);
        query = "UPDATE `" + Form1->Edit5->Text + "`.`bufferTable` SET `valueTag` = replace('" + ItemList->Items[i]->ValueStr() + "',',','.'), `dataChange` = '" + dateT.c_str() + "' WHERE `tagName` = '" + ItemList->Items[i]->ItemID + "'";
        }
        
        Form1->Memo3->Lines->Add(query);
        if(!db)
        {
        Memo5->Lines->Add("Error MySQL");
        }
        else
        {
        mysql_real_query(db,query.c_str(),query.Length());
        }
        }
mysql_close(db);
Form1->Repaint();


}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button4Click(TObject *Sender)
{
OPCServer->Active = false;
OPCServer0->Active = false;
Memo1->Clear();
Memo3->Clear();
Memo5->Clear();
Button3->Enabled=false;
Button4->Enabled=false;
GroupBox1->Enabled=true;
bConnect->Enabled=true;
ServerCombo->Enabled=true;
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button3Click(TObject *Sender)
{
//-----------------clear bufferTable
MYSQL *db;
db = mysql_init(NULL);
db = mysql_real_connect(db,Form1->Edit2->Text.c_str(),Form1->Edit3->Text.c_str(),Form1->Edit4->Text.c_str(),Form1->Edit5->Text.c_str(),0,NULL,0);
        if(!db)
        {
        Memo5->Lines->Add("Error MySQL");
        }
        else
        {
AnsiString query2;
query2 = "TRUNCATE TABLE `" + Form1->Edit5->Text + "`.`bufferTable`";
mysql_real_query(db,query2.c_str(),query2.Length());
        }
mysql_close(db);
//-----------------

OPCServer->ServerName = ServerCombo->Text;
Memo1->Clear();
Memo3->Clear();
try
{
OPCServer->Active = true;

OPCServer->OPCGroups->Items[0]->OPCItems->RemoveAll();
OPCServer->Browser->ShowBranches();
OPCServer->Browser->ShowLeafs(true);
String tagName2;
for (int i = 0; i < OPCServer->Browser->Items->Count; i++)  {
        tagName2 = OPCServer->Browser->Items->Items[i]->ItemName.c_str();
        if(!strchr(tagName2.c_str(), '#')) {
           OPCServer->OPCGroups->Items[0]->OPCItems->AddItem(tagName2,false);
        }
}
      ShowStatus();
      OPCServer->Browser->Filter = eFilter->Text;
      OPCServer->Browser->Datatype = (dOPCADatatype) cDataType->ItemIndex;
      OPCServer->Browser->AccessRights.Clear();
      if (cbWrite->Checked)
         OPCServer->Browser->AccessRights = OPCServer->Browser->AccessRights << opcWritable;
      if (cbRead->Checked)
         OPCServer->Browser->AccessRights = OPCServer->Browser->AccessRights << opcReadable;
      GetAllItems(OPCServer->Browser,Memo2->Lines);

    }
    __finally
    {
      OPCServer->Active = false;
    }
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button6Click(TObject *Sender)
{
Edit2->Text="192.168.100.245";
Edit3->Text="opc";
Edit4->Text="opcpass";
Edit5->Text="opc";
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button5Click(TObject *Sender)
{
Edit2->Text="localhost";
Edit3->Text="user";
Edit4->Text="user";
Edit5->Text="test";
}
//---------------------------------------------------------------------------





