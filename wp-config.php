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
define( 'DB_NAME', 'comnhalinh' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '|4.c%g.@[Zl^sWm9N}?#6r?~lfYcC(hD>Z;l&yAsGK$2c5ISj#<y?G*gqhNfD!-b' );
define( 'SECURE_AUTH_KEY',  'k^YYIF,Zr-bKq2IH+%4GO7JG{x[CriKR[je@F(vosR+GSF{AT[Fy7dMP2?Ci#oGQ' );
define( 'LOGGED_IN_KEY',    'wGO#?/yJ[=Q[PWbUu;E{%SpRGNEKdbI.d32lzyYo#;^(>lYi1mT%,koaWy|jsY&j' );
define( 'NONCE_KEY',        ' #J#&wfkX{{^z?*06*W]aHywvs@h?KE,mC{i:`C2^fr713,2!.XJV:IS(GS(<?3X' );
define( 'AUTH_SALT',        'mt;D=Q,!K $[5uA(~Lj .B3me&NR<%XRImDnbe*cgv#pbqV$Y.1c5W&fhIAO&C5H' );
define( 'SECURE_AUTH_SALT', 'QNzj[Ucttna|j~N56!ZM ]IU&sL{bWJu~<)rFxhVrXk/rZ=CEZAD!kP;sMNzpETr' );
define( 'LOGGED_IN_SALT',   '!,j=)sD4nvGtFwM$fxx|#>R4.Y(:%w9luA-v_-Xk+t,Lg/8nT;8TrEN).]F;`CpM' );
define( 'NONCE_SALT',       'pl0EQm-XmqjRo!cPppUyZ6%[;i5AF=wW%.@YqsGrL8uZH&J+l?>}B+b2tj[7.x{+' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
