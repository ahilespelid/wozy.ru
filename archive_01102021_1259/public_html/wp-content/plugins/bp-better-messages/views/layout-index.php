<?php
defined( 'ABSPATH' ) || exit;

$user_id = get_current_user_id();
if ( bp_displayed_user_id() !== 0 ) $user_id = bp_displayed_user_id();

$threads = BP_Better_Messages()->functions->get_threads( $user_id );
?>
<div class="bp-messages-wrap bp-messages-wrap-main">
    <div class="chat-header">
        <?php

        if( BP_Better_Messages()->settings['disableNewThread'] === '0' || current_user_can('manage_options') ) {
            echo '<a href="' . add_query_arg( 'new-message', '', BP_Better_Messages()->functions->get_link() ) . '" class="new-message ajax" title="'. __( 'New Thread', 'bp-better-messages' ) . '"><i class="fas fa-plus" aria-hidden="true"></i></a>';
        }

        if( BP_Better_Messages()->settings['disableFavoriteMessages'] === '0' ) {
        $favorited = BP_Better_Messages()->functions->get_starred_count();
        echo '<a href="' . add_query_arg( 'starred', '', BP_Better_Messages()->functions->get_link() ) . '" class="starred-messages ajax" title="'. __( 'Starred', 'bp-better-messages' ) . '"><i class="fas fa-star" aria-hidden="true"></i> ' . $favorited . '</a>';
        }

        if( BP_Better_Messages()->settings['disableSearch'] === '0' ) { ?>
        <div class="bpbm-search">
            <form style="display: none">
                <input title="<?php _e( 'Search', 'bp-better-messages' ); ?>" type="text" name="search" value="">
                <span class="close"><i class="fas fa-times" aria-hidden="true"></i></span>
            </form>
            <a href="#" class="search" title="<?php _e( 'Search', 'bp-better-messages' ); ?>"><i class="fas fa-search" aria-hidden="true"></i></a>
        </div>
        <?php } ?>
        <a href="#" class="mobileClose"><i class="fas fa-window-close"></i></a>
        <?php if( BP_Better_Messages()->settings['disableUserSettings'] === '0' ) {
            echo '<a href="' . add_query_arg( 'settings', '', BP_Better_Messages()->functions->get_link() ) . '" class="settings ajax" title="'. __( 'Settings', 'bp-better-messages' ) . '"><i class="fas fa-cog" aria-hidden="true"></i></a>';
        } ?>
    </div>
    <?php if ( ! empty( $threads ) ) { ?>
        <div class="scroller scrollbar-inner threads-list-wrapper">
            <div class="threads-list">
                <?php foreach ( $threads as $thread ) {
                    echo BP_Better_Messages()->functions->render_thread( $thread );
                } ?>
                <div class="loading-messages">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
        </div>
    <?php } else { ?>
    <div class="threads-list">
        <div class="empty">
            <p class="bpbm-empty-icon"><i class="far fa-comments"></i></p>
            <p class="bpbm-empty-message"><?php _e( 'No messages yet!', 'bp-better-messages' ); ?></p>
            <?php if( BP_Better_Messages()->settings['disableNewThread'] === '0' || current_user_can('manage_options') ) { ?>
            <p class="bpbm-empty-link"><a class="ajax" href="<?php echo add_query_arg( 'new-message', '', BP_Better_Messages()->functions->get_link() ); ?>"><?php _e('Start new conversation', 'bp-better-messages'); ?></a></p>
            <?php } ?>
        </div>
    </div>
    <?php } ?>

    <div class="preloader"></div>

    <?php if( BP_Better_Messages()->settings['disableTapToOpen'] === '0' ){ ?>
        <div class="bp-messages-mobile-tap"><?php _e( 'Tap to open messages', 'bp-better-messages' ); ?></div>
    <?php } ?>
</div>