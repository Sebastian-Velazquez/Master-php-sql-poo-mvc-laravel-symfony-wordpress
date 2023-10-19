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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aprendiendo-wp' );

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
define( 'AUTH_KEY',         'To1hVvnN_AB9Y&7|{lglhCQ;Ru?^1mv7AS%t-e<,(T#9ck}[r7*4{aG2qqe}FljB' );
define( 'SECURE_AUTH_KEY',  '_87>ngyaj|^S ,Ymxuw2rIjqBW1e=E(z=e@{y8thWLP2@Tx?tXkzh-^YjP|tE%ce' );
define( 'LOGGED_IN_KEY',    'ti~2gt0WcG4%Prl$qIZA7]2lQ1O4BOL`BQi<_50Gk!r(g?W1`U#Ew 8P+QxI$7GY' );
define( 'NONCE_KEY',        'KEV{hRE|~:XcU=id@MH4MOzx+Mg[*&f,DT}qVlR2j8.RU0e/a,PN#=YCP;SE[NQ~' );
define( 'AUTH_SALT',        ')Kg5arlw$vRi(X$ cpGz01C{a^&46K@@b;iwtCc]j_.lE7RqnCPgFg|yB{=w/7#r' );
define( 'SECURE_AUTH_SALT', '+x[Wh}^u6ACY|Jr[si:L`U,:76flhHM<I/2&s}n+ijaCV4y<{?i)FrGno7<gYnAF' );
define( 'LOGGED_IN_SALT',   '`:G,sjY&-u5T#+27a3ds27oAsL&F>YX@D:TKicU<Hs0o>>DQL#CmbX?ldni79u=J' );
define( 'NONCE_SALT',       '{>=5dK3S@}Mop d;X0Gd.%[@U#j?CV`R&nml9]~)!^aa~K2u>8xIkfqYe(p&#5}j' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
