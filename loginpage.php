<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tasty Recipes</title>
        <link rel="stylesheet" href="css/normalize.css"> <!-- used as reset -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <?php include 'parts/header.php' ?>
        </header>

<div class="login-page">
 <form action="/actions/handle_login.php" method="post">

  <div class="login-container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button class "w3cbutton" type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="login-container" style="background-color:#b3b3ff">
    <button type="button" class="w3cbutton cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 

</div>
        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
    </body>
</html>
