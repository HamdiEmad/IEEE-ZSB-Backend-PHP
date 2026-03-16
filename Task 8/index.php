<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require "config.php";

$db = new Database($config);
$result = $db->query("SELECT * FROM ramadan_mystrey.sobia_king_sales");
dd($result);