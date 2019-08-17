<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            <?= $title ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?= !empty($user) ? 'Привет, ' . $user->getNickname().'|<a href="http://site-2/users/logout">Выйти</a>': '<a href="http://site-2/users/login">Войти</a>| <a href="http://site-2/users/register">Зарегистрироваться</a>' ?>
        </td>
    </tr>
    <tr>
        <td>