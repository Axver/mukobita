<?php

$host="localhost";
$user="postgres";
$password="toor";
$port="5432";
$dbname="mokobita";

 
$link= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");


?>