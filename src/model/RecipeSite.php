<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/model/CommentSection.php';

class RecipeSite {
    private $title;
    private $image;
    private $ingredients;
    private $instructions;
    private $commentSection;
    private $ID;

    /** Construct a new RecipeSite instance containing its information and content
     */
    public function __construct($name) {
        $db = new DatabaseRequest();
        $this->ID = $db->findRecipeID($name);
        $this->parseXML($this->ID);
        $this->fetchComments($name);
    }
    /** Get recipe ID
     */
    public function getID() {
        return $this->ID;
    }
    /** Get the recipe title
     */
    public function getTitle() {
        return $this->title;
    }
    /** Get the recipes list of ingredients
     *  Returns array of strings
     */
    public function getIngredients() {
        return $this->ingredients;
    }
    /** Get the recipes list of instructions
     *  Returns array of strings
     */
    public function getInstructions() {
        return $this->instructions;
    }
    /** Get path to recipe image
     */
    public function getImage() {
        return $this->image;
    }
    /** Get the comments for this page
     */
    public function getComments() {
        return $this->commentSection->getComments();
    }
    public function postComment($text) {

    }
    public function deleteComment($commentID) {

    }
    private function parseXML($recipeID) {

        # This ID MUST be in in the database in the same position as the recipes appear in the xml recipes.xml.
        # id 1 in the database is therefor position 0 in the simpleXML array
        $recipeID = $recipeID-1;

        # Use SimpleXML library to load XML
        $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/res/xml/recipes.xml');

        # Pick out the XML tags we want and put them into variables ready to use
        $this->title = $xml->recipe[$recipeID]->title;
        $this->image = $xml->recipe[$recipeID]->imagepath;
        $this->ingredients = $xml->recipe[$recipeID]->ingredient->li;
        $this->instructions = $xml->recipe[$recipeID]->recipetext->li;
    }
    private function fetchComments($recipeName) {
        $this->commentSection = new CommentSection($recipeName);
    }
}
?>
