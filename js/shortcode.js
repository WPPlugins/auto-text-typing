/**
 * MELIBU SHORTCODE
 *
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-themes/
 * @package     melibuTheme multi
 * @since       1.0
 */
tinymce.create('tinymce.plugins.melibuPlugin07', {
    
    init: function (ed, url) {

        ed.addButton('melibu_plugin_typing_button', {
            title: 'Insert MB Auto Text Typing short code',
            cmd: 'melibu-plugin-typing-shortcode-insert',
            icon: 'editor-spellcheck'
        });

        ed.addCommand('melibu-plugin-typing-shortcode-insert', function () {
            var selected = ed.selection.getContent();
            var return_text = '';
            var dater = new Date();
            if (selected) {
                return_text = '[wp_mb_plugin_typing]' + selected + '[/wp_mb_plugin_typing]';
            } else {
                return_text = '[wp_mb_plugin_typing]...Here your Text...[/wp_mb_plugin_typing]';
            }
            ed.execCommand('mceInsertContent', 0, return_text);
        });
    },
    createControl: function (n, cm) {
        return null;
    }
});

tinymce.PluginManager.add('melibu_plugin_typing_button', tinymce.plugins.melibuPlugin07);

