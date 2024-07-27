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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xs682415_wp5' );

/** Database username */
define( 'DB_USER', 'xs682415_m0f9p' );

/** Database password */
define( 'DB_PASSWORD', '97u1frkbls' );

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
define( 'AUTH_KEY',         'jWKAVsyjWM)fK7524Y#3sZ@gr5e#F5zp)Lv%&8vlmJa]brU!vp.rYwGT+.:iI$iQ' );
define( 'SECURE_AUTH_KEY',  '9qEQoJZ%GJp,iEp[yg4W[])QFG?$H83_t)7{*a2{% !E_k8s~Qb^zsaPG^Aa[t7-' );
define( 'LOGGED_IN_KEY',    'o:=4d(D/j(mbrM%4m#Otj0fyp O,AXe*vQEF$X>%z!kb{TN0muS5j`Ty/)g*f{qn' );
define( 'NONCE_KEY',        'jF#]ET$K&yN4D#3hR(y@2K:JC|MF0siO~TZUH.QZ,{cV9{,+5k--1rg  T &_)?O' );
define( 'AUTH_SALT',        'I/0)>q*tkq%kj@ESOHlc66sqymhoryX}2{ E+iZ(IBsIX$e$h=Aa4t fXQD[Tg:z' );
define( 'SECURE_AUTH_SALT', '2q: 5]je]E*:j7$Z6NjA}UybVOMQ2f<5{lz)|*OvqfzIP*/XOcP(,gH/V6M]r0Q{' );
define( 'LOGGED_IN_SALT',   'G<D:] mt<wtG%<=xn^u2vg^AxX.-i*HyI,m^Vokf TPme#E_gb4qu5dh/Wvrr:i4' );
define( 'NONCE_SALT',       '*Kt05U*a[p5fl*/Wqu<_$!gmJe#S/5@).[4T`1jn:n@Q,CY=$+| +j%oO.Ut@Mn?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'casestudy_202408_';

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
