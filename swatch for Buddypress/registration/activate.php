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

		<?php do_action( 'bp_before_activation_page' ) ?>

		<div class="page" id="activate-page">

			<?php if ( bp_account_was_activated() ) : ?>

				<h2 class="widgettitle"><?php _e( 'Account Activated', 'buddypress' ) ?></h2>

				<?php do_action( 'bp_before_activate_content' ) ?>

				<?php if ( isset( $_GET['e'] ) ) : ?>
					<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ) ?></p>
				<?php else : ?>
					<p><?php _e( 'Your account was activated successfully! You can now log in with the username and password you provided when you signed up.', 'buddypress' ) ?></p>
				<?php endif; ?>

			<?php else : ?>

				<h3><?php _e( 'Activate your Account', 'buddypress' ) ?></h3>

				<?php do_action( 'bp_before_activate_content' ) ?>

				<p><?php _e( 'Please provide a valid activation key.', 'buddypress' ) ?></p>

				<form action="" method="get" class="standard-form" id="activation-form">

					<label for="key"><?php _e( 'Activation Key:', 'buddypress' ) ?></label>
					<input type="text" name="key" id="key" value="" />

					<p class="submit">
						<input type="submit" name="submit" value="<?php _e( 'Activate', 'buddypress' ) ?>" />
					</p>

				</form>

			<?php endif; ?>

			<?php do_action( 'bp_after_activate_content' ) ?>

		</div><!-- .page -->

		<?php do_action( 'bp_after_activation_page' ) ?>

		</div><!-- .padder -->
	<?php
		?>

			<div class="clear"></div><!--/.clear-->
		</div><!-- /#main -->

    </div><!-- /#content -->	

<?php get_footer( 'buddypress' ); ?>
