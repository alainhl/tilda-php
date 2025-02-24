<?php

//var_dump(substr($_SERVER['PATH_INFO'], 1, -1)); 

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

const TILDA_PUBLIC_KEY = 'jcglbyjt9agzyadhv2e1';
const TILDA_SECRET_KEY = 'ec18a22c94bf0b0d080a';
const TILDA_PROJECT_ID = '1598832';

try {
    $local = new Tilda\LocalProject(
        array(
            'projectDir' => 'tilda',
            'buglovers'  => 'dev@geniusreferrals.com',
        )
    );

    //здесь проверяем, может есть статья с таким названием
    if (substr($_SERVER['PATH_INFO'], -1) == '/') {
        $pageName = substr($_SERVER['PATH_INFO'], 1, -1);
    } else {
        $pageName = substr($_SERVER['PATH_INFO'], 1);
    }

    return $local->showPage($pageName);
} catch (Exception $e) {
    echo $e->getMessage();
}
