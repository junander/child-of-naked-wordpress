<?php

/**
 * Persistent functionalities
 * The idea here is to include functionality that is 'persistent', i.e that persists across many pages
 * of your site
 * A nav menu is one example; a sidebar widget is another
 */

/**
 * Registers custom nav menus
 * Learn more: https://codex.wordpress.org/Function_Reference/register_nav_menus
 */
register_nav_menus(
        array(
            'secondary' => 'Secondary Navigation',
            'bonus' => 'Bonus Navigation'
        )
);

/**
 * Registers a custom sidebar
 * Learn more: https://codex.wordpress.org/Function_Reference/register_sidebar
 */
register_sidebar(array(
    'name' => __('Tag Archive Sidebar'),
    'id' => 'tagarchivesidebar',
    'description' => __('Widgets in this area will be shown on the left-hand side.'),
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
