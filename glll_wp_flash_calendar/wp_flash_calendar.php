<?php

/*
Plugin Name: wp_flash_calendar
Plugin URI: http://www.ll19.com/?p=103
Description: Add flash calendar in your wordpress. Upload `glll_wp_flash_calendar` to the `/wp-content/plugins/` directory. Change file name "date-sample.xml" to "date.xml".  Edit "date.xml" for your thing. Place <code>&lt;?php glll_wp_flash_calendar(988); ?></code> or <code>&lt;?php glll_wp_flash_calendar(210); ?></code> in your templates~
Version: 1.0
Author: LL19.com
Author URI: http://www.ll19.com/
*/

function glll_wp_flash_calendar($flash_width) {
	global $wp_flash_calendar_url, $wp_flash_calendar_width, $wp_flash_calendar_height;
	if (@ file_exists(TEMPLATEPATH . '/calendar_call.php')) {
		if ($flash_width == 210) {
			$wp_flash_calendar_width = 210;
			$wp_flash_calendar_height = 220;
			$wp_flash_calendar_url = get_stylesheet_directory_uri() . "/wp_calendar.swf?db=" . get_stylesheet_directory_uri() . "/calendar_call&xml=" . get_stylesheet_directory_uri() . "/date";
		} else {
			$wp_flash_calendar_width = 988;
			$wp_flash_calendar_height = 69;
			$wp_flash_calendar_url = get_stylesheet_directory_uri() . "/wp_calendar_988.swf?db=" . get_stylesheet_directory_uri() . "/calendar_call&xml=" . get_stylesheet_directory_uri() . "/date";
		}
	} else {
		if ($flash_width == 210) {
			$wp_flash_calendar_width = 210;
			$wp_flash_calendar_height = 220;
			$wp_flash_calendar_url = WP_PLUGIN_URL . "/glll_wp_flash_calendar/wp_calendar.swf?db=" . WP_PLUGIN_URL . "/glll_wp_flash_calendar/calendar_call&xml=" . WP_PLUGIN_URL . "/glll_wp_flash_calendar/date";
		} else {
			$wp_flash_calendar_width = 988;
			$wp_flash_calendar_height = 69;
			$wp_flash_calendar_url = WP_PLUGIN_URL . "/glll_wp_flash_calendar/wp_calendar_988.swf?db=" . WP_PLUGIN_URL . "/glll_wp_flash_calendar/calendar_call&xml=" . WP_PLUGIN_URL . "/glll_wp_flash_calendar/date";
		}
	}
?>
<object type="application/x-shockwave-flash" data="<?php echo $wp_flash_calendar_url; ?>" width="<?php echo $wp_flash_calendar_width; ?>" height="<?php echo $wp_flash_calendar_height; ?>">
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<param name="movie" value="<?php echo $wp_flash_calendar_url; ?>" />
<param name="BGCOLOR" value="" />
</object>
<?php
}
?>
