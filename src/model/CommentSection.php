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

        $db = new DatabaseRequest();
        $db->insertComment($recipeID, $username, $comment);
    }
}

?>
