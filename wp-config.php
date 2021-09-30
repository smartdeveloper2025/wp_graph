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
define( 'DB_NAME', 'knomad' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '8`hp?T@7-oa1LT1;+)|-}1l.c4XYlsKA}D6:OTkhx$oP+LdWVp&m3Tug9mwBe!rN' );
define( 'SECURE_AUTH_KEY',  'LC}g=>+*;[y(.q)qV}/92F4,U<k?t^?6%1{:R]H=<v:>0TF}:a`;uX{$p2yqokD{' );
define( 'LOGGED_IN_KEY',    'U^gNH,Pvd9Dt*t8!g3O&w# qn+%v3?/UzbatT.;g/#9dge8,#,Lne!HkG[$Ecym$' );
define( 'NONCE_KEY',        'u;]Bwm<^eU(><,745L#qXs-];Q%1h4Ct#=s[Qg;g(Tf5k;4R1ksXfPg&xs]Zi6HV' );
define( 'AUTH_SALT',        'RcCv>3;q/vWT&suhW;M$v@=1Ia2LyQ{zRb,%8=O+T?EI9M)}]bhKN>?@-=CBHl{]' );
define( 'SECURE_AUTH_SALT', '&Whd6ViXPuULqAyT7=+cj(Ykm)XlDo<iDyr/^B((}M3B*5aN9U&SR|kd`1FQA#9h' );
define( 'LOGGED_IN_SALT',   'Zl*vZN|wPCofqQX!1}}DH904;S#<1|{|Vf}c Z98OyNfxtUt!twgckrhVvtJ,&@1' );
define( 'NONCE_SALT',       '6I]^0nv-1S@.@0EnUCra<EYhsB0yfHMEI==>_leSDKE=EGJDxeTJj3ZDbJ<j/h2f' );

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
