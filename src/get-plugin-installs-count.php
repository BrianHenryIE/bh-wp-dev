<?php
/**
 * Get schema
 */

namespace BrianHenryIE\WP_Dev;

// There's no REST endpoint for the number I want.

$plugin_name = 'bh-wp-autologin-urls';

$wordpress_org_plugin_advanced_url = "https://wordpress.org/plugins/{$plugin_name}/advanced/";

$curl = curl_init($wordpress_org_plugin_advanced_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$html = curl_exec($curl);
curl_close($curl);

$output_array = array();
preg_match_all('/Active installations: <strong>(.*)<\/strong>/', $html, $output_array);

$installs_count_string = '';
if(isset($output_array[1]) && isset($output_array[1][0])) {
	// e.g. 30+
	$installs_count_string = $output_array[1][0];
}