<?php
/**
 * @package Slideing Pic
 * @version 1.0
 */
/*
Plugin Name: Slideing Pic
Plugin URI:http://www.SmartCome.com
Description:One exciting way to exhibit your pictures and ads on top of your pages by one drawing-down way, making your website look even better <a href='options-general.php?page=smart_slide'>click here to set the plugin</a><br>在网站顶部通过拉幕的方式展示你的图片和广告,让你的网站轻松提高一个档次<a href='options-general.php?page=smart_slide'>点此设置本插件</a>
Author: Smart Come
Version: 1.0
Author URI: http://www.SmartCome.com
*/
require_once(dirname(__FILE__).'/admin/set.php');
function captcha_init(){
		$plugin_dir=dirname(plugin_basename(__FILE__));
		load_plugin_textdomain('smart-lan',false,$plugin_dir.'/language');
		}	
add_action('init','captcha_init');	
function add_my_script() {
	wp_enqueue_script("jquery");
	wp_register_script('sliding_screen_script', plugins_url('static/js/smart.js', __FILE__));
	wp_enqueue_script('sliding_screen_script');
}
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function do_sliding(){
	echo '<style>#smart_main{height:0px;overflow:hidden;</style>
	<div id="smart_main" align="center"><img src="'.get_option('smart_url').'"/></div>';
	echo '<script type="text/javascript">
	jQuery(document).ready(function (){do_sliding('.get_option('smart_btime').','.get_option('smart_etime').','.get_option('smart_h').','.get_option('smart_d').','.get_option('smart_u').')});
	</script>';
	}
add_action( 'wp_head', 'do_sliding' );
?>
