<?php

function RecipeSite($name) {

    # Load XML and mysql connection
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/recipes/xml/recipes.xml');
    //print_r($xml);
    $pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

    # Find current recipe ID. This ID MUST be the same position as the recipes appear in the xml recipes.xml
    $query = 'SELECT id FROM recipes WHERE name="'. $name .'"';
    $res = $pdo->query($query);
    $recipeID = $res->fetchColumn() - 1;

    # Pick out the XML tags we want and put them into variables ready to use
    $title = $xml->recipe[$recipeID]->title;
    $image = $xml->recipe[$recipeID]->imagepath;
    $ingredients = $xml->recipe[$recipeID]->ingredient->li;
    $instructions = $xml->recipe[$recipeID]->recipetext->li;

    echo 
        "<div class='recipe'>
                <div class='recipe-header'>
                <h3>$title</h3>'
                <img alt='meatballs' src='$image'>
                </div>

                <ul class='ingredient-list'>
                    <li class='li-heading'><h4>Ingredients</h4></li>";
    makeListItems($ingredients);
    echo    
                "</ul>

                <ul class='instructions-list'>
                    <li class='li-heading'><h4>Instructions:</h4>";
    makeListItems($instructions);
    echo
                "</ul>
            </div>";
    recipeComments($recipeID, $pdo);
}

function makeListItems($arr) {
    foreach($arr as $value) {
        echo "<li>$value</li>";
    }
}

function recipeComments($recipe_id, $mysql_conn) {

    $recipe_id = $recipe_id + 1; #to prep for mysql query again instead of xml (where first item had to be 0)

    # Query to get username and comment rows for this specific recipe
    $query = "SELECT username, comment FROM comments JOIN user_accounts ON comments.user_id = user_accounts.user_id WHERE recipe_id = $recipe_id;";
    $res = $mysql_conn->query($query);

    echo '<div class="usercomments">
                <h4>Comments:</h4>';

    echo '<ul class="comments-list">';

    # While there are rows left in the query, fetch them as array, associated by the name of the column in the database
    $row = $res->fetch(PDO::FETCH_ASSOC);
    while ($row) {
        $username = $row["username"];
        $comment = $row["comment"];
        echo "
            <li>
                <div class='comment'>
                    <div class='username-div'>
                        <p><strong>$username</strong></p>
                    </div>
                    <div class='comment-div'>
                        <p>$comment</p>
                    </div>
                </div>
            </li>
            ";
        $row = $res->fetch(PDO::FETCH_ASSOC);
    }
    echo "</ul>";

    # You can post comments only if logged in (requires login.php file somewhere (its required in header now))
    if (loggedIn()) {
        echo $_SESSION["uname"];
        echo '<form class="comment-form" action="/actions/post_comment.php" method="post">
            <div class="comment-form-container">
            <input type="text" placeholder="Write your comment here!" name="postcomment" required>
            <button class "w3cbutton" type="submit">Send</button>
            </div>';
    } else {
        echo 'Log in to post a comment!';
    }
    echo "</div>";
}
?>
