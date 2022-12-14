<?php /* Template name: Шаблон личного кабинета Wozy */
get_header(); $is_page_builder_used=et_pb_is_pagebuilder_used(get_the_ID()); $user = wp_get_current_user();
?>
<?php if(!$is_page_builder_used && is_user_logged_in()){?>
<div id="main-content">
    <div class="container">
     <div id="content-area" class="clearfix">
      <div id="left-area">
<style type="text/css">
.balance {position: absolute;right: 0px;top: 0px;}
.balance *{margin: 0;padding: 0;}
.balance ul, .balance ol{list-style: none;list-style-type: none!important;line-height: 15px !important;}
.balance > ul{display: flex; justify-content: center;}
.balance > ul li{border-right: 1px solid #8b8d90;position: relative;}
.balance > ul li:first-child{border-left: 1px solid #b2b6bd;}
.balance > ul li:last-child{border-right: 1px solid #9a9da5;}
.balance > ul li > a i.fa{font-size: 18px;left: 12px;position: absolute;top: 15px;}
.balance > ul li a{
    background: linear-gradient(to bottom, rgb(189, 182, 182) 0%,rgb(255, 255, 255) 2%,rgb(159, 162, 169) 98%,rgb(106, 106, 113) 100%);
    background: -moz-linear-gradient(top, rgba(201,201,201,1) 0%, rgba(246,246,246,1) 2%, rgba(196,197,199,1) 98%, rgba(117,117,119,1) 100%);
    background: rgb(206, 193, 193);
    background: -webkit-linear-gradient(top, rgb(175, 174, 174) 0%,rgba(246,246,246,1) 2%,rgb(167, 169, 173) 98%,rgba(117,117,119,1) 100%);
    color: #494950;
    display: block;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9c9c9', endColorstr='#757577',GradientType=0 );
    font-size: 14px;
    padding: 15px 15px 15px 40px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.25, 0.1, 0.15, 0.91);
}
</style>
          <div class="balance">
            <ul>
              <li><a href="#"><i class="fa fa-shopping-cart"></i>Баланс : <?=get_the_author_meta('balance', $user->ID);?> руб.</a></li>
              <li><a href="#"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>Пополнить</a></li>
            </ul>
          </div>
<h1 class="entry-title main_title">Профиль</h1>
<?='Никнейм: '.$user->user_login.'<br />'.
   'Логин: '.$user->user_email.'<br />'.
   'Телефон: '.get_the_author_meta('phone', $user->ID).'<br />'.
   'Имя: '       . $user->user_firstname . ' '.$user->user_lastname.'<br />';
//echo get_avatar( $user->ID, 128 ).'<br>'; 
?>
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
<?php }else{echo 'Требуется авторизация';} get_footer();