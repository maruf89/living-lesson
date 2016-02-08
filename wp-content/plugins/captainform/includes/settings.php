<?php
defined('ABSPATH') or die('No direct access!');
require(plugin_dir_path(dirname(__FILE__)) . '/includes/encryption.php');
if (session_id() == '')
	session_start();

global $captainform_plugin_name, $captainform_plugin_version, $captainform_shortcode_patterns, $captainform_formcode_pattern, $captainform_replace_patterns, $captainform_servicedomain, $captainform_option1, $captainform_option2, $captainform_widget_text_filter;

//plugin name
$captainform_plugin_name = 'captainform';
$captainform_plugin_version = "1.2.1";

//patterns handled as shortags - first in array is default
$captainform_shortcode_patterns = array();
$captainform_shortcode_patterns[] = 'captainform ';
$captainform_shortcode_patterns[] = 'captain-form ';

//plugin directory
$captainform_plugin_dir = plugin_dir_url(dirname(__FILE__));

//service domain for handler of form code
$captainform_servicedomain = 'app.captainform.com';
if(isset($_SESSION['devdebug']))
    if ($_SESSION['devdebug'] == 'ON')
	$captainform_servicedomain = 'rookieapp.captainform.com';

//Global Resources -- used for every type of embedding
ob_start();
?>
<script type="text/javascript">
	if(document.getElementById('captainform_js_global_vars') == null)
	{
		document.write(unescape('%3Cscript id="captainform_js_global_vars"%3E  var frmRef=""; try { frmRef=window.top.location.href; } catch(err) {}; var captainform_servicedomain="<?php echo $captainform_servicedomain ;?>";var cfJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");%3C/script%3E'));
	}
</script>
<?php
$captainform_common_js_vars = ob_get_contents();
ob_end_clean();

//TinyBox Resources
ob_start();
?>
<script type="text/javascript">
if(document.getElementById('captainform_tinybox_js') === null)
	document.write(unescape("%3Cscript id='captainform_tinybox_js' src='<?php echo $captainform_plugin_dir;?>includes/js/tinybox/tinybox.js' type='text/javascript'%3E%3C/script%3E"));
if(document.getElementById('captainform_tinybox_css') == null)
	document.write(unescape('%3Clink id="captainform_tinybox_css" href="<?php echo $captainform_plugin_dir;?>includes/js/tinybox/tinyboxstyle.css" rel="stylesheet" type="text/css" /%3E'));
</script>
<?php
$captainform_tinybox_resources = ob_get_contents();
ob_end_clean();

//Normal Embedding
ob_start();
?>
<script type="text/javascript">
	var customVarsMF = '%%CUSTOMVARS%%';
	var captainform_theme_style = '%%STYLE%%';
	if(document.getElementById('captainform_easyxdmjs') == null)
	{
		document.write(unescape("%3Cscript id='captainform_easyxdmjs' src='" + cfJsHost + captainform_servicedomain + "/includes/easyXDM.min.js' type='text/javascript'%3E%3C/script%3E")); 
	}
	if(document.getElementById('iframeresizer_embedding_system') == null)
	{
		document.write(unescape("%3Cscript id='iframeresizer_embedding_system' src='" + cfJsHost + captainform_servicedomain + "/modules/captainform/js/iframe_resizer/3.5/iframeResizer.min.js' type='text/javascript'%3E%3C/script%3E")); 
	}
	document.write(unescape("%3Cscript src='" + cfJsHost + captainform_servicedomain + "/jsform-%%ID%%.js?" + customVarsMF + captainform_theme_style + "' type='text/javascript'%3E%3C/script%3E"));
</script>
<?php
$captainform_formcode_pattern = $captainform_common_js_vars . ob_get_contents();
ob_end_clean();

//LightBox Embedding [text/image/floating button]
ob_start();
?>
<script type="text/javascript">
	var customVarsMF = '%%CUSTOMVARS%%';
	var captainform_theme_style = '%%STYLE%%';
	var tinybox_width = window.innerWidth || document.documentElement.clientWidth;
	tinybox_width = Math.round(tinybox_width * 0.6);
</script>
<a href="javascript:" %%BUTTON_STYLE%% class="blueLink13" onclick="TINY.box.show({iframe: cfJsHost + captainform_servicedomain + '/form-%%ID%%/?' + customVarsMF, boxid: 'frameless', width: tinybox_width, height: 500, fixed: false, maskid: 'bluemask', maskopacity: 40})">%%CONTENT%%</a>
<?php
$captainform_formcode_pattern_lightbox = $captainform_common_js_vars . $captainform_tinybox_resources . ob_get_contents();
ob_end_clean();

//LightBox Embedding [auto-popup]
ob_start();
?>
<script type="text/javascript">
	var customVarsMF = '%%CUSTOMVARS%%';
	var captainform_theme_style = '%%STYLE%%';
	setTimeout(function(){
	TINY.box.show({
	iframe:cfJsHost + captainform_servicedomain + '/form-%%ID%%/?' + customVarsMF,
		boxid:'frameless',
		width:900,
		height:500,
		fixed:false,
		maskid:'bluemask',
		maskopacity:40
	});
	}, %%MILISECONDS%% );
</script>
<?php
$captainform_formcode_pattern_lightbox_auto = $captainform_common_js_vars . $captainform_tinybox_resources . ob_get_contents();
ob_end_clean();

//plugin options key name
$captainform_option1 = $captainform_plugin_name . '_installation_id';
$captainform_option2 = $captainform_plugin_name . '_installation_key';

/**
 * replace patterns into strings that have patterns
 * @param string
 * @param array - associate array - key is pattern, value is string for replace pattern
 * @return string
 **/
function captainform_replace_patterns($str, $data = null) {
	if ($data)
		if (is_array($data)){
			foreach ($data as $k => $v)
				if ($k)
					$str = str_replace('%%' . strtoupper($k) . '%%', $v, $str);
		}
	return $str;
}

/**
 * encrypt params
 * @param string
 **/
function captainform_wpp_encrypt($str) {
	return captainform_cryptor::encrypt($str);
}

/**
 * decrypt params
 * @param string
 **/
function captainform_wpp_decrypt($str) {
	return captainform_cryptor::decrypt($str);
}

/**
 * captainform_get_forms validate user based on wordpress app instalattion id and key
 **/
function captainform_get_forms($publish_method, $count = 2) {
	$url = 'http://' . $GLOBALS['captainform_servicedomain'] . '/wp_dispatcher.php?app_id=' . urlencode(get_site_option($GLOBALS['captainform_option1'])) . '&app_key=' . urlencode(get_site_option($GLOBALS['captainform_option2']));
		
	if ($publish_method && $count == 2)
		$url .= '&publish_method=' . $publish_method;
	$res = wp_remote_fopen($url);
	if ($res === false)
		return false;

	return json_decode($res);
}

#shortcodes
function captainform_shortcode_handler($shortcode) {
	$custom_options = array(
		'form_id' => $shortcode[0],
		'lightbox' => (isset($shortcode['lightbox'])) ? $shortcode['lightbox'] : false,
		'type' => (isset($shortcode['type'])) ? $shortcode['type'] : null,
		'content' => (isset($shortcode['content'])) ? $shortcode['content'] : null,
		'url' => (isset($shortcode['url'])) ? $shortcode['url'] : null,
		'miliseconds' => (isset($shortcode['miliseconds'])) ? $shortcode['miliseconds'] : null,
		'text_color' => (isset($shortcode['text_color'])) ? $shortcode['text_color'] : null,
		'bg_color' => (isset($shortcode['bg_color'])) ? $shortcode['bg_color'] : null,
		'position' => (isset($shortcode['position'])) ? $shortcode['position'] : null,
	);

	$shortcode_final = '[captainform ' . $shortcode[0];
	$shortcode_final .= (isset($shortcode['lightbox'])) ? " lightbox='{$shortcode['lightbox']}'" : '';
	$shortcode_final .= (isset($shortcode['type'])) ? " type='{$shortcode['type']}'" : '';
	$shortcode_final .= (isset($shortcode['url'])) ? " url='{$shortcode['url']}'" : '';
	$shortcode_final .= (isset($shortcode['content'])) ? " content='{$shortcode['content']}'" : '';
	$shortcode_final .= (isset($shortcode['miliseconds'])) ? " miliseconds='{$shortcode['miliseconds']}'" : '';
	$shortcode_final .= (isset($shortcode['text_color'])) ? " text_color='{$shortcode['text_color']}'" : '';
	$shortcode_final .= (isset($shortcode['bg_color'])) ? " bg_color='{$shortcode['bg_color']}'" : '';
	$shortcode_final .= (isset($shortcode['position'])) ? " position='{$shortcode['position']}'" : '';

	$shortcode_final .= ']';

	$content = captainform_widget_text_filter($shortcode_final, NULL, $custom_options);
	return $content;
}

add_shortcode('captainform', 'captainform_shortcode_handler');
add_shortcode('captain-form', 'captainform_shortcode_handler');
