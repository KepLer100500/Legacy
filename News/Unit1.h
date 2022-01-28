//---------------------------------------------------------------------------

#ifndef Unit1H
#define Unit1H
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <ExtCtrls.hpp>
#include <jpeg.hpp>
#include <Graphics.hpp>
#include "SHDocVw_OCX.h"
#include <OleCtrls.hpp>
#include "MSHTML_OCX.h"
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// IDE-managed Components
        TTimer *Timer1;
        TLabel *Label2;
        TPanel *Panel1;
        TImage *Image2;
        TLabel *Label1;
        TLabel *Label3;
        TLabel *Label4;
        TCppWebBrowser *CppWebBrowser1;
        void __fastcall Timer1Timer(TObject *Sender);
        void __fastcall Label2Click(TObject *Sender);
        void __fastcall FormCreate(TObject *Sender);
private:	// User declarations
public:		// User declarations
        __fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
