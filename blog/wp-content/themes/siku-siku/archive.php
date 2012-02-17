<?php get_header(); ?>

<?php
$cat_label = "";
$cat_value = "";
$empty_msg = "";
if (is_category()) {
	$cat_label = "Category";
	$cat_value = "";
	$empty_msg = "Sorry, but there aren't any posts by [x] category yet.";
}
elseif (is_tag()) {
	$cat_label = "Tag";
	$cat_value = "";
	$empty_msg = "Sorry, but there aren't any posts by [x] tag yet.";
}
elseif (is_month()) {
	$cat_label = "Month";
	$cat_value = ""; 
	$empty_msg = "Sorry, but there aren't any posts in this particular month.";
}
else {
	$label = "";	
}?>
        
<div id="blog_content">
	<div class="search_result"><span class="label"><?php _e($cat_label); ?></span>
		<?php printf('<span class="keyword">[x]</span>' ); ?>
	</div>
    
    <?php if (have_posts()) : ?>
    	<?php while (have_posts()) : the_post(); ?>
        	<div class="blog_post">
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
           	<div class="meta_before_post clearfix">
            	<span class="date"><?php the_time('j M Y'); ?></span>
                <span class="other"><?php _e('By'); ?> <?php the_author(); ?> / <?php comments_popup_link('0 Comment', '1 Comment', '% Comments', '', 'Closed for comments'); ?></span>
            </div>
            <div class="siku_gist">
            	<?php the_content(); ?>
            </div>
		</div>
        <?php endwhile; ?>
	<?php
    /* This branch should never be executed because this theme doesn't allow any category that don't have any posts to show up. Well, unless users type manually in the URL. */
	else :
	?>
    	<div class="blog_post">
        	<h1>No post found</h1>
        	<div class="siku_gist">	
                <p><?php _e($empty_msg); ?> You may want to try to search by using the search box below.</p>
        	</div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>