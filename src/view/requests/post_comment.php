<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/util/Util.php';

session_start();

echo "Posting your comment, page will redirect automatically when finished. If it doesn't, click your browsers back button.";

$cntr = Controller::getController();
$cntr->postComment($_POST["postcomment"]);

Util::redirectToPreviousPage();
?>
