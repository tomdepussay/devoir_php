<?php

namespace App\Core;

class SQL
{
    private $pdo;

    public function __construct(){

        $host = 'mariadb';
        $port = 3306;
        $dbname = 'esgi';
        $username = 'esgi';
        $password = 'esgipwd';

        try{
            $this->pdo = new \PDO("mysql:host=".$host.";port=".$port.";dbname=".$dbname, $username, $password);
        }catch(\Exception $e){
            die("Erreur SQL ".$e->getMessage());
        }
    }

    public function getOneById(string $table, int $id): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$table." WHERE id= :id");
        $queryPrepared->execute([
            "id"=>$id
        ]);
        return $queryPrepared->fetch();
    }

    public function getUserByEmail(string $email): array
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute([
            "email"=>$email
        ]);
        $result = $queryPrepared->fetch();
    
        return $result ? $result : [];
    }

    public function insertUser(string $firstname, string $lastname, string $email, string $password, string $country): bool
    {

        $sql = "INSERT INTO user (firstname, lastname, email, password, country) VALUES (:firstname, :lastname, :email, :password, :country)";
        $queryPrepared = $this->pdo->prepare($sql);
        return $queryPrepared->execute([
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "email"=>$email,
            "password"=>$password,
            "country"=>$country
        ]);
    }

}