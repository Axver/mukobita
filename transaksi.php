<?php

include 'connect.php';
header("Content-Type: application/json");

$id_pesanan=$_GET['id_pesanan'];


$sql = "SELECT user_.id_user as id_user, user_.email as email_user,user_.wallet as wallet_user,user_.phone as phone_user,id_transaksi, id_menu, pesanan.id_pesanan as id_pesanan,pesanan.status as status
FROM public.transaksi INNER JOIN pesanan ON transaksi.id_pesanan=pesanan.id_pesanan INNER JOIN user_ ON user_.id_user=pesanan.id_user WHERE pesanan.id_pesanan=$id_pesanan";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
        'id_user' => $isinya['id_user'],
        'email_user' => $isinya['email_user'],
        'wallet_user' => $isinya['wallet_user'],
        'phone_user' => $isinya['phone_user'],
        'status' => $isinya['status']
		)
	);
	array_push($hasil_login['features'], $features);
	}
	echo $data= json_encode($hasil_login);


