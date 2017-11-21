<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

session_start();

$username = $_POST["uname"];

$cntr = Controller::getController();
$success = $cntr->login($username, $_POST["psw"]);

if ($success) {
    echo "Logging in as $username...";
    Util::redirectToPreviousPage();
} else {
    echo "Login failed. Press back button on browser to go back and try again";
}
?>
