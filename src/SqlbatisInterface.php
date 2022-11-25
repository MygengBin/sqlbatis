<?php


namespace Gengbin\Sqlbatis;


interface SqlbatisInterface
{
    function construct($connectData='',$userName='',$userPassword=''):array;
    function resource(): array;
    function query($sql=''): array;
    function exec($sql): array;
}