</div>
<div id="sidebar">
	<ul>
			<?php /* Integration of widget "Seitenleiste" */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
            
            <?php /* Without active widgets the following code until <?php endif; ?> will be displayed */ ?>
            
            <div class="sidebarBox"> <?php /* Displays the pages */ ?>
            	<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
				<div class="sidebarBoxBottom"></div>
			</div>

			<div class="sidebarBox">
            	<h2>Archiv</h2>
				<ul> <?php /* Displays a monthly archive */ ?>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				<?php if ( is_404() || is_category() || is_day() || is_month() || 
					is_year() || is_search() || is_paged() ) { ?> 
					<?php /* If this is the error page */ if (is_404()) { ?>
					<?php /* If this is a category archive */ } elseif (is_category()) { ?>
					<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category</p>
					
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<p>You are currently browsing the blog archives	for the day <?php the_time('l, F jS, Y'); ?>.</p>
					
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<p>You are currently browsing the blog archives for <?php the_time('F, Y'); ?></p>
		
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<p>You are currently browsing the blog archives for the year <?php the_time('Y'); ?></p>
					
					<?php /* If this is the search */ } elseif (is_search()) { ?>
					<p>You have searched the blog archives for <strong>'<?php the_search_query(); ?>'</strong></p>
		
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<p>You are currently browsing the blog archives.</p>
					<?php } ?>
				<?php }?> 
				<div class="sidebarBoxBottom"></div>
			</div>
            
            <div class="sidebarBox"> <?php /* Displays categories with number if entries */ ?>
            	<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
				<div class="sidebarBoxBottom"></div>
			</div>
	
			<?php if (function_exists('wp_theme_switcher')) { ?>
            <div class="sidebarBox"> <?php /* Displays theme switcher if used */ ?>
            	<h2><?php _e('Themes'); ?></h2>
				<?php wp_theme_switcher(); ?>
			</div>
			<?php } ?>
	
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
				
            <div class="sidebarBox"> <?php /* Displays links / blogroll */ ?>
				<?php wp_list_bookmarks(); ?>
				<div class="sidebarBoxBottom"></div>
			</div>
            
            <div class="sidebarBox"> <?php /* Displays meta */ ?>
            	<h2>Meta</h2>
                    <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
                        <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
                        <?php wp_meta(); ?>
                    </ul>
				<div class="sidebarBoxBottom"></div>
			</div>
				 
			<?php } ?>
			<?php endif; ?> 
	</ul>
    
<?php /* The following </div> ends the sidebar! Footer starts. */ ?>
</div>
</div>
    <div class="clear"></div>
</div>
</div>        
<?php get_footer(); ?>	


