#include <Wire.h>                     // Библиотека I2C
#include <LiquidCrystal_I2C.h>
#include <MCP23x17.h>
#include <MCP23017.h>

CMCP23017 DDO_1;
CMCP23017 DDO_2;
CMCP23017 DDO_3;
CMCP23017 DDO_4;
CMCP23017 DDO_5;
CMCP23017 DDO_6;
CMCP23017 DDI_1;
CMCP23017 DDI_2;


double znach_test = 0.0000;
double ust=5000, e=0, voz=0, znach = 100, voz1=0, ust_fvy=0;
double Ki=0.2, I=0;
double znach_test1=0, e1=0;
double TI001_XM05=0, TI001_KELV=0;
double PI001_XM05=0, PDI001_XM05=0, QP_FACTOR_M=25.6714, PI012_XM03=0, PI001_VICH=0;
double FI001_XM20=0;
double pozic=0;


int q =0;
int old_dros=0;

long x=0;
int x1=0;
long timeflops = 0;



bool stop_bar = 0;

long timeupg_on = 0;
long timeupg_off = 0;
long timecz_on = 0;
long timecz_off = 0;
long timebz_on = 0;
long timebz_off = 0;
long timepko_on = 0;
long timepko_off = 0;
long time_mod_ostanov = 0;
long time_mod_hs005 = 0;
long time_pal035 = 0;
long time_pal007 = 0;
long time_pah007 = 0;

bool flag_upg_on = 0;
bool flag_upg_off = 0;
bool flag_cz_on = 0;
bool flag_cz_off = 0;
bool flag_bz_on = 0;
bool flag_bz_off = 0;
bool flag_pko_on = 0;
bool flag_pko_off = 0;
bool flag_mod_ostanov = 0;
bool flag_mod_hs005 = 0;
bool flag_pal035 = 0;
bool flag_pal007 = 0;
bool flag_pah007 = 0;

bool www=1;
bool www1=1;
bool www2=1;
bool www3=1;
bool www4=1;
bool www5=1;
bool www6=1;
bool www7=1;
bool www8=1;
bool www9=1;
bool www10=1;
bool www11=1;
bool www12=1;



//***************************************Кнопки воздействий***************************************************************************************

// Выбор режимов управления устьевым подогревателем

bool sw_ypg = 0;				// CТАРТ СТОП подогревателя
bool sw_ypg_gjs_vibor = 1;		// Выбор режима по температуре ГЖС
bool sw_ygp_vanna_vibor = 0;	      // Выбор режима по температуре ванны
bool sw_ypg_tvy_vibor = 0;		// Выбор режима по проценту открытия клапана TVY-004
bool sw_ypg_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС выбран режим


// Выбор режимов по управлению расходом скважины


bool sw_well_yst_vibor = 1;		// Выборо режима управления расходом по уставке
bool sw_well_fvy_vibor = 0;		// Процентом открытия FVY-001
bool sw_well_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС


// Управление фонтанной арматурой

bool sw_pko	= 0;			// Подземный клапан отсекатель 
bool sw_cz = 0;				// Центральная задвижка
bool sw_bz = 0;				// Боковая задвижка

// Управление Блокировками сигналов

//**************жестко фиксируемые контакты*******************************

bool sw_block_pal035 = 0;			// PAL-035 Блокировка включена DDI_2_91
bool sw_block_pal007 = 0;			// PAL-007 Блокировка включена DDI_2_10
bool sw_block_pah007 = 0;			// PAH-007 Блокировка включена DDI_2_11
bool sw_block_pal012 = 0;			// PAL-012 Блокировка включена DDI_2_12
bool sw_block_fal001 = 0;			// FAL-001 Блокировка включена DDI_2_13
bool sw_enter_pc = 0;				// Отдать управление компьютеру DDI_2_14

//************************************************************************

bool sw_sbros_logic = 1;		// Сброс логики аварийных сигналов DDI_2_15
bool led_stend = 0;


// Кнопки моделирования аварийных ситуаций

bool sw_mod_hs005 = 1;			// HS-005 HS-006 Аварийный останов имитация сигнала DDI_3_0
bool sw_mod_ostanov = 1;		// Останов с терминала Magelis имитация сигнала DDI_3_1
bool sw_mod_pal035 = 1;			// PAL-035 имитация сигнала DDI_3_2
bool sw_mod_pah007 = 1;			// PAH-007 имитация сигнала DDI_3_3
bool sw_mod_pal007 = 1;			// PAL-007 имитация сигнала DDI_3_4
bool sw_mod_lall003 = 1;		// LALL-003 имитация сигнала DDI_3_5
bool sw_mod_bal002 = 1;			// BAL-002 имитация сигнала DDI_3_6
bool sw_mod_bal001 = 1;			// BAL-001 имитация сигнала DDI_3_7
bool sw_mod_pah016 = 1;			// PAH-016 имитация сигнала DD_4_0
bool sw_mod_pal016 = 1;			// PAL-016 имитация сигнала DD_4_1
bool sw_mod_aah001 = 1;			// AAH-001 имитация сигнала DD_4_2
//****************************Переменные данных********************************************************************************

// Данные ГЖС устья lcd_1

int pt_012 = 200;			// Значение PT-012 давление на устье
int pt_012_stop = 0;
float tt_008 = 20.9;		// Значение TT-008 температура на устье

// Данные c уппг lcd_2

int pit_003 = 72;		// Значение PIT-003 давление в ГКП на УППГ
float tt_202 = 20.6;		// Значение TT-202 температура ГЖС от скважины на УППГ

// Данные чистого газа lcd_3

int ft_002 = 20;				// Значение FT-002 расход чистого газа
int psl_064 = 7;		// Значение PSL-064 давление чистого газа перед подогревателем

// Данные ГЖС на низкой стороне lcd_4

int fvy_001 = 47;			// Значение FVY-001 процент открытия клапана 
float pit_001 = 76.8;		// Значение PIT-001 давление на низкой стороне
float pdit_001 = 0.7;		// Значение PDIT-001 перепад давления
int fit_001 = 9000;		// Значение FIT-001 расход ГЖС

// Данные подогревателя lcd_5

float tt_004 = 50.4;		// Значение TT-004 температура ванны
int tvy_004 = 20;			// Значение TVY-004 процент открытия клапана
float pt_049 = 0.49;			// Значение PT-049 давление газа на горелке
float tt_001 = 20.3;		// Значение TT-001 температура ГЖС с выхода котла

// Уставки подогревателя lcd_6

int tt_001_yst = 50;		// Уставка температуры по выходу ГЖС
int tt_004_yst = 80;		// Уставка температуры по ванне
int tvy_004_yst = 45;		// Уставка по клапану

// Уставки расхода lcd_7

int fit_001_yst =/*менять кратно 300*/0;	// Уставка расхода скважины
int fvy_001_yst = 0;		// Устанка открытия клапана


LiquidCrystal_I2C lcd1(0x38, 16, 2);
LiquidCrystal_I2C lcd2(0x39, 16, 2);
LiquidCrystal_I2C lcd3(0x3a, 16, 2);

LiquidCrystal_I2C lcd4(0x3b, 20, 4);
LiquidCrystal_I2C lcd5(0x3c, 20, 4);
LiquidCrystal_I2C lcd6(0x3d, 20, 4);
LiquidCrystal_I2C lcd7(0x3e, 20, 4);

void setup()                      // Выполнение функции setup
{
  Wire.begin();

  DDO_1.init(0);
  DDO_2.init(1);
  DDO_3.init(2);
  DDO_4.init(3);
  DDO_5.init(4);
  DDO_6.init(5);
  DDI_1.init(6);
  DDI_2.init(7);



  for (int i=0; i<16; i++) {
    DDO_1.pinMode(i, OUTPUT);
    DDO_2.pinMode(i, OUTPUT);
    DDO_3.pinMode(i, OUTPUT);
    DDO_4.pinMode(i, OUTPUT);
    DDO_5.pinMode(i, OUTPUT);
    DDO_6.pinMode(i, OUTPUT);
    DDI_1.pinMode(i, INPUT);			// Делаем все пины микросхем Входами
    DDI_2.pinMode(i, INPUT);
  }
  pinMode(46, OUTPUT);				// FAL-001 зеленый
  pinMode(47, OUTPUT);	                        // FAL-001 красный

  for (int i=22; i<=32; i++)
  {		
    pinMode(i, INPUT);
  }

  for (int d=0; d<16; d++) {
    DDO_1.digitalWrite(d, LOW);
    DDO_2.digitalWrite(d, LOW);
    DDO_3.digitalWrite(d, LOW);
    DDO_4.digitalWrite(d, LOW);
    DDO_5.digitalWrite(d, LOW);
    DDO_6.digitalWrite(d, LOW);
  }

  lcd1.init();
  lcd1.backlight();
  lcd2.init();
  lcd2.backlight();
  lcd3.init();
  lcd3.backlight();
  lcd4.init();
  lcd4.backlight();
  lcd5.init();
  lcd5.backlight();
  lcd6.init();
  lcd6.backlight();
  lcd7.init();
  lcd7.backlight();

  lcd1.clear();
  lcd2.clear();
  lcd3.clear();
  lcd4.clear();
  lcd5.clear();
  lcd6.clear();
  lcd7.clear();

  initialization();

  for(int m=0;m<=15;m++)	// Пишем 0 на все пины 
  {			
    DDO_1.digitalWrite(m, LOW);
    DDO_2.digitalWrite(m, LOW);
    DDO_3.digitalWrite(m, LOW);
    DDO_4.digitalWrite(m, LOW);
    DDO_5.digitalWrite(m, LOW);
    DDO_6.digitalWrite(m, LOW);
  }
  digitalWrite(47, LOW);
  digitalWrite(46, LOW);

  first_start();
  lcd();


}

void loop()
{
  x1=x1+1;
  led_stend=!led_stend;
  sw();
  lcd_real();
  led_ypg (sw_ypg);


  if(sw_well_yst_vibor){
    pid();
  }

  if(sw_well_fvy_vibor){
    pid_rashod();
  }

  if (!sw_bz && sw_well_yst_vibor) {
    fit_001_yst = 0;
  }
  if (!sw_bz && sw_well_fvy_vibor) {
    fvy_001_yst = 0;
  }
  alarm_mod();


  if (sw_cz == 0)
  {
    stop_bar = 1;
  } 
  else {
    stop_bar = 0;
  }

  if(!stop_bar) {
    pt_012_stop = pt_012;
  }


  if (pit_001 > 90 && pit_001 < 100){
    pit_003 = 76;
  }
  if (pit_001 > 80 && pit_001 < 90){
    pit_003 = 74;
  }
  if (pit_001 > 76 && pit_001 < 80){
    pit_003 = 72;
  }
  if (pit_001 < 76){
    pit_003 = 72;
  }

  //led_ypg_flame_micro (sw_ypg);
  //led_ypg_flame_max (sw_ypg);
  led_ypg_gjs (sw_ypg_gjs_vibor);
  led_ypg_vanna (sw_ygp_vanna_vibor);
  led_ypg_tvy (sw_ypg_tvy_vibor);
  led_ypg_pds (sw_ypg_pds_vibor);
  led_well_yst (sw_well_yst_vibor);
  led_well_fvy (sw_well_fvy_vibor);
  led_well_pds (sw_well_pds_vibor);
  //led_pko (sw_pko);
  // led_cz (sw_cz);
  // led_bz (sw_bz);
  //led_usv001 (sw_pko);
  // led_usv002 (sw_cz);
  //led_usv004 (sw_bz);
  led_block_pal035 (sw_block_pal035);
  led_block_pal007 (sw_block_pal007);
  led_block_pah007 (sw_block_pah007);
  led_block_pal012 (sw_block_pal012);
  led_block_fal001 (sw_block_fal001);
  led_stend_2 (sw_enter_pc);
  led_stend_1_green (led_stend);
  led_flare_ign (led_stend);

  led_mod_hs005 (sw_mod_hs005);
  led_mod_ostanov (sw_mod_ostanov);
  led_mod_pal035 (sw_mod_pal035);
  led_mod_pah007 (sw_mod_pah007);
  led_mod_pal007 (sw_mod_pal007);
  led_mod_lall003 (sw_mod_lall003);
  led_mod_bal002 (sw_mod_bal002);
  led_mod_bal001 (sw_mod_bal001);
  led_mod_pah016 (sw_mod_pah016);
  led_mod_pal016 (sw_mod_pal016);
  led_mod_aah001 (sw_mod_aah001);
  led_sbros (sw_sbros_logic);



  if (!sw_mod_hs005 || !sw_mod_ostanov || !sw_mod_pal035 || !sw_mod_pah007 || !sw_mod_pal007 || !sw_mod_lall003 || !sw_mod_bal002 || !sw_mod_bal001 || !sw_mod_pah016 || !sw_mod_pal016 || !sw_mod_aah001) {
    sw_sbros_logic = 0;
  }  
  if (DDI_2.digitalRead(15) == HIGH)
  {
    sw_sbros_logic = 1;
  }
  if (sw_sbros_logic){
    first_start();
  }    


  // Задержка и последующее открытие usv006, 007, 004, flame..........**********************
  if (sw_ypg) {
    flag_upg_on = 1;
    if(www) {
      timeupg_on = millis();  
      www = 0;  
    }  
  }  

  if (flag_upg_on && sw_ypg) {
    flag_upg_on = 0;
    if(www == 0) {

      if (millis() - timeupg_on > 1000) {
        led_usv006 (1);
      }
      if (millis() - timeupg_on > 2000) {
        led_ypg_flame_micro (1);
      }
      if (millis() - timeupg_on > 3000) {
        led_usv007 (1);
      }
      if (millis() - timeupg_on > 5000) {
        led_tvy004 (1);
      }
      if (millis() - timeupg_on > 7000) {
        led_ypg_flame_max (1);
        led_bal002 (1);
        www1 = 1;
      }

    }
  }



  // Закрытие usv006, 007, 004, flame..........**********************
  if (sw_ypg == 0){
    flag_upg_off = 1;
    if(www1) {
      timeupg_off = millis();  
      www1 = 0;  
    }  
  }  

  if (flag_upg_off && sw_ypg == 0) {
    flag_upg_off = 0;
    if (www1 == 0) {
      if (millis() - timeupg_off > 1000) {
        led_usv006 (0);
        led_ypg_flame_micro (0);
        led_usv007 (0);
      }
      if (millis() - timeupg_off > 2000) {
        led_tvy004 (0);
      }
      if (millis() - timeupg_off > 3000) {
        led_ypg_flame_max (0);
        led_bal002 (0);
        www = 1;

      }
    }
  }
  //*****************Управление фонтанной арматурой*************

  led_pko (sw_pko);
  led_cz (sw_cz);
  led_bz (sw_bz);

  if (sw_pko == 0){
    sw_cz=0;
    sw_bz=0;
  }

  if (sw_cz == 0){
    sw_bz=0;
  }
  //*****************************Подземный клапан отсекатель*****************

  //открытие

  if (sw_pko) {
    flag_pko_on = 1;
    if(www6) {
      timepko_on = millis();  
      www6 = 0;  
    }  
  }  

  if (flag_pko_on && sw_pko) {
    flag_pko_on = 0;
    if(www6 == 0) {

      if (millis() - timepko_on > 1000) {
        led_usv001 (1);
        www7 = 1;
      }
    }
  }

  //закрытие


  if (sw_pko == 0) {
    flag_pko_off = 1;
    if(www7) {
      timepko_off = millis();  
      www7 = 0;  
    }  
  }  

  if (flag_pko_off) {
    flag_pko_off = 0;
    if(www7 == 0) {

      if (millis() - timepko_off > 1000) {
        led_usv001 (0);
        www6 = 1;
      }


    }
  }




  //************************************Центральная задвижка***************
  //открытие
  if (sw_cz) {
    flag_cz_on = 1;
    if(www2) {
      timecz_on = millis();  
      www2 = 0;  
    }  
  }  

  if (flag_cz_on) {
    flag_cz_on = 0;
    if(www2 == 0) {

      if (millis() - timecz_on > 1000) {
        led_usv002 (2);
      }
      if (millis() - timecz_on > 4000) {
        led_usv002 (1);
        www3 = 1;
      }

    }
  }

  //закрытие

  if (sw_cz == 0) {
    flag_cz_off = 1;
    if(www3) {
      timecz_off = millis();  
      www3 = 0;  
    }  
  }  

  if (flag_cz_off) {
    flag_cz_off = 0;
    if(www3 == 0) {
      if (DDO_5.digitalRead(2) == HIGH){
        if (millis() - timecz_off > 1000) {
          led_usv002 (2);
        }
      }
      if (millis() - timecz_off > 4000) {
        led_usv002 (0);
        www2 = 1;
      }

    }
  }

  //************************************Боковая задвижка***************

  //открытие
  if (sw_bz) {
    flag_bz_on = 1;
    if(www4) {
      timebz_on = millis();  
      www4 = 0;  
    }  
  }  

  if (flag_bz_on) {
    flag_bz_on = 0;
    if(www4 == 0) {

      if (millis() - timebz_on > 1000) {
        led_usv004 (2);
      }
      if (millis() - timebz_on > 4000) {
        led_usv004 (1);
        www5 = 1;
      }
    }
  }

  //закрытие

  if (sw_bz == 0) {
    flag_bz_off = 1;
    if(www5) {
      timebz_off = millis();  
      www5 = 0;  
    }  
  }  

  if (flag_bz_off) {
    flag_bz_off = 0;
    if(www5 == 0) {
      if (DDO_5.digitalRead(4) == HIGH){
        if (millis() - timebz_off > 2000) {
          led_usv004 (2);
        }
      }
      if (millis() - timebz_off > 5000) {
        led_usv004 (0);
        www4 = 1;
      }
    }
  }
  //**************************************Имитация сигнал останов с магелиса***************************


  if (sw_mod_ostanov == 1){
    www8 = 1;
  }

  if (sw_mod_ostanov == 0){

    flag_mod_ostanov = 1;

    if(www8) {
      time_mod_ostanov = millis();  
      www8 = 0;  
    }  
  }  

  if (flag_mod_ostanov) {
    flag_mod_ostanov = 0;

    if (www8 == 0) {
      if (millis() - time_mod_ostanov > 3000) {
        sw_bz = 0;
      }
    }
  }

  //****************************Имитация HS-005*************************



  if (sw_mod_hs005 == 1){
    www9 = 1;
  }

  if (sw_mod_hs005 == 0){

    flag_mod_hs005 = 1;

    if(www9) {
      time_mod_hs005 = millis();  
      www9 = 0;  
    }  
  }  

  if (flag_mod_hs005) {
    flag_mod_hs005 = 0;

    if (www9 == 0) {
      if (millis() - time_mod_hs005 > 3000) {
        sw_bz = 0;
      }
      if (millis() - time_mod_hs005 > 6000) {
        sw_cz = 0;
      }
      if (millis() - time_mod_hs005 > 11000) {
        sw_pko = 0;
      }
    }
  }
  //**********************************Имитация pal 007*************************************


  if (sw_mod_pal007 == 1){
    www11 = 1;
  }

  if (sw_mod_pal007 == 0){

    flag_pal007 = 1;

    if(www11) {
      time_pal007 = millis();  
      www11 = 0;  
    }  
  }  

  if (flag_pal007) {
    flag_pal007 = 0;

    if (www11 == 0) {
      if (millis() - time_pal007 > 3000) {
        sw_bz = 0;
      }
    }
  }


  //**********************************Имитация pah 007*************************************


  if (sw_mod_pah007 == 1){
    www12 = 1;
  }

  if (sw_mod_pah007 == 0){

    flag_pah007 = 1;

    if(www12) {
      time_pah007 = millis();  
      www12 = 0;  
    }  
  }  

  if (flag_pah007) {
    flag_pah007 = 0;

    if (www12 == 0) {
      if (millis() - time_pah007 > 3000) {
        sw_bz = 0;
      }
    }
  }




  //*************************************************************************
  //led_ypg_flame_micro();


  led_uy020 (1);
  led_flare_flame (1);
  led_flare_bal001 (1);
  led_flare_bal003 (1);
  //led_pal012  (1);
  //led_pal035 (1);
  //led_fvy001 (1);
  led_psl016 (1);
  led_psh016 (1);
  //led_usv007 (sw_ypg);
  //led_usv006 (sw_ypg);
  //led_tvy004 (sw_ypg);
  //led_bal002 (1);
  //led_psl007 (1);
  // led_psh007 (1);
  led_lsl003 (1);
  led_lsll003 (1);
  //led_fal001 (1);


}


void initialization()
{

  led_ypg (0);
  led_ypg_gjs (0);
  led_ypg_vanna (0);
  led_ypg_tvy (0);
  led_ypg_pds (0);
  led_well_yst (0);
  led_well_fvy (0);
  led_well_pds (0);
  led_pko (0);
  led_cz (0);
  led_bz (0);
  led_block_pal035 (0);
  led_block_pal007 (0);
  led_block_pah007 (0);
  led_block_pal012 (0);
  led_block_fal001 (0);
  led_mod_hs005 (0);
  led_mod_ostanov (0);
  led_mod_pal035 (0);
  led_mod_pah007 (0);
  led_mod_pal007 (0);
  led_mod_lall003 (0);
  led_mod_bal002 (0);
  led_mod_bal001 (0);
  led_mod_pah016 (0);
  led_mod_pal016 (0);
  led_mod_aah001 (0);
  led_sbros (0);
  led_uy020 (0);
  led_flare_ign (0);
  led_flare_flame (0);
  led_flare_bal001 (0);
  led_flare_bal003 (0);
  led_ypg_flame_micro (0);
  led_ypg_flame_max (0);
  led_stend_1_green (0);
  led_stend_2 (0);
  led_usv001 (0);
  led_usv002 (0);
  led_usv004 (0);
  led_pal012 (0);
  led_pal035 (0);
  led_fvy001 (0);
  led_psl016 (0);
  led_psh016 (0);
  led_usv007 (0);
  led_usv006 (0);
  led_tvy004 (0);
  led_bal002 (0);
  led_psl007 (0);
  led_psh007 (0);
  led_lsl003 (0);
  led_lsll003 (0);
  led_fal001 (0);

  delay(1000);

  led_ypg (1);
  led_ypg_gjs (1);
  led_ypg_vanna (1);
  led_ypg_tvy (1);
  led_ypg_pds (1);
  led_well_yst (1);
  led_well_fvy (1);
  led_well_pds (1);
  led_pko (1);
  led_cz (1);
  led_bz (1);
  led_block_pal035 (1);
  led_block_pal007 (1);
  led_block_pah007 (1);
  led_block_pal012 (1);
  led_block_fal001 (1);
  led_mod_hs005 (1);
  led_mod_ostanov (1);
  led_mod_pal035 (1);
  led_mod_pah007 (1);
  led_mod_pal007 (1);
  led_mod_lall003 (1);
  led_mod_bal002 (1);
  led_mod_bal001 (1);
  led_mod_pah016 (1);
  led_mod_pal016 (1);
  led_mod_aah001 (1);
  led_sbros (1);
  led_uy020 (1);
  led_flare_ign (1);
  led_flare_flame (1);
  led_flare_bal001 (1);
  led_flare_bal003 (1);
  led_ypg_flame_micro (1);
  led_ypg_flame_max (1);
  led_stend_1_green (1);
  led_stend_2 (1);
  led_usv001 (1);
  led_usv002 (1);
  led_usv004 (1);
  led_pal012 (1);
  led_pal035 (1);
  led_fvy001 (1);
  led_psl016 (1);
  led_psh016 (1);
  led_usv007 (1);
  led_usv006 (1);
  led_tvy004 (1);
  led_bal002 (1);
  led_psl007 (1);
  led_psh007 (1);
  led_lsl003 (1);
  led_lsll003 (1);
  led_fal001 (1);
  delay(1000);

  for(int m=0;m<=15;m++)	// Пишем 0 на все пины 
  {			
    DDO_1.digitalWrite(m, HIGH);
    DDO_2.digitalWrite(m, HIGH);
    DDO_3.digitalWrite(m, HIGH);
    DDO_4.digitalWrite(m, HIGH);
    DDO_5.digitalWrite(m, HIGH);
    DDO_6.digitalWrite(m, HIGH);
    digitalWrite(47, HIGH);

  }
  delay(1000);
}



void lcd()
{
  //1
  lcd1.setCursor(0, 0);
  lcd1.print("PT-012=");
  lcd1.print(pt_012);
  lcd1.print(" Bar  ");


  lcd1.setCursor(0, 1);
  lcd1.print("TT-008=");
  lcd1.print(tt_008);
  lcd1.print(" C  ");


  //2
  lcd2.setCursor(0, 0);
  lcd2.print("PIT-003=");
  lcd2.print(pit_003);
  lcd2.print(" Bar ");


  lcd2.setCursor(0, 1);
  lcd2.print("TT-202=");
  lcd2.print(tt_202);
  lcd2.print(" C ");


  //3
  lcd3.setCursor(0, 0);
  lcd3.print("FT-002=");
  lcd3.print(ft_002);
  lcd3.print(" m3/h ");


  lcd3.setCursor(0, 1);
  lcd3.print("PSL-064=");
  lcd3.print(psl_064);
  lcd3.print(" Bar ");

  //4
  lcd4.setCursor(0, 0);
  lcd4.print("FVY-001=");
  lcd4.print(fvy_001);
  lcd4.print(" % ");


  lcd4.setCursor(0, 1);
  lcd4.print("PIT-001=");
  lcd4.print(pit_001);
  lcd4.print(" Bar ");


  lcd4.setCursor(0, 2);
  lcd4.print("PDIT-001=");
  lcd4.print(pdit_001);
  lcd4.print(" Bar ");


  lcd4.setCursor(0, 3);
  lcd4.print("FIT-001=");
  lcd4.print(fit_001);
  lcd4.print(" m3/h");
  
   //5
  lcd5.setCursor(0, 0);
  lcd5.print("TT-004=");
  lcd5.print(tt_004);
  lcd5.print(" C ");


  lcd5.setCursor(0, 1);
  lcd5.print("TVY-004=");
  lcd5.print(tvy_004);
  lcd5.print(" % ");


  lcd5.setCursor(0, 2);
  lcd5.print("PT-049=");
  lcd5.print(pt_049);
  lcd5.print(" Bar ");


  lcd5.setCursor(0, 3);
  lcd5.print("TT-001=");
  lcd5.print(tt_001);
  lcd5.print(" C ");

  //6
  lcd6.setCursor(0, 0);
  lcd6.print("<TT-001>=");
  lcd6.print(tt_001_yst);
  lcd6.print(" C ");


  lcd6.setCursor(0, 1);
  lcd6.print("<TT-004>=");
  lcd6.print(tt_004_yst);
  lcd6.print(" C ");


  lcd6.setCursor(0, 2);
  lcd6.print("<TVY-004>=");
  lcd6.print(tvy_004_yst);
  lcd6.print(" % ");

  lcd6.setCursor(0, 3);
  lcd6.print("DISTANCE-");

  if (sw_ypg_pds_vibor == 1) {
    lcd6.print("YES");
  }
  else
  {
    lcd6.print("NO ");
  }

  //7
  lcd7.setCursor(0, 0);
  lcd7.print("<FIT-001>=");
  lcd7.print(fit_001_yst);
  lcd7.print(" m3/h ");


  lcd7.setCursor(0, 1);
  lcd7.print("<FVY-001>=");
  lcd7.print(fvy_001_yst);
  lcd7.print(" % ");


  lcd7.setCursor(0, 2);
  lcd7.print("DISTANCE-");

  if (sw_well_pds_vibor == 1) {
    lcd7.print("YES");
  }
  else
  {
    lcd7.print("NO ");
  }

  lcd7.setCursor(0, 3);
  lcd7.print("FLOPS=");

}

void lcd_real()
{


  //1

  lcd1.setCursor(7, 0);

  if (sw_cz == 1){
    lcd1.print(pt_012);
  }

  if (sw_cz == 0){
    lcd1.print(pt_012_stop);
  }

  lcd1.print(" Bar  ");

  lcd1.setCursor(7, 1);
  lcd1.print(tt_008);
  lcd1.print(" C  ");

  //2

  lcd2.setCursor(8, 0);
  lcd2.print(pit_003);
  lcd2.print(" Bar ");

  lcd2.setCursor(7, 1);
  lcd2.print(tt_202);
  lcd2.print(" C ");

  //3

  lcd3.setCursor(7, 0);
  lcd3.print(ft_002);
  lcd3.print(" m3/h ");

  lcd3.setCursor(8, 1);
  lcd3.print(psl_064);
  lcd3.print(" Bar ");

  //4

  lcd4.setCursor(8, 0);
  lcd4.print(fvy_001);
  lcd4.print(" % ");

  lcd4.setCursor(8, 1);
  lcd4.print(pit_001);
  lcd4.print(" Bar ");

  lcd4.setCursor(9, 2);
  lcd4.print(pdit_001);
  lcd4.print(" Bar ");

  lcd4.setCursor(8, 3);
  lcd4.print(fit_001);
  if (fit_001 == 0){
    lcd4.print(" m3/h    ");
  }
  else {
    lcd4.print(" m3/h ");
  }

  //5

  lcd5.setCursor(7, 0);
  lcd5.print(tt_004);
  lcd5.print(" C ");

  lcd5.setCursor(8, 1);
  lcd5.print(tvy_004);
  lcd5.print(" % ");

  lcd5.setCursor(7, 2);
  lcd5.print(pt_049);
  lcd5.print(" Bar ");

  lcd5.setCursor(7, 3);
  lcd5.print(tt_001);
  lcd5.print(" C ");

  //6

  lcd6.setCursor(9, 0);
  lcd6.print(tt_001_yst);
  lcd6.print(" C");

  lcd6.setCursor(9, 1);
  lcd6.print(tt_004_yst);
  lcd6.print(" C");

  lcd6.setCursor(10, 2);
  lcd6.print(tvy_004_yst);
  lcd6.print(" % ");

  lcd6.setCursor(9, 3);
  if (sw_ypg_pds_vibor == 1) {
    lcd6.print("YES");
  }
  else
  {
    lcd6.print("NO ");
  }

  //7

  lcd7.setCursor(10, 0);
  lcd7.print(fit_001_yst);

  if (fit_001_yst < 500 && fit_001_yst > 0){
    lcd7.print(" m3/h  ");
  }
  if (fit_001_yst > 9000)
  {
    lcd7.print(" m3/h");
  }
  if (fit_001_yst == 0){
    lcd7.print(" m3/h    ");
  }

  lcd7.setCursor(10, 1);
  lcd7.print(fvy_001_yst);
  lcd7.print(" %  ");

  lcd7.setCursor(9, 2);
  if (sw_well_pds_vibor == 1) {
    lcd7.print("YES");
  }
  else
  {
    lcd7.print("NO ");
  }

  lcd7.setCursor(6, 3);
  lcd7.print(x);
  x=x+1;



  if (millis() - timeflops > 1000){
    timeflops = millis();
    lcd7.setCursor(19, 3);
    lcd7.print(x1);
    x1=0;
  }



}

// ***********************************ФУНКЦИИ СВЕТОДИОДНОЙ ИНДИКАЦИИ*************************************************************

// Выбор режимов управления устьевым подогревателем

// Индикация управлениия подогревателем led_ypg (1) ЗЕЛЕНЫЙ-работает подогреватель (0) КРАСНЫЙ-не работает подогреватель

void led_ypg (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(0, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(1, LOW);
  } 
  else {
    DDO_1.digitalWrite(0, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(1, HIGH);  
  }
}

// Выбор режима по температуре ГЖС ЗЕЛЕНЫЙ-выбран режим КРАСНЫЙ-не выбран режим

void led_ypg_gjs (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(2, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(3, LOW);
  } 
  else {
    DDO_1.digitalWrite(2, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(3, HIGH);  
  }
}

// Выбор режима по температуре ванны

void led_ypg_vanna (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(4, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(5, LOW);
  } 
  else {
    DDO_1.digitalWrite(4, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(5, HIGH);  
  }
}

// Выбор режима по проценту открытия TVY-004

void led_ypg_tvy (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(6, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(7, LOW);
  } 
  else {
    DDO_1.digitalWrite(6, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(7, HIGH);  
  }
}

// Выбор режима дистанционного управления ПДС

void led_ypg_pds (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(8, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(9, LOW);
  } 
  else {
    DDO_1.digitalWrite(8, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(9, HIGH);  
  }
}

// Выбор режимов по управлению расходом скважины
// По уставке

void led_well_yst (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(10, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(11, LOW);
  } 
  else {
    DDO_1.digitalWrite(10, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(11, HIGH);  
  }
}

// Процентом открытия FVY-001

void led_well_fvy (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(12, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(13, LOW);
  } 
  else {
    DDO_1.digitalWrite(12, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(13, HIGH);  
  }
}

// Выбор режима дистанционного управления ПДС

void led_well_pds (bool led) { 
  if(led == 1){
    DDO_1.digitalWrite(14, HIGH);	// ЗЕЛЕНЫЙ
    DDO_1.digitalWrite(15, LOW);
  } 
  else {
    DDO_1.digitalWrite(14, LOW);		// КРАСНЫЙ
    DDO_1.digitalWrite(15, HIGH);  
  }
}


// Состояние задвижек фонтанной арматуры

// Подземный клапан отсекатель

void led_pko (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(0, HIGH);	// ЗЕЛЕНЫЙ
    DDO_2.digitalWrite(1, LOW);
  } 
  else {
    DDO_2.digitalWrite(0, LOW);		// КРАСНЫЙ
    DDO_2.digitalWrite(1, HIGH);  
  }
}

// Центральная задвижка

void led_cz (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(2, HIGH);	// ЗЕЛЕНЫЙ
    DDO_2.digitalWrite(3, LOW);
  } 
  else {
    DDO_2.digitalWrite(2, LOW);		// КРАСНЫЙ
    DDO_2.digitalWrite(3, HIGH);  
  }
}

// Боковая задвижка

void led_bz (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(4, HIGH);	// ЗЕЛЕНЫЙ
    DDO_2.digitalWrite(5, LOW);
  } 
  else {
    DDO_2.digitalWrite(4, LOW);		// КРАСНЫЙ
    DDO_2.digitalWrite(5, HIGH);  
  }
}

// Индикация Блокировок сигналов

// PAL-035

void led_block_pal035 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(6, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_2.digitalWrite(6, LOW);		// Не горит
  }
}

// led_block_pal007

void led_block_pal007 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(7, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_2.digitalWrite(7, LOW);		// Не горит
  }
}

// led_block_pah007

void led_block_pah007 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(8, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_2.digitalWrite(8, LOW);		// Не горит
  }
}

// led_block_pal012

void led_block_pal012 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(9, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_2.digitalWrite(9, LOW);		// Не горит
  }
}

// led_block_fal001

void led_block_fal001 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(10, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_2.digitalWrite(10, LOW);	// Не горит
  }
}

// Индикация кнопок моделирования аварийных ситуаций

// HS-005 HS-006 Аварийный останов

void led_mod_hs005 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(11, HIGH);	// ЗЕЛЕНЫЙ
    DDO_2.digitalWrite(12, LOW);
  } 
  else {
    DDO_2.digitalWrite(11, LOW);	// КРАСНЫЙ
    DDO_2.digitalWrite(12, HIGH);  
  }
}

// Останов с терминала Magelis 

void led_mod_ostanov (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(13, HIGH);	// ЗЕЛЕНЫЙ
    DDO_2.digitalWrite(14, LOW);
  } 
  else {
    DDO_2.digitalWrite(13, LOW);	// КРАСНЫЙ
    DDO_2.digitalWrite(14, HIGH);  
  }
}

// PAL-035 

void led_mod_pal035 (bool led) { 
  if(led == 1){
    DDO_2.digitalWrite(15, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(0, LOW);
  } 
  else {
    DDO_2.digitalWrite(15, LOW);	// КРАСНЫЙ
    DDO_3.digitalWrite(0, HIGH);  
  }
}

// PAH-007 

void led_mod_pah007 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(1, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(2, LOW);
  } 
  else {
    DDO_3.digitalWrite(1, LOW);		// КРАСНЫЙ
    DDO_3.digitalWrite(2, HIGH);  
  }
}

// PAL-007 

void led_mod_pal007 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(3, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(4, LOW);
  } 
  else {
    DDO_3.digitalWrite(3, LOW);		// КРАСНЫЙ
    DDO_3.digitalWrite(4, HIGH);  
  }
}

// LALL-003 

void led_mod_lall003 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(5, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(6, LOW);
  } 
  else {
    DDO_3.digitalWrite(5, LOW);		// КРАСНЫЙ
    DDO_3.digitalWrite(6, HIGH);  
  }
}

// BAL-002 

void led_mod_bal002 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(7, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(8, LOW);
  } 
  else {
    DDO_3.digitalWrite(7, LOW);		// КРАСНЫЙ
    DDO_3.digitalWrite(8, HIGH);  
  }
}

// BAL-001 

void led_mod_bal001 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(9, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(10, LOW);
  } 
  else {
    DDO_3.digitalWrite(9, LOW);		// КРАСНЫЙ
    DDO_3.digitalWrite(10, HIGH);  
  }
}

// PAH-016 

void led_mod_pah016 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(11, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(12, LOW);
  } 
  else {
    DDO_3.digitalWrite(11, LOW);	// КРАСНЫЙ
    DDO_3.digitalWrite(12, HIGH);  
  }
}

// PAL-016 

void led_mod_pal016 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(13, HIGH);	// ЗЕЛЕНЫЙ
    DDO_3.digitalWrite(14, LOW);
  } 
  else {
    DDO_3.digitalWrite(13, LOW);	// КРАСНЫЙ
    DDO_3.digitalWrite(14, HIGH);  
  }
}

// AAH-001 

void led_mod_aah001 (bool led) { 
  if(led == 1){
    DDO_3.digitalWrite(15, HIGH);	// ЗЕЛЕНЫЙ
    DDO_4.digitalWrite(0, LOW);
  } 
  else {
    DDO_3.digitalWrite(15, LOW);	// КРАСНЫЙ
    DDO_4.digitalWrite(0, HIGH);  
  }
}

//Сброс логики

void led_sbros (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(1, HIGH);	// ЗЕЛЕНЫЙ
    DDO_4.digitalWrite(2, LOW);
  } 
  else {
    DDO_4.digitalWrite(1, LOW);	// КРАСНЫЙ
    DDO_4.digitalWrite(2, HIGH);  
  }
  //---
}

//Индикация работы факела

//UY-020

void led_uy020 (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(3, HIGH);	// ЗЕЛЕНЫЙ
    DDO_4.digitalWrite(4, LOW);
  } 
  else {
    DDO_4.digitalWrite(3, LOW);	// КРАСНЫЙ
    DDO_4.digitalWrite(4, HIGH);  
  }
}

// Два синих светодиода имитируют розжиг фокела

void led_flare_ign (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(5, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_4.digitalWrite(5, LOW);		// Не горит
  }
}

// Имитация горения факела

void led_flare_flame (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(6, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_4.digitalWrite(6, LOW);		// Не горит
  }
}

// BAL-001 сигнал от термопары ТЕ-011

void led_flare_bal001 (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(7, HIGH);	// ЗЕЛЕНЫЙ
    DDO_4.digitalWrite(8, LOW);
  } 
  else {
    DDO_4.digitalWrite(7, LOW);	// КРАСНЫЙ
    DDO_4.digitalWrite(8, HIGH);  
  }
}

// BAL-003 сигнал от термопары ТЕ-012

void led_flare_bal003 (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(9, HIGH);	// ЗЕЛЕНЫЙ
    DDO_4.digitalWrite(10, LOW);
  } 
  else {
    DDO_4.digitalWrite(9, LOW);	// КРАСНЫЙ
    DDO_4.digitalWrite(10, HIGH);  
  }
}

// Индикация дежурной горелки устьевого подогревателя

void led_ypg_flame_micro (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(11, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_4.digitalWrite(11, LOW);	// Не горит
  }
}

// Индикация основной горелки устьевого подогревателя

void led_ypg_flame_max (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(12, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_4.digitalWrite(12, LOW);	// Не горит
  }
}

// Индикация работы стенда (строб)

void led_stend_1_green (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(13, HIGH);	// ЗЕЛЕНЫЙ
  } 
  else {
    DDO_4.digitalWrite(13, LOW);	// Не горит
  }
}

// Индикация управление

void led_stend_2 (bool led) { 
  if(led == 1){
    DDO_4.digitalWrite(14, HIGH);	// ЗЕЛЕНЫЙ у стенда
    DDO_4.digitalWrite(15, LOW);
  } 
  else {
    DDO_4.digitalWrite(14, LOW);	// КРАСНЫЙ у компьютера
    DDO_4.digitalWrite(15, HIGH);  
  }
}



// Индикация работы устьевого оборудования

// USV-001

void led_usv001 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(0, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(1, LOW);
  } 
  else {
    DDO_5.digitalWrite(0, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(1, HIGH);  
  }
}

// USV-002

void led_usv002 (int led) { 
  if(led == 1){
    DDO_5.digitalWrite(2, HIGH);	// ЗЕЛЕНЫЙ (1) ОТКРЫТ
    DDO_5.digitalWrite(3, LOW);
  } 
  if(led == 0) {
    DDO_5.digitalWrite(2, LOW);		// КРАСНЫЙ (2) ЗАКРЫТ
    DDO_5.digitalWrite(3, HIGH);  
  }
  if(led == 2) {
    DDO_5.digitalWrite(2, HIGH);	// ЖЕЛТЫЙ (0) ХОД
    DDO_5.digitalWrite(3, HIGH);  
  }
}

// USV-004

void led_usv004 (int led) { 
  if(led == 1){
    DDO_5.digitalWrite(4, HIGH);	// ЗЕЛЕНЫЙ (1) ОТКРЫТ
    DDO_5.digitalWrite(5, LOW);
  } 
  if(led == 0) {
    DDO_5.digitalWrite(4, LOW);		// КРАСНЫЙ (2) ЗАКРЫТ
    DDO_5.digitalWrite(5, HIGH);  
  }
  if(led == 2) {
    DDO_5.digitalWrite(4, HIGH);	// ЖЕЛТЫЙ (0) ХОД
    DDO_5.digitalWrite(5, HIGH);  
  }
}

// PAL-012

void led_pal012 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(6, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(7, LOW);
  } 
  else {
    DDO_5.digitalWrite(6, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(7, HIGH);  
  }
}

// PAL-035

void led_pal035 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(8, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(9, LOW);
  } 
  else {
    DDO_5.digitalWrite(8, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(9, HIGH);  
  }
}

// FVY-001

void led_fvy001 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(10, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(11, LOW);
  } 
  else {
    DDO_5.digitalWrite(10, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(11, HIGH);  
  }
}

// PSL-016

void led_psl016 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(12, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(13, LOW);
  } 
  else {
    DDO_5.digitalWrite(12, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(13, HIGH);  
  }
}

// PSH-016

void led_psh016 (bool led) { 
  if(led == 1){
    DDO_5.digitalWrite(14, HIGH);	// ЗЕЛЕНЫЙ
    DDO_5.digitalWrite(15, LOW);
  } 
  else {
    DDO_5.digitalWrite(14, LOW);		// КРАСНЫЙ
    DDO_5.digitalWrite(15, HIGH);  
  }
}

// USV-007

void led_usv007 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(0, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(1, LOW);
  } 
  else {
    DDO_6.digitalWrite(0, LOW);		// КРАСНЫЙ
    DDO_6.digitalWrite(1, HIGH);  
  }
}

// USV-006

void led_usv006 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(2, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(3, LOW);
  } 
  else {
    DDO_6.digitalWrite(2, LOW);		// КРАСНЫЙ
    DDO_6.digitalWrite(3, HIGH);  
  }
}

// TVY-004

void led_tvy004 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(4, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(5, LOW);
  } 
  else {
    DDO_6.digitalWrite(4, LOW);		// КРАСНЫЙ
    DDO_6.digitalWrite(5, HIGH);  
  }
}

// BAL-002

void led_bal002 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(6, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(7, LOW);
  } 
  else {
    DDO_6.digitalWrite(6, LOW);		// КРАСНЫЙ
    DDO_6.digitalWrite(7, HIGH);  
  }
}

// PSL-007

void led_psl007 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(8, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(9, LOW);
  } 
  else {
    DDO_6.digitalWrite(8, LOW);		// КРАСНЫЙ
    DDO_6.digitalWrite(9, HIGH);  
  }
}

// PSH-007

void led_psh007 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(10, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(11, LOW);
  } 
  else {
    DDO_6.digitalWrite(10, LOW);	// КРАСНЫЙ
    DDO_6.digitalWrite(11, HIGH);  
  }
}

// LSL-003

void led_lsl003 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(12, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(13, LOW);
  } 
  else {
    DDO_6.digitalWrite(12, LOW);	// КРАСНЫЙ
    DDO_6.digitalWrite(13, HIGH);  
  }
}

// LSLL-003

void led_lsll003 (bool led) { 
  if(led == 1){
    DDO_6.digitalWrite(14, HIGH);	// ЗЕЛЕНЫЙ
    DDO_6.digitalWrite(15, LOW);
  } 
  else {
    DDO_6.digitalWrite(14, LOW);	// КРАСНЫЙ
    DDO_6.digitalWrite(15, HIGH);  
  }
}

// FAL-001

void led_fal001 (bool led) { 
  if(led == 1){
    digitalWrite(46, HIGH);	// ЗЕЛЕНЫЙ
    digitalWrite(47, LOW);
  } 
  else {
    digitalWrite(46, LOW);	// КРАСНЫЙ
    digitalWrite(47, HIGH);  
  }
}



void sw() 
{
  //*************** Кнопки управления подогревателем газа******************************

  // CТАРТ СТОП подогревателя 
  if (DDI_1.digitalRead(0)== HIGH)
  {
    sw_ypg = 1;
  }
  if (DDI_1.digitalRead(1)== HIGH)
  {
    sw_ypg = 0;
  }

  // Плюс минус температура ГЖС уставка 
  if (tt_001_yst < 75)
  {
    if (DDI_1.digitalRead(2) == HIGH)
    {
      tt_001_yst = (tt_001_yst +5 ) ;
    }
  }
  if (tt_001_yst > 32)
  {
    if (DDI_1.digitalRead(3) == HIGH)
    {
      tt_001_yst = (tt_001_yst -5);
    }
  }


  // Выбор режима по температуре ГЖС
  if (DDI_1.digitalRead(4) == HIGH)
  {
    sw_ypg_gjs_vibor = 1;		// Выбор режима по температуре ГЖС DDI_1_4
    sw_ygp_vanna_vibor = 0;	// Выбор режима по температуре ванны DDI_1_7
    sw_ypg_tvy_vibor = 0;		// Выбор режима по проценту открытия клапана TVY-004 DDI_1_10
    sw_ypg_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС выбран режим DDI_1_11
  }

  // Плюс минус температура ванны
  if (tt_004_yst < 90)
  {
    if (DDI_1.digitalRead(5) == HIGH)
    {
      tt_004_yst = (tt_004_yst +5) ;
    }
  }
  if (tt_004_yst > 30)
  {
    if (DDI_1.digitalRead(6) == HIGH)
    {
      tt_004_yst = (tt_004_yst -5);
    }
  }

  // Выбор режима по температуре ванны
  if (DDI_1.digitalRead(7) == HIGH)
  {
    sw_ypg_gjs_vibor = 0;		// Выбор режима по температуре ГЖС DDI_1_4
    sw_ygp_vanna_vibor = 1;	// Выбор режима по температуре ванны DDI_1_7
    sw_ypg_tvy_vibor = 0;		// Выбор режима по проценту открытия клапана TVY-004 DDI_1_10
    sw_ypg_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС выбран режим DDI_1_11
  }

  // Плюс минус открытие клапана TVY-004
  if (tvy_004_yst < 100)
  {
    if (DDI_1.digitalRead(8) == HIGH)
    {
      tvy_004_yst = (tvy_004_yst + 5) ;
    }
  }
  if (tvy_004_yst > 0)
  {
    if (DDI_1.digitalRead(9) == HIGH)
    {
      tvy_004_yst = (tvy_004_yst - 5);
    }
  }

  // Выбор режима по проценту открытия клапана TVY-004
  if (DDI_1.digitalRead(10) == HIGH)
  {
    sw_ypg_gjs_vibor = 0;		// Выбор режима по температуре ГЖС DDI_1_4
    sw_ygp_vanna_vibor = 0;	// Выбор режима по температуре ванны DDI_1_7
    sw_ypg_tvy_vibor = 1;		// Выбор режима по проценту открытия клапана TVY-004 DDI_1_10
    sw_ypg_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС выбран режим DDI_1_11
  }

  // Выбор режима дистанционного управления подогревателем ПДСif (fit_001_yst > 2000 && fit_001_yst < 32 100)
  if (DDI_1.digitalRead(11) == HIGH)
  {
    sw_ypg_gjs_vibor = 0;		// Выбор режима по температуре ГЖС DDI_1_4
    sw_ygp_vanna_vibor = 0;	// Выбор режима по температуре ванны DDI_1_7
    sw_ypg_tvy_vibor = 0;		// Выбор режима по проценту открытия клапана TVY-004 DDI_1_10
    sw_ypg_pds_vibor = 1;		// Выбор режима дистанционного управления ПДС выбран режим DDI_1_11
  }


  //******************************Выбор режимов по управлению расходом скважины****************


  // Плюс минус Уставка расхода скважины 
  if (fit_001_yst < 30000)
  {
    if (DDI_1.digitalRead(12) == HIGH)
    {
      fit_001_yst = fit_001_yst + 300;
    }
  }
  if (fit_001_yst > 0)
  {
    if (DDI_1.digitalRead(13) == HIGH)
    {
      fit_001_yst = fit_001_yst - 300;
    }
  }
  // Выбор режима управления расходом по уставке
  if (DDI_1.digitalRead(14) == HIGH)
  {
    sw_well_yst_vibor = 1;		// Выборо режима управления расходом по уставке DDI_1_14
    sw_well_fvy_vibor = 0;		// Процентом открытия FVY-001 КРАСНЫЙ-не выбран режим DDI_2_1
    sw_well_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС DDI_2_2
  }

  // Плюс минус Процент открытия FVY-001 
  if (fvy_001_yst < 100)
  {
    if (DDI_1.digitalRead(15) == HIGH)
    { 
      q++;
      old_dros=fvy_001_yst;

      if (q >3)
      {
        fvy_001_yst= fvy_001_yst+10; 
      }
      fvy_001_yst = fvy_001_yst +5;
      if (fvy_001_yst==old_dros){
        q==0;
      }
    }
  }
  if (fvy_001_yst > 0)
  {
    if (DDI_2.digitalRead(0) == HIGH)
    {
      fvy_001_yst = fvy_001_yst -5;
    }
  }

  // Процентом открытия FVY-001
  if (DDI_2.digitalRead(1) == HIGH)
  {
    sw_well_yst_vibor = 0;		// Выборо режима управления расходом по уставке DDI_1_14
    sw_well_fvy_vibor = 1;		// Процентом открытия FVY-001 КРАСНЫЙ-не выбран режим DDI_2_1
    sw_well_pds_vibor = 0;		// Выбор режима дистанционного управления ПДС DDI_2_2
  }

  // Выбор режима дистанционного управления ПДС
  if (DDI_2.digitalRead(2) == HIGH)
  {
    sw_well_yst_vibor = 0;		// Выборо режима управления расходом по уставке DDI_1_14
    sw_well_fvy_vibor = 0;		// Процентом открытия FVY-001 КРАСНЫЙ-не выбран режим DDI_2_1
    sw_well_pds_vibor = 1;		// Выбор режима дистанционного управления ПДС DDI_2_2
  }

  //******************************Управление фонтанной арматурой*****************************


  if (DDO_5.digitalRead(8)== LOW && DDO_5.digitalRead(9)== HIGH && sw_block_pal035 == 0){
  }
  else{



    // ОТКРЫТ ЗАКРЫТ подземный клапан отсекатель 
    if (DDI_2.digitalRead(3) == HIGH)
    {
      sw_pko = 1;
    }
    if (DDI_2.digitalRead(4) == HIGH)
    {
      sw_pko = 0;
    }

    // ОТКРЫТА ЗАКРЫТА центральная задвижка 
    if (DDI_2.digitalRead(5) == HIGH && sw_pko)
    {
      sw_cz = 1;
    }
    if (DDI_2.digitalRead(6) == HIGH)
    {
      sw_cz = 0;
    }

    // ОТКРЫТА ЗАКРЫТА боковая задвижка 
    if (DDI_2.digitalRead(7) == HIGH && sw_pko && sw_cz)
    {
      sw_bz = 1;
    }
    if (DDI_2.digitalRead(8) == HIGH)
    {
      sw_bz = 0;
    }
  }


  //*******************************Управление Блокировками сигналов****************************

  //*********************************Жестко фиксируемые контакты*******************************

  // PAL-035 Блокировка
  if (DDI_2.digitalRead(9) == HIGH)
  {
    sw_block_pal035 = 1;
  }
  else
  {
    sw_block_pal035 = 0;
  }

  // PAL-007 Блокировка
  if (DDI_2.digitalRead(10) == HIGH)
  {
    sw_block_pal007 = 1;
  }
  else
  {
    sw_block_pal007 = 0;
  }

  // PAH-007 Блокировка
  if (DDI_2.digitalRead(11) == HIGH)
  {
    sw_block_pah007 = 1;
  }
  else
  {
    sw_block_pah007 = 0;
  }


  // PAL-012 Блокировка
  if (DDI_2.digitalRead(12) == HIGH)
  {
    sw_block_pal012 = 1;
  }
  else
  {
    sw_block_pal012 = 0;
  }

  // FAL-001 Блокировка
  if (DDI_2.digitalRead(13) == HIGH)
  {
    sw_block_fal001 = 1;
  }
  else
  {
    sw_block_fal001 = 0;
  }

  // Отдать управление компьютеру
  if (DDI_2.digitalRead(14) == HIGH)
  {
    sw_enter_pc = 1;
  }
  else
  {
    sw_enter_pc = 0;
  }

  //*********************************Сброс логики аварийных сигналов****************************

  if (DDI_2.digitalRead(15) == HIGH)
  {
    sw_sbros_logic = 1;
  }

  //****************************Кнопки моделирования аварийных ситуаций************************

  // HS-005 HS-006 Аварийный останов имитация сигнала
  if (digitalRead(22) == HIGH)
  {
    sw_mod_hs005 = 0;
  }
  // Останов с терминала Magelis имитация сигнала
  if (digitalRead(23) == HIGH)
  {
    sw_mod_ostanov = 0;
  }
  // PAL-035 имитация сигнала
  if (digitalRead(24) == HIGH)
  {
    sw_mod_pal035 = 0;
  }
  // PAH-007 имитация сигнала
  if (digitalRead(25) == HIGH)
  {
    sw_mod_pah007 = 0;
  }
  // PAL-007 имитация сигнала
  if (digitalRead(26) == HIGH)
  {
    sw_mod_pal007 = 0;
  }
  // LALL-003 имитация сигнала
  if (digitalRead(27) == HIGH)
  {
    sw_mod_lall003 = 0;
  }
  // BAL-002 имитация сигнала
  if (digitalRead(28) == HIGH)
  {
    sw_mod_bal002 = 0;
  }
  // BAL-001 BAL-003 имитация сигнала
  if (digitalRead(29) == HIGH)
  {
    sw_mod_bal001 = 0;
  }
  // PAH-016 имитация сигнала
  if (digitalRead(30) == HIGH)
  {
    sw_mod_pah016 = 0;
  }
  // PAL-016 имитация сигнала
  if (digitalRead(31) == HIGH)
  {
    sw_mod_pal016 = 0;
  }
  // AAH-001 имитация сигнала
  if (digitalRead(32) == HIGH)
  {
    sw_mod_aah001 = 0;
  }
}

void mod_sbros()
{

  if (sw_sbros_logic == 1)	{		// Сброс логики аварийных сигналов DDI_2_15


    // Кнопки моделирования аварийных ситуаций

    sw_mod_hs005 = 0;			// HS-005 HS-006 Аварийный останов имитация сигнала DDI_3_0
    sw_mod_ostanov = 0;			// Останов с терминала Magelis имитация сигнала DDI_3_1
    sw_mod_pal035 = 0;			// PAL-035 имитация сигнала DDI_3_2
    sw_mod_pah007 = 0;			// PAH-007 имитация сигнала DDI_3_3
    sw_mod_pal007 = 0;			// PAL-007 имитация сигнала DDI_3_4
    sw_mod_lall003 = 0;			// LALL-003 имитация сигнала DDI_3_5
    sw_mod_bal002 = 0;			// BAL-002 имитация сигнала DDI_3_6
    sw_mod_bal001 = 0;			// BAL-001 имитация сигнала DDI_3_7
    sw_mod_pah016 = 0;			// PAH-016 имитация сигнала DD_4_0
    sw_mod_pal016 = 0;			// PAL-016 имитация сигнала DD_4_1
    sw_mod_aah001 = 0;			// AAH-001 имитация сигнала DD_4_2
  }

  if (sw_mod_hs005 == 1 
    || sw_mod_ostanov == 1 
    || sw_mod_pal035 == 1 
    || sw_mod_pah007 == 1 
    || sw_mod_pal007 == 1 
    || sw_mod_lall003 == 1 
    || sw_mod_bal002 == 1 
    || sw_mod_bal001 == 1 
    || sw_mod_pah016 == 1 
    || sw_mod_pal016 == 1 
    || sw_mod_aah001 == 1)
  {
    sw_sbros_logic = 1;
  }

}

void first_start () {
  sw_mod_hs005 = 1;			
  sw_mod_ostanov = 1;		
  sw_mod_pal035 = 1;			
  sw_mod_pah007 = 1;			
  sw_mod_pal007 = 1;			
  sw_mod_lall003 = 1;		
  sw_mod_bal002 = 1;			
  sw_mod_bal001 = 1;			
  sw_mod_pah016 = 1;			
  sw_mod_pal016 = 1;			
  sw_mod_aah001 = 1;	
  /*
  led_usv007 (0);
   led_usv006 (0);
   led_tvy004 (0);
   led_bal002 (0);
   */
}



void pid() // 
{
  if (DDO_5.digitalRead(4) == LOW && DDO_5.digitalRead(5) == HIGH){

    znach_test = 0.0000;
    ust=5000, e=0, voz=0, znach = 100, voz1=0, ust_fvy=0;
    Ki=0.2, I=0;
    znach_test1=0, e1=0;
    TI001_XM05=0, TI001_KELV=0;
    PI001_XM05=0, PDI001_XM05=0, QP_FACTOR_M=25.6714, PI012_XM03=0, PI001_VICH=0;
    FI001_XM20=0;
    pozic=0;

  }
  ust = fit_001_yst;
  e1=znach_test - znach_test1;
  znach_test1 = znach_test + (-0.3 * e1);
  TI001_KELV=273.2+TI001_XM05;
  PI012_XM03=-3.05*znach_test1+400;
  PI001_XM05 = 1.7*znach_test1 +10;
  PI001_VICH = PI001_XM05 +1.033;
  PDI001_XM05=((znach_test1*300)*(znach_test1*300)*TI001_KELV)/(1000000*QP_FACTOR_M*PI001_VICH*100);
  FI001_XM20=(sqrt ((PI001_VICH*PDI001_XM05*QP_FACTOR_M*100)/TI001_KELV))*1000;
  e= (ust-FI001_XM20)*0.004;
  if (Ki>-1)
  {
    I=I+Ki*e;
    voz=I;
  }
  voz1=0.6*e;
  znach_test = 0.2*(voz+voz1);
  pozic=0.0029*znach+4.3956;

  fit_001=FI001_XM20 ;
  fvy_001=znach_test ;
  pdit_001=PDI001_XM05 ; 
  pit_001=(PI001_XM05*0.2) +70 ;
  pt_012=PI012_XM03 ;
  tt_001 = TI001_KELV -273.2;

  if (DDO_5.digitalRead(4) == LOW && DDO_5.digitalRead(5) == HIGH){
    pit_001 = pit_003 = 72;
  }
}

void pid_rashod() // 
{

  if (DDO_5.digitalRead(4) == LOW && DDO_5.digitalRead(5) == HIGH){

    znach_test = 0.0000;
    ust=5000, e=0, voz=0, znach = 100, voz1=0, ust_fvy=0;
    Ki=0.2, I=0;
    znach_test1=0, e1=0;
    TI001_XM05=0, TI001_KELV=0;
    PI001_XM05=0, PDI001_XM05=0, QP_FACTOR_M=25.6714, PI012_XM03=0, PI001_VICH=0;
    FI001_XM20=0;
    pozic=0;

  }

  ust_fvy = fvy_001_yst;
  ust_fvy = ust_fvy * 300;
  e1=znach_test - znach_test1;
  znach_test1 = znach_test + (-0.3 * e1);
  TI001_KELV=273.2+TI001_XM05;
  PI012_XM03=-3.05*znach_test1+400;
  PI001_XM05 = 1.7*znach_test1 +10;
  PI001_VICH = PI001_XM05 +1.033;
  PDI001_XM05=((znach_test1*300)*(znach_test1*300)*TI001_KELV)/(1000000*QP_FACTOR_M*PI001_VICH*100);
  FI001_XM20=(sqrt ((PI001_VICH*PDI001_XM05*QP_FACTOR_M*100)/TI001_KELV))*1000;
  e= (ust_fvy-FI001_XM20)*0.004;
  if (Ki>-1)
  {
    I=I+Ki*e;
    voz=I;
  }
  voz1=0.6*e;
  znach_test = 0.1*(voz+voz1);
  pozic=0.0029*znach+4.3956;

  fit_001=FI001_XM20 ;
  fvy_001=znach_test1;
  pdit_001=PDI001_XM05 ; 
  pit_001=(PI001_XM05*0.2) +70 ;
  pt_012=PI012_XM03 ;
  tt_001 = TI001_KELV -273.2;

  if (DDO_5.digitalRead(4) == LOW && DDO_5.digitalRead(5) == HIGH){
    pit_001 = pit_003 = 72;
  }
}


void alarm_mod(){



  if(pt_012 > 130 && DDO_5.digitalRead(4) == HIGH && DDO_5.digitalRead(5) == LOW && sw_mod_pal035 == 1){
    led_pal035 (1);
  }

  if (pt_012 < 130 || DDO_5.digitalRead(5) == HIGH || sw_mod_pal035 == 0)
  {
    led_pal035 (0);
  }


  //**************************************************************
  if (DDO_5.digitalRead(8)== HIGH && DDO_5.digitalRead(9)== LOW)
  {
    www10 = 1;
  }

  if (DDO_5.digitalRead(8)== LOW && DDO_5.digitalRead(9)== HIGH 
    && sw_block_pal035 == 0 && sw_mod_ostanov == 1 
    && sw_mod_pal007 == 1 && sw_mod_pah007 == 1 ){

    flag_pal035 = 1;

    if(www10) {
      time_pal035 = millis();  
      www10 = 0;  
    }  
  }  

  if (flag_pal035) {
    flag_pal035 = 0;

    if (www10 == 0) {
      if (millis() - time_pal035 > 3000) {
        sw_bz = 0;
      }
      if (millis() - time_pal035 > 6000) {
        sw_cz = 0;
      }
      if (millis() - time_pal035 > 11000) {
        sw_pko = 0;
      }
    }
  }

  //**************************************************************

  if(pt_012 > 140 ){
    led_pal012 (1);
  }
  else {
    led_pal012 (0);
  }

  if(fit_001 < 2000 ){
    led_fal001 (0);
  }
  else {
    led_fal001 (1);
  }

  if (fit_001==0){
    led_fvy001 (0);
  }
  else {
    led_fvy001 (1);
  }

  led_psl007 (sw_mod_pal007);
  led_psh007 (sw_mod_pah007);
}




























