<?php

/**
 * Uninstall ATT
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/auto-text-typing
 * @package     Melibu Auto Text Typing
 * @since       1.0
 */
/**
 * https://developer.wordpress.org/plugins/the-basics/uninstall-methods/
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

if (!function_exists('melibuPlugin_ATT_uninstall')) {

    /**
     * 
     * @return type
     */
    function melibuPlugin_ATT_uninstall() {

        // Check Admin
        if (is_admin()) {

            /**
             * https://codex.wordpress.org/Function_Reference/current_user_can
             * https://codex.wordpress.org/Roles_and_Capabilities
             * since 2.0.0
             */
            if (!current_user_can('delete_plugins')) {
                return;
            }

            /**
             * Unregister settings
             * https://codex.wordpress.org/Function_Reference/unregister_setting
             */
            unregister_setting("melibu-plugin-typing-group", "message", "");
            delete_option("message");
            unregister_setting("melibu-plugin-typing-group", "text-color", "");
            delete_option("text-color");
            unregister_setting("melibu-plugin-typing-group", "background-color", "");
            delete_option("background-color");
            unregister_setting("melibu-plugin-typing-group", "padding", "");
            delete_option("padding");
            unregister_setting("melibu-plugin-typing-group", "border-radius", "");
            delete_option("border-radius");
            unregister_setting("melibu-plugin-typing-group", "border-width", "");
            delete_option("border-width");
            unregister_setting("melibu-plugin-typing-group", "border-style", "");
            delete_option("border-style");

        }
    }

    melibuPlugin_ATT_uninstall();
}

if (!function_exists('melibuPlugin_ATT_uninstall_DB')) {

    /**
     * Delete Plugin Table
     */
    function melibuPlugin_ATT_uninstall_DB() {

        // Check Admin
        if (is_admin()) {

            /**
             * https://codex.wordpress.org/Function_Reference/current_user_can
             * https://codex.wordpress.org/Roles_and_Capabilities
             * since 2.0.0
             */
            if (!current_user_can('delete_plugins')) {
                return;
            }

//            $mb_db_option_name_1 = 'melibuPlugin_DCB_db_version';
//            delete_option($mb_db_option_name_1);
//
//            global $wpdb;
//            $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}melibu_att");
        }
    }

    melibuPlugin_ATT_uninstall_DB();
}