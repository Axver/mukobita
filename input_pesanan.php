<?php

//Membutuhkan id_user

$id_user=$_GET['id_user'];
$status=$_GET['status'];
include 'connect.php';

$max="SELECT MAX(id_pesanan) as max FROM pesanan";
$max_result=pg_query($max);
while($row=pg_fetch_assoc($max_result)){
$max_=$row['max'];
}
$max_=$max_+1;


$sql = "INSERT INTO public.pesanan(
	id_pesanan, id_user, tanggal, status)
	VALUES ($max_, $id_user, NOW(), '$status')";
$result = pg_query($sql);
