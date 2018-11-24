<?php

include 'connect.php';
header("Content-Type: application/json");


$sql = "SELECT image,id_restaurant, name, address, description, capacity
FROM public.restaurant;";
	$result = pg_query($sql);
	$hasil_login = array(
	'type'	=> 'FeatureCollection',
	'results' => array()
	);

	while ($isinya = pg_fetch_assoc($result)) {
		$features = array(

        'id_restaurant' => $isinya['id_restaurant'],
        'name' => $isinya['name'],
        'address' => $isinya['address'],
        'description' => $isinya['description'],
        'capacity' => $isinya['capacity'],
        'image' => $isinya['image']
		
	);
	array_push($hasil_login['results'], $features);
	}
	echo $data= json_encode($hasil_login);


