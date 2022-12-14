<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



 
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if(!empty($_GET['do_task']) AND is_numeric($_GET['uid'])){

	if ($_GET['id_parser'] == 1) {
		$get_pars_file = 'http://92.63.192.39:8000/get/'.$_GET['uid'].'?task_id='.$_GET['do_task'];
		$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('sh.xlsx');
	} elseif ($_GET['id_parser'] == 2) {
		$get_pars_file = 'http://188.120.227.124:8000/get_result/'.$_GET['uid'].'?task_id='.$_GET['do_task'];
		$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('sh2.xlsx');
	} elseif ($_GET['id_parser'] == 3) {
		$get_pars_file = 'http://92.63.192.39:5050/get_results/'.$_GET['uid'].'?task_id='.$_GET['do_task'];
		$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('sh3.xlsx');
	} elseif ($_GET['id_parser'] == 4) {
		$get_pars_file = 'http://149.154.64.48:4000/get_data_by_id/'.$_GET['do_task'];
		$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('sh4.xlsx');
	} elseif ($_GET['id_parser'] == 5) {
		$get_pars_file = 'http://149.154.64.48:8500/get_data_by_id/'.$_GET['do_task'];
		$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('sh5.xlsx');
	}

	

	$sheet = $spreadsheet->getActiveSheet();


	
	
	$content = json_decode(file_get_contents($get_pars_file), true);

	$i = 2;
	foreach ($content as $key => $value) {

		
		foreach ($value as $key2 => $value2){
			$i2 = 1;

			foreach($value2 as $key3 => $value3){
				if ($key == 0) {
				// $sheet->setCellValueByColumnAndRow($i2, 1, (string)$key2);
					$string = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i2);
					$sheet->getColumnDimension("$string")->setWidth(30);
				}
				$sheet->setCellValueByColumnAndRow($i2, $i, (string)$value3);


				$i2++;
			}
			$i++;
		}
		
		
	}

	$writer = new Xlsx($spreadsheet);



	header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment; filename=file.xlsx");


	$writer->save('php://output'); 
	exit();	

}