<?php
require_once '../vendor/autoload.php';
use Gengbin\Sqlbatis\Sqlbatis;

class  search extends Sqlbatis{

    function construct($connectData = '', $userName = '', $userPassword = ''): array
    {
        return [
            'connectData'=>'mysql:host=localhost;dbname=home_zoom',
            'userName'=>'root',
            'userPassword'=>'123456'
        ];
    }
}
$a = new search();
var_dump($a->query('select * from word_article'));