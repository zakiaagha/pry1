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
define('RELOCATE',true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://localhost:8080/wp-test/wordpress');

define('WP_SITEURL','http://localhost:8080/wp-test/wordpress');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'K 4-aI0(nFLq^onFyNoS:,)_$Mv6(!3/62+Cv?3>T)+)jX-6{?aiTHShlYzbMM0R');
define('SECURE_AUTH_KEY',  'U68nu2YD-VwNc)0dP*~p51t0fL$5Qt{S(v4x:~O53B m@Po@ ;2dN[gY|(P^yY?}');
define('LOGGED_IN_KEY',    'Oi#nT0=d;Sk&[092APbC8Dol} </u8H5jnGl18t:]Anz5w,j2OmMj]Fj(n}r.[RO');
define('NONCE_KEY',        'J3;3g2XF.g@{}*>1D|FS^`%O+yY$M<-<%5~ifBWec BBv@~M_!YP8NP)nS<UCp@l');
define('AUTH_SALT',        'G(QfO`B:)wlM5Fzf.zlnx2n>`~d2Qd>MV%EIr*nC)c_A>CXFYt{s%9LTw./DyGkw');
define('SECURE_AUTH_SALT', ')[NwDvY77pu;|(}j+UHa!n<u #*y]*`&%H-gA.2WaQs1Z2>7j&C_1d{X-) IUWYg');
define('LOGGED_IN_SALT',   '])$3N C7~8=sc3^(,%fK=^#`n0].$T4!]efs]0J0+;_ z:2_Nt)qiY7}0SIXY,A*');
define('NONCE_SALT',       'FP{O]2A{g6-ck^6uLI.uK0{)KFFlesL`*aH(DCp;QWZocR V2EF36qL$Q,jfsLEu');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
