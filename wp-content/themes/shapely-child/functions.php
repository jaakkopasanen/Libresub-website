<?php
// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'func_enqueue_child_styles', 99);

function func_enqueue_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_dequeue_style('shapely-style');
    wp_enqueue_style( 'shapely-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_script( 'shapely-child-scripts',
        get_stylesheet_directory_uri() . '/js/shapely-child-scripts.js',
        array('jquery'),
        '20160115',
        true
    );
}

// Change shop title from "Archives: Products" into "Shop"
function custom_get_the_archive_title( $title ){
    if(is_post_type_archive('product')){
        $title = 'Shop';
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'custom_get_the_archive_title' );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
?>