<?php
/**
 * WELCOME MELIBU
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/auto-text-typing
 * @package     Melibu Auto Text Typing
 * @since       1.0
 */
if (!defined('ABSPATH') && !is_admin()) {
    exit;
}

$datas = get_plugin_data(MELIBU_PLUGIN_PATH_07 . 'auto-text-typing.php', $markup = true, $translate = true);
?>
<div class="wrap">

    <h1 class="st_wp_brand">
        <img src="<?php echo plugins_url("auto-text-typing/img/icon-MB.png"); ?>" alt="icon-MB-20" width="50" class="st_wp_logo"> 
        <?php echo $datas['Name']; ?>
        <span><?php _e('Professional Themes and Plugins for WordPress', 'auto-text-typing'); ?></span>
    </h1>
    <hr />
    <p>
        <?php _e('Version', 'auto-text-typing'); ?>: <?php echo get_option('melibu-plugin-typing-version'); ?> | DB Version: <?php echo get_option('melibu-plugin-typing-db-version'); ?>
    </p>
    <hr />

    <div class="welcome-panel">

        <div class="welcome-panel-column-container st_center">
            <p class="about-description">
                <?php _e('This documentation should help you.', 'auto-text-typing'); ?>
            </p>
            <br />

            <div class="mb_shortcode" style="margin: 0 auto; background:#FF8002; border: 1px solid #777; padding: 5px;">

                <h3>SHORTCODE</h3>
                <code>
                    [wp_mb_plugin_typing]...<?php _e('Here comes the selected typing text', 'auto-text-typing'); ?>...[/wp_mb_plugin_typing]
                </code>
                <div class='st_melibuPlugin_area'>
                    <label for='mb_plugin_download_input'><?php _e('That is the short code. You can copy a short code and place on a page, post or in a widget. Or use the short code has been integrated into your editor, a click is enough and the part buttons after save visible.', 'auto-text-typing'); ?></label><br />
                    <input ondblclick="this.setSelectionRange(0, this.value.length)" 
                           id='mb_plugin_download_input' 
                           class='melibu_input' 
                           type="text" 
                           value='[wp_mb_plugin_typing]...<?php _e('Here comes the selected typing text', 'auto-text-typing'); ?>...[/wp_mb_plugin_typing]'
                           readonly="readonly" />
                    <p>
                        <small><?php _e('Please take the short code double click to copy', 'auto-text-typing'); ?></small>
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>