<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="entry post clearfix ">
		
<div class="post-icon">
<?php foreach((get_the_category()) as $category) { 
    echo '<a href="http://elementaryosbr.org/apps/" title="Veja outros aplicativos" ' . '>' . '<img src="http://elementaryosbr.org/wp-content/themes/elementary/images/' . $category->cat_ID . '.png" alt="' . $category->cat_name . '" />' . '</a>'; 
} 
?></div> 
<h1 class="entry-title" itemprop="headline" itemscope itemtype="http://schema.org/NewsArticle"><?php the_title(); ?></h1>
<div itemprop="articleBody" itemscope itemtype="http://schema.org/Article"><?php the_content(); ?></div>

<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Páginas','Elementary').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

</div> 

<?php endwhile; ?>
	
<?php get_footer(); ?>