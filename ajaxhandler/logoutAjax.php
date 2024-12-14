<?php



session_start();
unset($_SESSION["current_user"]);

$rv = [];
echo json_encode($rv);


/*<?php
session_start();
unset($_SESSION["current_user"]);
$rv = ["status" => "success"]; 
echo json_encode($rv);
?>*/
?>


