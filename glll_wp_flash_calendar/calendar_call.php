<?php
if (@ file_exists(TEMPLATEPATH . '/calendar_calll.php')) {
	include_once ('../../wp-config.php');
} else {
	include_once ('../../../wp-config.php');
}
global $wpdb;
$glll = $_GET["glll"];
$glll = mysql_real_escape_string($glll);
if ($glll != "") {
	$sql = "SELECT substring( post_date, 1, 10 ) wp_date, (post_title)title,`ID`, `comment_count` FROM `" . $table_prefix . "posts` WHERE `post_status` = 'publish' and `post_date` like '%" . $glll . "%' ORDER BY `ID` DESC";
} else {
	$sql = "SELECT substring( post_date, 1, 10 ) wp_date, (post_title)title,`ID`, `comment_count` FROM `" . $table_prefix . "posts` WHERE `post_status` = 'publish' ORDER BY `ID` DESC LIMIT 0 , 10"; //显示最近10条
}
$flash_calendar_count = $wpdb->get_results($sql);
$wpdate = "";
$wptitle = "";
$wpid = "";
$wpcomment = "";
foreach ($flash_calendar_count as $result)
	: $wpdate .= $result->wp_date . ";';';";
$wptitle .= $result->title . ";';';";
$wpid .= $result->ID . ";';';";
$wpcomment .= $result->comment_count . ";';';";
endforeach;
$data = "wpdate=;=;=" . $wpdate . ";'&';wptitle=;=;=" . $wptitle . ";'&';wpid=;=;=" . $wpid . ";'&';wpcomment=;=;=" . $wpcomment;
echo $data;
?>
