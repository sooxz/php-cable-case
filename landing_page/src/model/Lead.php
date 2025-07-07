<?php
class Lead
{
    // Atributos
    private static $numero = 0;
    private $id;
    private $nome;
    private $email;
    private $telefone;
 
    //métodos

    function __construct($id = null, $nome = null, $email = null, $telefone = null)
    {

        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;

        if ($id == null) {
            $this->id = self::$numero++;
        } else {
            $this->id = $id;
        }
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    // toString 

    public function __toString()
    {
        return "<hr>ID: {$this->id} <br> 
        <br> Nome: {$this->nome}<br> 
        <br> Email: {$this->email}<br> 
        <br> Telefone: {$this->telefone}<br>";
    }

    










}
