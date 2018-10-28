<?php

global $custom_blog_layout;

if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
    $page_title_option = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );
} else {
    $page_title_option = "on";
}

get_header();

switch ($custom_blog_layout)
{        
    case "blog_layout_default":
        require_once('index-default.php');
        break;
    case "blog_layout_1":
        require_once('index-layout-1.php');
        break;
    case "blog_layout_2":
        require_once('index-layout-2.php');
        break;
    default:
        require_once('index-default.php');
        break;
}

get_footer();