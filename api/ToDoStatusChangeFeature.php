<?php


$request = $_POST['statusChange'];
$requestObject = json_decode($request);

require("../app/dbQuery.php");
require("../app/inputValidator.php");
require("../app/errorResponseSender.php");

$responseObject = new stdClass();

$responseObject->status = "failed";

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
$updateQuery = "UPDATE `todo` SET `todo_status_id` = '2' WHERE `id` = ?";
$stmt = $database->prepare($updateQuery, 'i', array($todo_id));
$stmt->execute();  // Execute the prepared statement

$responseObject->states = "success";
ErrorSender::sendError($responseObject);


