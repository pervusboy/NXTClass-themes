<?php /* Template Name: Archives */ ?>

	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_page' ) ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<h2 class="post-title page-title"><?php the_title(); ?></h2>
					<div class="post-content">
						<?php the_content(); ?>
				
			<?php endwhile; endif; ?>
	
						<div class="archive-lists">
	
							<h5><?php _e('25 Most Recent Posts', 'huddle'); ?></h5>
						    <ul>
						        <?php query_posts('post_type=post&shonxtosts=25'); ?>		  
						        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	  
						            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						        <?php endwhile; endif; ?>					  
						    </ul>
							<h5><?php _e('Categories', 'huddle'); ?></h5>	  
						    <ul>
						        <?php nxt_list_categories('title_li=&hierarchical=1&show_count=1'); ?>	
						    </ul>
							<h5><?php _e('Monthly Archives', 'huddle'); ?></h5>
						    <ul>
						        <?php nxt_get_archives('type=monthly&show_post_count=1'); ?>	
						    </ul>
	
						</div><!--archive-lists-->
					</div><!-- .post-content -->
				</div><!-- .post -->

			<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!--#main-->

	<?php get_sidebar('page'); ?>

	<?php get_footer(); ?>
