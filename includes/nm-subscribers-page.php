<?php

// Function to export subscribers as CSV
function nm_export_subscribers_csv() {
    if (isset($_GET['nm_download_csv'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'nm_subscribers';

        $subscribers = $wpdb->get_results("SELECT * FROM $table_name");

        // Set CSV headers
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="subscribers.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Email'));

        foreach ($subscribers as $subscriber) {
            fputcsv($output, array($subscriber->id, $subscriber->email));
        }

        fclose($output);
        exit;
    }
}
add_action('admin_init', 'nm_export_subscribers_csv');

// Admin page to view subscribers
function nm_subscribers_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'nm_subscribers';
    $subscribers = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    <div class="wrap">
        <h1>Leads captured</h1>
        <form method="get">
            <input type="hidden" name="page" value="nm-subscribers" />
            <input type="submit" name="nm_download_csv" class="button-primary" value="Download CSV" />
        </form>
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
