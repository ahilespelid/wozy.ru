<?php
defined( 'ABSPATH' ) || exit;

class BP_Better_Messages_Shortcodes
{

    public static function instance()
    {

        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been run previously
        if ( null === $instance ) {
            $instance = new BP_Better_Messages_Shortcodes;
            $instance->setup_actions();
        }

        // Always return the instance
        return $instance;

        // The last metroid is in captivity. The galaxy is at peace.
    }

    public function setup_actions(){
        add_shortcode( 'bp_better_messages_unread_counter', array( $this, 'unread_counter_shortcode' ) );
        add_shortcode( 'bp_better_messages_my_messages_url', array( $this, 'bp_better_messages_url' ) );
    }

    public function bp_better_messages_url(){
        if( ! is_user_logged_in() ){
            return '';
        }

        return BP_Better_Messages()->functions->get_link( get_current_user_id() );
    }

    function unread_counter_shortcode( $args ) {
        if( ! is_user_logged_in() ){
            return '';
        }

        $hide_when_no_messages = false;
        $preserve_space = false;
        if( isset( $args['hide_when_no_messages'] ) && $args['hide_when_no_messages'] === '1' ) {
            $hide_when_no_messages = true;
        }

        if( isset( $args['preserve_space'] ) && $args['preserve_space'] === '1' ) {
            $preserve_space = true;
        }

        $classes = ['bp-better-messages-unread', 'bpbmuc'];
        if( $hide_when_no_messages ){
            $classes[] = 'bpbmuc-hide-when-null';
        }

        if( $preserve_space ){
            $classes[] = 'bpbmuc-preserve-space';
        }

        $class = implode(' ', $classes );
        if( BP_Better_Messages()->settings['mechanism'] !== 'websocket'){
            $unread = BP_Messages_Thread::get_total_threads_for_user( get_current_user_id(), 'inbox', 'unread' );
            return '<span class="' . $class . '" data-count="' . $unread . '">' . $unread . '</span>';
        } else {
            return '<span class="' . $class . '" data-count="0">0</span>';
        }
    }

}

function BP_Better_Messages_Shortcodes()
{
    return BP_Better_Messages_Shortcodes::instance();
}