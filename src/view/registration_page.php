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
<h3>Register New User</h3>
 <form action="/actions/handle_registration.php" method="post">
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
