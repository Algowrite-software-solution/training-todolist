<?php
// import backend processes
require("../app/inputValidator.php");
require("../app/dbQuery.php");

// get the request data
$request = $_POST["signInData"]; // comes as a JSON
$requestObject = json_decode($request);
// -> check if user has provided all the importat data signIn (everything you need from the user signIN in DB)
$mobile = $requestObject->slmobile;
$password = $requestObject->password;
// if other data exists to be send from frontend goes here


// -> input data validation -> if error: send the error as the response -> ifnot: proceed to the next step
$validator = new Validator($requestObject);
$validation = $validator->validator();
$validationArray = get_object_vars($validation);
foreach ($validationArray as $key => $value) {
    if ($value != null) {
        echo ($value);
        die();
    }
}


// -> check if a user exist for the data that request provide -> if exist: proceed to the next step -> ifnot: error out that invalid credintial errorrs
$database = new DB();
$checkerQuery = "SELECT * FROM `admin` WHERE `mobile`=? AND `password`=?";
$preparedStatement1 = $database->prepare($checkerQuery, 'ss', array($mobile, $password));
$userDataRaw = $preparedStatement1->get_result();
if (!$userDataRaw->num_rows) {
    echo ("Invalid Inputs");
    die();
}

$userData = $userDataRaw->fetch_assoc();

// -> create a session and store data init
session_start();
$_SESSION["menudemo1admin"] = $userData;

// -> generate the response and output the response
echo ('login success');
