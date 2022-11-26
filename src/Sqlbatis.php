<?php

namespace Gengbin\Sqlbatis;
use PDO;
use PDOException;

abstract class Sqlbatis implements SqlbatisInterface {
    abstract function construct($connectData='',$userName='',$userPassword=''):ConnectSource;

    function resource(): array
    {
        $arr=[
            'err'=>null,
            'errMessage'=>'',
            'resource'=>null
        ];
        $resource = $this->construct();
        try {
            $dataBaseHost = new PDO($resource->getConnectData(),$resource->getUserName(),$resource->getUserPassword());
            $dataBaseHost->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $arr['resource']=$dataBaseHost;
        }catch (PDOException $exception){
            $arr['errMessage'] = $exception->getMessage();
            $arr['resource'] = $exception;
        } finally {
            $dataBaseHost=null;
        }
        return $arr;
    }
    function query($sql=''): array
    {
        $mysql = $this->resource();
        $mysql['sql']=$sql;
        if($mysql['err']) return $mysql;
        $result = $mysql['resource']->prepare($sql);
        $result->execute();
        try {
            $mysql['data'] = $result->fetchAll((PDO::FETCH_ASSOC));
        }catch (PDOException $exception){
            $mysql['err'] =1;
            $mysql['resource'] =$exception;
        }
        return $mysql;
    }
    function exec($sql): array
    {
        $mysql = $this->resource();
        if($mysql['err']){
            $mysql['sql']=$sql;
            return $mysql;
        }
        $data=[];
        try {
            $data['data']= $mysql->exec($sql);
        }
        catch (PDOException $e){
            $data['err']= 1;
            $data['resource']= $e;
        }
        return $data;
    }
}
