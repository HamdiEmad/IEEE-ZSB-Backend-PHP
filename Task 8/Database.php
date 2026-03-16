<?php

class Database{
    public $connection;
    public function __construct($config){

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'root', 'root');
    }
    public function query($query) {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}