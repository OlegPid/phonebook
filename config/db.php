<?php
$params = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=phonebook',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
if (isset($_SERVER['SERVER_ADDR'])) {
    if (strcasecmp($_SERVER['SERVER_ADDR'], '127.0.0.1') !== 0) {
        $params['dsn'] = 'mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af51892fb898fad';
        $params['username'] = 'b19a4f6f22efab';
        $params['password'] = '4def3d61';
    }
}
return $params;
