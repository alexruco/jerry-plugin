<?php

// Create database table for subscribers on plugin activation
function nm_create_subscribers_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nm_subscribers';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'nm_create_subscribers_table');
