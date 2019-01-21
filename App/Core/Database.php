<?php
namespace App\Core;

use PDO;

class Database {
    private $db_name;
    private $db_host;
    private $db_username;
    private $db_pass;
    private $pdo;

    public function __construct($db_name, $db_host = 'localhost', $db_username = 'kevin', $db_pass){
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_pass = $db_pass;
        $this->db_username = $db_username;
    }

    /** 
     * @return PDO Retourne une instance de pdo 
     */
    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO("mysql:host=$this->db_host; dbname=$this->db_name; charset=utf8", "$this->db_username", "$this->db_pass");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
     * @param String la requête MySql
     * @param Bool Si l'on souhaite récupèrer un tableau
     * @param null/Int Si l'on souhaite récupérer un les données via un id
     * @return Array/Object tableau d'objet ou un objet 
     */
    /*public function query($statement, $array = null, $id = null){
        $req = $this->getPDO()->prepare($statement);
        $req->setFetchMode(PDO::FETCH_OBJ);
        
        if($id){
            $req->bindValue(':id', $id, PDO::PARAM_INT);
        }

        $req->execute();

        
        $array ? $data = $req->fetchAll() : $data = $req->fetch();

        return $data;
    }*/

    public function query($statement, $params ,$array = false){
        $req = $this->getPDO()->prepare($statement);
        $req->setFetchMode(PDO::FETCH_OBJ);
        
        if($params){
            foreach($params as $key => $value){
                $param = ":" .$key;
                $req->bindValue(":params, :$value");
            }
            $req->bindValue(':email', $email, PDO::PARAM_INT);
        }

        $req->execute();

        
        $array ? $data = $req->fetchAll() : $data = $req->fetch();

        return $data;

}
}

