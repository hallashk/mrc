<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<div class="post">
            <h2><?php the_title(); ?><span><?php edit_post_link('Edit',' &laquo; ',''); ?></span></h2>
            	<div class="postEntry">

				<?php the_content(''); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
			<div class="postBottom"></div>                
		</div>
	      				
	  <?php endwhile; endif; ?>

<?php get_sidebar(); ?>
