<?php

include "connect.php";
header("Content-Type: application/json");

    
$username=$_POST['username'];
$password=$_POST['password'];


$sql = "SELECT * FROM user_ WHERE username='$username' AND password='$password'";
	$result = pg_query($sql);
	$hasil_login = array(
	'features' => array(
            'id_user' => $result['id_user'],
            'email' => $result['email'],
            'wallet' => $result['wallet'],
            'phone' => $result['phone']
            
    )
    );
    

	
	array_push($hasil_login['features'], $features);
	
	echo $data= json_encode($hasil_login);


?>