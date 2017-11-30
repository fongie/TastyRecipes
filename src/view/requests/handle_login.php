<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

session_start();

$username = $_POST["uname"];

$cntr = Controller::getController();
$success = $cntr->login($username, $_POST["psw"]);

echo json_encode(array(result => $success));
?>
