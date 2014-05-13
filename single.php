<?php get_header(); ?>

<?php get_template_part('includes/breadcrumbs','single'); ?>

<?php if (in_category('23') || in_category('33')) { ?>

<div id="content-border" class="fullwidth">
<div id="content-top-border-shadow"></div>
<div id="content-bottom-border-shadow"></div>
<div id="content" class="clearfix">
<div id="content-right-bg" class="clearfix">

<?php }else { ?>
<div id="content-border">
<div id="content-top-border-shadow"></div>
<div id="content-bottom-border-shadow"></div>
<div id="content" class="clearfix">
<div id="content-right-bg" class="clearfix">
<div id="left-area">

<?php } ?>

<?php if (in_category('23') || in_category('33')) { include (TEMPLATEPATH . '/single-apps.php'); } else { include (TEMPLATEPATH . '/loop-single.php'); } ?>

<?php if (in_category('23') || in_category('33')) { ?>
</div> <!-- end #content-right-bg -->
</div> <!-- end #content -->
</div> <!-- end #content-border -->


<?php }else { ?>
</div> 	<!-- end #left-area -->
<div id="content-top-shadow"></div>
<div id="content-bottom-shadow"></div>
<div id="content-widget-light"></div>
<?php get_sidebar(); ?>
</div> <!-- end #content-right-bg -->
</div> <!-- end #content -->
</div> <!-- end #content-border -->

<?php } ?>

<?php get_footer(); ?>