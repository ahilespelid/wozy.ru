<?php
/**
 * My Account > Account Funds page
 *
 * @package WC_Account_Funds
 * @version 2.2.0
 */

defined( 'ABSPATH' ) || exit;

wc_print_notices();

?>
<div class="woocommerce-MyAccount-account-funds">
	<p>
		<?php
		printf(
			/* translators: %s: account funds amount */
			wp_kses_post( __( 'Ваш баланс <strong>%s</strong> .', 'woocommerce-account-funds' ) ),
			wp_kses_post( WC_Account_Funds::get_account_funds() )
		);
		?>
	</p>

	<?php do_action( 'woocommerce_account_funds_content' ); ?>
</div>
