<?php

# "you just need to call session_start at every http request to keep the session intact" seems to work, why?
# needed to preserve username
session_start();

$username = $_SESSION["uname"];
$comment = $_POST["postcomment"];
$recipeID = $_POST["recipeID"];

# mysql connection
$pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

$findUserID = 'SELECT user_id FROM user_accounts WHERE username="'.$username.'";';
$res = $pdo->query($findUserID);
$userID = $res->fetch()[0]; #because username is unique this always fetches exactly 1 value

$insertComment = 'INSERT INTO comments(recipe_id, user_id, comment) VALUES ('.$recipeID.', '.$userID.', "'.$comment.'");';
$res = $pdo->query($insertComment);

echo "Posting your comment, page will redirect automatically when finished. If it doesn't, click your browsers back button.";
require_once $_SERVER['DOCUMENT_ROOT'].'/actions/redirects.php';
redirect_to_previous_page();
?>
