<?php

// Widget Settings

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
	'before_widget' => '<div id="%1$s" class="sidebarBox">', 
	'after_widget' => '<div class="sidebarBoxBottom"></div></div>', 
	'before_title' => '<h2>', 
	'after_title' => '</h2>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Left',
	'before_widget' => '<div id="%1$s" class="footerBox">', 
	'after_widget' => '<div class="footerBoxBottom"></div></div>', 
	'before_title' => '<h2>', 
	'after_title' => '</h2>', 
	));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Middle',
	'before_widget' => '<div id="%1$s" class="footerBox">', 
	'after_widget' => '<div class="footerBoxBottom"></div></div>', 
	'before_title' => '<h2>', 
	'after_title' => '</h2>', 
	));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Right',
	'before_widget' => '<div id="%1$s" class="footerBox">', 
	'after_widget' => '<div class="footerBoxBottom"></div></div>', 
	'before_title' => '<h2>', 
	'after_title' => '</h2>', 
	));


?>