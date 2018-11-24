<?php

// Membutuhkan id Pesanan
include 'connect.php';

$id_pesanan=$_GET['id_pesanan'];
$status=$_GET['status'];
$message=$_GET['message'];

$max="SELECT MAX(id_pesanan) as max FROM pesanan";
$max_result=pg_query($max);
while($row=pg_fetch_assoc($max_result)){
$max_=$row['max'];
}
$max_=$max_+1;


$sql = "INSERT INTO public.booking(
	id_booking, id_pesanan, status, 'time', created_at, message)
	VALUES ($max_, $id_pesanan, '$status', NOW(), now(), '$message')";
$result = pg_query($sql);



?>