<?php

require 'functions.php';
//require 'router.php';

$dsn = "mysql:host=localhost;port=3306;dbname=ramadan_mystrey;charset=utf8mb4";

$PDO = new PDO($dsn, 'root', 'root');

$statement = $PDO->prepare("SELECT * FROM ramadan_mystrey.sobia_king_sales;");

$statement->execute();

$result = $statement->fetchAll();

dd($result);