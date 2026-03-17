<?php

$config = require 'config.php';
$db = new Database($config);

$heading = "Notes";

$notes = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE order_details like "2 Sobia, 1 Kharoub%"');

require "views/notes.view.php";

