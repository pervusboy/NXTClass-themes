<?php /* Template Name: Sitemap */ ?>

	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_page' ) ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<?php if(!$has_button && empty($post->post_excerpt)) : ?>
						<h2 class="post-title page-title"><?php the_title(); ?></h2>
					<?php endif; ?>
	
					<div class="post-content">
						<?php the_content(); ?>
				
				<?php endwhile; endif; ?>
										
						<div class="archive-lists">
					
							<h5><?php _e('Pages', 'huddle'); ?></h5>
							<ul>
						    	<?php nxt_list_pages('depth=0&sort_column=menu_order&title_li=' ); ?>		
							</ul>
	
							<h5><?php _e('Categories', 'huddle'); ?></h5>
							<ul>
							    <?php nxt_list_categories('title_li=&hierarchical=1&show_count=1'); ?>	
							</ul>
					
						</div>
						
					</div><!--.post-content-->
				</div><!--.post-->

			<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!--#main-->

	<?php get_sidebar('page'); ?>

	<?php get_footer(); ?>
