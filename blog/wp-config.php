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

// $onGae is true on production.
if (isset($_SERVER['GAE_ENV'])) {
    $onGae = true;
} else {
    $onGae = false;
}

// Cache settings
// Disable cache for now, as this does not work on App Engine for PHP 7.2
define('WP_CACHE', false);

// Disable pseudo cron behavior
define('DISABLE_WP_CRON', true);

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) {
    $protocol_to_use = 'https://';
} else {
    $protocol_to_use = 'http://';
}
if (isset($_SERVER['HTTP_HOST'])) {
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
} else {
    define('HTTP_HOST', 'localhost');
}
define('WP_SITEURL', $protocol_to_use . HTTP_HOST);
define('WP_HOME', $protocol_to_use . HTTP_HOST);

// ** MySQL settings - You can get this info from your web host ** //
if ($onGae) {
    /** The name of the Cloud SQL database for WordPress */
    define('DB_NAME', 'lokesh');
    /** Production login info */
    define('DB_HOST', ':/cloudsql/dhaneshtest:us-central1:wordpresstutorial');
    define('DB_USER', 'wordpress');
    define('DB_PASSWORD', '%6>L$5j<-D@F5xO-');
} else {
    /** The name of the local database for WordPress */
    define('DB_NAME', 'lokesh');
    /** Local environment MySQL login info */
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'wordpress');
    define('DB_PASSWORD', '%6>L$5j<-D@F5xO-');
}

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
define('AUTH_KEY',         'wd+gPE+Q5TPEqPOdYqDXErIwqFlkNiB4J7rmrebT5Rp1kwPKF9eT52TJqrdGJnBwdLi/xrJnaHZXJuhm');
define('SECURE_AUTH_KEY',  'TC72wk5gUKeehiQ7GXj6/EvBDlMC8qGTCnq1JkeZfaOnWDGhNjvz6sD0wItUZCYD5uJEZM2CRGSI+OgB');
define('LOGGED_IN_KEY',    '9HIneVOMnFy8K3T2SJEC3dOAzmHd2g/MMnc6InLZesOqCcRTZj2lCVoUbaZYQ2nmd96RttbyUzBtSmUb');
define('NONCE_KEY',        'kohp+lqrtdXyvfrfB3S6K+eQ30XaDnv678LkYU/O7i7J8+aO81ZYe80DHGZG4Jnb8CXgyxuo1/ap93gC');
define('AUTH_SALT',        'YxpkBsf8JEcpjuNJHZSJkNLhwdRkVUDPmjTrYRsmm3DUskKiklUX+FCBBbIHsVAzei+quFVJ+veVgSN1');
define('SECURE_AUTH_SALT', 'IpTx0YJmpPdNlA8v2p3ETV5+8Oqb/xr37IEaVuClDM9xSsmbFcxqwI/TesJC+6a6KjmwALHLUHsj/dx2');
define('LOGGED_IN_SALT',   'az9FSar+VIaZk+dkJ+llzrsYri5WBN7RTn9XummOilgU0sywtDEEJqHFQ2COalBZ45lNq9FAEEU61ilt');
define('NONCE_SALT',       '6aFuWlHSowcZ0BUzzYdEy/e0xPsSiaOhv+P98+sAjshJk3FW/GnlUZFAdTO7E5n0Rudp4wOAU9UQF8kJ');

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
 * Change these values to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', !$onGae);

/**
 * This setting logs errors to a file if WP_DEBUG is enabled.
 * These files are NOT supported by App Engine; use WP_DEBUG_DISPLAY instead.
 */
define('WP_DEBUG_LOG', !$onGae);  // Not supported in App Engine

/**
 * This setting displays errors in the application if WP_DEBUG is enabled.
 *
 * WARNING: Enabling WP_DEBUG_DISPLAY in production is not secure.
 * See https://owasp.org/www-project-proactive-controls/v3/en/c10-errors-exceptions
 */
define('WP_DEBUG_DISPLAY', !$onGae);

/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
