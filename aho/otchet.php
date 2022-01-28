<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
require_once 'PHPExcel/Classes/PHPExcel.php';

$str = $_POST['str'];




$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("KepLer")
							 ->setLastModifiedBy("KepLer")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$objPHPExcel->getActiveSheet()->setTitle('Форма Ж');

$sheet = $objPHPExcel->getActiveSheet();

$sheet->getColumnDimension('A')->setWidth(26);
$sheet->getColumnDimension('B')->setWidth(5);
$sheet->getColumnDimension('C')->setWidth(14);
$sheet->getColumnDimension('D')->setWidth(21);
$sheet->getColumnDimension('E')->setWidth(24);
$sheet->getColumnDimension('F')->setWidth(16);
$sheet->getColumnDimension('G')->setWidth(19);
$sheet->getColumnDimension('H')->setWidth(16);
$sheet->getColumnDimension('I')->setWidth(14);
$sheet->getColumnDimension('J')->setWidth(16);

$sheet->mergeCells('E1:I1');
$sheet->setCellValue("E1", 'Приложение к извещению об изменении №7');
$sheet->getCell('E1')->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$sheet->getCell('E1')->getStyle('E1')->getFont()->setSize(14);
$sheet->getCell('E1')->getStyle('E1')->getFont()->setName('Times New Roman');

$sheet->mergeCells('G2:I2');
$sheet->setCellValue("G2", 'СТП 05780913.1.10-2011');
$sheet->getCell('G2')->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$sheet->getCell('G2')->getStyle('G2')->getFont()->setSize(12);
$sheet->getCell('G2')->getStyle('G2')->getFont()->setName('Times New Roman');

$sheet->mergeCells('A3:J3');
$sheet->setCellValue("A3", 'Приложение Ж');
$sheet->getCell('A3')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A3')->getStyle('A3')->getFont()->setSize(18);
$sheet->getCell('A3')->getStyle('A3')->getFont()->setName('Times New Roman');
$sheet->getCell('A3')->getStyle('A3')->getFont()->setBold(true);

$sheet->mergeCells('A4:J4');
$sheet->setCellValue("A4", 'Форма представления справки-расчета норм списания МТР');
$sheet->getCell('A4')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A4')->getStyle('A4')->getFont()->setSize(14);
$sheet->getCell('A4')->getStyle('A4')->getFont()->setName('Times New Roman');
$sheet->getCell('A4')->getStyle('A4')->getFont()->setBold(true);

$sheet->mergeCells('A5:J5');
$sheet->setCellValue("A5", '(рекомендуемое)');
$sheet->getCell('A5')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A5')->getStyle('A5')->getFont()->setSize(12);
$sheet->getCell('A5')->getStyle('A5')->getFont()->setName('Times New Roman');

$sheet->mergeCells('A6:J6');
$sheet->setCellValue("A6", 'Справка-расчет  списания МТР в соответствии');
$sheet->getCell('A6')->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A6')->getStyle('A6')->getFont()->setSize(12);
$sheet->getCell('A6')->getStyle('A6')->getFont()->setName('Times New Roman');
$sheet->getCell('A6')->getStyle('A6')->getFont()->setBold(true);

$sheet->mergeCells('A7:J7');
$sheet->setCellValue("A7", 'с действующими нормативами за март 2017г.');
$sheet->getCell('A7')->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A7')->getStyle('A7')->getFont()->setSize(12);
$sheet->getCell('A7')->getStyle('A7')->getFont()->setName('Times New Roman');
$sheet->getCell('A7')->getStyle('A7')->getFont()->setBold(true);

$sheet->mergeCells('A9:J9');
$sheet->setCellValue("A9", 'для ПЭН:  расход  моющих средств и вспомогательных материалов АХО');
$sheet->getCell('A9')->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A9')->getStyle('A9')->getFont()->setSize(12);
$sheet->getCell('A9')->getStyle('A9')->getFont()->setName('Times New Roman');
$sheet->getCell('A9')->getStyle('A9')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);

$sheet->getRowDimension(10)->setRowHeight(42);
$sheet->mergeCells('A10:J10');
$sheet->setCellValue("A10", '        (наименование процесса применения МТР или объекта применения МТР)');
$sheet->getCell('A10')->getStyle('A10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell('A10')->getStyle('A10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$sheet->getCell('A10')->getStyle('A10')->getFont()->setSize(8);
$sheet->getCell('A10')->getStyle('A10')->getFont()->setName('Times New Roman');

//---
$sheet->getStyle('A11:J11')->getAlignment()->setWrapText(true); 

for($i=11;$i<13;$i++){
$sheet->getCell("A$i")->getStyle("A$i")->getFont()->setName("Times New Roman");
$sheet->getCell("B$i")->getStyle("B$i")->getFont()->setName("Times New Roman");
$sheet->getCell("C$i")->getStyle("C$i")->getFont()->setName("Times New Roman");
$sheet->getCell("D$i")->getStyle("D$i")->getFont()->setName("Times New Roman");
$sheet->getCell("E$i")->getStyle("E$i")->getFont()->setName("Times New Roman");
$sheet->getCell("F$i")->getStyle("F$i")->getFont()->setName("Times New Roman");
$sheet->getCell("G$i")->getStyle("G$i")->getFont()->setName("Times New Roman");
$sheet->getCell("H$i")->getStyle("H$i")->getFont()->setName("Times New Roman");
$sheet->getCell("I$i")->getStyle("I$i")->getFont()->setName("Times New Roman");
$sheet->getCell("J$i")->getStyle("J$i")->getFont()->setName("Times New Roman");
$sheet->getCell("A$i")->getStyle("A$i")->getFont()->setSize(12);
$sheet->getCell("B$i")->getStyle("B$i")->getFont()->setSize(12);
$sheet->getCell("C$i")->getStyle("C$i")->getFont()->setSize(12);
$sheet->getCell("D$i")->getStyle("D$i")->getFont()->setSize(12);
$sheet->getCell("E$i")->getStyle("E$i")->getFont()->setSize(12);
$sheet->getCell("F$i")->getStyle("F$i")->getFont()->setSize(12);
$sheet->getCell("G$i")->getStyle("G$i")->getFont()->setSize(12);
$sheet->getCell("H$i")->getStyle("H$i")->getFont()->setSize(12);
$sheet->getCell("I$i")->getStyle("I$i")->getFont()->setSize(12);
$sheet->getCell("J$i")->getStyle("J$i")->getFont()->setSize(12);
$sheet->getCell("A$i")->getStyle("A$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("B$i")->getStyle("B$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("C$i")->getStyle("C$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("D$i")->getStyle("D$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("E$i")->getStyle("E$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("F$i")->getStyle("F$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("G$i")->getStyle("G$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("H$i")->getStyle("H$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("I$i")->getStyle("I$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("J$i")->getStyle("J$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("A$i")->getStyle("A$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("B$i")->getStyle("B$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("C$i")->getStyle("C$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("D$i")->getStyle("D$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("E$i")->getStyle("E$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("F$i")->getStyle("F$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("G$i")->getStyle("G$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("H$i")->getStyle("H$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("I$i")->getStyle("I$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("J$i")->getStyle("J$i")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("A$i")->getStyle("A$i")->getFont()->setBold(true);
$sheet->getCell("B$i")->getStyle("B$i")->getFont()->setBold(true);
$sheet->getCell("C$i")->getStyle("C$i")->getFont()->setBold(true);
$sheet->getCell("D$i")->getStyle("D$i")->getFont()->setBold(true);
$sheet->getCell("E$i")->getStyle("E$i")->getFont()->setBold(true);
$sheet->getCell("F$i")->getStyle("F$i")->getFont()->setBold(true);
$sheet->getCell("G$i")->getStyle("G$i")->getFont()->setBold(true);
$sheet->getCell("H$i")->getStyle("H$i")->getFont()->setBold(true);
$sheet->getCell("I$i")->getStyle("I$i")->getFont()->setBold(true);
$sheet->getCell("J$i")->getStyle("J$i")->getFont()->setBold(true);
}

$sheet->getRowDimension(11)->setRowHeight(133);
$sheet->setCellValue("A11", 'Наименование МТР');
$sheet->setCellValue("B11", 'Ед. изм.');
$sheet->setCellValue("C11", 'Ид. номер МТР по Справочнику нормативов использования МТР');
$sheet->setCellValue("D11", 'Установленный норматив исользования МТР всоответствии со Справочником');
$sheet->setCellValue("E11", 'Нормообразующий фактор *');
$sheet->setCellValue("F11", 'Нормативное количество МТР на год');
$sheet->setCellValue("G11", 'Нормативное количество МТР на месяц');
$sheet->setCellValue("H11", 'Фактическое количество использованных МТР за месяц');
$sheet->setCellValue("I11", 'Отклонение (+/-) (п.7-п.8)');
$sheet->setCellValue("J11", 'Суммарное количество списанного МТР с начала года (с учётом текущего месяца)');

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle('A11:J12')->applyFromArray($styleArray);
//---

$sheet->setCellValue("A12", '1');
$sheet->setCellValue("B12", '2');
$sheet->setCellValue("C12", '3');
$sheet->setCellValue("D12", '4');
$sheet->setCellValue("E12", '5');
$sheet->setCellValue("F12", '6');
$sheet->setCellValue("G12", '7');
$sheet->setCellValue("H12", '8');
$sheet->setCellValue("I12", '9');
$sheet->setCellValue("J12", '10');

$nomer_stroki = 13;

$zapis = explode("|",$str);
for($i=0;$i<count($zapis)-1;$i++){
	$zapis_zzz = explode("=",$zapis[$i]);
	$z_id = $zapis_zzz[0];
	$z_fuck = $zapis_zzz[1];
	$link = mysql_connect("10.25.8.8", "admin", "conect");
	mysql_query("use aho");
	mysql_query("SET NAMES utf8");
	$retval = mysql_query("SELECT * FROM `aho_report` where id = '$z_id'", $link);
	while($row = mysql_fetch_array($retval)) {
		//$name = $row[4];
		//$units_mtr = $row[5];
		//$value_norm = $row[9];
		//$norm_factor = $row[8];
		$name = $row[0];
		$units_mtr = $row[1];
		//$id = $row[2];
		$value_norm = $row[3];
		$norm_factor = $row[4];
		
		
		
			$xxx = $z_fuck;
		$mtr_za_god = $value_norm * $xxx;
		$mtr_za_mesyc = $mtr_za_god / 12;
		$mtr_za_mesyc = round($mtr_za_mesyc, 2);
		
		$secret = substr_replace($z_id,"**",4,2);
		
		$sheet->setCellValue("A$nomer_stroki", $name);
		$sheet->setCellValue("B$nomer_stroki", $units_mtr);		
		$sheet->setCellValue("C$nomer_stroki", $secret);
		$sheet->setCellValue("D$nomer_stroki", $value_norm);
		$sheet->setCellValue("E$nomer_stroki", $norm_factor." ($xxx)");
		$sheet->setCellValue("F$nomer_stroki", $mtr_za_god);
		$sheet->setCellValue("G$nomer_stroki", $mtr_za_mesyc);
		
		
		// =ЕСЛИ((G13-H13) > 0;СЦЕПИТЬ("+";(G13-H13));(G13-H13))
		//$formula = "=G$nomer_stroki-H$nomer_stroki";
		$formula = "=IF((G$nomer_stroki-H$nomer_stroki) > 0,CONCATENATE(\"+\",(G$nomer_stroki-H$nomer_stroki)),(G$nomer_stroki-H$nomer_stroki))";
		
		$sheet->setCellValue("I$nomer_stroki", $formula);
		
		
		
//---
$sheet->getRowDimension("$nomer_stroki")->setRowHeight(-1);
$sheet->getStyle("A$nomer_stroki:J$nomer_stroki")->getAlignment()->setWrapText(true); 
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("C$nomer_stroki")->getStyle("C$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("D$nomer_stroki")->getStyle("D$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("E$nomer_stroki")->getStyle("E$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("C$nomer_stroki")->getStyle("C$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("D$nomer_stroki")->getStyle("D$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("E$nomer_stroki")->getStyle("E$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("C$nomer_stroki")->getStyle("C$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("D$nomer_stroki")->getStyle("D$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("E$nomer_stroki")->getStyle("E$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setSize(9);	
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getFont()->setSize(9);	
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("C$nomer_stroki")->getStyle("C$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("D$nomer_stroki")->getStyle("D$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("E$nomer_stroki")->getStyle("E$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getFont()->setName("Times New Roman");
$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle("A$nomer_stroki:J$nomer_stroki")->applyFromArray($styleArray);		
//---		
		
}
mysql_close($link);
$nomer_stroki++;
}

$sheet->mergeCells("A$nomer_stroki:E$nomer_stroki");
$sheet->setCellValue("A$nomer_stroki", "ИТОГО:");
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle("A$nomer_stroki:J$nomer_stroki")->applyFromArray($styleArray);	

$sum_formula_row = $nomer_stroki - 1;
$formula = "=SUM(F13:F$sum_formula_row)";
$sheet->setCellValue("F$nomer_stroki", $formula);
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("F$nomer_stroki")->getStyle("F$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$formula = "=SUM(G13:G$sum_formula_row)";
$sheet->setCellValue("G$nomer_stroki", $formula);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$formula = "=SUM(H13:H$sum_formula_row)";
$sheet->setCellValue("H$nomer_stroki", $formula);
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("H$nomer_stroki")->getStyle("H$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$formula = "=SUM(I13:I$sum_formula_row)";
$sheet->setCellValue("I$nomer_stroki", $formula);
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("I$nomer_stroki")->getStyle("I$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$formula = "=SUM(J13:J$sum_formula_row)";
$sheet->setCellValue("J$nomer_stroki", $formula);
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getFont()->setSize(9);
$sheet->getCell("J$nomer_stroki")->getStyle("J$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$nomer_stroki+=2;
$sheet->mergeCells("A$nomer_stroki:J$nomer_stroki");
$sheet->setCellValue("A$nomer_stroki", "** в приложении для расчета норм списания применяется аналог МТР, взятого из электронного справочника нормативов");
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("A$nomer_stroki")->getStyle("A$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$nomer_stroki++;
$sheet->getRowDimension($nomer_stroki)->setRowHeight(48);
$sheet->mergeCells("B$nomer_stroki:D$nomer_stroki");
$sheet->setCellValue("B$nomer_stroki", "Начальник  АХО");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$styleArray = array(
    'borders' => array(
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle("E$nomer_stroki:E$nomer_stroki")->applyFromArray($styleArray);	
$sheet->mergeCells("G$nomer_stroki:H$nomer_stroki");
$sheet->setCellValue("G$nomer_stroki", "Медведкина Е.Н.");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


$nomer_stroki+=2;
$sheet->mergeCells("B$nomer_stroki:D$nomer_stroki");
$sheet->setCellValue("B$nomer_stroki", "Заместитель начальника ОМТСиК");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$styleArray = array(
    'borders' => array(
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle("E$nomer_stroki:E$nomer_stroki")->applyFromArray($styleArray);	
$sheet->mergeCells("G$nomer_stroki:H$nomer_stroki");
$sheet->setCellValue("G$nomer_stroki", "Яровой А.С.");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


$nomer_stroki+=2;
$sheet->mergeCells("B$nomer_stroki:D$nomer_stroki");
$sheet->setCellValue("B$nomer_stroki", "Кладовщик УМТР (АХО)");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("B$nomer_stroki")->getStyle("B$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$styleArray = array(
    'borders' => array(
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);
$sheet->getStyle("E$nomer_stroki:E$nomer_stroki")->applyFromArray($styleArray);	
$sheet->mergeCells("G$nomer_stroki:H$nomer_stroki");
$sheet->setCellValue("G$nomer_stroki", "Нагматулина Д.И.");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setName("Times New Roman");
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getFont()->setSize(12);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$sheet->getCell("G$nomer_stroki")->getStyle("G$nomer_stroki")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);





header('Content-Type: application/vnd.ms-excel');
header("Content-Type: application/octet-stream");
header('Content-Disposition: attachment;filename="simple.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate'); 
header ('Pragma: public'); 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
