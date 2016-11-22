<?php

/*
 * Enqueues
 * This file is for handling all custom assets related to your child theme, i.e. stylesheets, javascript, etc.
 */

/**
 * The proper way to add stylesheets or javascript files to a WordPress theme is via the enqueue system
 * Learn more: http://code.tutsplus.com/articles/how-to-include-javascript-and-css-in-your-wordpress-themes-and-plugins--wp-24321
 */
function lessontwelve_enqueues() {

    /*
     * First dequeue call to child stylesheet in parent
     * This is not something you always have to do, it's a specific action related to the way
     * the Master theme is handling stylesheet registration
     */
    wp_dequeue_style('style.css');

    /**
     * I'm registereing and enqueuing the parent stylesheet (so I have access to those core styles)
     * get_template_directory_uri() points to the theme folder for the Master theme
     */
    wp_register_style('style-parent', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style-parent');
    
    /**
     * Now I'm registereing and enqueuing my custom child stylesheet so I can override the parent styles where needed
     * get_stylesheet_directory_uri() points to the theme folder for the Child theme
     */
    wp_register_style('style-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style-child');
}

add_action('wp_enqueue_scripts', 'lessontwelve_enqueues', 20);
