<?php

require_once "src/database/Database.php";

class Admin
{
    private $id;
    private $user;
    private $pass;

    public function __construct($id = null, $user = null, $pass = null)
    {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function login() {
        $newAdm = new Admin();
        $key = false;

        $sql = "SELECT * FROM admins WHERE usuario = '$this->user'";
        $database = new Database();
        $userDb = $database->select($sql);
        
        if( isset($userDb[0]) ){
            if($userDb[0]->senha === sha1($this->pass)){

                $key = true;
                $newAdm->setId($userDb[0]->id);
                $newAdm->setUser($userDb[0]->usuario);
                $newAdm->setPass($userDb[0]->senha);

            }
        }
        return ["pass" => $key, "adm" => $newAdm];
    }

    public function __toString()
    {
        return "ID: {$this->id} <br> User: {$this->user}, Pass: {$this->pass}<br>";
    }
}
