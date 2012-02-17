	<div id="blog_footer">
    	<div id="bf_left">
        	<p class="label"><?php _e("Archives:"); ?></p>
            <p><?php 
			$archives_html = wp_get_archives('type=monthly&echo=0&format=custom&before=&after=<span>/</span>');
			$archives_html = preg_replace('/<span>\/<\/span>$/', '', $archives_html);
			_e($archives_html);
			?></p>
            <p class="label"><?php _e("Categories:"); ?></p>
            <p><?php 
			$categories_html = wp_list_categories('orderby=name&title_li=&depth=1&style=none&echo=0');
			$categories_html = str_replace('<br />', '<span>/</span>', $categories_html);
			$categories_html = preg_replace('/<span>\/<\/span>$/', '', $categories_html);
			_e($categories_html);
			?></p>
            <p class="label"><?php _e("Tags:"); ?></p>
            <p><?php wp_tag_cloud('smallest=13&largest=13&unit=px&separator=<span>/</span>'); ?></p>
            <div id="search">
            	<?php get_search_form(); ?>
				<p>Follow us on <a href="http://twitter.com/SikuSikuCom">Twitter</a> or <a href="http://feeds.feedburner.com/SikuSikuCom">RSS</a></p>
            </div>
            <p id="copyright">2010 &copy; <a href="/">SIKU-SIKU.COM</a> All Rights Reserved.</p>
        </div>
    </div>
</div>
</body>
</html>
