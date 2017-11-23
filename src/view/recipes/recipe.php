<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';

function RecipeSite($name) {

    $cntr = Controller::getController();
    $cntr->createRecipeSite($name);
    $title = $cntr->getRecipeTitle();
    $image = $cntr->getRecipeImage();
    $ingredients = $cntr->getRecipeIngredients();
    $instructions = $cntr->getRecipeInstructions();

    # To enable redirecting back to this page when f.e a comment is posted
    $_SESSION['previous_page'] = '/src/view/recipes/'.strtolower($name).'.php';
    echo 
        "<div class='recipe'>
                <div class='recipe-header'>
                <h3>$title</h3>'
                <img alt='$name' src='$image'>
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
    $query = "SELECT comment_id, username, comment FROM comments JOIN user_accounts ON comments.user_id = user_accounts.user_id WHERE recipe_id = $recipe_id;";
    $res = $mysql_conn->query($query);

    echo '<div class="usercomments">
                <h4>Comments:</h4>';

    echo '<ul class="comments-list">';

    # While there are rows left in the query, fetch them as array, associated by the name of the column in the database
    $row = $res->fetch(PDO::FETCH_ASSOC);
    while ($row) {
        $username = $row["username"];
        $comment = $row["comment"];
        $commentID = $row["comment_id"];
        echo "
            <li>
                <div class='comment'>
                    <div class='username-div'>
                        <p><strong>$username</strong></p>
                    </div>
                    <div class='comment-div'>
                        <p>$comment</p>
                    ";
        #add delete button on comments written by the currently logged in user
        if ($username === $_SESSION["uname"]) {
            echo '<div class="delete-div">
                    <form action="/actions/delete_comment.php" method="post">
                        <input type="hidden" value="'.$commentID.'" name="commentID">
                        <input type="submit" value="Delete">
                    </form>
                </div>';
        }

        echo "</div>
                </div>
            </li>
            ";
        $row = $res->fetch(PDO::FETCH_ASSOC);
    }
    echo "</ul>";

    # You can post comments only if logged in (requires login.php file somewhere (its required in header now))
    if (loggedIn()) {
        echo '<form class="comment-form" action="/actions/post_comment.php" method="post">
            <div class="comment-form-container">
            <input type="text" placeholder="Write your comment here!" name="postcomment" required>
            <input type="hidden" value="'.$recipe_id.'" name="recipeID">
            <button class "w3cbutton" type="submit">Send</button>
            </div>';
    } else {
        echo '<a href="/login_page.php">Log in</a> to post a comment!';
    }
    echo "</div>";
}
?>
