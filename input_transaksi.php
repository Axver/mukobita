<?php

//Membutuhkan id menu dan id pesanan

$id_menu=$_GET['id_menu'];
$id_pesanan=$_GET['id_pesanan'];


include 'connect.php';

$max="SELECT MAX(id_transaksi) as max FROM transaksi";
$max_result=pg_query($max);
while($row=pg_fetch_assoc($max_result)){
$max_=$row['max'];
}
$max_=$max_+1;


$sql = "INSERT INTO public.transaksi(
	id_transaksi, id_menu, id_pesanan)
	VALUES ($max_, $id_menu, $id_pesanan);";
$result = pg_query($sql);


?>