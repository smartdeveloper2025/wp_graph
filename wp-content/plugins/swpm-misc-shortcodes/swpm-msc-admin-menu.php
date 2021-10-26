<?php

add_action('swpm_after_main_admin_menu', 'swpm_msc_do_admin_menu');

function swpm_msc_do_admin_menu($menu_parent_slug) {
    $permission = 'manage_options';
    if (defined('SWPM_MANAGEMENT_PERMISSION')){
        $permission = SWPM_MANAGEMENT_PERMISSION;
    }
    add_submenu_page($menu_parent_slug, __("Misc Shortcodes & Features", 'simple-membership'), __("Misc Shortcodes & Features", 'simple-membership'), $permission, 'swpm-msc', 'swpm_msc_settings_page');

}

function swpm_msc_settings_page() {
    echo '<div class="wrap">';
    echo '<h2>Misc Shortcodes & Features AddOn Settings</h2>';

    echo '<div id="poststuff"><div id="post-body">';

    if (isset($_POST['swpm_msc_settings_update'])) {

        $options = array(
            'auto_downgrade_account_enabled' => isset($_POST["auto_downgrade_account_enabled"]) ? '1' : '',
            'downgrade_to_level' => absint($_POST["downgrade_to_level"]),
        );
        update_option('swpm_msc_addon_settings', $options); //store the results in WP options table

        echo '<div id="message" class="updated fade"><p>';
        echo '<strong>Options Updated!';
        echo '</strong></p></div>';
    }

    $msc_options = get_option('swpm_msc_addon_settings');
    $auto_downgrade_account_enabled = isset($msc_options['auto_downgrade_account_enabled'])? $msc_options['auto_downgrade_account_enabled']: '';
    $downgrade_to_level = isset($msc_options['downgrade_to_level'])? $msc_options['downgrade_to_level']: '';

    //Retrieve all the levels of this site.
    $all_levels_array = SwpmMembershipLevelUtils::get_all_membership_levels_in_array();

    ?>

    <form method="post" action="">

        <div class="postbox">
            <h3 class="hndle"><label for="title">Auto Downgrade Account Settings</label></h3>
            <div class="inside">

                <table class="form-table">

                    <tr valign="top">
                        <td width="25%" align="left">
                            Enable Auto Downgrade Expired Account
                        </td>
                        <td align="left">
                            <input name="auto_downgrade_account_enabled" type="checkbox"<?php if ($auto_downgrade_account_enabled != '') echo ' checked="checked"'; ?> value="1"/>
                            <p class="description">Enable this if you want to automatically downgrade the an expired account. When an expired account holder logs into the site, the account is dowgraded to a free level.</p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <td width="25%" align="left">
                            Downgrade to Membership Level
                        </td>
                        <td align="left">
                            <select name="downgrade_to_level">
                                <option value="" selected >Select One</option>
                                <?php foreach ($all_levels_array as $level_key => $level_value) { ?>
                                    <option <?php echo ($level_key == $downgrade_to_level) ? "selected" : "" ?> value="<?php echo $level_key; ?>"><?php echo $level_value; ?></option>
                                <?php } ?>
                            </select>
                            <p class="description">When an expired or inactive member tries to log into your site, the account will be downgraded to the level you select above.</p>
                        </td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="submit">
            <input type="submit" class="button-primary" name="swpm_msc_settings_update" value="Update" />
        </div>
    </form>
    <?php
    echo '</div></div>';
    echo '</div>';
}