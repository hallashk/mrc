<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    	<div class="post">
        	<div class="postDate">
            	<span><?php the_time("M") ?></span><br /><?php the_time("d") ?>
            </div>
            <h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a><span><?php edit_post_link('Edit',' &laquo; ',''); ?></span></h2>
            <div class="postEntry">
            <?php the_content('Read the rest of this entry &#187;'); ?>
            <!--<?php trackback_rdf(); ?>-->
            </div>
        </div>
        <div class="postMeta">
            <span class="date">by <?php the_author() ?> on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?><?php the_tags(' - Tags: ', ', ', '<br />'); ?></span><span class="comments"><?php comments_popup_link('0 Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
        </div>
			
<?php endwhile; ?>

<span id="pagenav">
<?php next_posts_link('&laquo; Older Entries') ?>&nbsp;&nbsp; 
<?php previous_posts_link('Newer Entries &raquo;') ?>
</span>

		
	<?php else : ?>

        <div class="blackTitle"><h2>Error!</h2>
            <p>This page is not available.</p>
            <p>Go back to the <a class="intern" href="<?php echo get_settings('siteurl') ?>">frontpage</a> or try using the search.</p>
            <p><?php include (TEMPLATEPATH . "/searchform.php"); ?></p>
            <div class="postBottom"></div>
        </div>

	<?php endif; ?>

	

<?php get_sidebar(); ?>