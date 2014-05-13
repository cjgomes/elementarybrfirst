<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR">
<head profile="http://gmpg.org/xfn/11">
<?php if(is_single() || is_page()){ ?>
<meta property="og:title" content="<?php the_title() ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
<meta property="og:url" content="<?php the_permalink() ?>" />
<meta property="og:type" content="article" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:description" content="<?php echo $post->post_excerpt; ?>"/>
<?php } ?><?php if (is_home()){ ?>
<meta property="og:title" content="Elementary OS Brasil"/>
<meta property="og:site_name" content="Elementary OS Brasil"/>
<meta property="og:url" content="http://elementaryosbr.org/"/>
<meta property="og:type" content="website"/>
<meta property="og:locale" content="pt_BR"/>
<meta property="og:description" content="Site da comunidade brasileira do Elementary OS, a mais bela distro do mundo."/>
<meta property="og:image" content="http://elementaryosbr.org/wp-content/themes/elementary/fb_screenshot.png"/>
<?php } ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title(); ?></title>
<link rel="shortcut icon" href="http://elementaryosbr.org/wp-content/themes/elementary/images/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie6style.css" /><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script><script type="text/javascript">DD_belatedPNG.fix('img#logo, span.overlay, a.zoom-icon, a.more-icon, #menu, #menu-right, #menu-content, ul#top-menu ul, #menu-bar, .footer-widget ul li, span.post-overlay, #content-area, .avatar-overlay, .comment-arrow, .testimonials-item-bottom, #quote, #bottom-shadow, #quote .container');</script><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7style.css" /><![endif]-->
<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div id="et-wrapper">
		<div id="header">
			<div class="container clearfix">
			<a href="http://elementaryosbr.org/">
			<img src="http://elementaryosbr.org/wp-content/themes/elementary/images/logo.png" alt="Elementary OS Brasil" title="Elementary OS Brasil" id="logo"/>
			</a>
				<?php $menuClass = 'nav';
				if ( get_option('leanbiz_disable_toptier') == 'on' ) $menuClass .= ' et_disable_top_tier';
				$menuID = 'top-menu';
				$primaryNav = '';
				if (function_exists('wp_nav_menu')) {
					$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
				};
				if ($primaryNav == '') { ?>
<ul id="top-menu" class="<?php echo $menuClass; ?>">
<li class="page_item"><a class="sf-with-ul" href="#">Sistema</a>
<ul style="display: none; visibility: hidden;" class="children">
<li class="page_item"><a href="http://elementaryosbr.org/sistema/apresentacao/">Apresentação</a></li>
<li class="page_item"><a href="http://elementaryosbr.org/sistema/recursos/">Recursos</a></li>
<li class="page_item"><a href="http://elementaryosbr.org/sistema/instalacao/">Instalação</a></li>
</ul></li>
<li class="page_item"><a href="http://elementaryosbr.org/apps/">Aplicativos</a></li>
<li class="page_item"><a class="sf-with-ul" href="#">Suporte</a>
<ul style="display: none; visibility: hidden;" class="children">
<li class="page_item"><a href="http://elementaryosbr.org/suporte/perguntas-frequentes/">Dúvidas</a></li>
<li class="page_item"><a href="http://elementaryosbr.org/forum/">Fórum</a></li>
<li class="page_item"><a href="http://elementaryosbr.org/forum/irc">Ao Vivo (IRC)</a></li>
</ul></li>

<li class="page_item"><a class="sf-with-ul" href="#">Comunidade</a>
<ul style="display: none; visibility: hidden;" class="children">
<li class="page_item"><a href="http://elementaryosbr.org/comunidade/equipe/">Equipe</a></li>
<li class="page_item"><a href="http://elementaryosbr.org/comunidade/contato/">Contato</a></li>
</ul></li>
<li class="page_item"><a href="http://elementaryosbr.org/novidades/">Novidades</a></li>
</ul> <!-- end ul#nav -->
				<?php }
				else echo($primaryNav); ?>

				<div id="search-form">
					<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
						<input type="text" value="<?php esc_attr_e('Busca', 'Elementary'); ?>" name="s" id="searchinput" />
						<input type="image" src="http://elementaryosbr.org/wp-content/themes/elementary/images/search_btn.png" id="searchsubmit" />
					</form>
				</div> <!-- end #search-form -->

				<?php do_action('et_header_top'); ?>
			</div> <!-- end .container -->
		</div> <!-- end #header -->

		<?php global $et_show_featured_slider;
			$et_show_featured_slider = is_home() && get_option('leanbiz_featured') == 'on';
		?>

		<div id="featured"<?php if ( $et_show_featured_slider ) echo ' class="home-featured-slider"'; ?>>
			<div id="featured-shadow">
				<div id="featured-light">
					<?php
						$et_slider_settings_class = '';
						if ( $et_show_featured_slider ) {
							$et_slider_auto = 'on' == get_option('leanbiz_slider_auto') ? ' et_slider_auto' : '';

							$et_slider_auto_speed = false !== get_option('leanbiz_slider_autospeed') ? get_option('leanbiz_slider_autospeed') : '7000';
							$et_slider_auto_speed = ' et_slider_autospeed_' . $et_slider_auto_speed;

							$et_slider_pause = 'on' == get_option('leanbiz_slider_pause') ? ' et_slider_pause' : '';

							$et_slider_settings_class = $et_slider_auto . $et_slider_auto_speed . $et_slider_pause;
						}
					?>
					<div <?php if ( $et_show_featured_slider ) echo ' id="main-featured-slider"'; ?> class="container<?php echo $et_slider_settings_class; ?>">
						<?php if ( $et_show_featured_slider ) get_template_part('includes/featured','home'); ?>