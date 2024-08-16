<?php
// includes/nm-multilanguage.php

// Load plugin text domain for translations
function nm_load_textdomain() {
    load_plugin_textdomain('jerry-lead-capture', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'nm_load_textdomain');

// Register plugin options strings with WPML
function nm_register_strings_with_wpml() {
    $options = array(
        'nm_h2_text' => __('Modal Heading', 'jerry-lead-capture'),
        'nm_p_text' => __('Modal Description', 'jerry-lead-capture'),
        'nm_input_placeholder' => __('Input Placeholder', 'jerry-lead-capture'),
        'nm_button_text' => __('Button Text', 'jerry-lead-capture'),
        'nm_right_link_text' => __('Right Link Text', 'jerry-lead-capture'),
        'nm_right_link_url' => __('Right Link URL', 'jerry-lead-capture'),
        'nm_left_link_text' => __('Left Link Text', 'jerry-lead-capture'),
        'nm_left_link_url' => __('Left Link URL', 'jerry-lead-capture'),
        'nm_thank_you_message' => __('Thank You Message', 'jerry-lead-capture'),
    );

    if (function_exists('icl_register_string')) {
        foreach ($options as $option => $label) {
            icl_register_string('jerry-lead-capture', $label, get_option($option));
            error_log("Registered WPML string: $label");
        }
    } else {
        error_log('WPML is not active or icl_register_string function is not available.');
    }
}
add_action('init', 'nm_register_strings_with_wpml');

// Register plugin options strings with Polylang
function nm_register_strings_with_polylang() {
    if (function_exists('pll_register_string')) {
        $options = array(
            'nm_h2_text' => __('Modal Heading', 'jerry-lead-capture'),
            'nm_p_text' => __('Modal Description', 'jerry-lead-capture'),
            'nm_input_placeholder' => __('Input Placeholder', 'jerry-lead-capture'),
            'nm_button_text' => __('Button Text', 'jerry-lead-capture'),
            'nm_right_link_text' => __('Right Link Text', 'jerry-lead-capture'),
            'nm_right_link_url' => __('Right Link URL', 'jerry-lead-capture'),
            'nm_left_link_text' => __('Left Link Text', 'jerry-lead-capture'),
            'nm_left_link_url' => __('Left Link URL', 'jerry-lead-capture'),
            'nm_thank_you_message' => __('Thank You Message', 'jerry-lead-capture'),
        );

        foreach ($options as $option => $label) {
            pll_register_string($option, get_option($option), 'jerry-lead-capture');
            error_log("Registered Polylang string: $label");
        }
    } else {
        error_log('Polylang is not active or pll_register_string function is not available.');
    }
}
add_action('init', 'nm_register_strings_with_polylang');

