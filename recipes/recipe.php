<?php

function makeListItems($arr) {
    echo 
    foreach($arr as $value) {
        echo "<li>$value</li>";
    }
}

function RecipeSite($name) {

    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/recipes/xml/recipes.xml');
    //print_r($xml);

    $title = $xml->recipe[0]->title;
    $image = $xml->recipe[0]->imagepath;
    $ingredients = $xml->recipe[0]->ingredient->li;
    $instructions = $xml->recipe[0]->recipetext->li;

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
