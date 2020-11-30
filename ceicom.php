<?php
    /*
    * Plugin Name: Ceicom Core
    * Plugin URI: https://ceicom.com.br/
    * Description: Plugin de hooks.
    * Author: Mateus Santin Junior
    * Version: 1.0.0
    * Author URI: https://github.com/mateussantin
    * Text Domain: ceicom-core
    * Domain Path: /custom/
    */

    defined('ABSPATH') || die('No direct script access allowed!');
    define('PLUGIN_VERSION', '1.0');

    if (!defined('CEICOM_CORE_PLUGIN_DIR')){
        define('CEICOM_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
    }

    // SETTINGS
    //--------------------------------------
    require_once( CEICOM_CORE_PLUGIN_DIR . 'admin/settings/settings.php');

    // COMPONENTS
    //--------------------------------------

    // MODULES
    //--------------------------------------
    require_once( CEICOM_CORE_PLUGIN_DIR . 'modules/support/support.php');
    require_once( CEICOM_CORE_PLUGIN_DIR . 'modules/adminlogin/admin-login.php');
    require_once( CEICOM_CORE_PLUGIN_DIR . 'modules/mode-maintenance/maintenance.php');



    // Plugin Update Checker
    //--------------------------------------
    require_once 'plugin-update-checker/plugin-update-checker.php';
    function my_plugin_update_checker_setting() {
        if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) {
            return;
        }

        $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
            'https://github.com/mateussantin/ceicom-core',
            __FILE__,
            'unique-plugin-or-theme-slug'
        );

        $myUpdateChecker->setAuthentication('');
        $myUpdateChecker->setBranch('master');
    }

    add_action( 'admin_init', 'my_plugin_update_checker_setting' );
