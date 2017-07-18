<?php
require_once 'class.MelibuBackendAbstract.php';

/**
 * MELIBU PLUGIN BACKEND CLASS
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/auto-text-typing
 * @package     Melibu Auto Text Typing
 * @since       1.0
 */
if (!class_exists('MELIBU_PLUGIN_BACKEND_07')) {

    class MELIBU_PLUGIN_BACKEND_07 extends MELIBU_PLUGIN_BACKEND_07_ABSTRACT {

        /**
         *  Construct
         */
        public function __construct() {

            global $wp_version;
            $this->WP_VERSION = $wp_version;

            add_action('admin_menu', array($this, 'add_menu'));
            add_action('admin_init', array($this, 'admin_init'));
            add_action('admin_head', array($this, 'admin_head'));
            add_action('plugins_loaded', array($this, 'plugins_loaded_about'), 1);
            add_action('admin_enqueue_scripts', array($this, 'color_picker_assets'));
        }

        /**
         *  Activate
         */
        public function activate() {

            /**
             * set_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/set_transient
             */
            set_transient('melibu-plugin-typing-page-activated', 1, 30);
        }

        /**
         *  Deactivate
         */
        public function deactivate() {

            //..
        }

        /**
         * 
         */
        public function admin_init() {

            $this->init_options();
            $this->init_settings();
            $this->init_filter();
        }

        /**
         * 
         */
        public function add_menu() {

            /**
             * add_menu_page()
             * https://developer.wordpress.org/reference/functions/add_menu_page/
             */
            add_menu_page('MeliBu WP Auto Text Typing - Welcome', // $page_title
                    'MB Typing', // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-typing-admin', // $menu_slug
                    array($this, 'welcome'), // $function
                    plugins_url('img/icon-MB-20.png', dirname(__FILE__)) // $icon_url
            );

            /**
             * add_submenu_page() WP Since: 1.5.0
             * https://developer.wordpress.org/reference/functions/add_submenu_page/
             */
            add_submenu_page('melibu-plugin-typing-admin', // $parent_slug
                    'MeliBu WP Auto Text Typing - ' . __('Options', 'auto-text-typing'), // $page_title
                    __('Options', 'auto-text-typing'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-typing-admin-control-menu-1', // $menu_slug
                    array($this, 'typing') // $function
            );

            /**
             * Sub Menu
             * add_submenu_page() WP Since: 1.5.0
             * https://developer.wordpress.org/reference/functions/add_submenu_page/
             */
            add_submenu_page('melibu-plugin-typing-admin', // $parent_slug
                    'MeliBu WP Auto Text Typing - ' . __('About', 'auto-text-typing'), // $page_title
                    __('About', 'auto-text-typing'), // $menu_title
                    'manage_options', // $capability
                    'melibu-plugin-typing-admin-control-menu-2', // $menu_slug
                    array($this, 'about') // $function
            );
        }

        /**
         * 
         */
        public function welcome() {

            require_once MELIBU_PLUGIN_PATH_07 . "html/welcome.php";
        }

        /**
         * 
         */
        public function typing() {

            require_once MELIBU_PLUGIN_PATH_07 . "html/typing.php";
        }

        /**
         * Menu About
         */
        public function about() {

            require_once MELIBU_PLUGIN_PATH_07 . 'html/about.php';
        }

        /**
         * 
         */
        public function admin_head() {

            /**
             * wp_enqueue_style() WP Since: 2.6.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
             */
            wp_enqueue_style('melibu-plugin-typing-admin-css', plugins_url('css/admin-style.min.css', dirname(__FILE__)));

            /**
             * wp_enqueue_script() WP Since: 2.1.0
             * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
             */
            wp_enqueue_script('melibu-plugin-typing-admin-js', plugins_url('js/mb-typing.js', dirname(__FILE__)), '', '', true);
            wp_enqueue_script('melibu-plugin-typing-admin-js', plugins_url('js/mb-event.js', dirname(__FILE__)), '', '', true);
            ?>
            <style type="text/css">
                .typing-letters > div p, 
                .typing-letters > div small, 
                .typing-letters > div ul, 
                .typing-letters > div ul li, 
                .typing-letters > div h1, 
                .typing-letters > div h2, 
                .typing-letters > div h3, 
                .typing-letters > div h4, 
                .typing-letters > div h5, 
                .typing-letters > div h6  {

                    color: <?php echo get_option('text-color'); ?>; 
                }

                .typing-letters > div {

                    color: <?php echo get_option('text-color'); ?>; 
                    padding:<?php echo get_option('padding'); ?>px;
                    border-color:<?php echo get_option('text-color'); ?>px;
                    border-radius:<?php echo get_option('border-radius'); ?>px;
                    border-width:<?php echo get_option('border-width'); ?>px;
                    border-style:<?php echo get_option('border-style'); ?>;
                    background-color:<?php echo get_option('background-color'); ?>; 
                }

                .typing-letters > div a {

                    text-decoration: underline;
                    color:<?php echo get_option('text-color'); ?>; 
                    padding:<?php echo get_option('padding'); ?>px;
                }
            </style>
            <?php
        }

        /**
         * 
         * @param type $hook_suffix
         */
        public function color_picker_assets($hook_suffix) {

            // $hook_suffix to apply a check for admin page.

            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');

            wp_enqueue_script('melibu-plugin-typing-colorpicker-js', plugins_url('js/colorpicker.js', dirname(__FILE__)), array('wp-color-picker'), false, true);
        }

        /**
         * Plugins Loaded Once on Activate
         */
        public function plugins_loaded_about() {

            /**
             * get_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/get_transient
             */
            if (!get_transient('melibu-plugin-typing-page-activated')) {
                return;
            }

            /**
             * delete_transient() WP Since: 2.8
             * https://codex.wordpress.org/Function_Reference/delete_transient
             */
            delete_transient('melibu-plugin-typing-page-activated');

            /**
             * wp_redirect() WP Since: 1.5.1
             * https://codex.wordpress.org/Function_Reference/wp_redirect
             */
            wp_redirect(
                    /**
                     * admin_url() WP Since:2.6.0
                     * https://codex.wordpress.org/Function_Reference/admin_url
                     */
                    admin_url('admin.php?page=melibu-plugin-typing-admin-control-menu-2')
            );
            exit;
        }

    }

}
