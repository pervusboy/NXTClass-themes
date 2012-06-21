<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!--Meta Tags-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--Title-->
	<title><?php nxt_title( '|', true, 'right' ); bloginfo( 'name' ); if( is_front_page() ) echo ' - ' . get_bloginfo( 'description' ) ?></title>

	<!--Stylesheets-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!--RSS Feeds & Pingbacks-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--Hooks-->
	<?php do_action( 'bp_head' ) ?>
	<?php nxt_head() ?>

</head>

<body <?php body_class(); ?>>

	<?php if( ! isset( $_GET['w-iframe'] ) ) : ?>

		<?php do_action( 'bp_before_header' ) ?>

		<div id="header">

			<div class="shadow"></div>

			<div class="overlay">

				<div class="grid">

					<div class="logo">

						<?php if( of_get_option( 'text_logo' ) ) : ?>
							<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?></a></h1>
							<h2><?php bloginfo( 'description' ) ?></h2>
						<?php elseif( of_get_option( 'logo' ) ) : ?>
							<h1><a href="<?php echo home_url() ?>"><img src="<?php echo of_get_option( 'logo' ) ?>" alt="<?php bloginfo( 'name' ) ?>" /></a></h1>
						<?php else : ?>
							<h1><a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="<?php bloginfo( 'name' ) ?>" /></a></h1>
						<?php endif ?>

					</div>

					<div class="login">
						<?php if( is_user_logged_in() ) : ?>
							<?php
							global $current_user, $bp;
							get_currentuserinfo();
							?>
							<p><?php printf( __( 'Welcome %s', 'huddle' ), '<a href="' . $bp->loggedin_user->domain . '">' . $bp->loggedin_user->fullname . '</a>' ) ?>. <a href="<?php echo nxt_logout_url(); ?>"><?php _e( 'Logout', 'huddle' ) ?></a></p>
						<?php else : ?>
							<a class="forgot-pass" href="<?php echo site_url() ?>/nxt-login.php?action=lostpassword"><?php _e( 'Forgot Password?', 'huddle' ) ?></a>

							<div class="fields">
								<form action="<?php echo site_url() ?>/nxt-login.php" method="post">
									<input type="text" class="user-login" name="log" placeholder="<?php _e( 'Username', 'huddle' ) ?>" />
									<input type="password" class="user-pass" name="pwd" placeholder="<?php _e( 'Password', 'huddle' ) ?>" />
									<input type="submit" class="btn-submit" value="" />
									<input type="hidden" name="redirect_to" value="<?php echo substr_count( $_SERVER['REQUEST_URI'], 'activate' ) ? home_url() : $_SERVER['REQUEST_URI'] ?>" />
								</form>
							</div>
						<?php endif ?>
					</div>

					<?php do_action( 'bp_header' ) ?>

					<div class="clear"></div>

				</div>

			</div>

		</div><!-- #header -->

		<?php do_action( 'bp_after_header' ) ?>

		<div class="clear"></div>

		<div id="nav">

			<div class="grid">

				<?php nxt_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

			</div>

		</div><!-- #nav -->

		<?php do_action( 'bp_before_container' ) ?>

	<?php endif ?>

	<div id="content" class="grid">
