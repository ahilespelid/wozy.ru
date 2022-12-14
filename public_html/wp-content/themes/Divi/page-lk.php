<?php /* Template name: Шаблон личного кабинета Wozy */
if(!is_user_logged_in()){wp_redirect(home_url());}
get_header(); 
    $is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
    $user = wp_get_current_user();

if(!$is_page_builder_used && is_user_logged_in()){?>
<div id="main-content">
    <div class="container">
     <div id="content-area" class="clearfix">
      <div id="left-area">
<style type="text/css">                               
.balance {position: absolute;right: 0px;top: 0px;}
.balance *{margin: 0;padding: 0;}
.balance ul, .balance ol{list-style: none;list-style-type: none!important;line-height: 15px !important;}
.balance > ul{display: flex; justify-content: center;}
.balance > ul li{position: relative; border-radius: 15px; margin-left: 5px;}
.balance > ul li > a i.fa{font-size: 15px;left: 7px;position: absolute;top: 10px;}
.balance > ul li a{
    color:#fff;
    background: #cb11ab -webkit-gradient(linear,left top,right top,color-stop(0,#bf5ae0),to(#a811da));
    background: #cb11ab linear-gradient(90deg ,#bf5ae0 0,#a811da 100%);
    border-radius: 40px;
    
    /* background: linear-gradient(to bottom, rgb(234, 158, 158) 0%,rgb(226, 210, 210) 2%,rgb(255, 55, 55) 98%,rgb(106, 106, 113) 100%); 
    border-radius: 5px; */
    display: block;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9c9c9', endColorstr='#757577',GradientType=0 );
    font-size: 14px;
    padding: 5px 8px 8px 30px;
    margin-top: 5px;
    text-decoration: none;
    transition: all 3s linear;
}
.pouring {
    font-size: 40px;
    line-height: 50px;
    font-family: Verdana, sans-serif;
    font-weight: 900;
    position: relative;
    background: white;
    overflow: hidden;
    text-transform: uppercase;
    text-align: center;
}
.pouring:before {
    content: '';
    position: absolute;
    filter: blur(10px);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    mix-blend-mode: screen;
    background-image: repeating-linear-gradient(-45deg, transparent, transparent 1em, #BFE2FF 1em, #ad1fdb 50%), repeating-linear-gradient(45deg, #337AB7, #337AB7 1em, #FFF 1em, #BFE2FF 50%);
    background-size: 3em 3em, 2em 2em;
    animation-name: ani;
    animation-duration: 10s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
}
@keyframes ani {
    from {
        background-position: 0 0;
    }
    to {
        background-position: 100% 0;                                                                 
    }
}                                                                
@media (max-width:690px) {    
    .pouring {font-size: 10px;}    
}
.out{position:static!important;}
.out > ul li a {
    background: #cb11ab -webkit-gradient(linear,left top,right top,color-stop(0,#baa3c1),to(#6b525c));
    background: #cb11ab linear-gradient(90deg ,#baa3c1 0,#6b525c 100%);
    border-radius: 5px;
    padding: 5px;
    margin-top: 5px;
}
</style>
          <div class="balance">
            <ul>
<?if(2 == $user->ID){?><li><a href="<?=get_page_link(get_page_by_path('god', OBJECT, 'page')->ID);?>">Пополнить</a></li><?}?>
				<?if(1 == $user->ID){?><li><a href="<?=get_page_link(get_page_by_path('god', OBJECT, 'page')->ID);?>">Пополнить</a></li><?}?>
              <li><a href="<?=get_page_link(get_page_by_path('popolnit', OBJECT, 'page')->ID);?>" title="Нажмите на меня, чтобы пополить..."><i class="fa fa-shopping-cart"></i>Баланс : <?=('' == ($b=get_the_author_meta('balance', $user->ID))) ? 0 : esc_attr($b);?></a></li>
              <!--li><a href="<?=get_page_link(get_page_by_path('popolnit', OBJECT, 'page')->ID);?>"><i class="fa fa-shopping-cart"></i>Пополнить</a></li-->
            </ul>
          </div>
<!--h1 class="entry-title main_title"><?=the_title();?></h1-->
<div style="text-align: center;" class="pouring"> <h2>Приветствуем Вас, <?=$user->user_login;?> <!--(<?=$user->user_email;?>)--></h2> </div><hr>
<div class="balance out"><ul><li><?wp_loginout(home_url());?></li></ul></div>
<div style="text-align: center;"> <h3>Сервисы для Wildberries</h3> </div>
<ul style="list-style-type: cjk-ideographic;">
 <li>
  <a href="<?=get_page_link(get_page_by_path('parser', OBJECT, 'page')->ID);?>">Парсер Wildberries</a>
  <a href="<?=get_page_link(get_page_by_path('parser-yandex', OBJECT, 'page')->ID);?>" style="display: block;">Парсер Yandex</a>
  <a href="<?=get_page_link(get_page_by_path('parser-lamoda', OBJECT, 'page')->ID);?>" style="display: block;">Парсер Ламода</a>
  <a href="<?=get_page_link(get_page_by_path('parser-ozon', OBJECT, 'page')->ID);?>" style="display: block;">Парсер Ozon</a>
  <a href="<?=get_page_link(get_page_by_path('parser-sber', OBJECT, 'page')->ID);?>" style="display: block;">Парсер Sber</a>
    <a href="<?=get_page_link(get_page_by_path('parser-kazan', OBJECT, 'page')->ID);?>" style="display: block;">Парсер KazanExpress</a>
    <a href="<?=get_page_link(get_page_by_path('parser-ali', OBJECT, 'page')->ID);?>" style="display: block;">Парсер Aliexpress</a>
 </li>
</ul><br><br>


<?php  
 /*//
<br><br><br><br>
    Логин :                     <a href="?uid=<?=$user->ID;?>"><?=$user->user_login;?></a><br />
    E-mail:                     <?=$user->user_email;?><br />
    Баланс:                     <?=('' == ($b=@get_the_author_meta('balance', $user->ID))) ? 0 : esc_attr($b);?><br />
    Тариф на парсере WB:        <?=@get_the_author_meta('tarif', $user->ID);?><br /><br>

'Никнейм: '  .$user->user_login.'<br />'.
'Логин: '    .$user->user_email.'<br />'.
'Телефон: '  .@get_the_author_meta('phone', $user->ID).'<br />'.
'Имя: '      . $user->user_firstname . ' '.$user->user_lastname.'<br />';
//echo get_avatar( $user->ID, 128 ).'<br>';
//*/ 
?>
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
<?php } get_footer();