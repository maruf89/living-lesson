<?php
if (session_id() == '')
	session_start();

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/jsonwrapper_helper.php';
include_once dirname(__FILE__) . '/../includes/settings.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>

		<title>CaptainForm</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="//app.captainform.com/includes/jquery.modcoder.excolor/modcoder_excolor/jquery.modcoder.excolor.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo plugins_url('/includes/js/widget.js', __DIR__); ?>"></script>
		<script type="text/javascript">
			window.captainform_is_widget_page = false;
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/includes/css/widget.css', __DIR__); ?>">

		<base target="_self" />
		<script>
			function fs_init()
			{

			}

			function <?php echo $GLOBALS['cf_plugin_name']; ?>(shortcode)
			{
				code = '[<?php echo $cf_shortcode_patterns[0]; ?> i' + shortcode + ']';
				if (document.getElementById('captainform_publish_code') != null)
					if (document.getElementsByClassName('cf_display_as_lightbox')[0] != null)
						if (document.getElementsByClassName('cf_display_as_lightbox')[0].checked == true)
						{
							code = document.getElementById('captainform_publish_code').value;
						}
				top.window.tinyMCE.execCommand('mceInsertContent', false, code);
				tinyMCEPopup.editor.execCommand('mceRepaint');
				tinyMCEPopup.close();
			}
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/includes/css/publish_lightbox_posts.css', __DIR__); ?>" />
    </head>

	<body onload="tinyMCEPopup.executeOnLoad('fs_init();');" class="body_class">
		<?php
		$response = cf_get_forms();
		if ($response->status == 'ok')
		{
			?>
			<b>Select the form you want to embed:</b>
			<br>
			<select name="<?php echo $GLOBALS['cf_plugin_name']; ?>_form_toembed" id="<?php echo $GLOBALS['cf_plugin_name']; ?>_form_toembed">
				<?php
				foreach ($response->forms as $form)
				{
					?>
					<option value="<?php echo $form->f_id; ?>"><?php echo $form->f_name; ?></option>
					<?php
				}
				?>
			</select>
			<div id="captainform_form_toembed_button" onClick="<?php echo $GLOBALS['cf_plugin_name']; ?>(document.getElementById('<?php echo $GLOBALS['cf_plugin_name']; ?>_form_toembed').options[document.getElementById('<?php echo $GLOBALS['cf_plugin_name']; ?>_form_toembed').selectedIndex].value)">
				Embed
			</div>
			<div class="captainform_widget_container">
				<?php
				$cf_display_as_lightbox_name = "cf_display_as_lightbox_name";
				$cf_trigger_option_name = "cf_trigger_option_name";
				$captainform_selected_trigger = 0;
				$cf_trigger_0_name = "cf_trigger_0_name";
				$cf_trigger_0_text = "Contact Us";
				$cf_trigger_1_name = "cf_trigger_1_name";
				$cf_trigger_1_url = "https://" . $GLOBALS['cf_servicedomain'] . "/images3/captainform/publish_lighbox_default_image_v2.png";

				$cf_trigger_2_text_name = "cf_trigger_2_text_name";
				$cf_trigger_2_text = "Contact us";
				$cf_trigger_2_position_name = "cf_trigger_2_position_name";
				$cf_trigger_2_position = 1;
				$cf_trigger_2_background_name = "cf_trigger_2_background_name";
				$cf_trigger_2_background = "FF0000";
				$cf_trigger_2_color_name = "cf_trigger_2_color_name";
				$cf_trigger_2_color = "FFFFFF";

				$cf_trigger_3_after_name = "cf_trigger_3_after_name";
				$cf_trigger_3_after = 0;

				require(plugin_dir_path(__DIR__) . '/views/publish_lightbox.php');
				?>
				<input type="hidden" id="captainform_publish_code" name="<?php echo $captainform_lightbox_publish_code_name; ?>" class='cf_generated_code' value="<?php echo $cf_publish_code_value; ?>" style="width:500px;"/>
			</div>
			<?php
		}
		else
		{
			if ($response->error_message)
			{
				if (isset($response->error_code) && $response->error_code == 2)
				{
					echo "Create a form and return here to publish it";
				}
				elseif (isset($response->error_code) && $response->error_code == 1)
				{
					echo "Please activate your account first! Go to the CaptainForm tab and enter your license key or activate your free account. Create a form and return here to publish it.";
					
				}
				else
					echo $response->error_message;
			}
			else
				echo 'Fatal error - ' . $response->status;
		}
		?>
		<script>
			jQuery(document).ready(function ($) {
				$.getScript("//<?php echo $GLOBALS['cf_servicedomain']; ?>/includes/jquery/chosen.jquery.js", function (data, textStatus, jqxhr) {
					$('<link/>', {
						rel: 'stylesheet',
						type: 'text/css',
						href: '//<?php echo $GLOBALS['cf_servicedomain']; ?>/includes/jquery/css/chosen.css'
					}).appendTo('head');
					$('#captainform_form_toembed').chosen({search_contains: true, no_results_text: 'No results match', width: '400px'});
				});
			});
		</script>

		<script language="javascript" type="text/javascript" src="//app.captainform.com/includes/jscolor/jscolor.js"></script>
	</body>
</html>