<?php



add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "Elementary";
		$shortname = "leanbiz";
	
		require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

		load_theme_textdomain('Elementary',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_leanbiz.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_leanbiz.php');
		
		include(TEMPLATEPATH . '/includes/widgets.php');
		
		require_once(TEMPLATEPATH . '/includes/additional_functions.php');
	}
}

add_action('wp_head','et_portfoliopt_additional_styles',100);
function et_portfoliopt_additional_styles(){ ?>
	<style type="text/css">
		#et_pt_portfolio_gallery { margin-left: -41px; margin-right: -51px; }
		.et_pt_portfolio_item { margin-left: 35px; }
		.et_portfolio_small { margin-left: -40px !important; }
		.et_portfolio_small .et_pt_portfolio_item { margin-left: 32px !important; }
		.et_portfolio_large { margin-left: -26px !important; }
		.et_portfolio_large .et_pt_portfolio_item { margin-left: 11px !important; }
	</style>
<?php }

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

// Tamanho dos textos resumidos excerpt (arquivos, tags e categorias)
function custom_tag_cloud_widget($args) {
	$args['largest'] = 11;
	$args['smallest'] = 11;
	$args['unit'] = 'px';
	$args['number'] = 10;
	return $args; }
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );

// Remover atributos HTML no formulário de comentários

add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}


// Remove tudo sobre a categoria Apps da sidebar

function exclude_category($query) {
if ( $query->is_home) {
$query->set('cat', '-23');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');

function exclude_widget_categories($args){
$exclude = "23";
$args["exclude"] = $exclude;
return $args;
}
add_filter("widget_categories_args","exclude_widget_categories");

// Tela de login

add_filter( 'login_headerurl', 'custom_login_header_url' );
function custom_login_header_url($url) {
return 'http://elementaryosbr.org/';
}

function login_enqueue_scripts(){
	echo '
<div class="background-cover"></div>
<style type="text/css" media="screen">
.background-cover {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 10;
    overflow: hidden;
    background-image: url(http://elementaryosbr.org/wp-content/themes/elementary/images/background-login.jpg);
    background-size: cover;
    -webkit-filter: blur(4px);
    -ms-filter: blur(4px);
    filter: blur(4px);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -moz-filter: blur(4px);
    -o-filter: blur(4px);
}

.login h1 a {
    margin-bottom: 100px;
    background: url(http://elementaryosbr.org/wp-content/themes/elementary/images/elementarybr-login.png) no-repeat left top !important
}

#login {
    position: relative; float: left;
    margin-top: -50px; margin-left: 100px;
    color: #444444;
    z-index: 9999;
    font-family: Open Sans, Verdana, Arial, sans-serif;
    : ;
}

.login form {
    width: 400px;
    margin-right: auto; margin-left: auto;
    padding: 30px;
    overflow: hidden;
    border: 1px solid #A6A5A3;
    -webkit-border-radius: 4px;
    -moz-border-radius: 5px;
    border-radius: 4px;
    background: #F7F7F7;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,0.3);
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,0.3);
    box-shadow: 0 0 13px 3px rgba(0,0,0,0.3);
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
}

    .login label,
    .login form .input,
    .login input[type="text"] {
        color: #BDBDBD;
        font-size: 13px; font-weight: bold;
        line-height: 0;
    }


    .login form input {
        display: block;
        width: 240px; height: 35px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        background:
        -webkit-gradient(linear, left top, left bottom, from(#f1f1f1), to(#f5f5f5)) repeat-X;
        -moz-linear-gradient(top, #f1f1f1, #f5f5f5) repeat-X;
        -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#f1f1f1, endColorstr=#f5f5f5)";
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f1f1f1, endColorstr=#f5f5f5);
        box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1) inset;
    }

    .login form input:focus,
    .login form textarea:focus {
        background-color: #ffffff;
        overflow: hidden
    }

input#rememberme {
    display: inline;
    width: 18px; height: 18px;
    margin: 5px 0 10px 0;
    font-size: 15px;
    vertical-align: middle
}

input#wp-submit {
    float: right;
    width: 70px; height: 32px;
    color: #505050;
    font-size: 13px; font-weight: normal;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

#nav {
    position: relative;
    left: 0
}

    #nav,
    #nav a {
        color: #444444;
        font-size: 12px;
        text-decoration: none;
        text-shadow: none;
        font-family: Open Sans, Verdana, Arial, sans-serif;
    }

#backtoblog { display: none }

.wp-core-ui .button-primary {
    background-color: #f7f7f7 !important; color: #505050 !important;
    border-color: #A6A5A3 !important;
    border-bottom-color: #A6A5A3 !important;    background-image: none;
    box-shadow: none;
    text-shadow: none;
    }

.wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary:focus {
    background-color: #F7F7F7 !important; color: #505050 !important;
    border-color: #A6A5A3 !important;
    background-image: none;
    box-shadow: none;
    text-shadow: none;
}
</style>
';
}
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts' );

// Usa o jQuery CDN do Google
add_action( 'init', 'jquery_register' );

function jquery_register() {

if ( !is_admin() ) {

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );
}
}

// Atrasa a publicação do RSS
function publish_later_on_feed($where) {
    global $wpdb;
    if (is_feed()) {
        $now = gmdate('Y-m-d H:i:s');
        // tempo de espera
        $wait = '20';
        $device = 'MINUTE';
        $where .= " AND TIMESTAMPDIFF($device, $wpdb->posts.post_date_gmt, '$now') > $wait ";
    }
    return $where;
}
add_filter('posts_where', 'publish_later_on_feed');

// Paginação
function pagination($pages = '', $range = 1)
{ 
     $showitems = ($range * 2)+1;
 
     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class=\"pagination\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>Início</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>-</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">+</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "";
         echo "</div>\n";
     }
}

// Adiciona o link da página inicial no WP-Admin
function et_add_home_link( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'et_add_home_link' );

// jQuery das animações

add_action( 'wp_enqueue_scripts', 'et_load_leanbiz_scripts' );
function et_load_leanbiz_scripts(){
	if ( !is_admin() ){
		$template_dir = get_template_directory_uri();

		wp_enqueue_script('easing', $template_dir . '/js/jquery.easing.1.3.js', array('jquery'), '1.0', true);
		wp_enqueue_script('superfish', $template_dir . '/js/superfish.js', array('jquery'), '1.0', true);
		wp_enqueue_script('et_motion', $template_dir . '/js/jquery.et_motion_slider.1.0.js', array('jquery'), '1.0', true);
		wp_enqueue_script('custom_script', $template_dir . '/js/custom.js', array('jquery'), '1.0', true);
	}
}

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php }
} ?>