<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require_once '../config/db.php';
require_once '../objects/user.php';

$database = new DB();
$db = $database->createConnection();

$user = new User($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

$user->read();

if($user->name != null){
	$user_data = array(
		"name" => $user->name
	);
	
	http_response_code(200);
	echo json_encode($user_data);
}
else{
	http_response_code(404);
	echo json_encode(array("message"=>"Nie ma takiej osoby w bazie"));
}
?>