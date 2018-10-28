<?php

if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE ) {
    
    add_action( 'init', 'getbowtied_visual_composer_stuff' );
    function getbowtied_visual_composer_stuff() {      
            
        //enable vc on post types
        if(function_exists('vc_set_default_editor_post_types')) vc_set_default_editor_post_types( array('post','page','product','portfolio') );
        
        if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);
        
        // Remove vc_teaser
        if (is_admin()) :
            function remove_vc_teaser() {
                remove_meta_box('vc_teaser', '' , 'side');
            }
            add_action( 'admin_head', 'remove_vc_teaser' );
        endif;

        // REMOVED ELEMENTS
        vc_remove_element("vc_flickr");
        vc_remove_element("vc_wp_search");
        vc_remove_element("vc_wp_meta");
        vc_remove_element("vc_wp_recentcomments");
        vc_remove_element("vc_wp_calendar");
        vc_remove_element("vc_wp_pages");
        vc_remove_element("vc_wp_tagcloud");
        vc_remove_element("vc_wp_custommenu");
        vc_remove_element("vc_wp_text");
        vc_remove_element("vc_wp_posts");
        vc_remove_element("vc_wp_categories");
        vc_remove_element("vc_wp_archives");
        vc_remove_element("vc_wp_rss");
  
    }

}