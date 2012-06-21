
<?php do_action( 'bp_before_groups_loop' ); ?>

<?php
global $huddle_bp_groups;
if( ! $huddle_bp_groups ) $huddle_bp_groups = bp_has_groups( bp_ajax_querystring( 'groups' ) );
$url = rtrim( current( explode( '?', $_SERVER['REQUEST_URI'] ) ), '/' );
?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-top">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<ul id="groups-list" class="item-list" role="main">

	<?php $i_row = 0; $i = 0; $i_column = 0; while ( bp_groups() ) : bp_the_group(); ?>
		<?php
		if( $i++ % 2 == 0 ) $i_row++;
		$i_column++;
		if( $i_column > 2 ) $i_column = 1;
		?>

		<li rel="row<?php echo $i_row ?>" class="column<?php echo $i_column ?> row<?php echo $i_row ?> row-<?php echo $i_row % 2 == 0 ? 'even' : 'odd' ?>">
			<div class="item-avatar">
				<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar( 'type=thumb&width=35&height=35' ); ?></a>
			</div>

			<div class="item">
				<div class="item-title"><a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a></div>
				<!--
				<div class="item-meta"><span class="activity"><?php printf( __( 'active %s', 'huddle' ), bp_get_group_last_active() ); ?></span></div>
				-->
				<div class="item-meta"><?php bp_group_member_count(); ?></div>

				<?php do_action( 'bp_directory_groups_item' ); ?>

			</div>

			<div class="action">

				<?php if( ! in_array( $url, array( '/' . bp_get_groups_root_slug(), '/nxt-load.php' ) ) ) : ?>
					<div class="generic-button"><a class="btn-gray" href="<?php bp_group_permalink(); ?>"><?php _e( 'View', 'huddle' ) ?></a></div>
				<?php endif ?>

				<?php do_action( 'bp_directory_groups_actions' ); ?>

			</div>

			<div class="clear"></div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'huddle' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
