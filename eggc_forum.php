<?php

/**
*
* Plugin Name: EGGC Forum
* Description: Forum for EGGC's daily big winners.
* Version: 1.0
* Author: John Yonard Pauly
*
*/

// SHORT CODE TO CALL FORUM LIST
function eggc_forum_shortcode()
{
    return "<h3>This is a sample shortcode for eggc forum.</h3>";
}
add_shortcode('eggc_list', 'eggc_forum_shortcode');

// DASHBOARD FORM
function eggcforum_admin_menu_option()
{
    add_menu_page('Header and Footer Scripts', 'Site Scripts', 'manage_options', 'eggcforum-admin-menu', 'eggcforum_scripts_page', '', 150);
}
add_action('admin_menu', 'eggcforum_admin_menu_option');

// FORM STRUCTURE
function eggcforum_scripts_page()
{
    if (array_key_exists('eggcforum_update_scripts', $_POST)) {
        update_option('eggcforum_header_scripts', $_POST['header_scripts']);
        update_option('eggcforum_footer_scripts', $_POST['footer_scripts']);

        ?>
            <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
                <strong>Settings has been updated.</strong>
            </div>
        <?php
    }

    $eggcforum_header_scripts = get_option('eggcforum_header_scripts', '');
    $eggcforum_footer_scripts = get_option('eggcforum_footer_scripts', '');

    ?>
        <div class="wrap">
            <h3>Update scripts.</h3>
            <form action="" method="post">
                <label for="eggcforum_header_scripts">Header Scripts</label>
                <input name="header_scripts" type="text" class="large-text" value="<?= $eggcforum_header_scripts ?>">

                <label for="eggcforum_footer_scripts">Footer Scripts</label>
                <input name="footer_scripts" type="text" class="large-text" value="<?= $eggcforum_footer_scripts ?>">

                <button type="submit" name="eggcforum_update_scripts" class="button button-primary">Update</button>
            </form>
        </div>
    <?php
}

function eggcforum_display_header_scripts()
{
    $eggcforum_header_scripts = get_option('eggcforum_header_scripts', '');
    echo $eggcforum_header_scripts;
}
add_action('wp_head', 'eggcforum_display_header_scripts');

function eggcforum_display_footer_scripts()
{
    $eggcforum_footer_scripts = get_option('eggcforum_footer_scripts', '');
    echo $eggcforum_footer_scripts;
}
add_action('wp_footer', 'eggcforum_display_footer_scripts');

function eggcforum_form()
{
    add_shortcode('eggcforumform', 'eggcforum_form');
}