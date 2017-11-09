<?php

function makeListItems($arr) {
    foreach($arr as $value) {
        echo "<li>$value</li>";
    }
}

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
}
?>
