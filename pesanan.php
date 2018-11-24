<?php

include 'connect.php';
header("Content-Type: application/json");

$id_user=$_GET['id_user'];

$sql = "SELECT id_pesanan, id_user, tanggal, status
FROM public.pesanan WHERE id_user=$id_user";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
        'id_pesanan' => $isinya['id_pesanan'],
        'id_user' => $isinya['id_user'],
        'tanggal' => $isinya['tanggal'],
        'status' => $isinya['status']
		)
	);
	array_push($hasil_login['features'], $features);
	}
	echo $data= json_encode($hasil_login);


