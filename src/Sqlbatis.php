<?php

namespace Gengbin\Sqlbatis;

class Sqlbatis{
    private $connectData = '';
    private $userName = '';
    private $userPassword = '';
    function __construct($connectData='',$userName='',$userPassword='')
    {
        $this->connectData=$connectData;
        $this->userName=$userName;
        $this->userPassword=$userPassword;
    }

    function resource(): array
    {
        $arr=[
            'err'=>null,
            'errMessage'=>'',
            'resource'=>null
        ];
        try {
            $dataBaseHost = new PDO($this->connectData,$this->userName,$this->userPassword);
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
        if($mysql['err']){
            $mysql['sql']=$sql;
            return $mysql;
        }

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