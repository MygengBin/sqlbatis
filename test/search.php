<?php
require_once '../vendor/autoload.php';
use Gengbin\Sqlbatis\Sqlbatis;
use Gengbin\Sqlbatis\entity\ConnectSource;
class search extends Sqlbatis{

    function construct($connectData = '', $userName = '', $userPassword = ''):ConnectSource
    {
        $s = new ConnectSource();
        $s->setConnectData('mysql:host=localhost;dbname=home_zoom');
        $s->setUserName('root');
        $s->setUserPassword('123456');
        return $s;
    }
}
$a = new search();
$result = $a->exec("insert into anon123ymous_visit(path,http_user_agent,referrer) value('','','')");
var_dump($result);