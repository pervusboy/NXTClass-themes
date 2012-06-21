<?php /* Template Name: Full Width */ ?>

	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_page' ) ?>

			<?php load_template( TEMPLATEPATH . '/includes/loop.php' ) ?>

			<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!-- #main -->

	<?php get_footer(); ?>
