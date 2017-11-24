<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/model/UserAccountHandler.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/model/RecipeSite.php';

/**
 * Handles all calls between the view and the model
 */
class Controller {
    private $uaHandler; //user account handler
    private $currentRecipeSite; //instance of current recipesite

    /** Constructor
     */
    public function __construct() {
        $this->uaHandler = new UserAccountHandler();
    }
    /**
     * Called anytime the object has no reference to it or a script stops running, so thats when 
     * we want to store it in SESSION cookie to let the controller persist
     */
    public function __destruct() {
        $_SESSION["contr"] = serialize($this);
    }
    /** Method to get the controller in view scripts. If a controller hasnt been created and serialized into the
     * session cookie yet, it creates a new controller instance.
     */
    public static function getController() {
        if (isset($_SESSION["contr"])) {
            return unserialize($_SESSION["contr"]);
        } else {
            return new Controller();
        }
    }
    /** Tries to log in using username and password
     * If successful returns true, if not returns false
     */
    public function login($username, $password) {
        $this->uaHandler->loginUser($username, $password);
        if ($this->uaHandler->loggedIn()) {
            return true;
        } else {
            return false;
        }
    }
    /** Get wheither a user is logged in or not
     */
    public function getLoggedIn() {
        return $this->uaHandler->loggedIn();
    }
    /** Get the currently logged in username
     */
    public function getUsername() {
        return $this->uaHandler->getUsername();
    }
    /** Register a new user
     */
    public function register($username, $password) {
        return $this->uaHandler->registerNewUser($username, $password);
    }
    /** Create a new recipesite using the recipe name
     */
    public function createRecipeSite($recipeName) {
        $this->currentRecipeSite = new RecipeSite($recipeName);
    }
    /** Get the current recipe site's title
     */
    public function getRecipeTitle() {
        return $this->currentRecipeSite->getTitle();
    }
    /** Get the current recipe site's image
     */
    public function getRecipeImage() {
        return $this->currentRecipeSite->getImage();
    }
    /** Get the current recipe site's list of ingredients
     */
    public function getRecipeIngredients() {
        return $this->currentRecipeSite->getIngredients();
    }
    /** Get the current recipe site's list of instructions
     */
    public function getRecipeInstructions() {
        return $this->currentRecipeSite->getInstructions();
    }
    /** Get the current recipe site's list of comments
     */
    public function getRecipeSiteComments() {
        return $this->currentRecipeSite->getComments();
    }
    /** Get the current recipe site's ID
     */
    public function getRecipeSiteID() {
        return $this->currentRecipeSite->getID();
    }
    /** Post a comment to a recipe site
     */
    public function postComment($commentText) {
        $username = $this->uaHandler->getUsername();
        $this->currentRecipeSite->postComment($username, $commentText);
    }
    /** Delete a comment from a recipe site
     */
    public function deleteComment($commentID) {
        $currentLoggedinUser = $this->uaHandler->getUsername();
        $this->currentRecipeSite->deleteComment($commentID, $currentLoggedinUser);
    }
}
?>
