<?php

session_destroy(); # so that you can go back to loginpage and login another user
session_start();

# what was just posted by form
$username = $_POST["uname"];
$password = $_POST["psw"];

#TODO: authenticate password before logging in

echo "Logging in as $username...";

# remember current username
$_SESSION["uname"] = $username;

#redirect to index (javascript redirect)
echo '<script type="text/javascript">
    window.location = "/index.php"
</script>';

?>
