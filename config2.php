<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','users');

$link=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

if($link === false){
    die("ERROR:Could not connect".mysqli_connect_error());

}
?>


