<?php

class Database 
{
    public $statement;
    public $connection;

    public function __construct(){
        $dsn = 'mysql:host:localhost;dbname:vax_tracker_db';

        $this->connection = new PDO($dsn,'root', '');
    }

    public function query($query, $params = []){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this->statement;
    }
}