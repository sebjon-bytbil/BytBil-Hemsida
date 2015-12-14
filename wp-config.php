<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * Denna fil innehåller följande konfigurationer:
 *
 * * Inställningar för MySQL
 * * Säkerhetsnycklar
 * * Tabellprefix för databas
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'bytbil-hemsida');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', '123qwe');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         ';3BB3a5jVSF|Y2s+}IjD4A+?CR]D#dgB98YJG,VCZ $?M6}uL$^:t?e{L5gxfqK^');
define('SECURE_AUTH_KEY',  'ad$L/m:w>a#FSs*UT-K-855JdM//E[Q-&Mgd*|V8-B{7=+vpesTA_)2dz;/SO>i>');
define('LOGGED_IN_KEY',    'vIpEXD{}m}~jYrzDK|6ZP-exE,#Pl{T<CFQ_@j|B/n$WTDXNK;a]Vs)!P^~km0hy');
define('NONCE_KEY',        '-3|bnRB|&n|H{Ph1m{nY+/U*K;].&+.sQ+N{B//pJcB=2VO2*:c1VlfE-Sq:^?,]');
define('AUTH_SALT',        'br[k,%FPXcm8+3*LK1H8{ovHP}FZgpFnZ0$IG9U/*Gx.RfR>AuS|,uGE09.cv#6h');
define('SECURE_AUTH_SALT', '2@u|;>bywBz4@E7<+-rF6ADy}0hvswQa3Lu6)b#;zaCg%g~#+G53Xx+=+[)e5;5U');
define('LOGGED_IN_SALT',   '?Q3e nh/mK)kli{)z)]JH/@zgArNN1hp]&GIpDO-r)F-jsG|;G|a]o+%7p<%EPBD');
define('NONCE_SALT',       '6u_.S*/U[WnL++Q-|QY^i g4,5cQ<jJJ  i5xu=(1 %Bt%/Ww#-l|?EeYmBW/bA7');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 *
 * För information om andra konstanter som kan användas för felsökning, 
 * se dokumentationen. 
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */ 
define('WP_DEBUG', true);


define( 'WP_ALLOW_MULTISITE', true );

define('AUTOSAVE_INTERVAL', 500);
define('WP_POST_REVISIONS', 3);

/* Det var allt, sluta redigera här! Blogga på. */

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'bytbil-hemsida.localhost');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');