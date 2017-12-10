<?php
session_start();

echo '
            <div class="usercomments">
                <h4>Comments:</h4>
                <ul id="comments-list" data-bind="foreach: comments">
                    <li>
                        <div class="comment">
                            <div class="username-div">
                                <p><strong data-bind="text: username"></strong></p>
                            </div>
                            <div class="comment-div">
                            <p data-bind="text: comment"></p>

							
                                <!-- Delete key -->
                                <div class="delete-div">
                                    <form data-bind="submit: deleteComment">
                                        <input type="hidden" data-bind="value: comment_id">
                                        <button class="w3cbutton" type="submit">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
				
                    <!-- Post comment form -->
                    <form class="comment-form" action="/src/view/requests/post_comment.php" method="post">
                        <div class="comment-form-container">
                        <input type="text" placeholder="Write your comment here!" name="postcomment" required>
                        <input type="hidden" value="recipeID" name="recipeID">
                        <button class "w3cbutton" type="submit">Send</button>
                        </div>
                    </form>
					<p><a href="/src/view/login_page.php">Log in</a> to post a comment!</p>
            </div>
        <script src="/src/view/viewmodel/commentSection.js">
        </script>
';

