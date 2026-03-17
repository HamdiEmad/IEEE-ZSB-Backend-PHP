<?php

$config = require 'config.php';
$db = new Database($config);

$heading = "My Notes";

$notes = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE customer_phone like "011-62%";')->get();

require "views/notes.view.php";
