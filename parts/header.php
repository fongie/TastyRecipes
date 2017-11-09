<h1>TASTY RECIPES</h1>
<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/parts/login.php';
    loginHeader();
?>
            <nav>
                <ul>
                    <li>
                        <a href="/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/calendar.php">Calendar</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="dropbtn">Recipes</a>
                            <div class="dropdown-content">
                                <a href="/recipes/meatballs.php">Meatballs</a>
                                <a href="/recipes/pancakes.php">Pancakes</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
