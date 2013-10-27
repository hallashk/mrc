<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'antibot_wp');

/** MySQL database username */
define('DB_USER', 'antibot');

/** MySQL database password */
define('DB_PASSWORD', 'H0mepage##');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'J{e`/5r+:}BbHvC9x{ Cn23:sWao,4J~en=6<J3llo>-Z^Xp00@QJ78%5Nqkg9h|');
define('SECURE_AUTH_KEY',  'Uik$k~Z=&tc/O&Km$Zpp]A7K!//V5O+LG)xR>1PfGyRJPBZ,69$;LqMUD:8E7~Ef');
define('LOGGED_IN_KEY',    '}90>KScwn-)TL8LO}ZB_Tp@=sF6lAKr&)Q=?xF9.3Vz]3|;ye<j/ 2:B5$Te%dXb');
define('NONCE_KEY',        '(P8;k3E7fts8bDVu.aE;}C??]j.e.rp/<uz]|z>}d(wjY_pv0XVn%XzVw0o)uYx|');
define('AUTH_SALT',        'Mmtw-%niQzk?l^b/sRH7}<]Wo&Fy&@yd0[}:&e%>m,ON,;K[=vw+b4b :)z&IkPv');
define('SECURE_AUTH_SALT', 'qKCR__d{W$@GL6-8 PhN<ZLeU;2K~TFm^0Wi:Mh?;c#cw1OX+=;nNhiRlHE=+f&s');
define('LOGGED_IN_SALT',   '^E}|iGnk~N_e%vZ}p}ydFp{v+~hj}Ww+hL7PXSR(xUl@#B :~|;=YkU1?XBC]oUE');
define('NONCE_SALT',       'g!`!5Q0|t0iosjR-OP$1K3&eb5zHbP.*}%*uOr|HChU>IXZ3QJQ{<wc|gsMld4]O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
