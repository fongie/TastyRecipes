<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';

/** Represents and handles logic concerning the Comment section on a recipe site
 */
class CommentSection {

    private $comments;

    /** Create a new comment section for a recipeName
     */
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

    /** Add a comment to the commentsection of this recipe site
     */
    public function postComment($recipeID, $username, $comment) {
        $db = new DatabaseRequest();
        $db->insertComment($recipeID, $username, $comment);
    }

    /** Allow a user to remove one of their comments from the comment section of this recipe site
     */
    public function deleteComment($commentID, $currentLoggedinUser) {
        $db = new DatabaseRequest();
        $commentAuthor = $db->findAuthorOfComment($commentID);

        # To prevent someone from removing a comment not their own
        if ($commentAuthor === $currentLoggedinUser) {
            $db = new DatabaseRequest();
            $db->removeComment($commentID);
        }
    }
}
?>
