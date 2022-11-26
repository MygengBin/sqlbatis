<?php
namespace Gengbin\Sqlbatis;
class ConnectSource{
    private $connectData='';
    private $userName='';
    private $userPassword='';

    /**
     * @return string
     */
    public function getConnectData(): string
    {
        return $this->connectData;
    }

    /**
     * @param string $connectData
     */
    public function setConnectData(string $connectData): void
    {
        $this->connectData = $connectData;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    /**
     * @param string $userPassword
     */
    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
    }
}