            <div class="usercomments" id="commentSection">
                <h4>Comments:</h4>

                <!-- Comments list -->
                <ul id="comments-list" data-bind="foreach: comments">
                    <li>
                        <div class="comment">
                            <div class="username-div">
                                <p><strong data-bind="text: username"></strong></p>
                            </div>
                            <div class="comment-div">
                                <p data-bind="text: comment"></p>

                                <!-- Delete key -->
                                <div class="delete-div" data-bind="visible: byCurrentUser">
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
                    <div class="comment-form-container" data-bind="visible: showPostForm">
                        <form class="comment-form" data-bind="submit: postComment">
                            <input type="text" data-bind="textInput: posttext" placeholder="Write your comment here!" name="posttext" required>
                            <button class="w3cbutton" type="submit">Send</button>
                        </form>
                    </div>
					<p data-bind="visible: !showPostForm()"><a href="/src/view/login_page.php">Log in</a> to post a comment!</p>

            </div>
        <script src="/src/view/viewmodel/commentSection.js">
        </script>

