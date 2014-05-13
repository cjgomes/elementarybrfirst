<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="entry post clearfix<?php if ( get_option('leanbiz_show_postcomments') == 'false' || 0 == get_comments_number() ) echo ' comments_disabled'; ?>">
		<?php if (get_option('leanbiz_integration_single_top') <> '' && get_option('leanbiz_integrate_singletop_enable') == 'on') echo(get_option('leanbiz_integration_single_top')); ?>
<div class="post-icon">
<?php
foreach((get_the_category()) as $category) {
    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Veja mais sobre %s" ), $category->name ) . '" ' . '>' . '<img src="http://elementaryosbr.org/wp-content/themes/elementary/images/' . $category->cat_ID . '.png" alt="' . $category->cat_name . '" />' . '</a>';
}
?>
</div> <!-- end .post-icon-->
<h1 class="entry-title" itemprop="headline" itemscope itemtype="http://schema.org/NewsArticle"><?php the_title(); ?></h1>
<div itemprop="articleBody" itemscope itemtype="http://schema.org/Article"><?php the_content(); ?></div>
<p class="meta-info">Publicado <span itemprop="datePublished" itemscope itemtype="http://schema.org/NewsArticle" class="date updated" title="<?php the_time('j \d\e F \d\e Y'); ?>, <?php _e('às','undedicated'); ?> <?php the_time(); ?>"><?php echo human_time_diff(get_the_time('U'),current_time('timestamp')) . ' atrás'; ?></span> por 
<?php $googleplus = get_the_author_meta('googleplus'); if ($googleplus) { ?><a href="<?php the_author_meta('googleplus'); ?>?rel=author" class="author" itemprop="creator" itemscope itemtype="http://schema.org/CreativeWork" title="Siga o perfil de <?php the_author(); ?> no Google+" target="_blank"><?php the_author(); ?></a><?php } else { ?><?php the_author(); ?><?php } ?><br />
<?php the_tags('Tópicos: ',', '); ?></p>	<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Elementary').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div> <!-- end .entry -->
<?php if (get_option('leanbiz_show_postcomments') == 'on') comments_template('', true); ?>
<?php endwhile; // end of the loop. ?>
