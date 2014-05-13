<?php 
global $epanelMainTabs, $themename, $shortname, $default_colorscheme, $options;

$default_colorscheme = "Padrão";

$epanelMainTabs = array('general','navigation','layout','ad','colorization','seo','integration','support');

$cats_array = get_categories('hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$pages_number = count($pages_array);

$site_pages = array();
$site_cats = array();
$pages_ids = array();
$cats_ids = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($cats_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cats_ids[] = $categs->cat_ID;
}

$options = array (

	array( "name" => "wrap-general",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "general-1",
				   "type" => "subnav-tab",
				   "desc" => "Geral"),

			array( "name" => "general-2",
				   "type" => "subnav-tab",
				   "desc" => "Página Inicial"),

			array( "name" => "general-3",
				   "type" => "subnav-tab",
				   "desc" => "Slide da Capa"),

		array( "type" => "subnavtab-end",),

		array( "name" => "general-1",
			   "type" => "subcontent-start",),


			array( "type" => "clearfix",),
							   				   
			array( "name" => "Número de posts exibidos nas categorias",
                   "id" => $shortname."_catnum_posts",
                   "std" => "6",
                   "type" => "text",
				   "desc" => ""),

			array( "name" => "Número de posts exibidos na página de arquivos",
                   "id" => $shortname."_archivenum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => ""),

			array( "name" => "Número de posts exibidos nas buscas",
                   "id" => $shortname."_searchnum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => ""),

			array( "name" => "Número de posts exibidos nos tópicos",
                   "id" => $shortname."_tagnum_posts",
                   "std" => "5",
                   "type" => "text",
				   "desc" => ""),
				   				   
			array( "type" => "clearfix",),
			
			array( "name" => "Usar resumos",
				   "id" => $shortname."_use_excerpt",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "desc."),

			array( "type" => "clearfix",),

		array( "name" => "general-1",
			   "type" => "subcontent-end",),

		array( "name" => "general-2",
			   "type" => "subcontent-start",),

				   
			array( "name" => "Excluir categorias da página de Blog",
				   "id" => $shortname."_exlcats_recent",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "Categorias marcadas com um X vermelho não aparecerão na página do Blog. ",
				   "usefor" => "categories",
				   "options" => $cats_ids),

		array( "name" => "general-2",
			   "type" => "subcontent-end",),

		array( "name" => "general-3",
				   "type" => "subcontent-start",),

			array( "name" => "Mostrar Slide",
                   "id" => $shortname."_featured",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => ""),

			array( "name" => "Remover slides duplicados",
                   "id" => $shortname."_duplicate",
                   "type" => "checkbox2",
                   "std" => "on",
                   "desc" => "Dependendo da configuração, o Slide exibe os posts mais recentes, e eles podem aparecer duplicados. Se você quer remover os posts duplicados no slide, ative esta opção."),

			array( "type" => "clearfix",),

			array( "name" => "Categoria de notícias para o Slide",
                   "id" => $shortname."_feat_cat",
                   "type" => "select",
			       "options" => $site_cats,
				   "desc" => "Os posts mais recentes da categoria selecionada aparecerão no Slide. Isso só terá efeito se você desativar a opção Usar Páginas abaixo."),

			array( "name" => "Número máximo de slides",
                   "id" => $shortname."_featured_num",
                   "std" => "3",
                   "type" => "text",
				   "desc" => "Esta opção limita o número de slides."),
				   
			array( "name" => "Usar Páginas",
                   "id" => $shortname."_use_pages",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "O Slide pode ser selecionado de dois modos. Você pode usar posts ou páginas. Se você desejar usar páginas, ative esta opção."),

			array( "type" => "clearfix",),
	   
			array( "name" => "Selecione as páginas do Slide",
				   "id" => $shortname."_feat_pages",
				   "type" => "checkboxes",
				   "std" => '',
				   "desc" => "Apenas as páginas marcadas com um V na cor verde apareceção no Slide. Você poderá configurar o layout de cada slide na própria página.",
				   "usefor" => "pages",
				   "excludeDefault" => "true",
				   "options" => $pages_ids),
				   				   
			array( "name" => "Rolagem automática",
                   "id" => $shortname."_slider_auto",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "Se você desejar, o slide pode rolar automaticamente. Para isso, habilite esta opção."),
				   
			array( "name" => "Pausar com o mouse",
                   "id" => $shortname."_slider_pause",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => "Se você habilitar a rolagem automática do Slide, esta opção fará com que a animação seja pausada quando o mouse estiver sobre o slide."),
				   
			array( "type" => "clearfix",),

			array( "name" => "Velocidade da rolagem (1000 = 1s)",
                   "id" => $shortname."_slider_autospeed",
                   "type" => "text",
			       "std" => "5000",
				   "desc" => "Quanto mais auto o valor, maior será o tempo que cada slide aparecerá."),

		array( "name" => "general-3",
			   "type" => "subcontent-end",),   

	array(  "name" => "wrap-general",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//



//-------------------------------------------------------------------------------------//

	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "layout-1",
				   "type" => "subnav-tab",
				   "desc" => "Layout de Posts"),

			array( "name" => "layout-2",
				   "type" => "subnav-tab",
				   "desc" => "Layout de Páginas"),

			array( "name" => "layout-3",
				   "type" => "subnav-tab",
				   "desc" => "Opções Gerais"),

		array( "type" => "subnavtab-end",),

		array( "name" => "layout-1",
			   "type" => "subcontent-start",),

			array( "name" => "Miniaturas",
                   "id" => $shortname."_thumbnails",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Esta opção ativa/desativa as miniaturas na página de Blog."),
				   
			array( "name" => "Comentários no Posts",
            "id" => $shortname."_show_postcomments",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "Esta opção ativa/desativa os comentários nos posts. "),

			array( "type" => "clearfix",),

		array( "name" => "layout-1",
			   "type" => "subcontent-end",),

		array( "name" => "layout-2",
			   "type" => "subcontent-start",),

			array( "name" => "Miniaturas nas Páginas",
                   "id" => $shortname."_page_thumbnails",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "sta opção ativa/desativa as miniaturas nas páginas."),

			array( "name" => "Comentários nas páginas",
            "id" => $shortname."_show_pagescomments",
            "type" => "checkbox",
            "std" => "false",
			"desc" => "Esta opção ativa/desativa os comentários nas páginas estáticas."),

			array( "type" => "clearfix",),

		array( "name" => "layout-2",
			   "type" => "subcontent-end",),

		array( "name" => "layout-3",
			   "type" => "subcontent-start",),
				   
			array( "type" => "clearfix",),
				   
			array( "name" => "Miniaturas na indexação",
                   "id" => $shortname."_thumbnails_index",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "Esta opção ativa/desativa as miniaturas nas páginas de aquivo, categorias e tópicos."),	   

			array( "type" => "clearfix",),

		array( "name" => "layout-3",
			   "type" => "subcontent-end",),

	array( "name" => "wrap-layout",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//

); 

function custom_colors_css(){
	global $shortname; ?>
	
	<style type="text/css">
		body { color: #<?php echo(get_option($shortname.'_color_mainfont')); ?>; }
		a { color: #<?php echo(get_option($shortname.'_color_mainlink')); ?>; }
		ul.nav li a { color: #<?php echo(get_option($shortname.'_color_pagelink')); ?> !important; }
		ul.nav > li.current-menu-item > a { color: #<?php echo(get_option($shortname.'_color_pagelink_active')); ?> !important; }
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: #<?php echo(get_option($shortname.'_color_headings')); ?> !important; }
		
		#sidebar a { color:#<?php echo(get_option($shortname.'_color_sidebar_links')); ?>; }		
		.footer-widget { color:#<?php echo(get_option($shortname.'_footer_text')); ?> }
		#footer a, ul#bottom-menu li a { color:#<?php echo(get_option($shortname.'_color_footerlinks')); ?> }
	</style>

<?php };

?>