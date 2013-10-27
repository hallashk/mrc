<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>				

 		<div class="blackTitle"><h2>Archive for the cateroy <?php single_cat_title(); ?></h2>
		
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<div class="blackTitle"><h2>Archive for the day <?php the_time('F jS, Y'); ?></h2>
		
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<div class="blackTitle"><h2>Archive for the month <?php the_time('F Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<div class="blackTitle"><h2>Archive for the year <?php the_time('Y'); ?></h2>
				
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<div class="blackTitle"><h2>Archive of the author</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<div class="blackTitle"><h2>Archive</h2>

		<?php } ?>

<?php next_posts_link('&laquo; Older Entries') ?>&nbsp;&nbsp; 
<?php previous_posts_link('Newer Entries &raquo;') ?>
		<div class="postBottom"></div>
        </div>

	<?php while (have_posts()) : the_post(); ?>
        
        <div class="post">
            <div class="postDate">
                <span><?php the_time("M") ?></span><br /><?php the_time("d") ?>
            </div>
            <h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title=" <?php the_title(); ?>"><?php the_title(); ?></a><span><?php edit_post_link('Edit',' &laquo; ',''); ?></span></h2>
            <?php the_excerpt() ?>
        </div>
        <div class="postMeta">
            <span class="date">by <?php the_author() ?> on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?></span><span class="comments"><?php comments_popup_link('0 Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
        </div>

	<?php endwhile; ?>

	<?php else : ?>

		<div class="blackTitle"><h2>Error!</h2>
			<p>This page is not available.</p>
  			  <p>Go back to the <a class="intern" href="<?php echo get_settings('siteurl') ?>">frontpage</a> or try using the search.</p>
  			  <p><?php include (TEMPLATEPATH . "/searchform.php"); ?></p>
			<div class="postBottom"></div>
		</div>

	<?php endif; ?>
		
<?php get_sidebar(); ?>

