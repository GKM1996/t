<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rnd' );

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
define( 'AUTH_KEY',         'F ozIu,,cI;k(`M_DN4e<IC)]pyj?R*#&lF_aiA5D?rQk}N|O[9N&;`4:s-k*/#+' );
define( 'SECURE_AUTH_KEY',  '/P`/p3a^+J3yNB!<& 5x*-<(K!J[j qALvnM1yM)7CzxS:Z/uA>wBgK2kywAT.M=' );
define( 'LOGGED_IN_KEY',    'm~8oV)99mxtrcbypk}>C4s0,:m[m1$%#rFqyO^M_tVOt<xlrm<UosN4dQ^kF/l,e' );
define( 'NONCE_KEY',        '8.B&1T k1Rka- x;Lz`j^T#%X4^)=U(!8H5};UiJv3r;p}JXB|^`(:(n<C^K?|>s' );
define( 'AUTH_SALT',        '7]KZ1B+znm8mk7=TX!LhDyG$=P!c]j4zVc:R3L8Ua9Jnk&%* [5N-F;NTt:,yUl<' );
define( 'SECURE_AUTH_SALT', '4B~rX6a8Jxv@<G~{O`Rz4WGFkqlIoy;:}G9N_L7BP&bl}Zbj06x>(&AM0gB~KQTx' );
define( 'LOGGED_IN_SALT',   '<P)gjix{n70Ppaa*==[Tg6wF(v@!Tt;8w!*[GtS(Yv$a) }7Srf*OS$~o9W-iPp)' );
define( 'NONCE_SALT',       'e+Fa6% ua49x[cg/mn;l^7O>X.?Iu*zz|PM]LwUh6-RAPIRKzw<`<V{&7oKM}h:S' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true ); // keeps errors hidden from frontend


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */
define('FS_METHOD', 'direct');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
