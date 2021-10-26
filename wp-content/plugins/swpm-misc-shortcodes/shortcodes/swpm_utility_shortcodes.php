<?php
/*
 * Various small utility type shortcodes can go in this file.
 */


/*
 * Shows the total members count of a site.
 */
add_shortcode( 'swpm_show_members_count', 'swpm_msc_show_members_count_handler' );

function swpm_msc_show_members_count_handler( $atts ) {

    // Check if SWMP plugin is enabled
    if (!class_exists('SimpleWpMembership')) {
        // Perhaps show message to install SWMP plugin?
        return SWPMMiscShortcodes::msg('Simple Membership plugin is not installed.');
    }

    $params = shortcode_atts( array(
        'membership_level' => '',
        'class' => 'swpm-total-members-count',
        ), $atts );

    global $wpdb;
    $table = $wpdb->prefix . "swpm_members_tbl";
        $query = $wpdb->prepare("SELECT COUNT(*) FROM $table WHERE user_name = %s", $field_value);

    if ( !empty ($params['membership_level'])) {
        //Query for the total members from a particular membership level
        $level = intval ($params['membership_level']);
        $count_query = $wpdb->prepare("SELECT COUNT(*) FROM $table WHERE membership_level = %d", $level);
    } else {
        //Query for the total members
        $count_query = $wpdb->prepare("SELECT COUNT(*) FROM $table");
    }

    //Count the members
    $members_count = $wpdb->get_var( $count_query );

    $output = '';
    $output .= '<span class="'.$params['class'].'">';
    $output .= $members_count;
    $output .= '</span>';
    return $output;

}
