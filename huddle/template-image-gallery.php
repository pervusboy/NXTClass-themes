<?php /* Template Name: Image Gallery */ ?>


	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_page' ) ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
				<div class="post" id="post-<?php the_ID(); ?>">
					<h2 class="post-title page-title"><?php the_title(); ?></h2>
					<div class="post-content">
						<?php the_content(); ?>
					</div>
					
			<?php endwhile; endif; ?>
			
					<div class="image-gallery">	
					
						<?php
						$total = $nxtdb->get_var('SELECT count(p.id) FROM '.$nxtdb->prefix.'posts p LEFT JOIN '.$nxtdb->prefix.'postmeta pm ON p.id = pm.post_id WHERE p.post_status = \'publish\' AND post_type = \'post\' AND pm.meta_key = \'_thumbnail_id\'');
	
						load_template( TEMPLATEPATH . '/functions/paginate.php' );
						
						$pages = new paginate(array(
							'total'			=>	$total,
							'nr_per_page'	=>	of_get_option( 'gallery_count', 5 ) + 1
						));
	
						$thumbs = $nxtdb->get_results('SELECT p.ID,p.post_title FROM '.$nxtdb->prefix.'posts p LEFT JOIN '.$nxtdb->prefix.'postmeta pm ON p.id = pm.post_id WHERE p.post_status = \'publish\' AND post_type = \'post\' AND pm.meta_key = \'_thumbnail_id\' ORDER BY p.post_date DESC LIMIT '.$pages->limit());
	
					 	foreach ($thumbs as $thumb) : ?>
					 	
			                <div class="one_third">
				                <div class="post-img-medium">
					            	<a href="<?php echo get_permalink($thumb->ID); ?>" rel="bookmark" title="<?php echo $thumb->post_title; ?>"><?php echo get_the_post_thumbnail($thumb->ID, 'post-medium'); ?></a>
				                </div>
				            </div>
			            
						<?php endforeach; ?>
						
						<div class="clear"></div>
						
						<div id="pagination">
							<?php echo $pages->nav() ?>
						</div>
						
					</div>
					
				</div><!--post-->

			<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!--#main-->

	<?php get_footer(); ?>
