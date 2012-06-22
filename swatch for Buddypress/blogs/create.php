<?php

/**
 * BuddyPress - Create Blog
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php
	get_header();
	global $woo_options;
?>
    <?php do_action( 'bp_before_directory_blogs_content' ); ?>
	
		<div id="content" class="col-full">
		<div id="main" class="fullwidth">

		<?php if ( $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>
		<div class="padder" role="main">

		<?php do_action( 'template_notices' ); ?>

			<h3><?php _e( 'Create a Site', 'buddypress' ); ?> &nbsp;<a class="button" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_blogs_root_slug() ) ?>"><?php _e( 'Site Directory', 'buddypress' ); ?></a></h3>

		<?php do_action( 'bp_before_create_blog_content' ); ?>

		<?php if ( bp_blog_signup_enabled() ) : ?>

			<?php bp_show_blog_signup_form(); ?>

		<?php else: ?>

			<div id="message" class="info">
				<p><?php _e( 'Site registration is currently disabled', 'buddypress' ); ?></p>
			</div>

		<?php endif; ?>

		<?php do_action( 'bp_after_create_blog_content' ); ?>

		</div><!-- .padder -->
	<div class="clear"></div><!--/.clear-->
		</div><!-- /#main -->

    </div><!-- /#content -->		
<?php get_footer(); ?>
