<?php
// Check if constants are not defined to prevent redefinition
if(!defined('DB_SERVER')){
    define('DB_SERVER', '172.16.0.214');
}

if(!defined('DB_USERNAME')){
    define('DB_USERNAME', 'group10');
}

if(!defined('DB_PASSWORD')){
    define('DB_PASSWORD', '123456');
}

if(!defined('DB_NAME')){
    define('DB_NAME', 'group10');
}

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
