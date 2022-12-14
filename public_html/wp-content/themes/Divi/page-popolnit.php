<?php /* Template name: Шаблон личного кабинета Wozy */
get_header(); 
    $is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
    $user = wp_get_current_user();
  
if(!$is_page_builder_used && is_user_logged_in()){?>
<div id="main-content">
    <div class="container">
     <div id="content-area" class="clearfix">
      <div id="left-area">
      <h1 class="entry-title main_title"><?=the_title();?></h1>
      Здесь виджет Юмани кассы
            </div> <!-- #left-area -->
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
<?php }else{echo 'Требуется авторизация';} get_footer();