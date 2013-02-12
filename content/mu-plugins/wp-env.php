<?php
/*
Plugin Name: WPEnv
Version: 0.0.1
Author: Bryan Shelton
Author URI: https://github.com/bshelton229
*/

function wp_env() {
  return strtolower( defined('WP_ENV') ? WP_ENV : 'production' );
}
