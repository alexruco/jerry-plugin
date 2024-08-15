<?php

// Shortcode to generate the modal
function nm_newsletter_modal_shortcode() {
    $modal_image = esc_url(get_option('nm_modal_image'));
    $left_link_text = esc_html(get_option('nm_left_link_text', 'Continue reading'));
    $left_link_url = esc_url(get_option('nm_left_link_url', '#'));
    $right_link_text = esc_html(get_option('nm_right_link_text', 'Sign in'));
    $right_link_url = esc_url(get_option('nm_right_link_url', '#'));
    $thank_you_message = esc_html(get_option('nm_thank_you_message', 'Thank you for subscribing!'));
    $button_color = esc_attr(get_option('nm_button_color', '#ff6a3d'));
    $link_color = esc_attr(get_option('nm_link_color', '#ff6a3d'));

    ob_start(); ?>

    <div id="nm-modal" class="nm-modal">
        <div class="nm-modal-content">
            <span class="nm-close">&times;</span>
            <div class="nm-modal-header">
                <?php if ($modal_image): ?>
                    <img src="<?php echo $modal_image; ?>" alt="Modal Image" class="nm-profile-pic">
                <?php endif; ?>
                <h2><?php echo esc_html(get_option('nm_h2_text', 'Discover more from our Newsletter')); ?></h2>
                <p><?php echo esc_html(get_option('nm_p_text', 'A weekly advice column about building product, driving growth, and accelerating your career.')); ?></p>
            </div>
            <form class="nm-modal-body">
                <input type="email" placeholder="<?php echo esc_attr(get_option('nm_input_placeholder', 'Type your email...')); ?>" required>
                <button type="submit" style="background-color: <?php echo $button_color; ?>;"><?php echo esc_html(get_option('nm_button_text', 'Subscribe')); ?></button>
            </form>
            <div class="nm-modal-footer">
                <a href="<?php echo $left_link_url; ?>" id="nm-continue-reading" style="color: <?php echo $link_color; ?>;"><?php echo $left_link_text; ?></a>
                <a href="<?php echo $right_link_url; ?>" id="nm-sign-in" style="color: <?php echo $link_color; ?>;"><?php echo $right_link_text; ?></a>
            </div>
        </div>
        <div id="nm-thank-you" class="nm-thank-you" style="display:none;">
            <h2><?php echo $thank_you_message; ?></h2>
        </div>
    </div>

    <?php return ob_get_clean();
}
add_shortcode('newsletter_modal', 'nm_newsletter_modal_shortcode');
