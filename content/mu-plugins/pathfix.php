<?php
/*
Plugin Name: Path Fix
Version: 0.3
Author: Bryan Shelton
Author URI: https://github.com/bshelton229
*/

class PathFix {
  public static $instance;

  /**
   * Init and factory
   */
  public static function init() {
    if ( self::$instance ) {
      return self::$instance;
    }
    else {
      self::$instance = new self;
      return self::$instance;
    }
  }

  public function __construct() {
    if ( !is_admin() && $this->is_enabled() ) {
      add_action('template_redirect', array($this, 'startBuffer') );
    }
  }

  public function is_enabled() {
    return ( false == $this->hosts() ) ? false : true;
  }

  public function startBuffer() {
    ob_start( array($this, 'filter') );
  }

  public function filter($content) {
    $hosts = $this->hosts();
    if ( ! $hosts ) { return false; }

    // return preg_replace("#(" . implode('|', $hosts). ")#", $_SERVER['SERVER_NAME'], $content);
    $pattern = "~(src|href)=(['\"])(https?://(" . implode( '|', $hosts ) . ")((?:(?!\\2).)*))\\2~xi";
    $content = preg_replace_callback($pattern, array($this, 'replace'), $content);
    return $content;
  }

  /**
   * Run the actual replacements
   */
  public function replace($matches) {
    $parsed = parse_url($matches[3]);
    $parsed['host'] = $_SERVER['HTTP_HOST'];
    // If we've moved our content directory, try to fix that as well
    if ( basename(WP_CONTENT_DIR) == 'content' ) {
      $parsed['path'] = preg_replace('#wp\-content#', 'content', $parsed['path']);
    }
    return $matches['1'] . '="' . $this->rebuild_url($parsed) . '"';
  }

  /**
   * Put this all back together again,
   */
  public function rebuild_url($parts) {
    if ( ! isset($parts['scheme']) ) { $parts['scheme'] = 'http'; }
    $url = $parts['scheme'] . '://';
    $url .= $parts['host'];
    if ( isset($parts['path']) ) { $url .= $parts['path']; }
    if ( isset($parts['query']) ) { $url .= '?' . $parts['query']; }
    if ( isset($parts['fragment']) ) { $url .= '#' . $parts['fragment']; }
    return $url;
  }

  /**
   * Get the hosts we're considering local
   */
  public function hosts() {
    if ( defined('PATHFIX') ) {
      // Remove any spaces and split by comma
      $hosts = preg_replace('#https?://#', '', PATHFIX);
      $hosts = preg_replace('#[/\s]#', '', $hosts);
      $hosts = explode(',', $hosts);
      // Return the array mapped through an anonymous function that preg_quotes each host
      return array_map(create_function('$s', 'return preg_quote($s, \'#\');'), $hosts);
    }
    else {
      return false;
    }
  }
}

PathFix::init();
