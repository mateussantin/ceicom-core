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

    function logo_url($url) {
        return 'http://www.ceicom.com.br/';
    }
    add_filter( 'login_headerurl', 'logo_url' );

    function loginCustom() {
        $logo_url = plugins_url( 'adminlogin/images/logo.png', dirname(__FILE__) );
?>

    <style type="text/css">
        body {
            background: rgba(54, 57, 63, 1);
            background: linear-gradient(160deg, rgba(54, 57, 63, 1) 0%, rgba(54, 57, 63, 1) 0%, rgba(27, 28, 31, 1) 100%);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        body.login div#login h1 a {
            background-image: url(<?php echo $logo_url; ?>);
            background-size: contain;
            width: 200px;
        }

        body.login div#login {
            width: 360px;
            padding: 0;
        }

        body.login div#login form {
            border-radius: 0px;
            padding: 56px 24px;
            border: 0 !important;
            background: #202225;
        }

        .login label {
            font-size: 14px;
            color: #b9bbbe;
        }

        body.login div#login .button-primary {
            width: 100%;
            margin-top: 12px;
            height: 40px;
            border-radius: 0px;
            background: #03a64f;
            border-color: #03a64f;
            transition: .2s all;
            text-transform: uppercase;
        }

        body.login div#login .button-primary:hover {
            background: #007337;
            border-color: #007337;
        }

        .login form .input,
        .login input[type=password],
        .login form input[type=checkbox],
        .login input[type=text] {
            border-radius: 0px !important;
            font-size: 16px;
            padding: 0 15px;
            background: #34363c;
            border: 0;
            color: #b9bbbe;
        }

        .login form .input:focus,
        .login input[type=password]:focus,
        .login input[type=text]:focus {
            outline: 0;
            box-shadow: none;
            transition: .2s all;
        }

        .login .button.wp-hide-pw .dashicons {
            color: #b9bbbe;
        }

        .login #backtoblog a, .login #nav a {
            color: #b9bbbe;
            transition: .2s all;
        }

        .login #backtoblog a:hover, .login #nav a:hover {
            color: #03a64f;
        }
    </style>

<?php } add_action('login_head', 'loginCustom');
