<h1>TASTY RECIPES</h1>

<div id="login-div">
        <p class="header-topright" data-bind="text: loggedinText, visible: notLoggedIn"></p>
        <a class="header-topright" data-bind="visible: isLoggedIn" href="/src/view/registration_page.php">Register</a>
        <a class="header-topright" data-bind="visible: isLoggedIn" href="/src/view/login_page.php">Login</a>
</div>
            <nav>
                <ul>
                    <li>
                        <a href="/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/src/view/calendar.php">Calendar</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="dropbtn">Recipes</a>
                            <div class="dropdown-content">
                                <a href="/src/view/recipe.php?name=meatballs">Meatballs</a>
                                <a href="/src/view/recipe.php?name=pancakes">Pancakes</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
