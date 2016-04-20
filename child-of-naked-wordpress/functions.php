<?php

/**
 * The functions file contains all custom functionality for your child theme
 * This file will *not* override the functions.php file in the master theme
 */

/**
 * Insider's tip: you'll notice all of the function calls in the below files are
 * prefaced by 'conw_'
 * Remember that no two functions can have the same name - so by adding this preface
 * (it's an acronym of the theme name), I'm increasing the chances that my custom functions
 * will have unique names
 */

/**
 * One way of better organizing your functions is to parse them out into separate files
 * I use the name 'lib' for the folder that contains these files, but the name 'inc' (for 'includes') is also often used
 * require_once() is a PHP function: "The require_once statement is identical to require except 
 * PHP will check if the file has already been included, and if so, not include (require) it again."
 * In other words, it's a safety to make sure you haven't double included a file
 * Learn more: http://php.net/manual/en/function.require-once.php
 * STYLESHEETPATH is a Constant (http://php.net/manual/en/language.constants.php)
 * Learn more: http://betterwp.net/wordpress-constants/
 */ 

/**core**/
require_once(STYLESHEETPATH . '/lib/enqueues.php');
require_once(STYLESHEETPATH . '/lib/post-types.php');
require_once(STYLESHEETPATH . '/lib/custom-taxonomies.php');

/**build**/
require_once(STYLESHEETPATH . '/lib/persistent.php');

/**theme support**/
/**
 * Adds post thumbnail support (featured image) to this theme
 */
add_theme_support('post-thumbnails');