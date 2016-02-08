<?php
defined( 'ABSPATH' ) or die( 'No direct access!' );
global $args;
$args = array();

function captainform_curl_call(){
    global $args;
    $_curl_url = 'http://' . $GLOBALS['captainform_servicedomain'] . '/modules/captainform/plugin_track.php?';
    
    $args['website'] = get_site_url();
    $args['is_multisite'] = is_multisite();
	$args['unique_id'] = captainform_get_referer_params('unique_id');
    
	$args['installation_id'] = captainform_wpp_encrypt(get_site_option($GLOBALS['captainform_option1']));
	$args['installation_key'] = captainform_wpp_encrypt(get_site_option($GLOBALS['captainform_option2']));
	$args['source'] = captainform_get_referer_params('source');
    
    $_curl_url .= http_build_query($args);
    
    $response = wp_remote_get( $_curl_url, $args );
}

function captainform_deactivate(){
    global $args;
    $args['action'] = 'deactivate';
    captainform_curl_call();
}

function captainform_activate(){
    global $args;
    $args['action'] = 'activate';
    
	if (get_site_option($GLOBALS['captainform_option1']) == '') {
		add_site_option($GLOBALS['captainform_option1'], captainform_generate_installation_id());
    }		
	
	if (get_site_option($GLOBALS['captainform_option2']) == '') {
		add_site_option($GLOBALS['captainform_option2'], captainform_generate_installation_key());
    }
    
    captainform_curl_call();
}

function captainform_uninstall(){
    global $args;
    $args['action'] = 'uninstall';
    captainform_curl_call();
}

function captainform_get_referer_params($param = '') {
	$file_exists = false;
	$plugin_referer = '';
	$file = (__DIR__) . '/referer.php';
	if (file_exists($file)) {
		require_once($file);
		$file_exists = true;
	} 
	if ($param == 'unique_id') {
		if ($file_exists && isset($captainform_unique_id) && $captainform_unique_id) {
		return $captainform_unique_id;
	} 
		return 'captainform_' . substr(md5(get_site_url()),-12);
	}
	if ($param == 'source') {
		if ($file_exists && isset($captainform_referer) && $captainform_referer) {
			return $captainform_referer;
		}
		return 'plugin_directory';
	}
	return '';
}