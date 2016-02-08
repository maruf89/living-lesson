(function() {
	var plugin_name='captainform';
    tinymce.create('tinymce.plugins.'+plugin_name, {
        init : function(ed, url){
			var ajax_url = captainform_get_absolute_path() + 'admin-ajax.php?action=captainform_insert_iframe_content';
			var root_url = url.replace("/captainform/dialog", "/captainform");
        	ed.addCommand(plugin_name+'_embed_window', function() {

                ed.windowManager.open({
                    file   : ajax_url,
                    width  : 600,
                    height : 300,
                    inline : 1
                }, { plugin_url : url });
            });
            ed.addButton(plugin_name, {
                title : 'Insert Form',
                cmd : plugin_name+'_embed_window',
               image: root_url + "/includes/images/captainform-18.png",
            });
        },

        getInfo : function() {
            return {
                longname : 'CaptainForm for Wordpress plugin',
                author : 'Captain Form',
                authorurl : 'http://www.captainform.com',
                infourl : '',
                version : "1.2.0"
            };
        }
    });

    tinymce.PluginManager.add(plugin_name, eval('tinymce.plugins.'+plugin_name));
})();
function captainform_get_absolute_path() {
	var loc = window.location;
	var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
	return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}