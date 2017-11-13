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
<h3>Login Existing User</h3>
 <form action="/actions/handle_login.php" method="post">

  <div class="login-container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button class "w3cbutton" type="submit">Login</button>
  </div>

</form> 

</div>
        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>
</html>
