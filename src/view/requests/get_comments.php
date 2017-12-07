<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
session_start();

$cntr = Controller::getController();
$comments = $cntr->getRecipeSiteComments();

echo json_encode($ua);

?>
