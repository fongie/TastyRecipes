<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/model/CommentSection.php';

/** Represents a recipe site, constructed using recipe name (a recipe that is in the XML and database)
 */
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
    /** Let user post a comment on this recipe site
     */
    public function postComment($username, $text) {
        $this->commentSection->postComment($this->ID, $username, $text);
    }
    /** Let user delete a comment on this recipe site
     */
    public function deleteComment($commentID, $currentLoggedinUser) {
        $this->commentSection->deleteComment($commentID, $currentLoggedinUser);
    }

    public function getLastCommentId() {
        return $this->commentSection->getLastCommentId(); 
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

        # Turn all SimpleXMLobjects into native objects so it can be serialized and stored
        $this->title = (string) $this->title;
        $this->image = (string) $this->image;
        $this->ingredients = (array) $this->ingredients;
        $this->instructions = (array) $this->instructions;
    }
    private function fetchComments($recipeName) {
        $this->commentSection = new CommentSection($recipeName);
    }
}
?>
