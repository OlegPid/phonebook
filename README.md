Yii 2 First Project 
============================

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

~~~
git clone https://github.com/OlegPid/phonebook.git
cd phonebook
composer install
php yii migrate
~~~

1) To fill the countries and cities data, run a command:

~~~
php yii seed-country-city
~~~

2) To fill the names for search data, run a command:

~~~
php yii seed-names-list
~~~

3) To fill the test data, run a command:
    (this command do not work without first seed)

~~~
php yii seed
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=phonebook',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.



USING
-------

For test runa a command

~~~
php yii serve
~~~

Enter in you browser 
```
localhosh:8080
```

For login use admin/admin

