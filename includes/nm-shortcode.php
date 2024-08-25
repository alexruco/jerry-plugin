<?php

// includes/nm-shortcode.php

function nm_newsletter_modal_shortcode() {
    $modal_image = esc_url(get_option('nm_modal_image'));

    // Use translated strings for different languages
    $left_link_text = esc_html__(get_option('nm_left_link_text'), 'jerry-lead-capture');
    $left_link_url = esc_url(get_option('nm_left_link_url'));
    $right_link_text = esc_html__(get_option('nm_right_link_text'), 'jerry-lead-capture');
    $right_link_url = esc_url(get_option('nm_right_link_url'));
    $thank_you_message = esc_html__(get_option('nm_thank_you_message'), 'jerry-lead-capture');
    $button_color = esc_attr(get_option('nm_button_color', '#ff6a3d'));
    $link_color = esc_attr(get_option('nm_link_color', '#ff6a3d'));

    ob_start(); ?>

    <div id="nm-modal" class="nm-modal">
        <div class="nm-modal-content">
            <span class="nm-close">&times;</span>
            <div class="nm-modal-header">
                <?php if ($modal_image): ?>
                    <img src="<?php echo $modal_image; ?>" alt="<?php esc_attr_e('Modal Image', 'jerry-lead-capture'); ?>" class="nm-profile-pic" id="nm-top-pic">
                <?php endif; ?>
                <h2><?php echo esc_html__(get_option('nm_h2_text'), 'jerry-lead-capture'); ?></h2>
                <p><?php echo esc_html__(get_option('nm_p_text'), 'jerry-lead-capture'); ?></p>
            </div>
            <form class="nm-modal-body">
                <input type="email" placeholder="<?php echo esc_attr__(get_option('nm_input_placeholder'), 'jerry-lead-capture'); ?>" required>
                <button type="submit" style="background-color: <?php echo $button_color; ?>;"><?php echo esc_html__(get_option('nm_button_text'), 'jerry-lead-capture'); ?></button>
            </form>
           <!-- file: modal-footer.php -->
<div class="nm-modal-footer">
    <?php if($left_link_url && !empty($left_link_text)){ ?>
        <a href="<?php echo $left_link_url; ?>" 
           aria-label="<?php echo $left_link_text; ?>"     
           id="nm-continue-reading" 
           style="color: <?php echo $link_color; ?>;">
            <?php echo $left_link_text; ?>
        </a>
    <?php 
        }else{
        echo "<span></span>";
        } ?>

    <?php if($right_link_url && !empty($right_link_text)){ ?>
        <a href="<?php echo $right_link_url; ?>"  
           aria-label="<?php echo $right_link_text; ?>" 
           id="nm-sign-in" 
           style="color: <?php echo $link_color; ?>;">
            <?php echo $right_link_text; ?>
        </a>
        <?php 
        }else{
        echo "<span></span>";
        } ?>
</div>

        </div>
        <div id="nm-thank-you" class="nm-thank-you" style="display:none;">
            <h2><?php echo $thank_you_message; ?></h2>
        </div>
    </div>

    <?php return ob_get_clean();
}
add_shortcode('newsletter_modal', 'nm_newsletter_modal_shortcode');
