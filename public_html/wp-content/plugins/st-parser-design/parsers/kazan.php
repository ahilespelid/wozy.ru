<?php

function st_parser_add_task6($parse_url, $region, $page){global $wpdb, $cur_user_id;
    $parseURL = parse_url($parse_url);
    // if(!empty($parseURL['host'])){
    //     $GoURl = $parse_url;
    // } else {$t1 = urlencode($parse_url);
    //    // $GoURl = 'https://www.wildberries.ru/catalog/0/search.aspx?search='.$t1.'&xsearch=true';
    //     $GoURl = 'https://wbxsearch.wildberries.ru/suggests/common?query='.$t1;
    // }
    $GoURl = $parse_url;
    $url2 = urlencode($GoURl);
    $Zapros='http://92.63.192.39:8082/put/'.$cur_user_id.'?q='.$url2.'&p='.$page;
    $Cdata = st_parser_curl($Zapros);
    

    if (200 == $Cdata['status']) { 
        $WPSaveData['status'] = 1;
        $tmp1 = json_decode($Cdata['data'], true);
        $RemoteID = (string)$tmp1['task_id'];
        $WPSaveData['id_task'] = $RemoteID;
    } else {
        $WPSaveData['status'] = 3;
    }
    $WPSaveData['data'] = (string)$Cdata['data'];
    $WPSaveData['id_user'] = $cur_user_id;
    $WPSaveData['url'] = $parse_url;
    $WPSaveData['id_parser'] = 6;
    $wpdb->insert( 'parser', $WPSaveData);
    $lID = $wpdb->insert_id;
    return $lID;
}
function st_parser_checkstatus6(int $id){global $wpdb, $cur_user_id; $ret = false;
    $sqlR = $wpdb->prepare("SELECT *FROM parser WHERE id_user = '%d' AND id = '%d'", [$cur_user_id, $id]);
    $data = $wpdb->get_row($sqlR, 'ARRAY_A');
    if($data){$Cdata = st_parser_curl('http://92.63.192.39:8082/check/'.$cur_user_id.'?task_id='.$data['id_task']);    
        if(200 == $Cdata['status']){$ret = json_decode ($Cdata['data'], true);}
        if(isset($ret['complete']) or isset($ret['running'])){           
            $updWhere['id_user'] = $cur_user_id; $updWhere['id'] = $id; 
            $upd1['status'] = ($ret['complete']) ? 2 : (($ret['running']) ? 1 : '');
            $rTemp1 = $wpdb->update( 'parser', $upd1, $updWhere);           
    }}return $ret;
} 
function st_parser_design6(){global $wpdb, $cur_user_id;  $cur_user_id = intval(get_current_user_id()); /*// var_dump(st_parser_add_task($url, $region, $page)); //*/
    $citys = ['msk' => 'Москва',
              'spb' => 'Санкт-Петербург', 
              'kzn' => 'Казань', 
              'krr' => 'Краснодар', 
              'nsk' => 'Новосибирск', 
              'hbr' => 'Хабаровск', 
              'ekb' => 'Екатеринбург']; $f = (string) @get_the_author_meta('tarif6', $cur_user_id)[0]; $b = (string) @get_the_author_meta('balance', $cur_user_id);
    if(is_user_logged_in()){

        if('update' == $_POST['action'] && empty($_POST['balance']) && ($user_id = (int) $_POST['user_id']) > 0){do_action('edit_user_profile_update',$user_id); echo '<script type="text/javascript">location.replace(location);</script>';}
        if(!empty($_POST['parser_on'])){update_user_meta($cur_user_id, 'tarif6', '0'); if('1' == $f){echo '<script type="text/javascript">location.replace(location);</script>';}}
        if(!empty($_POST['parser_s'])){$page = (!empty($_POST['parser_s']) && is_numeric($_POST['parser_page'])) ? intval($_POST['parser_page']) : 1;
            $region = (!empty($_POST['parser_region'])) ? $_POST['parser_region'] : ''; $url = $_POST['parser_s'];
            st_parser_add_task6($url, $region, $page);                                                                      
        }else if($_GET['status'] = (int)$_GET['status']){
            $rt = st_parser_checkstatus6($_GET['status']);
        }else if(isset($_GET['del']) && $_GET['del'] = (int)$_GET['del']){        
            $wpdb->update('parser', ['delete'=>1], ['id' => $_GET['del'], 'id_user'=>$cur_user_id]);    
        }
    $sqlR = $wpdb->prepare("SELECT * FROM parser WHERE id_user = %d AND `delete` = 0 AND id_parser = 6 ORDER BY time DESC", $cur_user_id);
    $TableData = $wpdb->get_results($sqlR, 'ARRAY_A');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event){
jQuery(document).ready(function($){console.log('ready!');
    if($.cookie('sort')){$.each(JSON.parse($.cookie('sort')), function(i, row){
        $('.st-tmove').append($('.st-tmove tr[data-id=' + row + ']'));
    });}
    
    $(function($){$('.st-tmove').sortable({
        handle: '.st-mvr',
        stop: function(){var sort = [];           
            $('.st-tmove tr').each(function(){
                sort.push($(this).data('id'));
            });    
            $.cookie('sort', JSON.stringify(sort));
        }
    });});
});});
</script>
<link rel='stylesheet' id='bp-member-block-css' href='/wp-content/plugins/st-parser-design/st_parser_design.css?ver=0.0.1<?time();?>' type='text/css' media='all' />
<style>
#search-2 {display: none;!important;}
.st-tmove td {max-width: 500px!important;}
.st-tmove td span {overflow: hidden!important;}
.parser-row2 {padding-left: 5px; padding-right: 5px;}
.parser-row2 label {display: block;width: 100%;}
.parser-row2.r1 {width: 100%;}
input.text,
input.title,
input[type=number],
input[type=email],
input[type=password],
input[type=tel],
input[type=text],
select,
textarea {
    background-color: #fff;
    border: 1px solid #bbb;
    padding: 2px;
    color: #4e4e4e;
}select {height: 40px; min-width: 200px;}
label {font-weight: bold;}
#st-add-parser, .stc-button-parser-start {height: 40px;}
.st-obj-ttip:hover .st-report-text-full {width: fit-content;}
.parser-tr-name1 {
    width: 100%;
    overflow-y: hidden;
    height: 20px;
    display: block;
}.st-report-table a.st-but-compl {
    background: #cb11ab;
    border: 2px solid #cb11ab;
    color: white;
}.st-report-table a {color: white;}
.st-but-compl:hover {background: #e313bf;border-color: #e313bf;}
.parser-tr-name1 {
    width: 100%;
    overflow-y: hidden;
    height: 20px;
    display: block;
    color: black;
}.st-report-text-full {color: black;}
.st-report-table a {color: white;color: black;}

@media(max-width: 1050px){
    .st-parser-form-row {flex-wrap: wrap;}
}
</style>
<script src="https://kit.fontawesome.com/4729f1c9be.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<div class="st-prc-title"> </div>
<div class="st-row-add-parser">
<?if('0' === $f):?>
<form id="your-profile" action="" method="post" novalidate="novalidate">
<table class="form-table">
 <tr>
  <th><label for="tarif">Тариф KazanExpress</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif6', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif6($cur_user_id,true) as $kt => $t){//*/
    if(0 == $kt || 1 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif6" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif6', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
</table>
<input type="hidden" name="action" value="update">
<input type="hidden" name="user_id" id="user_id" value="<?=$cur_user_id;?>">
<input type="submit" name="submit" id="submit" class="button11" value="Обновить">
</form>
<?else:?>
    <form method="post" class="stc-form-add-parser" action="">
        <div class="st-parser-form-row">
            <div class="parser-row2 r1">
                <label>Адрес сайта </label>
                <input type="text" value="" name="parser_s" id="parser_s" class="stc-input-parser-start">
            </div>
            <div class="parser-row2 r2">
                <label> Номер страницы </label>
                <input type="text" value="1" name="parser_page" class="stc-input-parser-start " style="min-width: 145px; border-width: 1px;">
            </div>
            <!-- <div class="parser-row2 r3">
                <label> Регион </label>
                <select class="stc-input-parser-start " name="parser_region">
                    <?foreach($citys as $k_city => $city){echo '<option value="'.$k_city.'"> '.$city.' </option>';}?>
                </select>
            </div> -->
            <div class="parser-row2 r4">
                <label>&nbsp;</label>
                <input type="submit" id="st-add-parser" value="Спарсить" class="stc-button-parser-start" name="parser_start">
<?=('1' === $f) ? '<input type="hidden" name="parser_on" value="1">' : '';?>
            </div>
        </div>
    </form>
<?endif;?>
</div><div class="st-report">
    <p class="st-report-grid-title">Ранее заказанные отчеты</p>
    <div class="st-table-row">
        <table class="st-report-table">
            <thead>
                <tr>
                    <th class="st-t1">Дата / время</th>
                    <th>Что парсилось</th>
                    <th>Статус парсера</th>
                    <th class="st-t4"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="st-tmove">
<?php $sort=1; foreach ($TableData as $val) {$data = json_decode($val['data'], true);/*// echo pa($val); //*/ 
if(time() > strtotime($val['time'])+1209600){continue;}?>
                <tr data-id="<?=$sort;?>">
                    <td style="min-width: 185px;"><i class="fas fa-ellipsis-v st-mvr"></i> &nbsp;
                            <?=sjb_format_date($val['time']);?>
                    </td>
                    <td>
                        <a class="st-obj-ttip"><span class="st-report-text-full"><?=$val['url']; ?></span>
                            <div style="width: 100%;"><span class="parser-tr-name1"><?=$val['url']; ?></span></div>
                            <div style="width: 100%;"><span class="parser-tr-page1">Страница: <?=$data['page'];?></span></div>
                            <!-- <div style="width: 100%;"><span class="parser-tr-geo1">Город: <?=$citys[$data['geo']];?></span></div>      -->                     
                        </a>
                    </td>
                    <td>
                        <?=(1 == $val['status']) ? 'В работе' : ((2 == $val['status']) ? 'Завершено' : 'Ошибка');?>
                    </td>
<?php if($val['status'] == 2){ 
    // $ZaprosGet = "this.href='http://188.120.227.124:8000/get_result/$cur_user_id?task_id=".$val['id_task']."'";
    ?>
                    <td>
                        <!--a target="_blank" href="/" onclick="<?=$ZaprosGet?>" class="stc-report-button st-but-compl">Выгрузить</a-->
                         <a target="_blank" href="<?=$plugins_url = plugins_url('st-parser-design/st-parser-get.php' );?>?do_task=<?=$val['id_task'];?>&uid=<?=$cur_user_id;?>&id_parser=6" class="stc-report-button st-but-compl">Выгрузить</a>
                    </td>
<?php }else if($val['status'] == 1){?>
                    <td>
                        <a href="/parser-kazan/?status=<?=$val['id'];?>" class="stc-report-button st-but-compl">Обновить статус</a>
                    </td>
<?php } ?>
                    <td>
                        <a href="/parser-kazan/?del=<?php echo $val['id']; ?>" class=""><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
<?php $sort++;} ?>
            </tbody>
        </table>
    </div>
</div>
<?php }else{echo 'Требуется авторизация';}}

add_shortcode('parserdesign6', 'st_parser_design6');

?>