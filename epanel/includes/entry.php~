<?php
	if ( is_home() ) {
		$args=array(
			'showposts'=> (int) get_option('leanbiz_homepage_posts'),
			'paged'=>$paged,
			'category__not_in' => (array) get_option('leanbiz_exlcats_recent'),
		);
		if (get_option('leanbiz_duplicate') == 'false'){
			global $ids;
			$args['post__not_in'] = $ids;
		}
		query_posts($args);
	}
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post clearfix">
		


<div class="post-icon">

<?php 
foreach((get_the_category()) as $category) { 
    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Veja mais de %s" ), $category->name ) . '" ' . '>' . '<img src="http://elementaryosbr.org/wp-content/themes/elementary/images/' . $category->cat_ID . '.png" alt="' . $category->cat_name . '" />' . '</a>'; 
} 
?>		
</div> <!-- end .post-icon-->

		<?php
			$thumb = '';
			$width = 191;
			$height = 191;
			$classtext = 'post-thumb';
			$titletext = get_the_title();
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
			$thumb = $thumbnail["thumb"];
		?>
		<?php if ( $thumb <> '' && get_option('leanbiz_thumbnails_index') == 'on' ) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
					<span class="post-overlay"></span>
				</a>
			</div> 	<!-- end .post-thumbnail -->
		<?php } ?>

		<?php if (get_option('leanbiz_blog_style') == 'on') the_content(''); else { ?>
		<h2 class="titleblog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php truncate_post(240); ?></p>
		<?php } ?>
		<a href="<?php the_permalink(); ?>" class="read-more"><span><?php esc_html_e('Leia Mais', 'Elementary'); ?></span></a>
	</div>

	<!-- end .post-->
<?php
endwhile;
	if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
	else { get_template_part('includes/navigation','entry'); }
else:
	get_template_part('includes/no-results','entry');
endif;
if ( is_home() ) wp_reset_query(); ?>
