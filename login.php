<?php
include "connect.php";
header("Access-Control-Allow-Origin: *");

$data= json_decode(file_get_contents("php://input"), true);


$username=$data["username"];
$password=$data["password"];


$sql = "SELECT * FROM user_ WHERE username='$username' AND password='$password'";
$result = pg_query($sql);
if(pg_num_rows($result)<1)
{
    $hasil_login = array(
        'status'=> 'Login gagal',
        'error' => 'true'
        );
}
else
{
    $hasil_login = array(
        'status'=> 'Login Sukses',
        'error' => 'false',
        'user'=>array()
        );
        while ($isinya = pg_fetch_assoc($result)) {
            $user = array(
            'type' => 'Feature',
            'properties' => array(
            'id_user' => $isinya['id_user'],
            'username' => $isinya['username'],
            'email' => $isinya['email'],
            'created_at' => $isinya['created_at'],
            'wallet' => $isinya['wallet'],
            'phone' => $isinya['phone']
        
            )
        );
        array_push($hasil_login['user'], $user);
        }
}
    
        
      
        
        

echo $data= json_encode($hasil_login);

?>