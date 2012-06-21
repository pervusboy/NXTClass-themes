<?php /* Template Name: Sidebar Left */ ?>

	<?php get_header(); ?>

		<?php get_sidebar('page'); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_page' ) ?>

			<?php // Include the NXTClass loop file
			load_template( TEMPLATEPATH . '/includes/loop.php' );
			?>

			<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!--#main-->

	<?php get_footer(); ?>
