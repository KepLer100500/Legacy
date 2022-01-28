//---------------------------------------------------------------------------

#ifndef uMainH
#define uMainH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include "dOPC.hpp"
#include <ExtCtrls.hpp>
#include "dOPCComn.hpp"
#include "dOPCIntf.hpp"
#include "trayicon.h"
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// IDE-managed Components
        TPanel *TopPanel;
        TLabel *Label1;
        TComboBox *ServerCombo;
        TButton *bConnect;
        TComboBox *cDataType;
        TEdit *eFilter;
        TCheckBox *cbRead;
        TCheckBox *cbWrite;
        TMemo *Memo1;
        TdOPCServer *OPCServer;
        TMemo *Memo2;
        TTimer *Timer1;
        TEdit *Edit1;
        TLabel *Label4;
        TButton *Button1;
        TMemo *Memo3;
        TMemo *Memo4;
        TButton *Button2;
        TTrayIcon *TrayIcon1;
        TMemo *Memo5;
        TMemo *Memo6;
        TdOPCServer *OPCServer0;
        TLabel *Label2;
        TLabel *Label3;
        TButton *Button3;
        TButton *Button4;
        TLabel *Label5;
        TGroupBox *GroupBox1;
        TEdit *Edit2;
        TEdit *Edit3;
        TEdit *Edit4;
        TEdit *Edit5;
        TButton *Button5;
        TLabel *Label6;
        TLabel *Label7;
        TLabel *Label8;
        TLabel *Label9;
        TButton *Button6;
        void __fastcall bConnectClick(TObject *Sender);
        void __fastcall FormShow(TObject *Sender);
        void __fastcall ServerComboDropDown(TObject *Sender);
        void __fastcall Button1Click(TObject *Sender);
        void __fastcall FormCreate(TObject *Sender);
        void __fastcall Button2Click(TObject *Sender);
        void __fastcall TrayIcon1Click(TObject *Sender);
        void __fastcall OPCServer0Datachange(TObject *Sender,
          TdOPCItemList *ItemList);
        void __fastcall Button4Click(TObject *Sender);
        void __fastcall Button3Click(TObject *Sender);
        void __fastcall Button6Click(TObject *Sender);
        void __fastcall Button5Click(TObject *Sender);
private:	// User declarations
        void __fastcall ShowStatus(void);
public:		// User declarations
        __fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
