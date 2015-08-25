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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bytbil-hemsida');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';3BB3a5jVSF|Y2s+}IjD4A+?CR]D#dgB98YJG,VCZ $?M6}uL$^:t?e{L5gxfqK^');
define('SECURE_AUTH_KEY',  'ad$L/m:w>a#FSs*UT-K-855JdM//E[Q-&Mgd*|V8-B{7=+vpesTA_)2dz;/SO>i>');
define('LOGGED_IN_KEY',    'vIpEXD{}m}~jYrzDK|6ZP-exE,#Pl{T<CFQ_@j|B/n$WTDXNK;a]Vs)!P^~km0hy');
define('NONCE_KEY',        '-3|bnRB|&n|H{Ph1m{nY+/U*K;].&+.sQ+N{B//pJcB=2VO2*:c1VlfE-Sq:^?,]');
define('AUTH_SALT',        'br[k,%FPXcm8+3*LK1H8{ovHP}FZgpFnZ0$IG9U/*Gx.RfR>AuS|,uGE09.cv#6h');
define('SECURE_AUTH_SALT', '2@u|;>bywBz4@E7<+-rF6ADy}0hvswQa3Lu6)b#;zaCg%g~#+G53Xx+=+[)e5;5U');
define('LOGGED_IN_SALT',   '?Q3e nh/mK)kli{)z)]JH/@zgArNN1hp]&GIpDO-r)F-jsG|;G|a]o+%7p<%EPBD');
define('NONCE_SALT',       '6u_.S*/U[WnL++Q-|QY^i g4,5cQ<jJJ  i5xu=(1 %Bt%/Ww#-l|?EeYmBW/bA7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'bytbil-hemsida.localhost');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
