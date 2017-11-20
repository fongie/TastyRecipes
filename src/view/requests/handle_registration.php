<?php

session_start();

# what was just posted by form
$username = $_POST["uname"];
$password = $_POST["psw"];

# mysql connection
$pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

# if username exists, do not execute
$query = "SELECT COUNT(*) FROM user_accounts WHERE username='$username'";
$result = $pdo->query($query);
require_once $_SERVER['DOCUMENT_ROOT'].'/actions/redirects.php';
if ($result->fetchColumn() > 0) {
    echo 'Username already exists!! Please try again. Redirecting in 3 seconds..';
    sleep(5);
    redirect_to('/registration_page.php');
} else {

    $insertAccount = "INSERT INTO user_accounts(username, password) VALUES ('$username', '$password');";
    $pdo->query($insertAccount);

    echo 'Registering your account, please wait... You will be redirected to the login page when finished';
    redirect_to('/login_page.php');
}

?>
