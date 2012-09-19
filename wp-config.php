<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/config/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/config/local-config.php' );
} else {
	print 'provide config';
  exit;
}

// ========================
// Custom Content Directory
// ========================
define('WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );

if ( !defined('WP_SUB_URI') )
  define('WP_SUBURI', '/');

define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . WP_SUBURI . 'content' );

/** dynamically set siteurl and home options */
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . WP_SUBURI . 'wp');
define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST'] . WP_SUBURI);


// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// This may be set in local-config.php
if ( !defined( 'AUTH_KEY' ) ) {
  // ==============================================================
  // Salts, for security
  // Grab these from: https://api.wordpress.org/secret-key/1.1/salt
  // ==============================================================
  define('AUTH_KEY',         'IT,|Cs6+/vh7zIzEL*Ws2]6 HOycCzL<xE5*ulgMIp@8!F+gs;z>cF]Qfg~a;b5#');
  define('SECURE_AUTH_KEY',  'I+@I[nkxJY5Tu/MvuxK.+)U/D]C#1O+Wp1/s2_;P ota i1+i8CbFIeh%`7()rz&');
  define('LOGGED_IN_KEY',    '6;XR,0_XW.g}|*:NM!)~+a(+D|vgT~mGU{drB8oI)QZ$2(+r]8s,7z f-VgO)djy');
  define('NONCE_KEY',        '%T-y!XbwYKVA<P~|G1f6EM`7pH2kv:vt: `$Yey#]tr8C`c>%/Tdf!%IN2h`a#C>');
  define('AUTH_SALT',        'kZ*o|Y6?Ha30&y@?5q,HmjbFF&8?Oc+D-hX[y&ij|D-+34T|e.c1$-+,E)gG6aGG');
  define('SECURE_AUTH_SALT', '{P2%$~fHG6.>>@F^hd2SSABB{I@o1mCSK-E[9F$(p9#u;T-e[<+C`os<uR4aD#7>');
  define('LOGGED_IN_SALT',   '!C$OB ePwX67;m|;(]7;HFvr0q$+XV-OuU<q4@[zm*7-QY_SA~0girMq4S6CRIg~');
  define('NONCE_SALT',       '@|h6U=d8`z{C4f:kV]W^N)A|,b-s+FFlV:FIS.De1{4{`Ho=L@fY[+HYG%cr$#*m');
}

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
// Allow the possibility for this to be set in config/local-config.php
if ( !isset($table_prefix) ) {
  $table_prefix  = 'wp_';
}

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
