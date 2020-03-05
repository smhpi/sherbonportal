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
define( 'DB_NAME', 'dstportal' );

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
define( 'AUTH_KEY',         '~He{-ymjrz>JV8LIZ[&(o;j:]XWrZl!JN|t;0;B<q2<gD|uB`f1N-,u{+Q9%)iD9' );
define( 'SECURE_AUTH_KEY',  '2:GL.##OVm?EsdO|E~(UNvu?:9DU-rK-b}5N{YdFnw|Z1!6A aWZ}1^W.Jnhl?b>' );
define( 'LOGGED_IN_KEY',    'V05g|hMf224*15B0j%=yk^=y*S=|yzy^TG@K HyM%iMz4rIBdcteM.w,u-XE0Pwq' );
define( 'NONCE_KEY',        'D+(||sZga!An92#dB_>H|aMFYsp*?3yXGAtf;tkN:&vlX[12JW$VdgD0Lx~|41l!' );
define( 'AUTH_SALT',        '[9jj6n49E/P?XPzaXT3`dR^~)d4Io3ef%E%@BC`n|!,tzJ,!bYN*_0][OGsY9^p(' );
define( 'SECURE_AUTH_SALT', '-#iAoZ]hsGTy+QrA.Pkd?m20(LG]lpySTxethK]%kiIa&LpQJh]e#N[tsmuyi*A;' );
define( 'LOGGED_IN_SALT',   'Z%b)1>=|T*PF;zj{H!wBl-Kl~|=sEw{^tKW@3{JlgE=@-(P(hC-;;?ey~+~gLry3' );
define( 'NONCE_SALT',       'L42RO!D37|/.c!M-4fx)+uvJcsH#ubqA{(BZvyCl2+=gT0Ll2R_z?|l(^=!;+qr`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp23das_';

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
