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
define('DB_NAME', 'grass_tw');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'grass2016');

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
define('AUTH_KEY',         'VH9-J_J1MH&t%)wQ^!@*cC=~].,</(MUM/wy&Du`+,j4YWxIi+|)G)49_d]%),*f');
define('SECURE_AUTH_KEY',  'CtOh7HQ;Y0/lwYM;)5v$FV)0;oiFQ?+nRB*a[mqbNFgL$:q`PJK9Jp}+DPl@Rb2P');
define('LOGGED_IN_KEY',    ']K9+d@ 9*,z8!#OeaAY),??!&b5|p=-qJ};{3IL8IN?0qA,UFx}a~{TtizOO*!Q ');
define('NONCE_KEY',        '9 w*g?,xSt`}R;_TapvGZv:S%b_3blY,ek}y` & MWD]Z Tg@WU7gn!SfSMH:Q:#');
define('AUTH_SALT',        '9*otf-t}4Yy?|YXf>}744NWZnQ*5I>OI?b]gOIz|3X-VTFnaZdpykqQ;Hi&K?xaD');
define('SECURE_AUTH_SALT', '4)uJP-.SFR;Ak9:f]^>V3HpFiR1mlMwN>)HBbgmQX75IDV=<p2[|nB+=e*9y_?7s');
define('LOGGED_IN_SALT',   'RpOf!+>z$ o>IuM)RM[_zr^$ s `M`2hgB%Rg7IE6i&LRX|$f{,Ba^46!!4U6XXL');
define('NONCE_SALT',       'E lAM&~dz84;C=So3fwM8m>6Yt(wWii%E=$HcE4Q+p,@S4-@d9QOD>XV~?=%]OLm');

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
