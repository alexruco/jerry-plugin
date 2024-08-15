<?php

// Function to display the subscribers page
function nm_subscribers_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nm_subscribers';
    $subscribers = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    <div class="wrap">
        <h1>Newsletter Subscribers</h1>
        <table class="widefat">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subscribers as $subscriber) { ?>
                    <tr>
                        <td><?php echo $subscriber->id; ?></td>
                        <td><?php echo $subscriber->email; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}

// Add subscribers page to the admin menu
function nm_add_subscribers_page() {
    add_menu_page('Newsletter Subscribers', 'Newsletter Subscribers', 'manage_options', 'newsletter-subscribers', 'nm_subscribers_page', 'dashicons-email-alt2');
}
#add_action('admin_menu', 'nm_add_subscribers_page');
