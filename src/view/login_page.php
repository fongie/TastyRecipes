<!DOCTYPE html>
<html>
    <head>
        <?php include 'parts/head.php' ?>
    </head>
    <body>
        <header>
            <?php include 'parts/header.php' ?>
        </header>

        <div id="login-page">
        <h3>Login Existing User</h3>
         <form data-bind="submit: loginUser">

          <div class="login-container">
            <label><b>Username</b></label>
            <input type="text" data-bind="textInput: username" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" data-bind="textInput: password" placeholder="Enter Password" name="psw" required>

            <button class="w3cbutton" type="submit">Login</button>
          </div>

        </form> 

        <p data-bind="visible: showLoginFail">Login failed! Wrong username or password entered.</p>

        </div>
        <footer>
            <?php include 'parts/footer.php' ?>
        </footer>
<script src="/src/view/viewmodel/loginPage.js">
</script>
    </body>
</html>
