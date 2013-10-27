<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="post">
        	<div class="postDate">
            	<span><?php the_time("M") ?></span><br /><?php the_time("d") ?>
            </div>
             <h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a><span><?php edit_post_link('Edit',' &laquo; ',''); ?></span></h2>
             <div class="postEntry">
            <?php the_content(''); ?>
            <!--<?php trackback_rdf(); ?>-->
            <?php wp_link_pages(array('before' => '<p><strong>Seiten:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            </div>
            </div>
        <div id="singleMeta">
            <span class="date">by <?php the_author() ?> on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?><?php the_tags(' - Tags: ', ', ', '<br />'); ?></span><span class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></span>
        </div>
        
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

        <div class="blackTitle"><h2>Error!</h2>
            <p>This page is not available.</p>
            <p>Go back to the <a class="intern" href="<?php echo get_settings('siteurl') ?>">frontpage</a> or try using the search.</p>
            <p><?php include (TEMPLATEPATH . "/searchform.php"); ?></p>
            <div class="postBottom"></div>
        </div>
	
	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
