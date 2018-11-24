<?php

include 'connect.php';
header("Content-Type: application/json");
    $username=$_POST['username'];
    $password=$_POST['password'];



$sql = "SELECT * FROM user_ WHERE username='$username' AND password='$password'";
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
        'email' => $isinya['email'],
        'wallet' => $isinya['wallet'],
        'phone' => $isinya['phone']
		)
	);
	array_push($hasil_login['features'], $features);
	}
	echo $data= json_encode($hasil_login);


