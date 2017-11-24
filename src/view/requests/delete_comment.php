<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

session_start();

echo "Deleting comment.. Page will reload after. If it doesnt, click the browsers Back button";

$cntr = Controller::getController();
$commentID = $_POST["commentID"];
$cntr->deleteComment($commentID);

Util::redirectToPreviousPage();
?>
