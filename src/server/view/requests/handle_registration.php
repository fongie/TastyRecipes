<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

$username = $_POST["uname"];
$cntr = Controller::getController();
$success = $cntr->register($username, $_POST["psw"]);

if ($success) {
    echo 'Registering your account, please wait... You will be redirected to the home page when finished';
    Util::redirectTo('home.php');
} else {
    echo 'Username already exists!! Press the back button on your browser and try again.';
}
?>
