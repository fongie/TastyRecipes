<?php

if (isset($_COOKIE["userid"])) { #if cookie is set for a userid we show logged in, otherwise link to login page
echo '<p class="header-topright">Logged in as xxx</p>';
} else {
echo '<a class="header-topright" href="login.php">Login</a>';
}

?>
