<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../config/db.php';
require_once '../objects/user.php';

$database = new DB();
$db = $database->createConnection();

$user = new User($db);

$dane = json_decode(file_get_contents("php://input"));

if(!empty($dane->name) && !empty($dane->birthdate)){
	$user->name = $dane->name;
	$user->birthdate = $dane->birthdate;

	if($user->create()){
		http_response_code(201);
		
		echo json_encode(array("message" => "Dodano nowy wpis do bazy danych!"));
	}
	else{
		http_response_code(503);
		
		echo json_encode(array("message" => "Nie udało się dodać wpisu!"));
	}
}
else{
	http_response_code(400);
	
	echo json_encode(array("message" => "Nie udał się dodać wpisu, podane dane są niekompletne!"));
}
?>