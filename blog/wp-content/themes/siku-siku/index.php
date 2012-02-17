<?php get_header(); ?>

	<div id="blog_content">
	<?php 
    while (have_posts()) : the_post(); 
    	//include(dirname(__FILE__).'/post.php');
    ?>
    	<div class="blog_post">
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
           	<div class="meta_before_post clearfix">
            	<span class="date"><?php the_time('j M Y'); ?></span>
                <span class="other"><?php _e('By'); ?> <?php the_author(); ?> / <?php comments_popup_link('0 Comment', '1 Comment', '% Comments', '', 'Closed for comments'); ?></span>
            </div>
            <div class="siku_gist">
            	<?php the_content(); ?>
            </div>
            <div class="meta_after_post">
            	<div class="meta_list clearfix">
                <span>Share</span>
                <ul>
                	<li class="clean"><a href="http://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url=<?php the_permalink(); ?> data-count="horizontal" data-via="SikuSikuCom">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
                    <li class="clean"><iframe class="fblike" src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=true&amp;width=150&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></li>
                </ul>
                </div>
                <div class="meta_list clearfix">
                <span>Categories</span>
				<ul>
				<?php
				// Display categories. Each post by default must have a category.
				foreach ((get_the_category()) as $category) { 
    				echo '<li><a href="' . get_bloginfo('url') . '/?cat=' . $category->cat_ID . '">' . $category->cat_name . '</a></li>';
				}
				?>
            	</ul>
                </div>
                <?php
                // Display tags.
				if (get_the_tags()) {
				?>
                	<div class="meta_list clearfix">
                	<span>Tags</span>
                <?php 
					the_tags('<ul><li>', '</li><li>', '</li></ul>');
				?>
					</div>
                <?php
                }
				?>	
                	
            </div>
		</div>
    <?php
	endwhile;
    ?>
    
    <?php
    if (!is_home()) {
		echo '<div class="post_nav clearfix">';
		echo '<div style="float: left">';
		next_post_link('%link', '<span class="prev">Previous</span>');
		echo '</div>';
		echo '<div style="float: right">';
		previous_post_link('%link', '<span class="next">Next</span>');
		echo '</div>';
		echo '</div><!-- .post_nav -->';	
	}
	?>
    
    <div class="clearfix">
    <?php
	// Link to older entries.
	$older_posts = get_next_posts_link();
	if ($older_posts != "") {
		preg_match('/href="(.+)"/', $older_posts, $m1);
		$older_posts_html = '<a class="redbox prev" href="' . $m1[1] . '"><span>Older Articles</span></a>';
		_e($older_posts_html);
	}	
	// Link to newer entries.
	$newer_posts = get_previous_posts_link();
	if ($newer_posts != "") {
		preg_match('/href="(.+)"/', $newer_posts, $m2);
		$newer_posts_html = '<a class="redbox next" href="' . $m2[1] . '"><span>Newer Articles</span></a>';
		_e($newer_posts_html);
	}
	?>
	</div>
        
    </div>

<?php get_footer(); ?>	