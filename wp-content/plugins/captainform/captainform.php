<?php
defined('ABSPATH') or die('No direct access!');
/*
  Plugin Name: CaptainForm Plugin
  Plugin URI: http://captainform.com
  Description: CaptainForm is a fully-featured WordPress form plugin created for web designers, developers, and also for non-tech savvy users.
  Author: CaptainForm
  Author URI: https://profiles.wordpress.org/captainform
  Version: 1.2.1
 */

/* * ****************************
 * includes
 * **************************** */

include(plugin_dir_path(__FILE__) . 'includes/settings.php'); // this contain plugin settings
include(plugin_dir_path(__FILE__) . "includes/hooks.php"); //register the hooks
include(plugin_dir_path(__FILE__) . 'includes/display-functions.php'); // display content functions
include(plugin_dir_path(__FILE__) . 'includes/CaptainFormWidget.php'); // widget
include(plugin_dir_path(__FILE__) . 'includes/admin-page.php'); // the plugin options page HTML and save functions
include(plugin_dir_path(__FILE__) . 'views/main.php'); // the plugin options page HTML and save functions
include(plugin_dir_path(__FILE__) . "includes/wp-posts.php");

register_activation_hook(__FILE__, 'captainform_activate');
register_deactivation_hook(__FILE__, 'captainform_deactivate');
register_uninstall_hook(__FILE__, 'captainform_uninstall');
