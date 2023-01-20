<?php

$connections = new mysqli('localhost', 'root', '', 'crud');

if ($connections->connect_error) {
    die("Connection failed: " . $connections->connect_error);
}

?>