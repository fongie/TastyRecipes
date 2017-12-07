            <div class="usercomments">
                <h4>Comments:</h4>
                <ul id="comments-list" data-bind="foreach: comment">
                    <li>
                        <div class="comment">
                            <div class="username-div">
                                <strong><p data-bind="text: $data.username"></p></strong>
                            </div>
                            <div class="comment-div">
                            <p data-bind="text: $data.commentText"></p>

<script type="text/javascript">
ko.applyBindings({
comment: [
    {
        username: 'Username',
            commentText: 'Hello comments'
            },
            {
                username: 'hey',
                    commentText: 'boy'
            }
]

    });
</script>



<!-- OLD PHP WAY
<?php
echo '

                <ul class="comments-list">';
foreach ($comments as $comment) {
    $username = $comment["username"];
    $commentText = $comment["comment"];
    $commentID = $comment["comment_id"];
    echo "
        <li>
            <div class='comment'>
                <div class='username-div'>
                    <p><strong>$username</strong></p>
                </div>
                <div class='comment-div'>
                    <p>$commentText</p>
                ";
    #add delete button on comments written by the currently logged in user
    if ($username === $cntr->getUsername()) {
        echo '<div class="delete-div">
            <form action="/src/view/requests/delete_comment.php" method="post">
            <input type="hidden" value="'.$commentID.'" name="commentID">
            <input type="submit" value="Delete">
            </form>
            </div>';
    }
    echo "</div>
        </div>
        </li>
";
}
echo "</ul>";

# You can post comments only if logged in
if ($cntr->getLoggedIn()) {
    echo '<form class="comment-form" action="/src/view/requests/post_comment.php" method="post">
        <div class="comment-form-container">
        <input type="text" placeholder="Write your comment here!" name="postcomment" required>
        <input type="hidden" value="'.$recipeID.'" name="recipeID">
        <button class "w3cbutton" type="submit">Send</button>
        </div>';
} else {
    echo '<a href="/src/view/login_page.php">Log in</a> to post a comment!';
}
?>
-->
