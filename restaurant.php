<?php

include 'connect.php';
header("Content-Type: application/json");


$sql = "SELECT id_restaurant, name, address, description, capacity
FROM public.restaurant;";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(
		'type' => 'Feature',
		'properties' => array(
        'id_restaurant' => $isinya['id_restaurant'],
        'name' => $isinya['name'],
        'address' => $isinya['address'],
        'description' => $isinya['description'],
        'capacity' => $isinya['capacity']
		)
	);
	array_push($hasil_login['features'], $features);
	}
	echo $data= json_encode($hasil_login);


