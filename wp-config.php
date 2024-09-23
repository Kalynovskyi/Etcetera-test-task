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
define( 'DB_NAME', 'etcetera_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'aM;&7d4f1_%Tq$lu4BRX,^pDn=QUW1yuAs(zwcHR3Fd9eM%__LS#f8ARtAiGQ-*5' );
define( 'SECURE_AUTH_KEY',  'nh[EvwWc9l;L+l`5qiN`=Up.KaicN`Yl<)_x8hgG 46Ug{Q@K?/3DJ7=OWDrz;7S' );
define( 'LOGGED_IN_KEY',    ',^Pr$];tsZUN{LrZG)p}z4e!+YLw9js%=N|V`Lfc[dAC16{?{e^Jr}zt5o&9Ucu]' );
define( 'NONCE_KEY',        'hxumzCo/^y8}8CC>p#q50R^a+%~apA|({9Pe2U]]it?zW=+F ~>hWfFm;%@VW37i' );
define( 'AUTH_SALT',        'l$ &,E[WrU|.)2m$I=Kv+cg!Xi/Br#;d  .wMaR|KsaJQ7**$<Bs/>8~tp&KvAhp' );
define( 'SECURE_AUTH_SALT', '>mS|>vkT*YL:@n6:x}d7s`CpjeGE+IO6@d;PL||{-7P2PFfL,~/%_^;^ZJ/+.Pf}' );
define( 'LOGGED_IN_SALT',   'mq(uwvdP>5(W+&#. ,8?,=@CjG7giy6@Yx,I1$*&2(4IhA&mVT8fYA{e_S-3sb.U' );
define( 'NONCE_SALT',       'M8]bb5I_ngmm-*<&eOT)VBgOM?8~@MT}3 ,Euv at/zUx.hoIzB*r$z)or?s?MVy' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
