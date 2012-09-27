<?php
/*
Plugin Name: Maintenance Mode
Version: 0.1
Author: Bryan Shelton
Author URI: https://github.com/bshelton229
*/

class MaintenanceMode {
  public static function run() {
    if ( defined('MAINTENANCE') && MAINTENANCE ) {
      $instance = new self;
      // If no user is logged in, and the current user can't manage options
      if ( !is_user_logged_in() && !current_user_can('managed_options') ) {
        wp_die($instance->message());
      }    
    }
  }

  private function message() {
    $message = ( MAINTENANCE === true ) ? "<h1>Down for maintenance</h1><p>This site is temporarily down for maintenance</p>" : MAINTENANCE;
    return apply_filters('maintenance_mode_message', $message);
  }
}
add_action( 'template_redirect', array('MaintenanceMode', 'run'), 1);
