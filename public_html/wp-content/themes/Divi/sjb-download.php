<?php 
/*
Template Name: SJB DOWNLOAD PAGE
*/

$cur_user_id = get_current_user_id();
$id = (int)$_GET['id'];

$sql = "SELECT * FROM parser WHERE id_user = %d AND `delete` = 0 AND id = %d";
$sqlR = $wpdb->prepare($sql, [$cur_user_id, $id]);
$TableData = $wpdb->get_row($sqlR, 'ARRAY_A');

if($TableData) {
	
	$dtaURL = 'http://92.63.192.39:8000/get/'.(int)$cur_user_id.'?task_id='.(string)$TableData['id_task'];
	$data = st_parser_curl($dtaURL);
	
	var_dump($dtaURL);
	
	if($data['status'] == '200') {
		
	header("Content-type: application/json");
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Disposition: attachment;filename="data.xlsx"');		
	
	echo $data['data'];
	
	} else {
		
		echo 'Ошибка сервера!';
		
	}
	
	
} else {
	echo 'Ошибка. Такого файла нет.';
}
exit;