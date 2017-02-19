<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package brasserie
 * @since brasserie 2.0
 */
?><!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class('sticky-header'); ?>>
<div id="wrap">
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
    <div id="masthead-wrap">
		<header id="masthead" class="site-header header_container" role="banner">
		    <?php if ( get_theme_mod( 'brasserie_logo' ) ) : ?>
			    <?php if ( is_front_page() || ( has_post_thumbnail() && ! is_singular( 'recipe' ) ) ) { ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                           title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_theme_mod( 'brasserie_logo' ) ); ?>"
                                 alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        </a>
                        <img class="svg logo-background"
                             src="<?= get_stylesheet_directory_uri() ?>/img/logo-nav-back.svg" alt="logo background">
                    </div>
			    <?php } else { ?>
                    <div class="site-logo site-logo-text">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                           title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?= get_stylesheet_directory_uri() ?>/img/logo-text.png"
                                 alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        </a>
                    </div>
			    <?php } ?>
		<?php else : ?>
		
				<div class="site-introduction">
					<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p> 
				</div>
		<?php endif; ?>
		
				<nav role="navigation" class="site-navigation main-navigation nav-1">
					<h1 class="assistive-text"><?php _e( 'Menu', 'brasserie' ); ?></h1>
					<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'brasserie' ); ?>"><?php _e( 'Skip to content', 'brasserie' ); ?></a></div>
		
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->

				<nav role="navigation" class="site-navigation main-navigation nav-2">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary-header' ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->

                <nav role="navigation" class="site-navigation main-navigation nav-social">
                    <?php wp_nav_menu( array( 'theme_location' => 'social-header' ) ); ?>
                </nav><!-- .site-navigation .main-navigation -->
        </header><!-- #masthead .site-header -->
    </div><!-- #masthead-wrap -->
	<div id="main" class="site-main">

	<?php
		$header_image = get_header_image();
		if( ! empty( $header_image) ){

		    echo "<div class='header-image'>";

			if( get_theme_mod('header_homepage_only') ){
				if( is_front_page() ){
					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
						</a>
					<?php
				}elseif ( is_page() ){
					?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php	the_post_thumbnail('header'); ?>
						</a>
					<?php
				}
			}else{
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
					</a>
				<?php
			}

			echo "</div>";

		} elseif ( is_page() && has_post_thumbnail() ){
			?>
            <div class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php	the_post_thumbnail('header'); ?>
				</a>
            </div>
			<?php
		}
	?>