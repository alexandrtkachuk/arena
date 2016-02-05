<?php

define('PATH_ARENA_PLUGIN', plugin_dir_path( __FILE__ ));
define('TEMPLATES_ARENA', PATH_ARENA_PLUGIN . '/templates');

define('ARENA_ERROR', ' Ошибка');
define('ARENA_ERROR_NOT_LOGIN',  '<a href="' . home_url( '/wp-login.php' ) . '">Авторизируйтесь</a>');
define('ARENA_ERROR_PASS', ' пароли не сооветствуют');
define('ARENA_ERROR_EMAIL', ' email введен некоректно');
define('ARENA_ERROR_NO_ONCE_USER', ' пользеватель с таким ником уже существует');
define('ARENA_ERROR_MONEY', ' введен неверный кошелек Perfect Money');
define('ARENA_ERROR_NO_ONCE_EMAIL', ' пользеватель с таким email\'ом  уже существует');
define('ARENA_ERROR_LOGIN', ' Логин или пароль введены неверно');

define('ARENA_SUCSSES_REGISTRATION', ' Поздравляем! Вы упешно зарегетрированы!');
define('ARENA_SUCSSES_REGISTRATION_ORDER', 'Заявка успешно создана');

define('ARENA_TABLE_ORDERS', 'arena_orders');
define('ARENA_TABLE_USER2ORDER', 'arena_user2order');
define('ARENA_TABLE_COMMENTS', 'arena_comments');
define('ARENA_TABLE_COMMENT2ORDER', 'arena_comment2order');


define('ARENA_PAGE_ORDERINFO', 64);




