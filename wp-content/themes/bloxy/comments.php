<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<div id="commentForm">
			<h3>This post is password protected. Enter the password to view comments.</h3>
			</div>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
	/*  Set up the count variable */
	$_count = 1;
?>

<?php if ($comments) : ?>
<?php $odd_or_even = 'Even'; ?>
	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>
    
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>"> 
        
			<div class="comment<?php echo $odd_or_even; ?>">
                <div class="gravatar">
                    <?php echo get_avatar( $comment, 40, $default = "" ); ?>
				</div>
                <div class="comment">
                <div class="commentTitle<?php echo $odd_or_even; ?>"><span class="commentAuthor"><?php comment_author_link() ?> wrote on <?php comment_date('F jS, Y') ?> at <?php comment_time() ?> Uhr</span><span class="commentNumber"><a href="#comment-<?php comment_ID() ?>" title="Permalink for this comment"><?=$_count?></a></span></div>
                <div class="clear"></div>
                    <?php comment_text() ?>
                </div>
                <div class="clear"></div>
			</div>
       	
			<?php $odd_or_even = ('Odd'==$odd_or_even) ? 'Even' : 'Odd'; ?>
		</li>

	<?php 
		/* Changes every other comment to a different class */ 
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; 
	?>
<? $_count++ ?>
	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
		<div class="commentEven">
        	<h3>There are no comments.</h3>
        </div>
		
	 <?php else : // comments are closed ?>
		 <div id="commentForm">
			<h3>Comments are closed.</h3>
		</div>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

 <div id="commentForm">
 			<?php if ($comment->comment_approved == '0') : ?>
            	<strong>Your comment must be activated by an admin.</strong>
            <?php endif; ?>
 			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<h3>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</h3>
<?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if ( $user_ID ) : ?>
            <h3>Logged in as: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></h3>
			<?php else : ?>
            <span id="commentName">Name<?php if ($req) echo "*"; ?>: <input type="text" name="author" id="author" class="commentInput" value="<?php echo $comment_author; ?>" tabindex="1" /></span>
            <span id="commentWebsite">Website: <input type="text" name="url" id="url" class="commentInput" value="<?php echo $comment_author_url; ?>" tabindex="3" /></span>
            <span id="commentMail">E-Mail<?php if ($req) echo "*"; ?>: <input type="text" name="email" id="email" class="commentInput" value="<?php echo $comment_author_email; ?>" tabindex="2" /></span><div class="clear"></div>
            <?php endif; ?>
            <div id="commentMessage"><textarea name="comment" id="comment" class="commentTextarea" cols="30" rows="20" tabindex="4">I would like to say...</textarea></div>
            <input src="<?php bloginfo('stylesheet_directory'); ?>/images/commentSubmit.png" name="submit" type="image" id="submit" class="submit" tabindex="5" value="senden" />
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
            <div class="clear"></div>
            <?php do_action('comment_form', $post->ID); ?>
            </form>
                <strong>XHTML:</strong> You can use these tags:<br /> <code><?php echo allowed_tags(); ?></code>
            <?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
        
