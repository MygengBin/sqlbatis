# sqlbatis
This is a SQL library for the PHP.
## What does this project do?
It can help you better for write sql.
## Why is this project useful?
It can help you don't doing go to encapsulation Sql Code. let your sql developing extremely easy.
## Installation
### Composer
From the Command Line:
```shell
composer require gengbin/sqlbatis
```
In your `composer.json`:
```json
{
  "require":{
    "gengbin/sqlbatis": "^1.0"
  }
}
```

## Basic Usage
1st, suggest you can to write encapsulation.
```php
<?php
require 'vendor/autoload.php';
use \Gengbin\Sqlbatis\Sqlbatis;
use Gengbin\Sqlbatis\entity\ConnectSource;
class Main_Database extends Sqlbatis
{
    function construct($connectData = '', $userName = '', $userPassword = ''): ConnectSource
    {
        $a = new ConnectSource();
        $a->setConnectData('mysql:host=localhost;dbname=mysql');
        $a->setUserName('root');
        $a->setUserPassword('123456');
        return $a;
    }
}
```
2nd, you can to new This Object
```php
<?php
$m = new Main_Database();
$result = $m->query('SELECT * FROM mm;');
$result = $m->exec('INSERT INTO v(a) VALUES("123123123")');
```
## How do I get started?
You can extend Sqlbathis and rewrite construct and return sql connect info in a array.
Second you can call query, exec, resource.
[Learn More How to use](./test/search.php)
## Where can I get more help, if I need it?
If you meet question, you can take issues, We can help you and feel happy.