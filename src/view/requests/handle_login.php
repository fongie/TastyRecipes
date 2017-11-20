<?php

session_destroy(); # so that you can go back to loginpage and login another user
session_start();

# what was just posted by form
$username = $_POST["uname"];
$password = $_POST["psw"];

# mysql connection
$pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

# returns above 0 if found a matching username/pass combination
$query = "SELECT COUNT(*) FROM user_accounts WHERE username='$username' AND password='$password'";

$result = $pdo->query($query);
if ($result->fetchColumn() > 0) {
    #login

    echo "Logging in as $username...";

    # remember current username
    $_SESSION["uname"] = $username;

    require_once $_SERVER['DOCUMENT_ROOT'].'/actions/redirects.php';
    redirect_to_previous_page();
} else {
    echo "Login failed. Press back button on browser to go back and try again";
}
?>
