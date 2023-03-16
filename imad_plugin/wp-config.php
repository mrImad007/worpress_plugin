<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bWkW~tK)V%ZL,sCschN.%y2}N^ej^-?Ci:iQl~uB, b b]tK0_R^z`;2[Nk.Str8' );
define( 'SECURE_AUTH_KEY',  'bx7u(FroL>!Tu=W?9jW.E*;3(y7`^2Yms+Z1?!s4|cpJ!3[hjGBcDx.@:T-p>b=c' );
define( 'LOGGED_IN_KEY',    '<KB%|Ah&4&@43w oP},fh1!lrr)!/WuNk:AtaPm8CL`_S8EM@$W_Ph>/9e!snd5.' );
define( 'NONCE_KEY',        'c{bvKBBF]ReJXCkWHutt+|MK!=JAd{>:j.*pM*u89gjIDZ:gq!^_XvEwk!K$%jOu' );
define( 'AUTH_SALT',        'uQ(9VP*n7.+Q&AdAs7fb%:$q?l Ie)epsI5C/?4#kO}C[+ )z6qXNa+GY40$4m45' );
define( 'SECURE_AUTH_SALT', '1w-lvRIP;slqYcGZb8a9@D;R:j#P52JL(N=eVUM&Xf8PH<`SmIPO0H7I8[fYZ2e5' );
define( 'LOGGED_IN_SALT',   'qi~@YT~&hwm S5)$(ugJF:C8o RMP%D8ry76GI* 5VC-9#q_7IfJ|fwfS%#7+ws$' );
define( 'NONCE_SALT',       '-f)DchnS2(j)p~#U=~x/f!bd@k>nV<!L388o_fNZ`4qC3Y^K[<$*wPkNZ{QFu6t{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
