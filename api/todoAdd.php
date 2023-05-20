<?php


$request = $_POST["todoAdd"]; 
$requestObject = json_decode($request);


require("../app/dbQuery.php"); 
require("../app/inputValidator.php"); 
require("../app/errorResponseSender.php"); 

$responseObject = new stdClass(); // if response in object format

$validator = new Validator($requestObject);
$errors = $validator->validator();

foreach ($errors as $key => $value) {
    if($value){
        $requestObject->error = $value;
        ErrorSender::sendError($responseObject);
    }
}

date_default_timezone_set('Asia/Colombo');
$currentDateTime = new DateTime();
$formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

$todo = $requestObject->todo;
$date = $requestObject->date;
$time = $requestObject->time;

$datetime = $date . " " . $time;


$database = new DB();
$query = "INSERT INTO `todo` (`todo`,`due_datetime`,`status_id`) VALUES (?,?,0)";
$stmt1 = $database->prepare($query, "ss", array($todo, $datetime));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);





