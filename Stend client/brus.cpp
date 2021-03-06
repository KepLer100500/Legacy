//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop
#include "windows.h"
#include "brus.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma link "CPort"
#pragma link "CPortCtl"
#pragma resource "*.dfm"
TForm1 *Form1;

AnsiString FilePath = ExtractFilePath(Application->ExeName);

//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
        : TForm(Owner)
{
}
//---------------------------------------------------------------------------

void __fastcall TForm1::ComPerserTimer(TObject *Sender)
{
String parse = "";
AnsiString Img = "";

for(int i=0;i<Memo1->Lines->Count;i++){
parse = Memo1->Lines->Strings[i];
//
if(parse == "sw_ypg=0" && sw_upg->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_upg->Picture->LoadFromFile(Img);
        sw_upg->Tag = 0;
}
if(parse == "sw_ypg=1" && sw_upg->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_upg->Picture->LoadFromFile(Img);
        sw_upg->Tag = 1;
}
//
if(parse == "sw_ypg_gjs_vibor=0" && sw_ypg_gjs_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_ypg_gjs_vibor->Picture->LoadFromFile(Img);
        sw_ypg_gjs_vibor->Tag = 0;
}
if(parse == "sw_ypg_gjs_vibor=1" && sw_ypg_gjs_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_ypg_gjs_vibor->Picture->LoadFromFile(Img);
        sw_ypg_gjs_vibor->Tag = 1;
}
//
if(parse == "sw_ygp_vanna_vibor=0" && sw_ygp_vanna_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_ygp_vanna_vibor->Picture->LoadFromFile(Img);
        sw_ygp_vanna_vibor->Tag = 0;
}
if(parse == "sw_ygp_vanna_vibor=1" && sw_ygp_vanna_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_ygp_vanna_vibor->Picture->LoadFromFile(Img);
        sw_ygp_vanna_vibor->Tag = 1;
}
//
if(parse == "sw_ypg_tvy_vibor=0" && sw_ypg_tvy_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_ypg_tvy_vibor->Picture->LoadFromFile(Img);
        sw_ypg_tvy_vibor->Tag = 0;
}
if(parse == "sw_ypg_tvy_vibor=1" && sw_ypg_tvy_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_ypg_tvy_vibor->Picture->LoadFromFile(Img);
        sw_ypg_tvy_vibor->Tag = 1;
}
//
if(parse == "sw_ypg_pds_vibor=0" && sw_ypg_pds_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_ypg_pds_vibor->Picture->LoadFromFile(Img);
        sw_ypg_pds_vibor->Tag = 0;
}
if(parse == "sw_ypg_pds_vibor=1" && sw_ypg_pds_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_ypg_pds_vibor->Picture->LoadFromFile(Img);
        sw_ypg_pds_vibor->Tag = 1;
}
//
if(parse == "sw_well_yst_vibor=0" && sw_well_yst_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_well_yst_vibor->Picture->LoadFromFile(Img);
        sw_well_yst_vibor->Tag = 0;
}
if(parse == "sw_well_yst_vibor=1" && sw_well_yst_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_well_yst_vibor->Picture->LoadFromFile(Img);
        sw_well_yst_vibor->Tag = 1;
}
//
if(parse == "sw_well_fvy_vibor=0" && sw_well_fvy_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_well_fvy_vibor->Picture->LoadFromFile(Img);
        sw_well_fvy_vibor->Tag = 0;
}
if(parse == "sw_well_fvy_vibor=1" && sw_well_fvy_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_well_fvy_vibor->Picture->LoadFromFile(Img);
        sw_well_fvy_vibor->Tag = 1;
}
//
if(parse == "sw_well_pds_vibor=0" && sw_well_pds_vibor->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_well_pds_vibor->Picture->LoadFromFile(Img);
        sw_well_pds_vibor->Tag = 0;
}
if(parse == "sw_well_pds_vibor=1" && sw_well_pds_vibor->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_well_pds_vibor->Picture->LoadFromFile(Img);
        sw_well_pds_vibor->Tag = 1;
}
//--------------------------------
//
if(parse == "sw_pko=0" && sw_pko->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_pko->Picture->LoadFromFile(Img);
        sw_pko->Tag = 0;
}
if(parse == "sw_pko=1" && sw_pko->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_pko->Picture->LoadFromFile(Img);
        sw_pko->Tag = 1;
}
//
if(parse == "sw_cz=0" && sw_cz->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_cz->Picture->LoadFromFile(Img);
        sw_cz->Tag = 0;
}
if(parse == "sw_cz=1" && sw_cz->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_cz->Picture->LoadFromFile(Img);
        sw_cz->Tag = 1;
}
//
if(parse == "sw_bz=0" && sw_bz->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_bz->Picture->LoadFromFile(Img);
        sw_bz->Tag = 0;
}
if(parse == "sw_bz=1" && sw_bz->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_bz->Picture->LoadFromFile(Img);
        sw_bz->Tag = 1;
}
//----------------------
//
if(parse == "sw_block_pal035=0" && sw_block_pal035->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        sw_block_pal035->Picture->LoadFromFile(Img);
        sw_block_pal035->Tag = 0;
}
if(parse == "sw_block_pal035=1" && sw_block_pal035->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_block_pal035->Picture->LoadFromFile(Img);
        sw_block_pal035->Tag = 1;
}
//
if(parse == "sw_block_pal007=0" && sw_block_pal007->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        sw_block_pal007->Picture->LoadFromFile(Img);
        sw_block_pal007->Tag = 0;
}
if(parse == "sw_block_pal007=1" && sw_block_pal007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_block_pal007->Picture->LoadFromFile(Img);
        sw_block_pal007->Tag = 1;
}
//
if(parse == "sw_block_pah007=0" && sw_block_pah007->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        sw_block_pah007->Picture->LoadFromFile(Img);
        sw_block_pah007->Tag = 0;
}
if(parse == "sw_block_pah007=1" && sw_block_pah007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_block_pah007->Picture->LoadFromFile(Img);
        sw_block_pah007->Tag = 1;
}
//
if(parse == "sw_block_pal012=0" && sw_block_pal012->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        sw_block_pal012->Picture->LoadFromFile(Img);
        sw_block_pal012->Tag = 0;
}
if(parse == "sw_block_pal012=1" && sw_block_pal012->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_block_pal012->Picture->LoadFromFile(Img);
        sw_block_pal012->Tag = 1;
}
//
if(parse == "sw_block_fal001=0" && sw_block_fal001->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        sw_block_fal001->Picture->LoadFromFile(Img);
        sw_block_fal001->Tag = 0;
}
if(parse == "sw_block_fal001=1" && sw_block_fal001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_block_fal001->Picture->LoadFromFile(Img);
        sw_block_fal001->Tag = 1;
}
//
if(parse == "sw_enter_pc=0" && sw_enter_pc->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_enter_pc->Picture->LoadFromFile(Img);
        sw_enter_pc->Tag = 0;
}
if(parse == "sw_enter_pc=1" && sw_enter_pc->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_enter_pc->Picture->LoadFromFile(Img);
        sw_enter_pc->Tag = 1;
}
//--------------------------
//
if(parse == "sw_sbros_logic=0" && sw_sbros_logic->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_sbros_logic->Picture->LoadFromFile(Img);
        sw_sbros_logic->Tag = 0;
}
if(parse == "sw_sbros_logic=1" && sw_sbros_logic->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_sbros_logic->Picture->LoadFromFile(Img);
        sw_sbros_logic->Tag = 1;
}
//
if(parse == "sw_mod_hs005=0" && sw_mod_hs005->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_hs005->Picture->LoadFromFile(Img);
        sw_mod_hs005->Tag = 0;
}
if(parse == "sw_mod_hs005=1" && sw_mod_hs005->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_hs005->Picture->LoadFromFile(Img);
        sw_mod_hs005->Tag = 1;
}
//
if(parse == "sw_mod_ostanov=0" && sw_mod_ostanov->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_ostanov->Picture->LoadFromFile(Img);
        sw_mod_ostanov->Tag = 0;
}
if(parse == "sw_mod_ostanov=1" && sw_mod_ostanov->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_ostanov->Picture->LoadFromFile(Img);
        sw_mod_ostanov->Tag = 1;
}
//
if(parse == "sw_mod_pal035=0" && sw_mod_pal035->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_pal035->Picture->LoadFromFile(Img);
        sw_mod_pal035->Tag = 0;
}
if(parse == "sw_mod_pal035=1" && sw_mod_pal035->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_pal035->Picture->LoadFromFile(Img);
        sw_mod_pal035->Tag = 1;
}
//
if(parse == "sw_mod_pah007=0" && sw_mod_pah007->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_pah007->Picture->LoadFromFile(Img);
        sw_mod_pah007->Tag = 0;
}
if(parse == "sw_mod_pah007=1" && sw_mod_pah007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_pah007->Picture->LoadFromFile(Img);
        sw_mod_pah007->Tag = 1;
}
//
if(parse == "sw_mod_pal007=0" && sw_mod_pal007->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_pal007->Picture->LoadFromFile(Img);
        sw_mod_pal007->Tag = 0;
}
if(parse == "sw_mod_pal007=1" && sw_mod_pal007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_pal007->Picture->LoadFromFile(Img);
        sw_mod_pal007->Tag = 1;
}
//
if(parse == "sw_mod_lall003=0" && sw_mod_lall003->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_lall003->Picture->LoadFromFile(Img);
        sw_mod_lall003->Tag = 0;
}
if(parse == "sw_mod_lall003=1" && sw_mod_lall003->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_lall003->Picture->LoadFromFile(Img);
        sw_mod_lall003->Tag = 1;
}
//
if(parse == "sw_mod_bal002=0" && sw_mod_bal002->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_bal002->Picture->LoadFromFile(Img);
        sw_mod_bal002->Tag = 0;
}
if(parse == "sw_mod_bal002=1" && sw_mod_bal002->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_bal002->Picture->LoadFromFile(Img);
        sw_mod_bal002->Tag = 1;
}
//
if(parse == "sw_mod_bal001=0" && sw_mod_bal001->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_bal001->Picture->LoadFromFile(Img);
        sw_mod_bal001->Tag = 0;
}
if(parse == "sw_mod_bal001=1" && sw_mod_bal001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_bal001->Picture->LoadFromFile(Img);
        sw_mod_bal001->Tag = 1;
}
//
if(parse == "sw_mod_pah016=0" && sw_mod_pah016->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_pah016->Picture->LoadFromFile(Img);
        sw_mod_pah016->Tag = 0;
}
if(parse == "sw_mod_pah016=1" && sw_mod_pah016->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_pah016->Picture->LoadFromFile(Img);
        sw_mod_pah016->Tag = 1;
}
//
if(parse == "sw_mod_pal016=0" && sw_mod_pal016->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_pal016->Picture->LoadFromFile(Img);
        sw_mod_pal016->Tag = 0;
}
if(parse == "sw_mod_pal016=1" && sw_mod_pal016->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_pal016->Picture->LoadFromFile(Img);
        sw_mod_pal016->Tag = 1;
}
//
if(parse == "sw_mod_aah001=0" && sw_mod_aah001->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        sw_mod_aah001->Picture->LoadFromFile(Img);
        sw_mod_aah001->Tag = 0;
}
if(parse == "sw_mod_aah001=1" && sw_mod_aah001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        sw_mod_aah001->Picture->LoadFromFile(Img);
        sw_mod_aah001->Tag = 1;
}
//--------------------
//
if(parse.Pos("pt_012=")){
        parse.Delete(1,parse.Pos("="));
        pt_012->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("tt_008=")){
        parse.Delete(1,parse.Pos("="));
        tt_008->Text = parse.Insert(" C", parse.Length()+1);
}
//
if(parse.Pos("pit_003=")){
        parse.Delete(1,parse.Pos("="));
        pit_003->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("tt_202=")){
        parse.Delete(1,parse.Pos("="));
        tt_202->Text = parse.Insert(" C", parse.Length()+1);
}
//
if(parse.Pos("ft_002=")){
        parse.Delete(1,parse.Pos("="));
        ft_002->Text = parse.Insert(" ?3/?", parse.Length()+1);
}
//
if(parse.Pos("psl_064=")){
        parse.Delete(1,parse.Pos("="));
        psl_064->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("fvy_001=")){
        parse.Delete(1,parse.Pos("="));
        fvy_001->Text = parse.Insert(" %", parse.Length()+1);
}
//
if(parse.Pos("pit_001=")){
        parse.Delete(1,parse.Pos("="));
        pit_001->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("pdit_001=")){
        parse.Delete(1,parse.Pos("="));
        pdit_001->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("fit_001=")){
        parse.Delete(1,parse.Pos("="));
        fit_001->Text = parse.Insert(" ?3/?", parse.Length()+1);
}
//
if(parse.Pos("tt_004=")){
        parse.Delete(1,parse.Pos("="));
        tt_004->Text = parse.Insert(" ?", parse.Length()+1);
}
//
if(parse.Pos("tvy_004=")){
        parse.Delete(1,parse.Pos("="));
        tvy_004->Text = parse.Insert(" %", parse.Length()+1);
}
//
if(parse.Pos("pt_049=")){
        parse.Delete(1,parse.Pos("="));
        pt_049->Text = parse.Insert(" ???", parse.Length()+1);
}
//
if(parse.Pos("tt_001=")){
        parse.Delete(1,parse.Pos("="));
        tt_001->Text = parse.Insert(" ?", parse.Length()+1);
}

//
if(parse.Pos("tt_001_yst=")){
        parse.Delete(1,parse.Pos("="));
        tt_001_yst->Text = parse.Insert(" ?", parse.Length()+1);
}
//
if(parse.Pos("tt_004_yst=")){
        parse.Delete(1,parse.Pos("="));
        tt_004_yst->Text = parse.Insert(" ?", parse.Length()+1);
}
//
if(parse.Pos("tvy_004_yst=")){
        parse.Delete(1,parse.Pos("="));
        tvy_004_yst->Text = parse.Insert(" %", parse.Length()+1);
}
//
if(parse.Pos("fit_001_yst=")){
        parse.Delete(1,parse.Pos("="));
        fit_001_yst->Text = parse.Insert(" ?3/?", parse.Length()+1);
}
//
if(parse.Pos("fvy_001_yst=")){
        parse.Delete(1,parse.Pos("="));
        fvy_001_yst->Text = parse.Insert(" %", parse.Length()+1);
}
//-----------------------                       
//
if(parse == "bool_led_ypg_flame_micro=0" && bool_led_ypg_flame_micro->Tag != 0){
        bool_led_ypg_flame_micro->Visible = false;
        bool_led_ypg_flame_micro->Tag = 0;
}
if(parse == "bool_led_ypg_flame_micro=1" && bool_led_ypg_flame_micro->Tag != 1){
        bool_led_ypg_flame_micro->Visible = true;
        bool_led_ypg_flame_micro->Tag = 1;
}
//
if(parse == "bool_led_ypg_flame_max=0" && bool_led_ypg_flame_max->Tag != 0){
        bool_led_ypg_flame_max->Visible = false;
        bool_led_ypg_flame_max->Tag = 0;
}
if(parse == "bool_led_ypg_flame_max=1" && bool_led_ypg_flame_max->Tag != 1){
        bool_led_ypg_flame_max->Visible = true;
        bool_led_ypg_flame_max->Tag = 1;
}
//-----------------------
//
if(parse == "bool_led_usv001=0" && bool_led_usv001->Tag != 0){
        Img = FilePath + "/img/valve_90_red.jpg";
        bool_led_usv001->Picture->LoadFromFile(Img);
        bool_led_usv001->Tag = 0;
}
if(parse == "bool_led_usv001=1" && bool_led_usv001->Tag != 1){
        Img = FilePath + "/img/valve_90_green.jpg";
        bool_led_usv001->Picture->LoadFromFile(Img);
        bool_led_usv001->Tag = 1;
}
//
if(parse == "bool_led_usv002=0" && bool_led_usv002->Tag != 0){
        Img = FilePath + "/img/valve_90_yellow.jpg";
        bool_led_usv002->Picture->LoadFromFile(Img);
        bool_led_usv002->Tag = 0;
}
if(parse == "bool_led_usv002=1" && bool_led_usv002->Tag != 1){
        Img = FilePath + "/img/valve_90_green.jpg";
        bool_led_usv002->Picture->LoadFromFile(Img);
        bool_led_usv002->Tag = 1;
}
if(parse == "bool_led_usv002=2" && bool_led_usv002->Tag != 2){
        Img = FilePath + "/img/valve_90_red.jpg";
        bool_led_usv002->Picture->LoadFromFile(Img);
        bool_led_usv002->Tag = 2;
}
//
if(parse == "bool_led_usv004=0" && bool_led_usv004->Tag != 0){
        Img = FilePath + "/img/valve_45_yellow.jpg";
        bool_led_usv004->Picture->LoadFromFile(Img);
        bool_led_usv004->Tag = 0;
}
if(parse == "bool_led_usv004=1" && bool_led_usv004->Tag != 1){
        Img = FilePath + "/img/valve_45_green.jpg";
        bool_led_usv004->Picture->LoadFromFile(Img);
        bool_led_usv004->Tag = 1;
}
if(parse == "bool_led_usv004=2" && bool_led_usv004->Tag != 2){
        Img = FilePath + "/img/valve_45_red.jpg";
        bool_led_usv004->Picture->LoadFromFile(Img);
        bool_led_usv004->Tag = 2;
}
//------------------------
//
if(parse == "bool_led_pal012=0" && bool_led_pal012->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_pal012->Picture->LoadFromFile(Img);
        bool_led_pal012->Tag = 0;
}
if(parse == "bool_led_pal012=1" && bool_led_pal012->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_pal012->Picture->LoadFromFile(Img);
        bool_led_pal012->Tag = 1;
}
//
if(parse == "bool_led_pal035=0" && bool_led_pal035->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_pal035->Picture->LoadFromFile(Img);
        bool_led_pal035->Tag = 0;
}
if(parse == "bool_led_pal035=1" && bool_led_pal035->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_pal035->Picture->LoadFromFile(Img);
        bool_led_pal035->Tag = 1;
}
//
if(parse == "bool_led_fvy001=0" && bool_led_fvy001->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_fvy001->Picture->LoadFromFile(Img);
        bool_led_fvy001->Tag = 0;
}
if(parse == "bool_led_fvy001=1" && bool_led_fvy001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_fvy001->Picture->LoadFromFile(Img);
        bool_led_fvy001->Tag = 1;
}
//
if(parse == "bool_led_psl016=0" && bool_led_psl016->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_psl016->Picture->LoadFromFile(Img);
        bool_led_psl016->Tag = 0;
}
if(parse == "bool_led_psl016=1" && bool_led_psl016->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_psl016->Picture->LoadFromFile(Img);
        bool_led_psl016->Tag = 1;
}
//
if(parse == "bool_led_psh016=0" && bool_led_psh016->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_psh016->Picture->LoadFromFile(Img);
        bool_led_psh016->Tag = 0;
}
if(parse == "bool_led_psh016=1" && bool_led_psh016->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_psh016->Picture->LoadFromFile(Img);
        bool_led_psh016->Tag = 1;
}
//
if(parse == "bool_led_bal002=0" && bool_led_bal002->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_bal002->Picture->LoadFromFile(Img);
        bool_led_bal002->Tag = 0;
}
if(parse == "bool_led_bal002=1" && bool_led_bal002->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_bal002->Picture->LoadFromFile(Img);
        bool_led_bal002->Tag = 1;
}
//
if(parse == "bool_led_psl007=0" && bool_led_psl007->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_psl007->Picture->LoadFromFile(Img);
        bool_led_psl007->Tag = 0;
}
if(parse == "bool_led_psl007=1" && bool_led_psl007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_psl007->Picture->LoadFromFile(Img);
        bool_led_psl007->Tag = 1;
}
//
if(parse == "bool_led_psh007=0" && bool_led_psh007->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_psh007->Picture->LoadFromFile(Img);
        bool_led_psh007->Tag = 0;
}
if(parse == "bool_led_psh007=1" && bool_led_psh007->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_psh007->Picture->LoadFromFile(Img);
        bool_led_psh007->Tag = 1;
}
//
if(parse == "bool_led_lsl003=0" && bool_led_lsl003->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_lsl003->Picture->LoadFromFile(Img);
        bool_led_lsl003->Tag = 0;
}
if(parse == "bool_led_lsl003=1" && bool_led_lsl003->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_lsl003->Picture->LoadFromFile(Img);
        bool_led_lsl003->Tag = 1;
}
//
if(parse == "bool_led_lsll003=0" && bool_led_lsll003->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_lsll003->Picture->LoadFromFile(Img);
        bool_led_lsll003->Tag = 0;
}
if(parse == "bool_led_lsll003=1" && bool_led_lsll003->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_lsll003->Picture->LoadFromFile(Img);
        bool_led_lsll003->Tag = 1;
}
//
if(parse == "bool_led_fal001=0" && bool_led_fal001->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_fal001->Picture->LoadFromFile(Img);
        bool_led_fal001->Tag = 0;
}
if(parse == "bool_led_fal001=1" && bool_led_fal001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_fal001->Picture->LoadFromFile(Img);
        bool_led_fal001->Tag = 1;
}
//---------------------------
//
if(parse == "bool_led_usv006=0" && bool_led_usv006->Tag != 0){
        Img = FilePath + "/img/valve_red.jpg";
        bool_led_usv006->Picture->LoadFromFile(Img);
        bool_led_usv006->Tag = 0;
}
if(parse == "bool_led_usv006=1" && bool_led_usv006->Tag != 1){
        Img = FilePath + "/img/valve_green.jpg";
        bool_led_usv006->Picture->LoadFromFile(Img);
        bool_led_usv006->Tag = 1;
}
//
if(parse == "bool_led_tvy004=0" && bool_led_tvy004->Tag != 0){
        Img = FilePath + "/img/valve_red.jpg";
        bool_led_tvy004->Picture->LoadFromFile(Img);
        bool_led_tvy004->Tag = 0;
}
if(parse == "bool_led_tvy004=1" && bool_led_tvy004->Tag != 1){
        Img = FilePath + "/img/valve_green.jpg";
        bool_led_tvy004->Picture->LoadFromFile(Img);
        bool_led_tvy004->Tag = 1;
}
//
if(parse == "bool_led_usv007=0" && bool_led_usv007->Tag != 0){
        Img = FilePath + "/img/valve_red.jpg";
        bool_led_usv007->Picture->LoadFromFile(Img);
        bool_led_usv007->Tag = 0;
}
if(parse == "bool_led_usv007=1" && bool_led_usv007->Tag != 1){
        Img = FilePath + "/img/valve_green.jpg";
        bool_led_usv007->Picture->LoadFromFile(Img);
        bool_led_usv007->Tag = 1;
}
//
if(parse == "bool_led_uy020=0" && bool_led_uy020->Tag != 0){
        Img = FilePath + "/img/valve_red.jpg";
        bool_led_uy020->Picture->LoadFromFile(Img);
        bool_led_uy020->Tag = 0;
}
if(parse == "bool_led_uy020=1" && bool_led_uy020->Tag != 1){
        Img = FilePath + "/img/valve_green.jpg";
        bool_led_uy020->Picture->LoadFromFile(Img);
        bool_led_uy020->Tag = 1;
}
//---------------
//
if(parse == "bool_led_flare_bal001=0" && bool_led_flare_bal001->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_flare_bal001->Picture->LoadFromFile(Img);
        bool_led_flare_bal001->Tag = 0;
}
if(parse == "bool_led_flare_bal001=1" && bool_led_flare_bal001->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_flare_bal001->Picture->LoadFromFile(Img);
        bool_led_flare_bal001->Tag = 1;
}
//
if(parse == "bool_led_flare_bal003=0" && bool_led_flare_bal003->Tag != 0){
        Img = FilePath + "/img/red.jpg";
        bool_led_flare_bal003->Picture->LoadFromFile(Img);
        bool_led_flare_bal003->Tag = 0;
}
if(parse == "bool_led_flare_bal003=1" && bool_led_flare_bal003->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_flare_bal003->Picture->LoadFromFile(Img);
        bool_led_flare_bal003->Tag = 1;
}
//------------------
if(sw_ypg_pds_vibor->Tag == 0) {
        distance_podogrev->Text = "???";
}
if(sw_ypg_pds_vibor->Tag == 1) {
        distance_podogrev->Text = "??";
}
if(sw_well_pds_vibor->Tag == 0) {
        distance_rashod->Text = "???";
}
if(sw_well_pds_vibor->Tag == 1) {
        distance_rashod->Text = "??";
}
//------------------
//
if(parse == "bool_led_flare_flame=0" && bool_led_flare_flame->Tag != 0){
        bool_led_flare_flame->Visible = false;
        bool_led_flare_flame->Tag = 0;
}
if(parse == "bool_led_flare_flame=1" && bool_led_flare_flame->Tag != 1){
        bool_led_flare_flame->Visible = true;
        bool_led_flare_flame->Tag = 1;
}
//-----------------
//
if(parse == "bool_led_flare_ign=0" && bool_led_flare_ign1->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        bool_led_flare_ign1->Picture->LoadFromFile(Img);
        bool_led_flare_ign1->Tag = 0;
        bool_led_flare_ign2->Picture->LoadFromFile(Img);
        bool_led_flare_ign2->Tag = 0;
}
if(parse == "bool_led_flare_ign=1" && bool_led_flare_ign1->Tag != 1){
        Img = FilePath + "/img/spark.jpg";
        bool_led_flare_ign1->Picture->LoadFromFile(Img);
        bool_led_flare_ign1->Tag = 1;
        bool_led_flare_ign2->Picture->LoadFromFile(Img);
        bool_led_flare_ign2->Tag = 1;
}
//----------------
//
if(parse == "bool_led_stend_1_green=0" && bool_led_stend_1_green->Tag != 0){
        Img = FilePath + "/img/white.jpg";
        bool_led_stend_1_green->Picture->LoadFromFile(Img);
        bool_led_stend_1_green->Tag = 0;
}
if(parse == "bool_led_stend_1_green=1" && bool_led_stend_1_green->Tag != 1){
        Img = FilePath + "/img/green.jpg";
        bool_led_stend_1_green->Picture->LoadFromFile(Img);
        bool_led_stend_1_green->Tag = 1;
}




}
}
//---------------------------------------------------------------------------

void __fastcall TForm1::Button1Click(TObject *Sender)
{
ComPort1->ShowSetupDialog();
ComPort1->Connected = true;
ComRead->Enabled = true;
}
//---------------------------------------------------------------------------

void __fastcall TForm1::ComReadTimer(TObject *Sender)
{
int i=0,val;
AnsiString s="";
Memo1->Clear();

if(ComPort1->InputCount()!=0){
        i=ComPort1->InputCount();
        ComPort1->ReadStr(s,i);
        Memo1->Lines->Add(s);
}

}
//---------------------------------------------------------------------------





