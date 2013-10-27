<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>

<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
		
        <div class="post">
        	<div class="postDate">
            	<span><?php the_time("M") ?></span><br /><?php the_time("d") ?>
            </div>
            <h2><a id="post-<?php the_ID(); ?>" href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a><span>&raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></span></h2>

				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>

				<?php the_content('<p>Read the rest of this entry &#187;</p>'); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          
			</div>
        <div id="singleMeta">
            <span class="date">by <?php the_author() ?> on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?> </span><span class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></span>
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
