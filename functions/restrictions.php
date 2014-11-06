<?php

/**
 * Restrictions
 */

// prevent deletion of certain pages
function restrict_post_deletion($post_ID){
    $restricted_pages = array(1);
    if(in_array($post_ID, $restricted_pages)){
        echo "You shall not delete this";
        exit;
    }
}
add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);

add_filter('show_admin_bar', '__return_false');