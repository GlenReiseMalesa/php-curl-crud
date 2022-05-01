
<?php
session_start();
$id = $_SESSION['id'];
$url = "http://localhost/php-api-practice/api/post/update.php?id=$id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);


$response = curl_exec($ch);

curl_close($ch);



$data = json_decode($response,true);
var_dump($data);

?>