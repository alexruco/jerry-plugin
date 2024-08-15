<?php

// Shortcode to generate the modal
function nm_newsletter_modal_shortcode() {
    $modal_image = esc_url(get_option('nm_modal_image'));
    $continue_text = esc_html(get_option('nm_continue_text', 'Continue reading'));
    $continue_url = esc_url(get_option('nm_continue_url', '#'));
    
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
                <button type="submit"><?php echo esc_html(get_option('nm_button_text', 'Subscribe')); ?></button>
            </form>
            <div class="nm-modal-footer">
                <a href="<?php echo $continue_url; ?>" id="nm-continue-reading"><?php echo $continue_text; ?></a>
                <a href="<?php echo esc_url(get_option('nm_anchor_url', '#')); ?>" id="nm-sign-in"><?php echo esc_html(get_option('nm_anchor_text', 'Sign in')); ?></a>
            </div>
        </div>
    </div>

    <?php return ob_get_clean();
}
add_shortcode('newsletter_modal', 'nm_newsletter_modal_shortcode');
