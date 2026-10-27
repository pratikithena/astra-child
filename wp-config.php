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
 * * Database settingsGG
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'devUser' );

/** Database password */
define( 'DB_PASSWORD', 'gJO5UTCUiMDLm6Gy' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', '/var/www/html/wp-content/wordpress-debug.log');
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

@ini_set('display_errors', '0');
@ini_set('log_errors', '1');

define('WP_HOME','https://dev-website.ithena.app');
define('WP_SITEURL','https://dev-website.ithena.app');
$_SERVER['HTTPS'] = 'on';
define('FORCE_SSL_ADMIN', true);

// Enable Redis Object Cache

//define('WP_REDIS_PORT', 6379);  // Default Redis port
//define('WP_CACHE_KEY_SALT', 'ith_');  // Add a unique prefix to avoid cache conflicts
//define('WP_REDIS_DATABASE', 0);  // Optional, defaults to 0, but can be changed if you use multiple databases in Redis
//define('WP_REDIS_CLIENT', 'predis'); // Use 'predis' for compatibility with Sentinel
//define('WP_REDIS_SENTINEL', 'mymaster'); // Name of the Sentinel master
//define('WP_REDIS_SERVERS', [
//    'tcp://172.21.0.6:26379',
//    'tcp://172.21.0.7:26379',
//    'tcp://172.21.0.8:26379'
//]);
//define('WP_REDIS_SENTINEL_TIMEOUT', 1.0); // Optional: Timeout for Sentinel connections
//define('WP_REDIS_DATABASE', 0); // Use the default Redis database
//define('WP_REDIS_TIMEOUT', 1); // Connection timeout in seconds
//define('WP_REDIS_READ_TIMEOUT', 1); // Read timeout in seconds


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
define( 'AUTH_KEY',          '(;`D0qhCT F_xLhL4M$WgI__}B7,<U_xB!TWCO#YIyr FSIOw$j=5,wBUM>~_.S8' );
define( 'SECURE_AUTH_KEY',   'R]DuQ*fXyP@*]M0wqWZb^5inm!Gm&)~Iz[SscCh0WBz=eS`^>#iX{Dhmhvy[),r+' );
define( 'LOGGED_IN_KEY',     'xE8gU0sSjoFC-:P1L[<J/1Y7:!mEI,6PYD6,QCR,[j;bCRoz`:sN}wRi&(%cLqmO' );
define( 'NONCE_KEY',         'SKK5T[Y9K|A}3HrrEp;1lXy9HBG=gI$XP-8(:#,=GKXj9T`;[JpNVF.h0s0 7o/?' );
define( 'AUTH_SALT',         'K4gg@?v;S,O0Uz|p7XPH>Jok%uQQ;u8*ZJTDT]hwIZhxelJVSaC-<gK)BK~)wU9-' );
define( 'SECURE_AUTH_SALT',  'OQH&U$G4ul1UK7d(~B[b=S$$i]O`27i(<FkHJl[.zgbIZWKXi%r?tmFYMZJk}dxW' );
define( 'LOGGED_IN_SALT',    '[9`.C!7?/E[Z[n+j*-Kd!cIW`D!efV81qpf{f@|2)l.SBwtpdP.E;[ (Qah}q<QE' );
define( 'NONCE_SALT',        '6->oHX<Ws!2qF,M&J,fz:~am:g{$>v#~;CZuP*JqU-b{`26+f|zEeL32Ehyu24W3' );
define( 'WP_CACHE_KEY_SALT', '|D4:*GRJT- +C3M+=#v9D4#.sdyV_8,dzkn@z>S%*=#8BQ$U#?%B,ioI(. jsZ~m' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

//#  if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'] )) {
//#    if (strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== true) {
//#      $_SERVER['HTTPS']='on';
//#    }
//#  };
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );
#  define( 'FS_METHOD', 'direct');
#  define( 'AUTOSAVE_INTERVAL', 160 );
#  define( 'WP_POST_REVISIONS', 5 );

define('DISABLE_WP_CRON', false);
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
//if ( ! defined( 'WP_DEBUG' ) ) {
//      define( 'WP_DEBUG', false );
//}

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('ALLOW_UNFILTERED_UPLOADS', true);
/** define('MEDIA_TRASH', true); */

/* That's all, stop editing! Happy publishing. */
