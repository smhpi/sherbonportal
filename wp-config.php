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
define( 'DB_NAME', 'portal' );

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
define( 'AUTH_KEY',         'e=*Ye-EH9y{G= V!Jys3%NU(a}alg4C-8Wv](}d*.o^?1)Z2By9VCY`l~%;Tm;&+' );
define( 'SECURE_AUTH_KEY',  'j{-)%r?3m~j;w1lRV))|QB<^(gDm{9jf2cyHWgm7F89kFqPNPxk4eb[=*K}XDt%V' );
define( 'LOGGED_IN_KEY',    'Y9Em rcJ^9u Q{=Hwm$/PJ^*jH;}mab=d<{2p^kFEo|TQt#Di^Dejp&*V0x&$*fS' );
define( 'NONCE_KEY',        '`RQ.ezrx1f~zV(@XF/Mj8tV,vU&Yw!IL)-60qRWX3w|ehVHqsKg19:tRU&YWP3*^' );
define( 'AUTH_SALT',        'DAIWkO-+gkP)ftI`8!q]|&T7R ,3CfS|dj}qIoWS<oN!mmrAT 3`vG/vG}85$?|y' );
define( 'SECURE_AUTH_SALT', '6[XFI(rVoJG.u65XPEyCM)3D,k*!;8;slmoz$g:@PU`-UFt, V[ViYKIVpkdo%&S' );
define( 'LOGGED_IN_SALT',   'P|0(>tlNpUr,J>#ZdFO<ik!U# <9VL)<e]6C[>Zn0xzf84a-eOGz*qw?d8BCrE4!' );
define( 'NONCE_SALT',       'J(R|q#Z;A5pdh[gI5G,(97}.M+-b=nxlNT6X+]<E/)0hdsP!il66VnV9..bc&uRr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpsherport_';

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
