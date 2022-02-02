<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class circuito_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "bancocircuito";


    public function getAll()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        $sql = "SELECT * FROM circuito";
        $result = $conn->query($sql);
        return $result;
    }

    public function insert($circuito)
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Falha na conexão" . $conn->connect_error);
        } else {
            $sql = "INSERT INTO circuito (nome, telefone, valor) VALUES ('$circuito[nome]','$circuito[telefone]','$circuito[valor]')";
            return $conn->query($sql);
        }
    }

    
    public function delete($id)
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

        $sql = "DELETE FROM circuito WHERE circuito_id='$id'";
        if ($conn->query($sql) === TRUE) {
         return $conn->query($sql);
        } else {
          die("Error deleting record: " . $conn->error);
        }
    }

    public function update($circuito, $circuito_id)
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Falha na conexão" . $conn->connect_error);
        } else {
            $sql = "UPDATE circuito SET nome='$circuito[nome]', telefone='$circuito[telefone]',valor='$circuito[valor]' where circuito_id='$circuito_id'";
            return $conn->query($sql);
        }
    }

    public function get($id)
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Falha na conexão" . $conn->connect_error);
        } else {
            $sql = "SELECT * from circuito where circuito_id='$id'";
            $result = $conn->query($sql);

            return  $result->fetch_assoc();
        }
    }
   
}
