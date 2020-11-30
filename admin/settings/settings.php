<?php

    // Adiciona atalho para configuraçoes na pagina de update
    add_filter( 'plugin_action_links_ceicom-core/ceicom.php', 'ceicom_settings_link' );
    function ceicom_settings_link( $links_array ){
        array_unshift( $links_array, '<a href="options-general.php?page=ceicom-core">Settings</a>' );
        return $links_array;
    }

    // Configs
    function ceicom_core_settings(){
        // Sessions
        // Ex: add_settings_section("section_maintenance", "Pagina de manutenção", null, "ceicom-core");
        add_settings_section("section_maintenance", "", null, "ceicom-core");

        // Mode Maintenance
        add_settings_field("page-maintenance", "Pagina em manutenção", "page_maintenance", "ceicom-core", "section_maintenance");
        register_setting("section", "page-maintenance");
    }

    function page_maintenance()
    {
    ?>
        <select name="page-maintenance" id="page-maintenance">
            <option value="1" <?php selected(1, get_option('page-maintenance'), true); ?>>Sim</option>
            <option value="2" <?php selected(2, get_option('page-maintenance'), true); ?>>Não</option>
        </select>
    <?php
    }

    // Coteudo da pagina de configuraçao
    add_action("admin_init", "ceicom_core_settings");


    // Adiciona o link no meu de configurações
    function ceicom_core_menu_item(){
        add_submenu_page("options-general.php", "Ceicom Core", "Ceicom Core", "manage_options", "ceicom-core", "ceicom_core_page");
    }
    add_action("admin_menu", "ceicom_core_menu_item");

    function ceicom_core_page()
    {
    ?>
        <div class="wrap">
            <h1>Ceicom Core</h1>

            <form method="post" action="options.php">
                <?php
                    settings_fields("section");
                    do_settings_sections("ceicom-core");
                    submit_button();
                ?>
            </form>
        </div>
    <?php
    }
