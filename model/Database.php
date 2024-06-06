<?php

class Database 
{
    public $statement;
    public $connection;

    public function __construct(){
        $dsn = 'mysql:host:localhost;dbname:vax_management_system';

        $this->connection = new PDO($dsn,'root', '');
       
    }

    public function returnConnection(){
        return $this->connection;
    }
    public function query($query, $params = []){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this->statement;
    }
}