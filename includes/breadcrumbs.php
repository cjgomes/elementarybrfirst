<div id="breadcrumbs">
	<?php if(function_exists('bcn_display')) { bcn_display(); }
		  else { ?>
				<a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Página Inicial','Elementary') ?></a> <span class="raquo">&raquo;</span>

				<?php if( is_tag() ) { ?>
					<?php esc_html_e('Artigos no tópico ','Elementary') ?><span class="raquo">&quot;</span><?php single_tag_title(); echo('&quot;'); ?>
				<?php } elseif (is_day()) { ?>
					<?php esc_html_e('Notícias publicadas em','Elementary') ?> <?php the_time('F \d\e jS \d\e Y'); ?>
				<?php } elseif (is_month()) { ?>
					<?php esc_html_e('Notícias publicadas em','Elementary') ?> <?php the_time('F \d\e Y'); ?>
				<?php } elseif (is_year()) { ?>
					<?php esc_html_e('Notícias publicadas em','Elementary') ?> <?php the_time('Y'); ?>
				<?php } elseif (is_search()) { ?>
					<?php esc_html_e('Resultados da busta por','Elementary') ?> <?php the_search_query() ?>
				<?php } elseif (is_single()) { ?>
					<?php $category = get_the_category();
                    $category=str_replace(get_the_category(),'Apps',$category);
                      $catlink = get_category_link( $category[23]->cat_ID );

                      echo ('<a href="http://elementaryosbr.org/apps/" title="Veja outros aplicativos">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo">&raquo;</span> '.get_the_title()); ?>
            <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
            <?php } elseif (is_author()) { ?>
                <?php $curauth = get_userdata($post->post_author); ?>
                <?php esc_html_e('Notícias publicadas por ','Elementary'); echo ' ',$curauth->nickname; ?>
            <?php } elseif (is_page()) { ?>
                <?php the_title(); ?>
            <?php }; ?>
<?php }; ?>



<span class="login-link">
<?php global $current_user; if ( isset($current_user) ) { echo $current_user->display_name; } ?><?php if ( is_user_logged_in() ) { echo '<a href="http://elementaryosbr.org/wp-login.php?action=logout" title="Sair da sua conta do elementary OS Brasil"> (Sair)</a>'; } else { echo '<a href="http://elementaryosbr.org/wp-login.php?action=register" title="Crie uma conta no elementary OS Brasil">Registrar</a> · <a href="http://elementaryosbr.org/wp-login.php" title="Entre com sua conta do elementary OS Brasil">Entrar</a>'; } ?></span>
</div> <!-- end #breadcrumbs -->





