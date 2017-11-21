<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/model/UserAccountHandler.php';

class Controller {
    private $uaHandler; //user account handler

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

    public function getLoggedIn() {
        return $this->uaHandler->loggedIn();
    }

    public function getUsername() {
        return $this->uaHandler->getUsername();
    }

    public function register($username, $password) {
        return $this->uaHandler->registerNewUser($username, $password);
    }

    public function recipeSiteContent($recipeName) {

    }
    public function recipeSiteComments($recipeName) {

    }
    public function postComment($commentText) {

    }

    public function deleteComment($commentID) {

    }

}
?>
