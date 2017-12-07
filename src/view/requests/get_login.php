<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
session_start();

$cntr = Controller::getController();
$ua = $cntr->getLoginInfo();

echo json_encode($ua);
?>
