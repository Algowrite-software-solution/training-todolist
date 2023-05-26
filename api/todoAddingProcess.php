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
    if ($value) {
        $responseObject->error = $value;
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
$query = "INSERT INTO `todo` (`title`,`due_datetime`, `recorded_datetime`,`todo_status_id`) VALUES (?,?,?,1)";
$stmt1 = $database->prepare($query, "sss", array($todo, $datetime, $formattedDateTime));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);
