<?php

session_start();
$commentID = $_POST["commentID"];

# mysql connection
$pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

$deleteComment = "DELETE FROM comments WHERE comment_id=$commentID;";
$pdo->query($deleteComment);

echo "Deleting comment.. Page will reload after";
require_once $_SERVER['DOCUMENT_ROOT'].'/actions/redirects.php';
redirect_to_previous_page();
?>
