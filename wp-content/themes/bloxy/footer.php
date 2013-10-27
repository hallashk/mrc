<div id="footerWide">
	<div id="footer">
    	<p><?php bloginfo('name'); ?> is proudly powered by 
		<a href="http://wordpress.org/">WordPress</a> and the <a href="http://www.arcance.net">Bloxy Theme by Arcance</a></p>
        <div id="footerLeft">
        	<?php /* Integration of widget "Footer Links" */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Left') ) : else : ?><?php endif; ?> 
        </div>
        <div id="footerRight">
        	<?php /* Integration of widget "Footer Rechts" */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Right') ) : else : ?><?php endif; ?> 
        </div>
        <div id="footerMiddle">
        	<?php /* Integration of widget "Footer Mitte" */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Middle') ) : else : ?><?php endif; ?> 
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php /* Some plugins may need this function */?>
<?php wp_footer(); ?>

</body>
</html>

