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

    function maintenance_redirect() {
        if(!ceicom_is_wplogin() && !is_admin() && !current_user_can('administrator')){
            wp_redirect(home_url("maintenance.html"));
            exit;
        }
    }

    if(empty(get_option('page-maintenance')) || get_option('page-maintenance') == '1'){
        add_action('template_redirect', 'maintenance_redirect');
    }

    function ceicom_is_wplogin(){
        $ABSPATH_MY = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, ABSPATH);
        return ((in_array($ABSPATH_MY.'wp-login.php', get_included_files()) || in_array($ABSPATH_MY.'wp-register.php', get_included_files()) ) || (isset($_GLOBALS['pagenow']) && $GLOBALS['pagenow'] === 'wp-login.php' ) || $_SERVER['PHP_SELF']== '/wp-login.php');
    }
