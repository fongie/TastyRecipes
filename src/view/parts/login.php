<?php
/*
 * BEING REPLACED BY JAVASCRIPT IN src/view/viewmodel.
 * next step to make the ajax calls for the variable stuff
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';

function loginHeader() {
    # if we are visiting and no session is active, start new
    if (!isset($_SESSION)) {
        session_start();
    }

    $cntr = Controller::getController();
    $loggedIn = $cntr->getLoggedIn();

    if ($loggedIn) { 
        $username = $cntr->getUsername();
        echo '<p class="header-topright">Logged in as ' . $username . '</p>';
    } else {
        echo '<a class="header-topright" href="/src/view/registration_page.php">Register</a>';
        echo '<a class="header-topright" href="/src/view/login_page.php">Login</a>';
    }
}

?>
