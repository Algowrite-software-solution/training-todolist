<?php

require("../app/dbQuery.php"); // file navigation is important 

$database = new DB();
$searchQuery = "SELECT * FROM `todo` WHERE `todo_status_id` = ?";
$stmt = $database->prepare($searchQuery, 'i', array(1));
$Result = $stmt->get_result();

$r = $Result->num_rows;
$array = array();
for ($i = 0; $i < $r; $i++) {
    $re = $Result->fetch_assoc();
    $id = $re['id'];
    $title = $re['title'];
    $due_date = $re['due_datetime'];
    $recorded_date = $re['recorded_datetime'];
    $status_id = $re["todo_status_id"];

    $todoItemObject = new stdClass();
    $todoItemObject->id = $id;
    $todoItemObject->title = $title;
    $todoItemObject->due_date = $due_date;
    $todoItemObject->record_date = $recorded_date;
    $todoItemObject->status_id = $status_id;

    array_push($array, $todoItemObject);
}


$responseJsonText = json_encode($array); // for arrays and objects
echo ($responseJsonText);
