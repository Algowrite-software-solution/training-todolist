<?php


$request = $_POST["removeTodoId"];
$requestObject = json_decode($request);


require("../app/dbQuery.php");
require("../app/errorResponseSender.php");
require("../app/inputValidator.php");


$responseObject = new stdClass();

$responseObject->status = "faild";

$validator = new Validator($requestObject);
$errors = $validator->validator();
foreach ($errors as $key => $value) {
   if ($value) {
      $responseObject->error = $value;
      ErrorSender::sendError($responseObject);
   }
}

$todo_id = $requestObject->todo_id;

$database = new DB();
$query = "DELETE FROM `todo` WHERE `id` = ?";
$setup = $database->prepare($query, "i", array($todo_id));

$responseObject->status = "success";
ErrorSender::sendError($responseObject);
