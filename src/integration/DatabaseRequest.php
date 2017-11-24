<?php

class DatabaseRequest {
    private $conn;
    
    private function validateInput($inp) {

    }
    /** Constructor makes connection to database using PDO
     */
    public function __construct() {
        # mysql connection
        $this->conn = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");
    }

    /**
     * Find out wheither there is a matching user/pass combination in database
     * Returns true if found false if no
     */
    public function findUserAccountMatch($username, $password) {

        # returns above 0 if found a matching username/pass combination
        $query = 'SELECT COUNT(*) FROM user_accounts WHERE username=":uname" AND password=":pwd"';
        $result = $this->conn->prepare($query);
        $params = array(
            'uname' => $username, 
            'pwd' => $password
        );
        $result->execute($params);

        if ($result->fetchColumn() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /** Try to add a new user to user_accounts table
     *  Returns true if successful, false if user name already exists
     */
    public function addNewUser($username, $password) {

        $query = "SELECT COUNT(*) FROM user_accounts WHERE username=:uname";
        $result = $this->conn->prepare($query);
        $params = array('uname' => $username);
        $result->execute($params);
        if ($result->fetchColumn() > 0) {
            return false;

            # If not, add user to table
        } else {
            $insertAccount = "INSERT INTO user_accounts(username, password) VALUES ('$username', '$password');";
            $this->conn->query($insertAccount);
            return true;
        }
    }

    /** Find a recipes ID.      
     *  Returns the ID as an integer
     */
    public function findRecipeID($recipeName) {
        $query = 'SELECT id FROM recipes WHERE name="'. $recipeName .'"';
        $res = $this->conn->query($query);
        return $res->fetchColumn();
    }

    /** Query to get username and comment rows for this specific recipe
     *  Returns the response as an Array of Arrays, each child array containing keys "username", "comment", and "comment_id"
     */
    public function fetchComments($recipeName) {
        $query = 'SELECT comment_id, username, comment FROM comments JOIN user_accounts ON comments.user_id = user_accounts.user_id JOIN recipes ON comments.recipe_id = recipes.id WHERE recipes.name="'.$recipeName .'"';
        $res = $this->conn->query($query);

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

        $findUserID = 'SELECT user_id FROM user_accounts WHERE username="'.$username.'";';
        $res = $this->conn->query($findUserID);
        $userID = $res->fetch()[0]; #because username is unique this always fetches exactly 1 value

        $insertComment = 'INSERT INTO comments(recipe_id, user_id, comment) VALUES ('.$recipeID.', '.$userID.', "'.$comment.'");';
        $res = $this->conn->query($insertComment);
    }

    /** Delete a comment from the database using its commentID
     */
    public function removeComment($commentID) {

        $deleteComment = "DELETE FROM comments WHERE comment_id=$commentID;";
        $this->conn->query($deleteComment);
    }

    /** Find username who wrote a certain comment (by ID)
     *  Returns the username as a string
     */
    public function findAuthorOfComment($commentID) {

        $qry = "SELECT username FROM user_accounts JOIN comments ON user_accounts.user_id = comments.user_id WHERE comment_id = $commentID";
        $res = $this->conn->query($qry);
        return $res->fetch()[0];
    }
}
?>
