<?php
/*
Plugin Name: UWStandardSecurity
Version: 0.0.1
Author: Bryan Shelton
Author URI: https://github.com/bshelton229
*/

function uwsec_hide_update_notice() {
  if ( !current_user_can( 'edit_users' ) ) {
    remove_action( 'admin_notices', 'update_nag', 3 );
  }
}
add_action( 'admin_notices', 'uwsec_hide_update_notice', 1 );

// Remove the wp_generator action
remove_action('wp_head', 'wp_generator');
