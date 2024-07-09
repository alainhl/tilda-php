<?php
///////////////////////////////////////////////////////////////////////////////
/**
 * Tilda Publishing
 *
 * @copyright (C) 2015 Оbukhov Nikita Valentinovich. Russia
 * @license       MIT
 *
 * @author        Michael Akimov <michael@island-future.ru>
 *
 * Описание:
 *  скрипт выводит страницу, запрошенную браузером. Этот файл можно размещать в корне и направлять на него все запросы
 */
///////////////////////////////////////////////////////////////////////////////
include '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Tilda' . DIRECTORY_SEPARATOR . 'LocalProject.php';

const TILDA_PUBLIC_KEY = 'o5n5a2ldoahagt8n0r7m';
const TILDA_SECRET_KEY = '006a6abbe549f458fa5d';
const TILDA_PROJECT_ID = '8379843';

try {
    $local = new Tilda\LocalProject(
        array(
            'projectDir' => 'tilda',
            //'buglovers'  => 'email@for.error',
        )
    );

    //здесь проверяем, может есть статья с таким названием
    if (substr($_SERVER['SCRIPT_NAME'], -1) == '/') {
        $pageName = substr($_SERVER['SCRIPT_NAME'], 1, -1);
    } else {
        $pageName = substr($_SERVER['SCRIPT_NAME'], 1);
    }

    return $local->showPage($pageName);
} catch (Exception $e) {
    echo $e->getMessage();
}
