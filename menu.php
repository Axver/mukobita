<?php

include 'connect.php';
header("Content-Type: application/json");

$id_restaurant=$_GET['id_restaurant'];


$sql = "SELECT restaurant.name as nama_restaurant,id_menu, restaurant.id_restaurant, menu.name, menu.image, price, menu.description
FROM menu INNER JOIN restaurant ON menu.id_restaurant=restaurant.id_restaurant WHERE menu.id_restaurant=$id_restaurant";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'results' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		
        'id_menu' => $isinya['id_menu'],
        'id_restaurant' => $isinya['id_restaurant'],
        'name' => $isinya['name'],
        'image' => $isinya['image'],
        'price' => $isinya['price'],
        'nama_restaurant' => $isinya['nama_restaurant']
		
	);
	array_push($hasil_login['results'], $features);
	}
	echo $data= json_encode($hasil_login);


