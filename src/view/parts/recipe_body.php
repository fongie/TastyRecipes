<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/controller/Controller.php';

$name = $_GET['name'];
$cntr = Controller::getController();
$cntr->createRecipeSite($name);
$title = $cntr->getRecipeTitle();
$image = $cntr->getRecipeImage();
$ingredients = $cntr->getRecipeIngredients();
$instructions = $cntr->getRecipeInstructions();
$comments = $cntr->getRecipeSiteComments();
$recipeID = $cntr->getRecipeSiteID();

# To enable redirecting back to this page when f.e a comment is posted
$_SESSION['previous_page'] = "/src/view/recipe.php?name=$name";

echo 
    "<div class='recipe'>
    <div class='recipe-header'>
    <h3>$title</h3>'
                <img alt='$name' src='$image'>
                </div>
                <ul class='ingredient-list'>
                    <li class='li-heading'><h4>Ingredients</h4></li>";
foreach($ingredients as $ingredient) {
    echo "<li>$ingredient</li>";
}
    echo    
                "</ul>
                <ul class='instructions-list'>
                    <li class='li-heading'><h4>Instructions:</h4>";
foreach($instructions as $instruction) {
    echo "<li>$instruction</li>";
}
    echo
                '</ul>
            </div>
            <div class="usercomments">
                <h4>Comments:</h4>
                <ul class="comments-list">';
foreach ($comments as $comment) {
    $username = $comment["username"];
    $commentText = $comment["comment"];
    $commentID = $comment["comment_id"];
    echo "
        <li>
            <div class='comment'>
                <div class='username-div'>
                    <p><strong>$username</strong></p>
                </div>
                <div class='comment-div'>
                    <p>$commentText</p>
                ";
    #add delete button on comments written by the currently logged in user
    if ($username === $cntr->getUsername()) {
        echo '<div class="delete-div">
            <form action="/src/view/requests/delete_comment.php" method="post">
            <input type="hidden" value="'.$commentID.'" name="commentID">
            <input type="submit" value="Delete">
            </form>
            </div>';
    }
    echo "</div>
        </div>
        </li>
";
}
echo "</ul>";

# You can post comments only if logged in
if ($cntr->getLoggedIn()) {
    echo '<form class="comment-form" action="/src/view/requests/post_comment.php" method="post">
        <div class="comment-form-container">
        <input type="text" placeholder="Write your comment here!" name="postcomment" required>
        <input type="hidden" value="'.$recipeID.'" name="recipeID">
        <button class "w3cbutton" type="submit">Send</button>
        </div>';
} else {
    echo '<a href="/src/view/login_page.php">Log in</a> to post a comment!';
}
echo "</div>";
?>
