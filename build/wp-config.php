<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch diese Datei nach "wp-config.php" kopieren, alle fehlenden Werte
 * ergänzen und die Installation anschließend starten.
 *
 * @package WordPress
 */

// ** MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. ** //
/** Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'd01f0645');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'd01f0645');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'yDgxuTN9X9CVyvoo');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'thomas-wedler.de');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'resu$vDJ|-awalGOm-+1rZ%^^A.tSJ$U6dT6P*mNUP#s%L)yOv|eHCG$9u1%V;y;');
define('SECURE_AUTH_KEY',  'RGR|?IP$M`F!^zQN Ur$6mmV~6[Q1 +>*=:fOe$:E,{Jh}qWbHkYk1Dc~5&YOE=O');
define('LOGGED_IN_KEY',    '&!WoPNr(mm)^-0C?BWow--kIX!v!SSe[+#JaSatG:qBWl+|h^P/H2wD=3Q.e/C,<');
define('NONCE_KEY',        'iZH]T7@6~_pl|/bn/hD]]hnJ[-j4Z7Mo%N|qxiy,jI5:0<eF?L,7]AFO?5mL/BfO');
define('AUTH_SALT',        'Z}FjcaS%>i^r$dp-pMa)+Srd8]DLFN{-<ME(cpN>3-s+`<.CtGSx1:X+R-a98JTQ');
define('SECURE_AUTH_SALT', 'lddT3QUo~MS>B)_TDu-%T+7]/Z8Il)<a|Bn+lbIj=d|Q?#W-Hx7-=.-2)}>Qn!BJ');
define('LOGGED_IN_SALT',   'Ef^yK#~]yi`FF}|Q7kpl*]pPZ&Nt|X-|V*hrjXB`a6+q>!S:s8Dw*mt*-tj{RUeA');
define('NONCE_SALT',       'S3~-c?tIo+k3g~=ecw@-5mGAUe<;m,IAQ]SfLGqj7(]nT0:p~qsO*<pTY_yn|l<n');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

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
