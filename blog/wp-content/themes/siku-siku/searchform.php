<?php
/**
  * Custom search form, which will be triggered by get_search_form().
  */
?>
<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="SEARCH" />
    </div>
</form>
