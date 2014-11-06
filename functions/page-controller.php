<?php

/**
 * Handles different pages and applys different views
 */

 function page_controller( $post ){

    global $context;

    switch( $post->ID ){

        /**
        @* permalink: "/blog" 
         * Blog Page
         */
        case 2:

            // get all questions as timber posts
            $args = array('numberposts' => 0, 'post_type' => 'post', 'post_status' => 'publish',  'suppress_filters' => 0, 'orderby' => 'post_date', 'order' => 'ASC' );
            $questions = Timber::get_posts($args);

            $context['data'] = "field";
            Timber::render('views/post.twig', $context);
            exit;

            break;    

        /**
        @* permalink: "/page" 
         * Custom Page
         */
        case 3:

            $context['post'] = new TimberPost($post);
            Timber::render('modules/page/page.twig', $context);

            exit;

            break;

        /**
        @* permalink: "/" 
         * Home Page
         */
        case 5:

            $context['data'] = "field";

            Timber::render('modules/home/home.twig', $context);
            exit;

            break;       

        /**
        @* renders default page template 
         */
        default:

        //$context['title'] = "rendering page.twig with default post type ";

    }

    // render default page template
    $context['post'] = new TimberPost($post);
    Timber::render('views/page.twig', $context);

 }