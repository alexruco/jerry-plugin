<?php

// Register settings
function nm_register_settings() {
    register_setting('nm-settings-group', 'nm_h2_text');
    register_setting('nm-settings-group', 'nm_p_text');
    register_setting('nm-settings-group', 'nm_input_placeholder');
    register_setting('nm-settings-group', 'nm_button_text');
    register_setting('nm-settings-group', 'nm_right_link_text');  // Previously "Anchor Text"
    register_setting('nm-settings-group', 'nm_right_link_url');   // Previously "Anchor URL"
    register_setting('nm-settings-group', 'nm_left_link_text');   // Previously "Continue Reading Text"
    register_setting('nm-settings-group', 'nm_left_link_url');    // Previously "Continue Reading URL"
    register_setting('nm-settings-group', 'nm_modal_image');
    register_setting('nm-settings-group', 'nm_thank_you_message');
    register_setting('nm-settings-group', 'nm_button_color');
    register_setting('nm-settings-group', 'nm_link_color');
}
add_action('admin_init', 'nm_register_settings');

// Settings page content
function nm_settings_page() {
    ?>
    <div class="wrap">
        <h1>Lead Capturing Modal Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('nm-settings-group');
            do_settings_sections('nm-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Modal Heading (H2)</th>
                    <td><input type="text" name="nm_h2_text" value="<?php echo esc_attr(get_option('nm_h2_text', 'Discover more from our Newsletter')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Modal Description (P)</th>
                    <td><textarea name="nm_p_text"><?php echo esc_textarea(get_option('nm_p_text', 'A weekly advice column about building product, driving growth, and accelerating your career.')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Input Placeholder</th>
                    <td><input type="text" name="nm_input_placeholder" value="<?php echo esc_attr(get_option('nm_input_placeholder', 'Type your email...')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Button Text</th>
                    <td><input type="text" name="nm_button_text" value="<?php echo esc_attr(get_option('nm_button_text', 'Subscribe')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Right Link Text</th>
                    <td><input type="text" name="nm_right_link_text" value="<?php echo esc_attr(get_option('nm_right_link_text', 'Sign in')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Right Link URL</th>
                    <td><input type="text" name="nm_right_link_url" value="<?php echo esc_url(get_option('nm_right_link_url', '#')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Left Link Text</th>
                    <td><input type="text" name="nm_left_link_text" value="<?php echo esc_attr(get_option('nm_left_link_text', 'Continue reading')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Left Link URL</th>
                    <td><input type="text" name="nm_left_link_url" value="<?php echo esc_url(get_option('nm_left_link_url', '#')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Modal Image</th>
                    <td>
                        <input type="hidden" id="nm_modal_image" name="nm_modal_image" value="<?php echo esc_attr(get_option('nm_modal_image')); ?>" />
                        <img id="nm_modal_image_preview" src="<?php echo esc_url(get_option('nm_modal_image')); ?>" style="max-width: 150px; max-height: 150px;" />
                        <br>
                        <button type="button" class="button" id="nm_modal_image_upload">Select Image</button>
                        <button type="button" class="button-secondary" id="nm_modal_image_remove">Remove Image</button>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thank You Message</th>
                    <td><textarea name="nm_thank_you_message"><?php echo esc_textarea(get_option('nm_thank_you_message', 'Thank you for subscribing!')); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Button Color</th>
                    <td><input type="text" name="nm_button_color" value="<?php echo esc_attr(get_option('nm_button_color', '#ff6a3d')); ?>" class="nm-color-picker" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link Color</th>
                    <td><input type="text" name="nm_link_color" value="<?php echo esc_attr(get_option('nm_link_color', '#ff6a3d')); ?>" class="nm-color-picker" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <script>
        jQuery(document).ready(function($) {
            // Initialize the color picker
            $('.nm-color-picker').wpColorPicker();

            var mediaUploader;

            $('#nm_modal_image_upload').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#nm_modal_image').val(attachment.url);
                    $('#nm_modal_image_preview').attr('src', attachment.url);
                });
                mediaUploader.open();
            });

            $('#nm_modal_image_remove').click(function(e) {
                e.preventDefault();
                $('#nm_modal_image').val('');
                $('#nm_modal_image_preview').attr('src', '');
            });
        });
    </script>
    <?php
}
