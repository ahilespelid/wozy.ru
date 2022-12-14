<?php
/**
 * My Account > Top-Up form
 *
 * @package WC_Account_Funds
 * @version 2.2.0
 */

defined( 'ABSPATH' ) || exit;

?>
<form method="post">
	<h3><label for="topup_amount"><?php esc_html_e( 'Пополнить лк', 'woocommerce-account-funds' ); ?></label></h3>
	<p class="form-row form-row-first">
		<input type="number" class="input-text" name="topup_amount" id="topup_amount" step="1" value="<?php echo esc_attr( $min_topup ); ?>" min="<?php echo esc_attr( $min_topup ); ?>" max="<?php echo esc_attr( $max_topup ); ?>" />
		<?php if ( $min_topup || $max_topup ) : ?>
		<span class="description">
			<?php
			// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
			printf(
				'%s%s%s',
				/* translators: %s: minimum top-up amount */
				$min_topup ? sprintf( __( 'Минимум: <strong>%s</strong>.', 'woocommerce-account-funds' ), wc_price( $min_topup ) ) : '',
				$min_topup && $max_topup ? ' ' : '',
				/* translators: %s: maximum top-up amount */
				$max_topup ? sprintf( __( 'Максимум: <strong>%s</strong>.', 'woocommerce-account-funds' ), wc_price( $max_topup ) ) : ''
			);
			// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</span>
		<?php endif; ?>
	</p>
	<p class="form-row">
		<input type="hidden" name="wc_account_funds_topup" value="true" />
		<input type="submit" class="button" value="<?php esc_html_e( 'В корзину', 'woocommerce-account-funds' ); ?>" />
	</p>
	<?php wp_nonce_field( 'account-funds-topup' ); ?>
</form>
