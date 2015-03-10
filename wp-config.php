<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Read MySQL service properties from _ENV['VCAP_SERVICES']
$services = json_decode($_ENV['VCAP_SERVICES'], true);
$service = $services['cleardb'][0];  // pick the first MySQL service

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $service['credentials']['name']);

/** MySQL database username */
define('DB_USER', $service['credentials']['username']);

/** MySQL database password */
define('DB_PASSWORD', $service['credentials']['password']);

/** MySQL hostname */
define('DB_HOST', $service['credentials']['hostname'] . ':' . $service['credentials']['port']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

define('AUTH_KEY',         'SdbGiPO]BC|7) *;E={+u9:*||E74Qf}4.|Sp|d|s]DWnRGXF|y^)=u`Q+t1v3|c');
define('SECURE_AUTH_KEY',  'uF,SvPVM7cn>>jFt!Z(^CCycYo5=c@2Z40M%-fg@y]ly|a4~^mlALhSTJS1Z#<w#');
define('LOGGED_IN_KEY',    '`1KI1r^61PH|VE8lw`Orj&o~.8!!w11*6o~=Gqt#xo=NaV*YL voV$@;2{F,TU8y');
define('NONCE_KEY',        '9&.7{|bRgk+VKWb`ca0TuuiziV&bQ9A|(w)CY&2jwcax41$Osi!(t}Xy=mp@7C&7');
define('AUTH_SALT',        'o4/6KL_<er3Bl(8iWB&dUT2I<{EPLbFWQEUrn=Lf=L?tbg;`;bBe*{YHt;VQ-:zm');
define('SECURE_AUTH_SALT', 'Y9!X)0Qn G-`fK|XCi~^}QpZ?z;q-SmvJ9p$]>]`-COqrhCA)-$AbJ$6P`W-Y{il');
define('LOGGED_IN_SALT',   'ijzQ2g,c]-}WU|V@;Xc:5bK>oee]qg&^J8/.|3{:IPq#3V*%MSe>9+4q.6Q@,.O)');
define('NONCE_SALT',       'HdEAmB6u<((Gb(i/XShiTjVz=`ym.+_^q*-wGZ~!CUN,!BVN@$~<`JRua~AFx63o');

define( 'AWS_ACCESS_KEY_ID', 'AKIAIIRD3ZS7W6TGX64Q' );
define( 'AWS_SECRET_ACCESS_KEY', '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' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
