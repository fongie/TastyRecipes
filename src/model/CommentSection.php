<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';

class CommentSection {

    private $comments;

    public function __construct($recipeName) {
        $db = new DatabaseRequest();
        $this->comments = $db->fetchComments($recipeName);
    }

    /** Get comments as an Array of Arrays, each child array containing keys
     *  "username", "comment", and "comment_id".
     */
    public function getComments() {
        return $this->comments;
    }

    public function postComment($recipeID, $username, $comment) {

        # mysql connection
        $pdo = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");

        $findUserID = 'SELECT user_id FROM user_accounts WHERE username="'.$username.'";';
        $res = $pdo->query($findUserID);
        $userID = $res->fetch()[0]; #because username is unique this always fetches exactly 1 value

        $insertComment = 'INSERT INTO comments(recipe_id, user_id, comment) VALUES ('.$recipeID.', '.$userID.', "'.$comment.'");';
        $res = $pdo->query($insertComment);
        return true;
        //echo $res;
    }
}

?>
