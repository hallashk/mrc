<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archiv <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE 7]>
	<style type="text/css">
    	#nav .current_page_item, #nav li:hover { background-position: right 1px !important; }
    </style>
<![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6fix.css" type="text/css" media="screen" />
    <style type="text/css">
    	#header, #logo { behavior: url('<?php bloginfo('stylesheet_directory'); ?>/iepngfix.htc') } /* Outside of css-sheet because absolute path is needed */
	</style>
<![endif]-->
<?php wp_head(); ?>
</head>

<body>
<div id="pageWide">
<div id="page">
	<div id="header">
    	<div id="nav">
        	<ul>
				<li<?php if ( is_home() || is_404() || is_category() || is_day() || is_month() || is_year() || is_search() ) { ?> class="current_page_item"<?php } ?>><a href="<?php echo get_settings('siteurl') ?>">Blog</a></li>
        		<?php wp_list_pages('title_li='); ?>
        	</ul>
        </div>
        <a id="logo" href="<?php echo get_option('home'); ?>/">
        	
			<h1><?php bloginfo('name'); ?></h1>
            <h2><?php bloginfo('description'); ?></h2>
			
		</a>
		<div id="search">
        	<form method="get" id="searchform" action="">
				<fieldset>
                	<label for="s"><input value="Enter keywords" onfocus="if(this.value=='Enter keywords') this.value=''" id="s" name="s" title="Enter keywords" type="text" /></label>
                	<label for="searchsubmit"><input src="<?php bloginfo('stylesheet_directory'); ?>/images/searchSubmit.gif" name="searchsubmit" id="searchsubmit" value="" title="Suchen" type="image" /></label>
				</fieldset>
			</form>
        </div>
    </div>
    <div id="content">