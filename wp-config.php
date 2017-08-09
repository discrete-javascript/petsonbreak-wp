<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
 //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/petsoprs/public_html/dev/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'petsoprs_dev');

/** MySQL database username */
define('DB_USER', 'petsoprs_adivaha');

/** MySQL database password */
define('DB_PASSWORD', 'P@ssword_123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '3-]>{TTmUWY|P]pXv/.lSr.lf_K7O:0u5aB=|,u-KB8iI-MVNnLyI>FWf35fRxD{');
define('SECURE_AUTH_KEY',  'U=az}B6 VUEpNxhi-c]UF^Zx5GR@?!JaXp&CVQ16jV#{0lfsU2C4r];J=2MV/mW:');
define('LOGGED_IN_KEY',    'U{At%|+9ufh% kf9*yIE=+nUG{8E@pmEg@jLEeUrGO qoZQJR_:GAb]eAvdqP6D&');
define('NONCE_KEY',        ' G[[yCC`o?spqI/svm<4uyVXD {0}{-!94*pl<LRciH9RS]EcDl0CE*Tzh?3hq(O');
define('AUTH_SALT',        'J?/h#|fq?#b_krX~.0sNRnKS)$%5<x<,JOnVp57Q|WCi*6i;ib!4Hv65/0{!q(#;');
define('SECURE_AUTH_SALT', '$2O6dPgVs327ZB&_s2KOJjOu8rMqbY|U9>[Lg.[:L%LXX7Oc,t9=~aA!cb(ELK6G');
define('LOGGED_IN_SALT',   's4mgfEN2o:;^:Vu4|qTb~EtMNa@K PPL%}h:Dv?K1kDHhW~-bO<8W!ZlItZP>IDP');
define('NONCE_SALT',       'MlG!5np48:W5J{cROO-#c-:x4;ijaXP8?[Dmu$bcprWC1zFhNAfqg/{:RL[Da%Fs');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
define( 'WPCACHEHOME', '/home/petsoprs/public_html/dev/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');



