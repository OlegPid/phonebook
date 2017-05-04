<?php

if (strcasecmp($_SERVER['SERVER_ADDR'], '127.0.0.1') !== 0) {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af51892fb898fad',
        'username' => 'b19a4f6f22efab',
        'password' => '4def3d61',
        'charset' => 'utf8',
    ];
} else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=phonebook',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
}

