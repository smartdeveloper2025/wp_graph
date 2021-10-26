<?php

add_action('swpm_before_login_request_is_processed', 'swpm_msc_check_auto_downgrade_feature');

function swpm_msc_check_auto_downgrade_feature( $args ) {

    $msc_options = get_option('swpm_msc_addon_settings');
    $auto_downgrade_account_enabled = isset($msc_options['auto_downgrade_account_enabled']) ? $msc_options['auto_downgrade_account_enabled'] : '';
    $downgrade_to_level = isset($msc_options['downgrade_to_level']) ? $msc_options['downgrade_to_level'] : '';

    //Check to see if the feature is enabled and if all the other required values are present.
    if (empty($auto_downgrade_account_enabled)) {
        return;
    }

    if (empty($downgrade_to_level)) {
        return;
    }

    $username = $args['username'];
    if (empty($username)) {
        return;
    }

    $swpm_user_row = SwpmMemberUtils::get_user_by_user_name($username);
    if (!isset($swpm_user_row->member_id)) {
        return;
    }

    $member_id = $swpm_user_row->member_id;
    $current_account_state = $swpm_user_row->account_state;
    if ( $current_account_state == 'active' || $current_account_state == 'activation_required' || $current_account_state == 'pending'){
        //we don't want to touch account with these status. So bail out.
        return;
    }

    /*** We have an expired or inactive account that needs to be auto downgraded. ***/

    //Get the current membership level.
    $current_membership_level = $swpm_user_row->membership_level;

    //Update the membership level to the target level
    SwpmMemberUtils::update_membership_level( $member_id, $downgrade_to_level );
    // Trigger level changed/updated action hook. Which will also update the WP Role according to the new level (if applicable)
    do_action(
            'swpm_membership_level_changed',
            array(
                    'member_id'  => $member_id,
                    'from_level' => $current_membership_level,
                    'to_level'   => $downgrade_to_level,
            )
    );

    //Set the account status to active
    SwpmMemberUtils::update_account_state( $member_id, 'active' );

    //Reset the access start date to today
    $todays_date = ( date( 'Y-m-d' ) );
    SwpmMemberUtils::update_access_starts_date($member_id, $todays_date);
    SwpmLog::log_simple_debug('Auto downgrade complete for member ID: ' . $member_id . ', Target membership level: ' . $downgrade_to_level, true);

    //Auto downgrade complete. The normal login process will continue by the core plugin.
}
