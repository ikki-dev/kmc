<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kmc_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8[pxCc8CAR~LhZ(`,pfFi)Ie(a{+_)FZ[rUT$+n`=8Nuz)U:.B]gDp2+iL^d5XMQ');
define('SECURE_AUTH_KEY',  ' =XX5C4-r%Vv:.|:58[,G+lAvAEVV~u5ZQ7*G#W/WV]?B%+{UM:Y!|XGCTj4F+kK');
define('LOGGED_IN_KEY',    'J4#R|6eOj7Kj],[gL83mgw+Z]r{XA_yb}-aT.,>8-(E`me0`ChOZf5udEJcAhm|F');
define('NONCE_KEY',        '+ppt)-xWe&cJ+;aBA#S<d[ uj+g&;-|e=+_6go*luTH3=PZ/PulYDZg#!$gVDs9p');
define('AUTH_SALT',        '(Z`Ijy3`_%LMm(Xu/H/]q$G3J/S_/^ a?yE}TR.IrY!eoPN;fkG(cJpv{_)F3~vw');
define('SECURE_AUTH_SALT', 'ZQ$zgtU4~RdHH4]jv)9+}J.^S_Fa;^ii-F#gdv9IH|]|va@M/>.$n!M bT?5(%Kx');
define('LOGGED_IN_SALT',   '}~6uV%6Ot>nFi|&iTr6<2yDk]r>&z!wTHu5F 9VKjruE=>z0Et.~XJVDE7>c>OAv');
define('NONCE_SALT',       'PeMP`)fu}C6z}xzik{+-/C(a`nnoEX;JDoAr(INW ~DLzlm:S2:<;ulXBzq*T)Y/');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('WP_MEMORY_LIMIT', '1024M');
define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', 0770);
define('FS_CHMOD_FILE', 0660);
