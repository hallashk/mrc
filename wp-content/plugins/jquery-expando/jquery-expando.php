<?php
/**
 * Plugin Name: JQuery Expando
 * Author: Mitchell Ludwig
 * Version: 1
 * Description: A shortcode to add an expandable box to show and hide the selected content on a post or page
 * Author URI: http://edgemontgeek.com/
 **/
 
#############################################################################################
# Copyright 2012  Mitchell Ludwig  (email : info@hitreach.co.uk)
#
# This program is free software; you can redistribute it and/or modify it under the terms
# of the GNU General Public License, version 2, as published by the Free Software Foundation.
# 
# This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
# without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
# See the GNU General Public License for more details.
# 
# You should have received a copy of the GNU General Public License along with this program; 
# if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,
# MA  02110-1301  USA
#################################################################################

global $JQEX;

if( !class_exists( "JQEX" ) ):


	class JQEX{
	
		static $option_name = "jquery_expando";
		public static $count = 0;
		
		/**
		 * Class constructor
		 * @since 2
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function __construct(){
			global $JQEX;
			global $shortcode_tags;
			$JQEX = self::get_options();
			if( is_admin() ){
				//wp-admin functions
				add_action( "admin_menu", array( __CLASS__, "register_menu_page" ) );
			} else {
				add_shortcode( "expando_toggle_all", array( "JQEX", "expando_all_shortcode" ) );
				add_shortcode( "expando", array( "JQEX", "expando_shortcode" ) );
				add_action( "wp_head", array( __CLASS__, "enqueue_styles" ) );
				add_action( "wp_enqueue_scripts", array( __CLASS__, "enqueue_scripts") );
			}
		}
		
	 
		/**
		 * Get database options with defaults
		 * @since 2
		 * @version 1
		 * @return array plugin options
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function get_options(){
			$defaults = array(
				"expand_text" => "More Information",
				"show_less" => "",
				"show_more" => "",
				"start" => "show",
				"hide" => "Hide All",
				"show" => "Show All",
				"separator"=>" | ",
				"single_open" => "0"
			);
			$options = get_option( self::$option_name, $defaults );
			unset($defaults);
			return $options;	
		}
		
		/**
		 * update database options
		 * @since 2
		 * @version 1
		 * @param array options to update
		 * @return bool if options updated
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function update_options( $options ){
			global $JQEX;
			$JQEX = $options;
			$options = update_option( self::$option_name, $options );
			return $options;	
		}
	
		/**
		 * Parse the single dropdown shortcode to show one dropdown
		 * @since 1
		 * @param $args array attributes used to localise the text
		 * @param $c String content used inside the dropdown
		 * @version 2
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		static function expando_shortcode($args, $c=""){
			global $JQEX;
			self::enqueue_scripts();
			$args = wp_parse_args($args, $JQEX);
			$count = self::$count++;
			ob_start();
?><a id="expando_link_<?php echo $count; ?>" href="#" class="expando_link">
	<span id="expando_title_<?php echo $count; ?>" class='expando_title'><?php echo stripslashes( $args["expand_text"] )?></span>
	<span id="expando_viewmod_<?php echo $count; ?>" class='view_modifier' data-show="<?php echo esc_attr(stripslashes( $args["show_more"] ))?>" data-hide="<?php echo esc_attr(stripslashes( $args["show_less"] ))?>"><?php echo self::get_view_modifier($args['start'],$args['show_less'],$args['show_more'])?></span>
</a><div id="expando_text_<?php echo $count; ?>" class="expando_text" data-start="<?php echo esc_attr( $args["start"] )?>">
	<?php echo $c; ?>
</div>
<?php
			return ob_get_clean();
		}
		
		/**
		 * Parse the showall shortcode to show the view all and hide all links
		 * @since 1
		 * @param $args array = attributes used to localise the text
		 * @version 2
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		static function expando_all_shortcode($args){
			global $JQEX;
			
			$args = wp_parse_args( $args, $JQEX );
			ob_start();
	?>
	<p class='expando_all'>
		<a href='#' class='showall'><?php echo stripslashes($args["show"])?></a><?php echo stripslashes( $args["separator"] )?><a href='#' class='hideall'><?php echo stripslashes($args["hide"])?></a>
	</p>
	<?php
			return ob_get_clean();
		}
		
		/**
		 * Output the styles needed for the dropdown to the head
		 * @since 1
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function enqueue_styles(){
			wp_enqueue_style( 'JQEX_style', self::plugin_url().'jquery-expando.css', false, false, "all" );
		}
		
		/**
		 * return the text to be used for the dropdown
		 * @since 1
		 * @param $s String starting state - values(show/hide)
		 * @param $l String less text
		 * @param $m String more text
		 * @version 2
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		private function get_view_modifier($s,$l,$m){
			if($s == "show") {
				return stripslashes($l);	
			} else {
				return stripslashes($m);	
			}
		}
		
		/**
		 * Returns the url of the plugin folder for including items
		 * @since 1
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		static private function plugin_url(){
			return WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/';
		}
	 
		/**
		 * Add the required scripts to the footer, called on enqueue scripts hook
		 * @since 1
		 * @version 2
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		static function enqueue_scripts(){
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'JQEX_script', self::plugin_url().'jquery-expando.js', array("jquery"), 1, true );
		}
		
		/**
		 * Registers the plugin's menu page to update settings
		 * @since 2
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function register_menu_page(){
			add_options_page ( "JQuery Expando", "JQuery Expando", "manage_options", "jqeb", array( __CLASS__, "do_menu_page") );
		}
		
		/**
		 * Checks POST variable and manages form submissions
		 * @since 2
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function check_post(){
			if( isset( $_POST["_jqeb"] ) && isset( $_POST["jqeb"] ) ):
				if( wp_verify_nonce( $_POST["_jqeb"], basename( __FILE__ ) ) ):
					$updated = self::update_options( $_POST["jqeb"] );
					if( $updated ){
						echo '<div class="updated" id="setting-error-settings_updated"><p><strong>JQuery Expando options updated.</strong></p></div>';
					}
				endif;
			endif;
		}
		
		/**
		 * Outputs the menu page
		 * @since 2
		 * @version 1
		 * @author Jamie Fraser <jamie.fraser@hitreach.com>
		**/
		function do_menu_page(){
			self::check_post();
			global $JQEX;
?>
<div class='wrap'>
	<div class="icon32" id="icon-options-general"><br></div>
	<h2>JQuery Expando Settings</h2>
	<h3>Plugin Settings</h3>
	<form action="options-general.php?page=jqeb" method="post">
		<?php wp_nonce_field( basename( __FILE__ ), "_jqeb" )?>
		<table class='form-table'>
			<tbody>
				<tr>
					<th scope='row'>
						<label for='expand_text'>Expand Text</label>
					</th>
					<td>
						<input type="text" name="jqeb[expand_text]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["expand_text"] ) ) )?>" id="expand_text" class="regular-text"/>
						<p class="description">This is the text which is shown AFTER the verb to show or hide, for example "More Information"</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='show_less'>Show More Verb</label>
					</th>
					<td>
						<input type="text" name="jqeb[show_more]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["show_more"] ) ) )?>" id="show_more" class="regular-text"/>
						<p class="description">This is the verb shown before the expand text to prompt a user to see more content, for example "Show"</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='show_less'>Show Less Verb</label>
					</th>
					<td>
						<input type="text" name="jqeb[show_less]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["show_less"] ) ) )?>" id="show_less" class="regular-text"/>
						<p class="description">This is the verb shown before the expand text to prompt a user to see less content, for example "Hide"</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='start'>Dropdown Starting State</label>
					</th>
					<td>
						<select name='jqeb[start]' id='start'>
							<option value='show' <?php selected($JQEX["start"], "show", true)?>>Dropdown contents start shown</option>
							<option value='hide' <?php selected($JQEX["start"], "hide", true)?>>Dropdown contents start hidden</option>
						</select>
						<p class="description">This sets the default state, and has 2 usable values, "Show" to start the box visable, and "Hide" to show the box hidden</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='hide'>Hide All Text</label>
					</th>
					<td>
						<input type="text" name="jqeb[hide]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["hide"] ) ) )?>" id="hide" class="regular-text"/>
						<p class="description">This is the text used to prompt a hide all, for example "Hide All"</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='show'>Show All Text</label>
					</th>
					<td>
						<input type="text" name="jqeb[show]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["show"] ) ) )?>" id="show" class="regular-text"/>
						<p class="description">This is the text used to prompt a show all, for example "Show All",</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='separator'>Text Separator</label>
					</th>
					<td>
						<input type="text" name="jqeb[separator]" value="<?php echo esc_attr( stripslashes( htmlspecialchars( $JQEX["separator"] ) ) )?>" id="separator" class="regular-text"/>
						<p class="description">This is the separator between the "show all" and "hide all" links, for example "|"</p>
					</td>
				</tr>
				<tr>
					<th scope='row'>
						<label for='single_open'>One dropdown open at a time?</label>
					</th>
					<td>
						<select name='jqeb[single_open]' id='single_open'>
							<option value='1' <?php selected($JQEX["single_open"], "1", true)?>>True</option>
							<option value='0' <?php selected($JQEX["single_open"], "0", true)?>>False</option>
						</select>
						<p class="description">When set to true, only one dropdown able to be opened at a time (where dropdowns have single open as true, doesn't affect dropdowns with single_open=0 specified)</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit"value="Update Options" class="button button-primary"/>
		</p>
	</form>
	<h3>Shortcodes</h3>
	<p>The plugin supports 2 shortcodes one shows the expando, the other shows a set of toggle buttons which affect all shortcodes on the page. HTML can be used on most attributes</p>
	<p><strong><code>[expando expand_text="Information" show_more="More" show_less="Less" start="hide"]<em>Your content here</em>[/expando]</code></strong></p>
	<p>This shortcode adds the expando controls with the following parameters</p>
	<ul>
		<li><code>expand_text</code> This is the text which is shown AFTER the verb to show or hide, for example "More Information"</li>
		<li><code>show_more</code> This is the verb shown before the expand text to prompt a user to see more content, for example "Show"</li>
		<li><code>show_less</code> This is the verb shown before the expand text to prompt a user to see less content, for example "Hide"</li>
		<li><code>start</code> This sets the default state, and has 2 usable values, "show" to start the box visable, and "hide" to show the box hidden</li>
		<li><code>single_open</code> This controls whether this dropdown is part of the single opening group (only one dropdown in the group can be open at a time)</li>
	</ul>
	<p><strong><code>[expando_toggle_all hide="Hide All" show="Show All" separator="|" /]</code></strong></p>
	<p>This shortcode adds controls which affect all the shortcodes on the page.</p>
	<ul>
		<li><code>hide</code> This is the text used to prompt a hide all, for example "Hide All"</li>
		<li><code>show</code> This is the text used to prompt a show all, for example "Show All"</li>
		<li><code>separator</code> This is the separator between the "show all" and "hide all" links, for example "|"</li>
	</ul>
</div>
<?php
		}
	}
	new JQEX;
endif;