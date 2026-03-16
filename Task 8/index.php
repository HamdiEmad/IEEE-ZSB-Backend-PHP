<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require "config.php";
$db = new Database($config['database']);

$id = $_GET['transaction_id'];
$query = "SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE id = :id";

$result = $db->query($query, [':id => $id'])->fetch();
dd($result);