<?php

define('DB_NAME', 'chowder_test1');
define('DB_USER', 'chowder_test1@localhost');
define('DB_PASSWORD', 'capstone');
define('DB_HOST', 'db4free.net:3306');

HI?

$link = mysql_connect(DB_HOST, DB_NAME, DB_PASSWORD);

if(!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Hey there'

?>
