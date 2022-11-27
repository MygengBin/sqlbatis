<?php


namespace Gengbin\Sqlbatis\functionAbstract;

use Gengbin\Sqlbatis\entity\ConnectSource;
use Gengbin\Sqlbatis\entity\SqlStrictEntity;

interface SqlbatisInterface
{
    function construct($connectData='',$userName='',$userPassword=''):ConnectSource;
    function resource(): SqlStrictEntity;
    function query($sql=''): SqlStrictEntity;
    function exec($sql): SqlStrictEntity;
}