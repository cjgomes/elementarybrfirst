<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
	<?php if (get_option('leanbiz_page_thumbnails') == 'on') { ?>
		
	<?php } ?>
	
	<h1 class="entry-title" itemprop="headline" itemscope itemtype="http://schema.org/NewsArticle"><?php the_title(); ?></h1>

<div itemprop="articleBody" itemscope itemtype="http://schema.org/Article"><?php the_content(); ?></div>
	<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Páginas','Elementary').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<?php endwhile; // end of the loop. ?>