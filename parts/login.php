<?php

function loggedIn() {

    # if user name is set (we have logged in)
    if (!empty(($_SESSION["uname"]))) { 
        return true;
    }     
    # if we have not log in yet (no user name is set)
    return false;
}
function loginHeader() {
    # if we are visiting and no session is active, start new
    if (!isset($_SESSION)) {
        session_start();
    }

    if (loggedIn()) { 
        echo '<p class="header-topright">Logged in as ' . $_SESSION["uname"] . '</p>';
    } else {
        echo '<a class="header-topright" href="/loginpage.php">Login</a>';
        echo $_SESSION["uname"];
    }
}

?>
