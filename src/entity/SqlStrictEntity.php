<?php


namespace Gengbin\Sqlbatis\entity;


class SqlStrictEntity
{
    private $err = null;
    private $errMessage = '';
    private $resource = null;
    private $sql = '';
    private $data = null;

    /**
     * @return null
     */
    public function getErr()
    {
        return $this->err;
    }

    /**
     * @param null $err
     */
    public function setErr($err): void
    {
        $this->err = $err;
    }

    /**
     * @return null
     */
    public function getErrMessage()
    {
        return $this->errMessage;
    }

    /**
     * @param null $errMessage
     */
    public function setErrMessage($errMessage): void
    {
        $this->errMessage = $errMessage;
    }

    /**
     * @return null
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param null $resource
     */
    public function setResource($resource): void
    {
        $this->resource = $resource;
    }

    /**
     * @return null
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param null $sql
     */
    public function setSql($sql): void
    {
        $this->sql = $sql;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}