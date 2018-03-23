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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'aquanika');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'nilusha2809');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bD.*_mVza<Z-h[$_N|u+8R7ur*|kdvMe95H?K/ffr}T P1d,A/q@Gs8W}%Z?|8`W');
define('SECURE_AUTH_KEY',  'v;Y9vl8Rd*o=k^X[3.vpo-]>@S+h?SBYlApW9X@z8K}gn/:rI/)D2<II9S8fY1Gy');
define('LOGGED_IN_KEY',    'sMOls,M|q0vKE$F mDV!7K:R?ZKlZ0HMQ7>ut.YA2y5C5sb4=U;b5aZ[eOHRTvz?');
define('NONCE_KEY',        'H43Aq4:tW7,YiW7T@M]5ezYux`yN!s63f$Bve$H(_;wwnq%p@QZgF]I7WxApk+lv');
define('AUTH_SALT',        '2?k}n/:.!]4>Ne|+Mf9QrRmr0sGSDCv9ZFv=Z7ifj.>3eDn@f!7.mm9FkiO}ds9N');
define('SECURE_AUTH_SALT', '9K5SV;jzQ1ZV2-(qz8`_0Tgn`hT069rI_yA>>|XRDfB)s2^N?2^IBr a!TWfq2a^');
define('LOGGED_IN_SALT',   'rVS0ztK$QjOB#:EMDja/2]5g^f65!<~IY@UQf`}*}WIZ)%LCvzK6 M$J?Ui^u@X7');
define('NONCE_SALT',       'ScI[:}d8qe}@8xrBWqp799j,yIa{vBcHc!Na0Q[(q!lq($ aUAdW,:;OZNT&2Rd?');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


define('FS_METHOD', 'direct');
/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
