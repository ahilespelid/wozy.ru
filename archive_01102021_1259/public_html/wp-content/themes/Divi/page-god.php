<?php /* Template name: Шаблон суперпользователя Wozy */
get_header(); 
    $is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
    $user = @wp_get_current_user(); $users = @get_users('orderby=include');
  
if(!$is_page_builder_used && is_user_logged_in() && (2 && 1) == $user->ID){
    if('update' == $_POST['action'] && ($user_id = (int) $_POST['user_id']) > 0){do_action('edit_user_profile_update',$user_id);}
  ?>
<div id="main-content">
    <div class="container">
     <div id="content-area" class="clearfix">
      <div id="left-area">
      <h1 class="entry-title main_title"><?=the_title();?></h1>
<?if(isset($_GET['uid']) && !empty($u = @get_userdata((int) $_GET['uid']))){?>
<script type="text/javascript">document.addEventListener("DOMContentLoaded", function(){var inp=document.getElementById('myInputNumber');inp.onblur = function(){if(inp.value<0){inp.value=0;}}});</script>
<style type="text/css">
a.button11{padding: .25em .5em;}
</style>
 <h3><?=(!empty($u->display_name)) ? $u->display_name : 'Без имени';?></h3>
 <a href="<?=@get_page_link(@get_page_by_path('god', OBJECT, 'page')->ID);?>" class="button11">Назад</a>
<form id="your-profile" action="" method="post" novalidate="novalidate">
<table class="form-table">
 <tr>
  <th><label for="balance">Баланс</label></th>
  <td><input type="number" min="0" id="myInputNumber" name="balance" value="<?=('' == ($b=@get_the_author_meta('balance', $u->ID))) ? 0 : esc_attr($b);?>" class="regular-text" /></td>
 </tr>
 <tr>
  <th><label for="phone">Телефон</label></th>
  <td><input type="text" name="phone" value="<?=esc_attr(@get_the_author_meta('phone', $u->ID));?>" class="regular-text" /></td>
 </tr>
 <tr>
  <th><label for="tarif">Тариф wb</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
  <tr>
  <th><label for="tarif">Тариф яндекс</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif2', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif2($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif2" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif2', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
   <tr>
  <th><label for="tarif">Тариф Ламода</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif3', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif3($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif3" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif3', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
    <tr>
  <th><label for="tarif">Тариф Ozon</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif4', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif4($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif4" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif4', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
     <tr>
  <th><label for="tarif">Тариф Sber</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif5', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif5($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif5" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif5', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
      <tr>
  <th><label for="tarif">Тариф KazanExpress</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif6', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif6($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif6" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif6', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
       <tr>
  <th><label for="tarif">Тариф Aliexpress</label></th>
  <td>
  <!--input type="text" name="tarif" value="<?=esc_attr(@get_the_author_meta('tarif7', $u->ID)[0]);?>" class="regular-text" disabled/-->
<?foreach(extra_tarif7($u->ID,true) as $kt => $t){/*//if(0 == $kt){continue;}//*/?> 
   <input type="radio" name="tarif7" value="<?=$kt.'@'.time();?>" <?=($kt == get_the_author_meta('tarif7', $u->ID)[0]) ? 'checked' : '';?>><?=$t['name'];?><br>
<?}?>
  </td>
 </tr>
</table>
<input type="hidden" name="action" value="update">
<input type="hidden" name="user_id" id="user_id" value="<?=$u->ID;?>">
<input type="submit" name="submit" id="submit" class="button11" value="Обновить">
</form>
<?}else{foreach($users as $ku => $u){?>
    Логин :                     <a href="?uid=<?=$u->ID;?>"><?=esc_attr($u->user_login);?></a><br />
    E-mail:                     <?=esc_attr($u->user_email);?><br />
    Баланс:                     <?=('' == ($b=@get_the_author_meta('balance', $u->ID))) ? 0 : esc_attr($b);?><br />
    Тариф на парсере WB:        <?=esc_attr(extra_tarif($u->ID)['name']);?><br />
    Тариф на парсере yandex:        <?=esc_attr(extra_tarif2($u->ID)['name']);?><br />
    Тариф на парсере Lamoda:        <?=esc_attr(extra_tarif3($u->ID)['name']);?><br />
Тариф на парсере Ozon:        <?=esc_attr(extra_tarif4($u->ID)['name']);?><br />
Тариф на парсере Sber:        <?=esc_attr(extra_tarif5($u->ID)['name']);?><br />
Тариф на парсере KazanExpress:        <?=esc_attr(extra_tarif6($u->ID)['name']);?><br />
Тариф на парсере Aliexpress:        <?=esc_attr(extra_tarif7($u->ID)['name']);?><br />
    <br>
<?php }} ?>
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
<?php }else{echo 'Требуется авторизация';} get_footer();