<?php

// Store subscribers in the database via AJAX
function nm_store_subscriber() {
    if (isset($_POST['nm_email'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'nm_subscribers';
        $email = sanitize_email($_POST['nm_email']);
        
        // Ensure the email is not empty and is valid
        if (!empty($email) && is_email($email)) {
            $wpdb->insert($table_name, array('email' => $email));
            wp_send_json_success('Subscription successful.');
        } else {
            wp_send_json_error('Invalid email address.');
        }
    } else {
        wp_send_json_error('Email not provided.');
    }
}
add_action('wp_ajax_nm_subscribe', 'nm_store_subscriber');
add_action('wp_ajax_nopriv_nm_subscribe', 'nm_store_subscriber');
