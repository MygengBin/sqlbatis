<?php

namespace Gengbin\Sqlbatis;
use Gengbin\Sqlbatis\entity\SqlStrictEntity;
use Gengbin\Sqlbatis\functionAbstract\SqlbatisInterface;
use Gengbin\Sqlbatis\entity\ConnectSource;
use PDO;
use PDOException;

abstract class Sqlbatis implements SqlbatisInterface {
    abstract function construct($connectData='',$userName='',$userPassword=''):ConnectSource;

    function resource(): SqlStrictEntity
    {
        $strict = new SqlStrictEntity();
        $resource = $this->construct();
        try {
            $dataBaseHost = new PDO($resource->getConnectData(),$resource->getUserName(),$resource->getUserPassword());
            $dataBaseHost->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $strict->setResource($dataBaseHost);
        }catch (PDOException $exception){
            $strict->setErrMessage($exception->getMessage());
            $strict->setResource($exception);
        } finally {
            $dataBaseHost=null;
        }
        return $strict;
    }
    function query($sql=''): SqlStrictEntity
    {
        $mysql = $this->resource();
        $mysql->setSql($sql);
        if($mysql->getErr()) return $mysql;
        $result = $mysql->getResource()->prepare($sql);
        try {
            $result->execute();
            $mysql->setData($result->fetchAll((PDO::FETCH_ASSOC)));
        }catch (PDOException $exception){
            $mysql->setErr(1);
            $mysql->setResource($exception);
            $mysql->setErrMessage($exception->getMessage());
        }
        return $mysql;
    }
    function exec($sql): SqlStrictEntity
    {
        $mysql = $this->resource();
        $mysql->setSql($sql);
        if($mysql->getErr()) return $mysql;
        try {
            $mysql->setData($mysql->getResource()->exec($sql));
        }
        catch (PDOException $e){
            $mysql->setErr(1);
            $mysql->setResource($e);
            $mysql->setErrMessage($e->getMessage());
        }
        return $mysql;
    }
}
