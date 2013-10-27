<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">

<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input src="<?php bloginfo('stylesheet_directory'); ?>/images/searchSubmit.gif" name="searchsubmit" id="searchsubmit" value="" title="Suchen" type="image" />


</form>

