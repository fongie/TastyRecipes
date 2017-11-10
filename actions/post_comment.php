<?php

#TODO establish (or fetch from recipe.php) mysql connection and post the new comment using correct userID
# maybe break out all comment functions to new file?

#" you just need to call session_start at every http request to keep the session intact" seems to work, why?
# needed to preserve username
session_start();

$username = $_SESSION["uname"];
$comment = $_POST["postcomment"];
echo $username;
echo '<br />';
echo $comment;

# mysql connection
$pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

$query = "";

?>
