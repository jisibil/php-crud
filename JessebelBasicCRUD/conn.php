<?php

$connections = new mysqli('localhost', 'root', '01234', 'crud');

if ($connections->connect_error) {
    die("Connection failed: " . $connections->connect_error);
}

?>