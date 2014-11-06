<?php

/**
 * Handles all different types of errors
 */

function error_handler( $id ){

    global $context;
    
    switch ( $id ){

        /**
        @* ERROR 404, Page not found
         */
        case 404:
            $context['title'] = "Page was not found";
            Timber::render('views/error.twig', $context);
            exit;

        break;

        /**
        @* Unknown Error
         */
        default:
            $context['title'] = "An error occured while preparing the page, please contact the page administrator.";
            Timber::render('views/error.twig', $context);
            exit;

    }
}