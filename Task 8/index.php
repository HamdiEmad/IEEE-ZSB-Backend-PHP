<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';


$db = new Database();
$result = $db->query("SELECT * FROM ramadan_mystrey.sobia_king_sales");
dd($result);