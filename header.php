<?php

// Get Theme Options
$ef_options = EF_Event_Options::get_theme_options();

?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head <?php do_action( 'add_head_attributes' ); ?>>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--[if IE]>
        <meta name="X-UA-Compatible" content="IE=edge" >
        <![endif]-->
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie8.css" />
        <![endif]-->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap-ie7.css" />
        <style type="text/css">
            .col-xs-1,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xs-10,.col-xs-11,.col-xs-12,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.input-group,.row,.content{
                box-sizing:border-box;behavior:url(<?php echo get_template_directory_uri(); ?>/js/boxsizing.htc)
            }
        </style>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie7.css" />
        <![endif]-->
        <!-- HTML5 Shim, Respond.js and PIE.htc IE8 support of HTML5 elements, media queries and CSS3 -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <style type="text/css">
            .speakers .speaker .speaker-inner, .speakers .photo img, .connect, .sessions .session .speaker img,
            .connect .links a:hover:before, .sessions .session .session-inner, .location .explore, .location .map,
            .articles article .image, .facebook .fb-event, .facebook .fb-view, .twitter .view, .twitter .tweet,
            .sidebar .widget_latest_comments li a,.sidebar h2, .articles article .image, .comments-area h2,
            .commentlist .comment .comment-content,.commentlist .comment .comment-content:after,
            .timecounter, input[type=text], textarea, .landing .box, h1 img.img-circle {
                behavior: url("<?php echo get_template_directory_uri(); ?>/js/pie/PIE.htc");
            }
        </style>
        <![endif]-->
		<style type="text/css">
			.landing .bg {
			<?php 
				if ( isset( $ef_options['ef_hero'] ) && trim($ef_options['ef_hero']) != '' ) { 
			?>
			  background-image: url('<?php echo $ef_options['ef_hero']; ?>');
			<?php
				}

				if ( isset( $ef_options['ef_hero_bg_color'] ) && trim($ef_options['ef_hero_bg_color']) != '' ) {
			?>
			  background-color: <?php echo $ef_options['ef_hero_bg_color']; ?>;
			<?php
				}
			?>
			}

			div.landing {
				height: auto;
			}

			.landing img.hero {
				display: block;
				margin: auto;
			}

			<?php if ( isset( $ef_options['ef_hero_image'] ) && trim($ef_options['ef_hero_image']) != '' ) { ?>
			@media only screen and (min-width: 600px) {
				.landing img.hero {
					padding: 89px 0 48px 0;
					content: url('<?php echo $ef_options['ef_hero_image']; ?>');
				}
			}
			<?php } ?>

			<?php if ( isset( $ef_options['ef_hero_image_mobile'] ) && trim($ef_options['ef_hero_image']) != '' ) {	?>
			@media only screen and (max-width: 600px) {
				.landing img.hero {
					padding: 24px 0 24px 0;
					content: url('<?php echo $ef_options['ef_hero_image_mobile']; ?>');
				}
			}
			<?php } ?>
		</style>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="nav transition">
            <a href="<?php echo esc_url(home_url()); ?>" id="logo">
                <img src="<?php echo tyler_set_theme_logo(); ?>" alt="Logo <?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
            </a>
            <nav class="navbar" role="navigation">
                <!-- mobile navigation -->
                <div class="navbar-header visible-sm visible-xs">
                    <button type="button" class="btn btn-primary navbar-toggle" data-toggle="collapse" data-target="#tyler-navigation">
                        <span class="sr-only"><?php _e('Toggle navigation', 'tyler'); ?></span>
                        <i class="icon-header"></i>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse text-fit" id="tyler-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'transition',
                        'menu_id' => 'menu-primary'
                    ));
                    ?>
                </div>
            </nav>
        </header>