<?php
/*
Template Name: Archiv
*/
?>
<?php get_header(); ?>

<div class="blackTitle"><h2>Search</h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<div class="postBottom"></div>
        </div>

<div class="footerBox archiveLeft"><h2>Archives sorted by month</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
<div class="footerBoxBottom"></div></div>

<div class="footerBox archiveRight"><?php wp_list_categories('title_li=<h2>Archives sorted by categories</h2>'); ?>
<div class="footerBoxBottom"></div></div>
<div class="clear"></div>

<?php get_sidebar(); ?>
