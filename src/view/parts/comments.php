            <div class="usercomments">
                <h4>Comments:</h4>
                <ul id="comments-list" data-bind="foreach: comment">
                    <li>
                        <div class="comment">
                            <div class="username-div">
                                <p><strong data-bind="text: username"></strong></p>
                            </div>
                            <div class="comment-div">
                            <p data-bind="text: commentText"></p>
                            </div>
                        </div>
                    </li>
                </ul>
        </div>
