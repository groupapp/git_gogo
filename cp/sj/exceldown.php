<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

include_once dirname(__FILE__) . "/include/function.php";






if (PHP_SAPI == 'cli')
die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
//include_once dirname(__FILE__) . "/../Classes/PHPExcel.php";

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
	->setLastModifiedBy("Maarten Balliauw")
	->setTitle("Office 2007 XLSX Test Document")
	->setSubject("Office 2007 XLSX Test Document")
	->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
	->setKeywords("office 2007 openxml php")
	->setCategory("Test result file");


// Add some data
/*$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');*/

// Miscellaneous glyphs, UTF-8









$rDB = new myDB;
$DB = new myDB;
$s1DB = new myDB;
$s2DB = new myDB;



$i=1;
$j=2;
$k=3;
//$a='A';
$a = 'A'; 
$b = 'A';
$c = 'A';


/*
$rstrSQL = "SELECT * FROM pk_code";
$rDB->query($rstrSQL);

while($rdata = $rDB->fetch_array($rDB->res)) {	
*/

	$strSQL = "SELECT * FROM item_group";
	$DB->query($strSQL);

	while($data = $DB->fetch_array($DB->res)) {	
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($a.$i, $data["name_group"]);
		$a = group_plus($a,3);
		//$a ++;
		
		$s1strSQL = "SELECT * FROM item a,item_group b where a.id_group=b.id_group and a.id_group=".$data["id_group"];
		$s1DB->query($s1strSQL);
		while($s1data = $s1DB->fetch_array($s1DB->res)) {	
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b.$j, $s1data["field_name"]);
		
			$s2strSQL = "SELECT * FROM data a,item b,item_group c where a.id_item = b.id_item and b.id_group=c.id_group and a.id_item=".$s1data["id_item"]." and b.id_group=".$data["id_group"];
			$s2DB->query($s2strSQL);
			while($s2data = $s2DB->fetch_array($s2DB->res)) {	
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($c.$k, $s2data["varchr_value"]);			
			$c ++;
			}
		$b ++;
		}
}
//} 

function group_plus($a,$b) 
{ 
	return strtoupper(base_convert(base_convert($a,26,10)+$b,10,26)); 
} 


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client��s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;


?>