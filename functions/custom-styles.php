<?php

/**
 * Apply styles to the visual editor
 */  
add_filter( 'mce_css', 'custom_editor_style');
function custom_editor_style($url) {

    if ( ! empty( $url ) )
        $url .= ',';

    $url .= THEME_ASSETS_URI . '/css/admin.min.css';

    return $url;
}

/**
 * Enable custom format button in tinymce
 */ 
add_filter( 'mce_buttons_2', 'custom_mce_editor_buttons' );
function custom_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );

function custom_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'highlight violet',
            'inline' => 'span',
            'classes' => 'purple-highlight'
        ),
        array(
           'title' => 'Link Arrow',
           'selector' => 'a',
           'classes' => 'arrow'
           ),
        array(
           'title' => 'Small',
           'inline' => 'span',
           'classes' => 'small'
           ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}