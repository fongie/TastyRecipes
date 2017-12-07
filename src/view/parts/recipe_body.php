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
            </div>';

include 'comments.php';
echo "</div>";
?>
