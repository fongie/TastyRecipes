<?php

class RecipeSite {
    $title;
    $image;
    $ingredients;
    $instructions;

    public function __construct($name) {

        # Load XML and mysql connection
        $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/res/xml/recipes.xml');
        //print_r($xml);
        $pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

        # Find current recipe ID. This ID MUST be the same position as the recipes appear in the xml recipes.xml
        $query = 'SELECT id FROM recipes WHERE name="'. $name .'"';
        $res = $pdo->query($query);
        $recipeID = $res->fetchColumn() - 1;

        # Pick out the XML tags we want and put them into variables ready to use
        $this->title = $xml->recipe[$recipeID]->title;
        $this->image = $xml->recipe[$recipeID]->imagepath;
        $this->ingredients = $xml->recipe[$recipeID]->ingredient->li;
        $this->instructions = $xml->recipe[$recipeID]->recipetext->li;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getIngredients() {

    }

    public function getInstructions() {

    }

    public function getImage() {

    }

    public function postComment($text) {

    }

    public function deleteComment($commentID) {

    }

    private function parseXML() {

    }
}

?>
