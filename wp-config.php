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
define('DB_NAME', 'rickam5_paperlantern');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '81 X41_z swXXHdRf7;{(?8^V[[OXbQhg/^4<:b&n<Elqn.+b?A2<}Nm5Q2ORDp(');
define('SECURE_AUTH_KEY',  '=pMg&a`|uXrO/68dxX pY3a{8n->#65.PRm2 tlQV+cT~-|=^J;H)co>OY^FL@_?');
define('LOGGED_IN_KEY',    '^l?v4k!P`}M:tj+#XQGFCtv^1hU!zc4(]DUN@/6P(h6PGKCzL,gHI4U`vb8xm#Ic');
define('NONCE_KEY',        'wJcwJ 8;JWXD>UX:W>)v|%~%AE`.LS6b;gFmv8g}0OjyS$]pf8R1Mm~G%k^=*1PN');
define('AUTH_SALT',        '1m~|r.8(AAz}W?AL*Zr-OQw[nv/#)+dtNI~x@EgW4M>GnODE}`D;*Q*aY_.#c/tb');
define('SECURE_AUTH_SALT', '^x}&9J%EjvL%XCe9k&utFV7_?)D27cpqt,Y !5`m>[ ~Ly=Wy n[LkX%<=!UKXp_');
define('LOGGED_IN_SALT',   'Xb_$t#01)jIF6Q~J#w!hND8W*v7NcRJ>Mt8hR0G:?_=Kb[%+HWoa2VL+e=JzZL_W');
define('NONCE_SALT',       'hRKEe#/d+frYP&iJqy1mx!}Aq6:)j1KP;Xa%h+)9*svjBkC7S6I:j s8VM`SELn9');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
