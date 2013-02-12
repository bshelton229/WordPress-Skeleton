<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines

You may include other settings here that you only want enabled on your local development checkouts
*/

// Must have a trailing and leading slash
// define('WP_SUBURI', '/mysite/');

define( 'DB_NAME', 'local_db_name' );
define( 'DB_USER', 'local_db_user' );
define( 'DB_PASSWORD', 'local_db_password' );
define( 'DB_HOST', 'localhost' );

// Comma separated list of hostnames which should be considered "local"
// and re-written to $_SERVER['HTTP_HOST']. Also addresses wp-content => content replacement.
// define( 'PATHFIX', 'site.local, mysite.local' );

// WP_ENV sets the environment to be used by the wp-env MU plugin
// defined( 'WP_ENV', 'development' );

// Maintenance mode using the maintenance mu-plugin
// define( 'MAINTENANCE', false);
// define( 'MAINTENANCE', true);
// define( 'MAINTENANCE', '<h1>Custom message</h1><p>For maintenance mode</p>');

// $table_prefix = 'wp_';

// If the keys are defined here, they will not be loaded in wp-config.php

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
// define('AUTH_KEY',         'IT,|Cs6+/vh7zIzEL*Ws2]6 HOycCzL<xE5*ulgMIp@8!F+gs;z>cF]Qfg~a;b5#');
// define('SECURE_AUTH_KEY',  'I+@I[nkxJY5Tu/MvuxK.+)U/D]C#1O+Wp1/s2_;P ota i1+i8CbFIeh%`7()rz&');
// define('LOGGED_IN_KEY',    '6;XR,0_XW.g}|*:NM!)~+a(+D|vgT~mGU{drB8oI)QZ$2(+r]8s,7z f-VgO)djy');
// define('NONCE_KEY',        '%T-y!XbwYKVA<P~|G1f6EM`7pH2kv:vt: `$Yey#]tr8C`c>%/Tdf!%IN2h`a#C>');
// define('AUTH_SALT',        'kZ*o|Y6?Ha30&y@?5q,HmjbFF&8?Oc+D-hX[y&ij|D-+34T|e.c1$-+,E)gG6aGG');
// define('SECURE_AUTH_SALT', '{P2%$~fHG6.>>@F^hd2SSABB{I@o1mCSK-E[9F$(p9#u;T-e[<+C`os<uR4aD#7>');
// define('LOGGED_IN_SALT',   '!C$OB ePwX67;m|;(]7;HFvr0q$+XV-OuU<q4@[zm*7-QY_SA~0girMq4S6CRIg~');
// define('NONCE_SALT',       '@|h6U=d8`z{C4f:kV]W^N)A|,b-s+FFlV:FIS.De1{4{`Ho=L@fY[+HYG%cr$#*m');
