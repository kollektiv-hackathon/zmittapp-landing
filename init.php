<?php

global $post;

// Make assets URI available in template
$context['site_options']['theme_uri'] = THEME_ASSETS_URI;

// set home url
$context['home_url'] = get_home_url();

// set disclaimer url for footer
$context['disclaimer_url'] = "";

// user is logged in, continue to controllers
if (is_page()) {

    page_controller( $post );

} elseif (is_single()) {

    post_controller( $post );

} elseif (is_404()) {

    error_handler( 404 );

}elseif(is_search()){

    $context['title'] = "rendering search.twig";

    if (have_posts()) {
           
    } else {

    }

    $context['search_form'] = call_user_func(function() {
        ob_start();
        get_search_form();
        return ob_get_clean();
    });

    Timber::render('views/search.twig', $context); 
} else {

    $context['title'] = "title";

    if (!is_post_type_archive()) {
        $context['filter'] = true;
    }

    Timber::render('index.twig', $context);
}

