<?php
if ( et_theme_builder_overrides_layout( ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ) || et_theme_builder_overrides_layout( ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ) ) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
					echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
					// phpcs:enable
				?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
	
	        <style>
            
    #top-header, #top-header .container, #top-header #et-info, #top-header .et-social-icon a {
        line-height: 1em;
        display: none;
    }
    

#top-menu a {
    color: black!important;
    text-decoration: none;
    display: block;
    position: relative;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    
}

.et_header_style_left #et-top-navigation nav > ul > li > a, .et_header_style_split #et-top-navigation nav > ul > li > a {
    padding-bottom: 33px;
    color: black!important;
}

   

#top-menu a {
    color: black!important;
    text-decoration: none;
    display: block;
    position: relative;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    
}

.et_header_style_left #et-top-navigation nav > ul > li > a, .et_header_style_split #et-top-navigation nav > ul > li > a {
    padding-bottom: 33px;
    color: black!important;
}

@media (min-width: 981px) {
	.et_right_sidebar #main-content .container:before {
    right: -100%!important;
	display: none;
}

.et_right_sidebar #sidebar {
    padding-left: 30px;
	display: none;
}

}

	.et_right_sidebar #main-content .container:before {
    right: -100%!important;
	display: none;
}

.et_right_sidebar #sidebar {
    padding-left: 30px;
	display: none;
}


        </style>    
	
</body>
</html>
