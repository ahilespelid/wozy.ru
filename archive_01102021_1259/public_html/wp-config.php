<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wozyru_wp1' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'wozyru_wp1' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'D7ew&E%$3' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' h&O,ipXKZvx7]M]KpX3Mb*Ll@sE.<86GCLY&%}rVl;Y^<}s$0dSfD2QuoKDnqgO' );
define( 'SECURE_AUTH_KEY',  '8{W>p 1v~<5yI:<>1z$1. FMIS7Q)J0 F)Xfm>3*;UM`nvb/9kW:tTHII1ni_aj;' );
define( 'LOGGED_IN_KEY',    ']LqpU.&UmyQ{EAuyq~4Ar*>Q[!v*3EQ|0<cRrqSQ=f1I5;By|?IOX;no)b.l`[::' );
define( 'NONCE_KEY',        'Pj0C&ve )>z,h<5DhJ?}yIwRt0%/@Mq!~4l1PP1D<{v~;WA~WZ_A5[q?R~((B#?J' );
define( 'AUTH_SALT',        '4z:Jdu|PD0{!A#.F y0=ZxE5Fe0j4.LTT^=:Q1&sN|X*!Bttry_TY=F9~<nj1u1g' );
define( 'SECURE_AUTH_SALT', '#0/,krP/La_X7_QRaXN6>frmtmoI]]t_%sOk,PU2^xO -!u3MT*Vfh_~skB<R_oq' );
define( 'LOGGED_IN_SALT',   'hI#rN:DcZj1!6nu5-;S#HN[C|!;hS]r,1z8}zyenr4n%YJ@W.7$Dj3_GY*1tKE/X' );
define( 'NONCE_SALT',       '9.0%!W%7>$a2<]EaOo% HpG/Hcj_lt~4J<0k_L7wJW%mS9U?;meNma)l$,(o<7s,' );
define( 'WP_AUTO_UPDATE_CORE', false );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';