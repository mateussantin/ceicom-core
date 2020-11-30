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

    // Exit if accessed directly.
    if (!defined('ABSPATH')) {
        exit;
    }

    function support_setup_menu(){
        $page_title = 'Suporte Ceicom';
        $menu_title = 'Suporte Ceicom';
        $capability = 'read';
        $menu_slug  = 'suporte-ceicom';
        $function   = 'page_init';
        $icon_url   =  plugins_url( 'support/images/icon.png', dirname(__FILE__) );
        $position   = 2;

        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }
    add_action('admin_menu', 'support_setup_menu');

    function page_init(){
        $supportContent = file_get_contents("http://src.inf.br/cms/suporte/suporte.html");
        include('template.php');
    }

    function style_scrits(){
        wp_register_style('style', plugins_url('css/style.css',__FILE__ ));
        wp_enqueue_style('style');
        wp_register_script( 'scrits', plugins_url('js/script.js',__FILE__ ));
        wp_enqueue_script('scrits');
    }
    add_action( 'admin_init', 'style_scrits');
