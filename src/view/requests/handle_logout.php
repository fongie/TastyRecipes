<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

session_start();

$cntr = Controller::getController();
$cntr->logOut();

Util::redirectToPreviousPage();
?>
