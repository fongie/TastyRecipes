<!DOCTYPE html>
<html>
    <head>
        <?php include 'parts/head.php' ?>
    </head>
    <body>
        <header>
            <?php include 'parts/header.php' ?>
        </header>

<div class="login-page">
<h3>Register New User</h3>
 <form action="requests/handle_registration.php" method="post">
  <div class="login-container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Choose a username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Choose a password" name="psw" required>

    <button class "w3cbutton" type="submit">Register</button>
  </div>

</form> 

</div>
        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>
</html>
