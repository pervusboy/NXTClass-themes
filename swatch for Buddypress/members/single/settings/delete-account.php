<?php

/**
 * BuddyPress Delete Account
 *
 * @package BuddyPress
 * @subpackage bp-default
 */
?>

<?php
	get_header();
	global $woo_options;
?>

	<?php if ( isset( $woo_options['woo_slider'] ) && $woo_options['woo_slider'] == 'true' && is_home() && ! is_paged() ) { get_template_part( 'includes/featured' ); } // Load the Featured Slider ?>
    <?php if ( isset( $woo_options['woo_mini_features'] ) && $woo_options['woo_mini_features'] == 'true' && is_home() && ! is_paged() ) { get_template_part( 'includes/mini-features' ); } // Load the Mini Features ?>     

    <div id="content" class="col-full">
		<div id="main" class="fullwidth">

		<?php if ( $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>

		<div class="padder">

			<?php do_action( 'bp_before_member_settings_template' ); ?>

			<div id="item-header">

				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_displayed_user_nav(); ?>

						<?php do_action( 'bp_member_options_nav' ); ?>

					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

				<div class="item-list-tabs no-ajax" id="subnav">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_member_plugin_options_nav' ); ?>

					</ul>
				</div><!-- .item-list-tabs -->

				<h3><?php _e( 'Delete Account', 'buddypress' ); ?></h3>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/delete-account'; ?>" name="account-delete-form" id="account-delete-form" class="standard-form" method="post">

					<div id="message" class="info">
						<p><?php _e( 'WARNING: Deleting your account will completely remove ALL content associated with it. There is no way back, please be careful with this option.', 'buddypress' ); ?></p>
					</div>

					<input type="checkbox" name="delete-account-understand" id="delete-account-understand" value="1" onclick="if(this.checked) { document.getElementById('delete-account-button').disabled = ''; } else { document.getElementById('delete-account-button').disabled = 'disabled'; }" /> <?php _e( 'I understand the consequences of deleting my account.', 'buddypress' ); ?>

					<?php do_action( 'bp_members_delete_account_before_submit' ); ?>

					<div class="submit">
						<input type="submit" disabled="disabled" value="<?php _e( 'Delete My Account', 'buddypress' ) ?>" id="delete-account-button" name="delete-account-button" />
					</div>

					<?php do_action( 'bp_members_delete_account_after_submit' ); ?>

					<?php nxt_nonce_field( 'delete-account' ); ?>
				</form>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_settings_template' ); ?>

		</div><!-- .padder -->
<?php
		?>

			<div class="clear"></div><!--/.clear-->
		</div><!-- /#main -->

    </div><!-- /#content -->		
<?php get_footer(); ?>