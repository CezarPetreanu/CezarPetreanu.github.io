<?php

$database_user = "root";
$database_pass = "";
$database_name = "famfilm_users";

$database = new PDO('mysql:host=localhost;dbname=' . $database_name . ';charset=utf8', $database_user, $database_pass);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>