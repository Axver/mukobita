<?php

include 'connect.php';
header("Content-Type: application/json");

$id_restaurant=$_GET['id_restaurant'];


$sql = "SELECT id_menu, id_restaurant, name, image, price, description
FROM menu WHERE id_restaurant=$id_restaurant";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
        'id_menu' => $isinya['id_menu'],
        'id_restaurant' => $isinya['id_restaurant'],
        'name' => $isinya['name'],
        'image' => $isinya['image'],
        'price' => $isinya['price']
		)
	);
	array_push($hasil_login['features'], $features);
	}
	echo $data= json_encode($hasil_login);


