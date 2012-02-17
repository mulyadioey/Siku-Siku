<?php
/**
  * Search result page.
  */
?>
<?php get_header(); ?>

	<div id="blog_content">
        	<div class="search_result"><span class="label"><?php _e("Search keywords") ?></span><?php printf('<span class="keyword">' . get_search_query() . '</span>' ); ?></div>
<?php if ( have_posts() ) : ?>			
		<?php while (have_posts()) : the_post(); ?>
            <div class="blog_post">
            	<h1><a href="<?php the_permalink() ?>" title="<?php _e('Click to read ')?><?php the_title(); ?>"><?php the_title(); ?></a></h1>
            	<div class="meta_before_post clearfix">
            		<span class="date"><?php the_time('j M Y'); ?></span>
                	<span class="other"><?php _e('By'); ?> <?php the_author(); ?> / <?php comments_popup_link('0 Comment', '1 Comment', '% Comments', '', 'Closed for comments'); ?></span>
            	</div>
                <div class="siku_gist">
            		<?php the_excerpt(); ?>
                </div>
            </div><!-- .blog_post -->
        <?php endwhile; ?>

        <div class="navigation">
            <div class="alignleft"><?php next_posts_link('Older Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Newer Entries') ?></div>
        </div>
	
<?php else : ?>
		<div class="blog_post">
        	<h1>No result found</h1>
        	<div class="siku_gist">	
                <p>Sorry, your search doesn't return any results. You may try to enter a different search term or simply browse our content by the <a href="#blog_footer">monthly archive / category / tag</a>.</p>
        	</div>
        </div>
<?php endif; ?>
	</div><!-- #blog_content -->
<?php get_footer(); ?>
