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
define( 'DB_NAME', 'db_salvador' );

/** MySQL database username */
define( 'DB_USER', 'adminwecan' );

/** MySQL database password */
define( 'DB_PASSWORD', '_*8gTYWqM9FHU' );

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
define( 'AUTH_KEY',         '3k2*MFnkW&L:!mOf8@C<].l#}?|Tj`>13ELzvQr~+N8XpX%R!36~7Hd{;{3!i!*T' );
define( 'SECURE_AUTH_KEY',  'UYYbMy%gUYY*lhFPRzISIdNFn%~rpM,5t$Xn*U(#be8gXC5.?cwdJOrZB<P0}&(Z' );
define( 'LOGGED_IN_KEY',    'cC3S+E;HlC7=>)3%|o().jw_N7i%naTLw9wl5m3&9aZ5aWex)!{*<Dc{r0Cl^EQA' );
define( 'NONCE_KEY',        'a:;hf4oi3NijBzEG!I<mHKJ?.ulJRf2UOQ$=|%3i RRg|~zKRJ~P7;Jt?`>lRn?F' );
define( 'AUTH_SALT',        'ga?ht!]#m;Y=PD;$8V<93 n:Im]4mUL8%R[fBD<|Z?$}J?I-MQ6uN2r%vjY{_qsO' );
define( 'SECURE_AUTH_SALT', '|VY+5{yI.dJ.(S}`f1@LE?^Sdy45sP&:G{29s26?7z2s+KYrrwdCK!HhF J)OE,Z' );
define( 'LOGGED_IN_SALT',   '7BiWWNp>Ywa[lS`s!M9o/|-fc:`2y7p/w=G87-S4+(RE.cC|@1vhlQq,Aap_x1;k' );
define( 'NONCE_SALT',       ' 3k:$vQ?fv!$3k[!*QFPor7zaJdh3t}@3Q|l6etryT/YgR:>*B&?#8WV<FbqN:lk' );

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
define('FS_METHOD', 'direct');
