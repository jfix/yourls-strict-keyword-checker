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

// Associate filter function with hook 'shunt_add_new_link'
yourls_add_filter( 'shunt_add_new_link', 'strict_check_keyword' );

// $pre = yourls_apply_filter( 'shunt_add_new_link', false, $url, $keyword, $title );
// The filter function has access to all parameters listed above

function strict_check_keyword( $return, $url, $original_keyword, $title ) {
  global $yourls_reserved_URL;

  foreach ($yourls_reserved_URL as $keyword) {
    if (preg_match("/$keyword/i", $original_keyword)) {
      $return['status'] = 'fail';
      $return['code'] = 'error:keyword';
      $return['message'] = yourls_s( 'This keyword may not be used.' );
      $return['errorCode'] = '400';
      return $return;
    }
  }
  return false;
}
