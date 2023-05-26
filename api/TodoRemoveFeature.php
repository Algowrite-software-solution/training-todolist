<?php


$request = $_GET["removeTodoId"]; 
$requestObject = json_decode($request);


require("../app/dbQuery.php");
require("../app/errorResponseSender.php");
require("../app/inputValidator.php");


$responseObject = new stdClass(); 

$responseObject->error = "faild";

$validator = new Validator($requestObject);
$errors = $validator->validator();
foreach ($errors as $key => $value) {
   $responseObject->error = $value;
   ErrorSender::sendError($responseObject);
}

$todo_id = $requestObject->todo_id;

$database = new DB();
$query = "DELETE FROM `todo` WHERE `id` = ?";
$setup = $database->prepare($query,"i",array($todo_id));

$responseObject->states = "success";
ErrorSender::sendError($responseObject);




