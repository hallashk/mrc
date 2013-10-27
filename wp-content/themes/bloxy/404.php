<?php get_header(); ?>

<div class="blackTitle"><h2>Error!</h2>
	<p>This page is not available.</p>
    <p>Go back to the <a class="intern" href="<?php echo get_settings('siteurl') ?>">frontpage</a> or try using the search.</p>
    <p><?php include (TEMPLATEPATH . "/searchform.php"); ?></p>
	<div class="postBottom"></div>
</div>

<?php get_sidebar(); ?>

