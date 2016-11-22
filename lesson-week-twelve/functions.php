<?php

/**
 * The functions file contains all custom functionality for your child theme
 * This file will *not* override the functions.php file in the master theme
 */

/**core**/
require_once(STYLESHEETPATH . '/lib/enqueues.php');
require_once(STYLESHEETPATH . '/lib/post-types.php');
require_once(STYLESHEETPATH . '/lib/custom-taxonomies.php');
require_once(STYLESHEETPATH . '/lib/utility.php');

/**theme support**/
/**
 * Adds post thumbnail support (featured image) to this theme
 */
add_theme_support('post-thumbnails');