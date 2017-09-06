<?php
/*
Plugin Name: Strict Keyword Checker
Plugin URI: https://github.com/jfix/yourls-strict-keyword-checker
Description: Make sure a custom keyword doesn't contain a reserved word
Version: 1.0
Author: Jakob Fix
Author URI: https://github.com/jfix
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_filter( 'shunt_add_new_link', 'strict_check_keyword' );

function strict_check_keyword( $original_keyword ) {
  // now I just have to write the code ....

}
