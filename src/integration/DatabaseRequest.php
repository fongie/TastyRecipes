<?php

/** Represents a new database request. Handles all calls to database relevant for the website
 */
class DatabaseRequest {
    private $conn;
    
    /** Constructor makes connection to database using PDO
     */
    public function __construct() {
        # mysql connection
        $this->conn = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");
    }

    /** Get hashed password for a certain username
     */
    public function getHashedPassword($username) {
        $result = $this->conn->prepare('SELECT password FROM user_accounts WHERE username=:uname');
        $params = array('uname' => $username);
        $result->execute($params);
        return $result->fetch()[0];
    }
    /** Try to add a new user to user_accounts table
     *  Returns true if successful, false if user name already exists
     */
    public function addNewUser($username, $password) {

        $result = $this->conn->prepare("SELECT COUNT(*) FROM user_accounts WHERE username=:uname");
        $params = array('uname' => $username);
        $result->execute($params);

        if ($result->fetchColumn() > 0) {
            return false;

            # If not, add user to table
        } else {
            $insertUser = $this->conn->prepare("INSERT INTO user_accounts(username, password) VALUES (:uname, :pwd)");
            $params = array(
                'uname' => $username, 
                'pwd' => $password
            );
            $insertUser->execute($params);
            return true;
        }
    }

    /** Find a recipes ID.      
     *  Returns the ID as an integer
     */
    public function findRecipeID($recipeName) {
        $res = $this->conn->prepare("SELECT id FROM recipes WHERE name=:recipeName");
        $params = array('recipeName' => $recipeName);
        $res->execute($params);
        return $res->fetchColumn();
    }

    /** Get username and comment rows for this specific recipe
     *  Returns the response as an Array of Arrays, each child array containing keys "username", "comment", and "comment_id"
     */
    public function fetchComments($recipeName) {
        $res = $this->conn->prepare("SELECT comment_id, username, comment FROM comments JOIN user_accounts ON comments.user_id = user_accounts.user_id JOIN recipes ON comments.recipe_id = recipes.id WHERE recipes.name=:recipeName");
        $params = array('recipeName' => $recipeName);
        $res->execute($params);

        $comments = array();
        $row = $res->fetch(PDO::FETCH_ASSOC);
        while ($row) {
            array_push($comments, $row);
            $row = $res->fetch(PDO::FETCH_ASSOC);
        }

        return $comments;
    }

    /** Insert a comment into the database, for a certain recipe and username
     */
    public function insertComment($recipeID, $username, $comment) {

        $res = $this->conn->prepare("SELECT user_id FROM user_accounts WHERE username=:uname");
        $params = array('uname' => $username);
        $res->execute($params);

        $userID = $res->fetch()[0]; #because username is unique this always fetches exactly 1 value

        $res = $this->conn->prepare("INSERT INTO comments(recipe_id, user_id, comment) VALUES (:recipeID, :userID, :text)");
        $params = array(
            'recipeID' => $recipeID,
            'userID' => $userID,
            'text' => $comment
        );
        $res->execute($params);
    }

    /** Delete a comment from the database using its commentID
     */
    public function removeComment($commentID) {

        $res = $this->conn->prepare("DELETE FROM comments WHERE comment_id=:commentID");
        $params = array('commentID' => $commentID);
        $res->execute($params);
    }

    /** Find username who wrote a certain comment (by ID)
     *  Returns the username as a string
     */
    public function findAuthorOfComment($commentID) {

        $res = $this->conn->prepare("SELECT username FROM user_accounts JOIN comments ON user_accounts.user_id = comments.user_id WHERE comment_id = :commentID");
        $params = array('commentID' => $commentID);
        $res->execute($params);
        return $res->fetch()[0];
    }

    public function getLastCommentId() {
        $res = $this->conn->prepare("SELECT comment_id FROM comments ORDER BY comment_id DESC LIMIT 1");
        $res->execute();
        return $res->fetch()[0];
    }
}
?>
