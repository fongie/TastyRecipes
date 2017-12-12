$(document).ready(() => {
    class commentSection {
        constructor() {
            this.deleteComment = this.deleteComment.bind(this);
            this.postComment = this.postComment.bind(this);

            this.comments = ko.observableArray();
            this.posttext = ko.observable();
            this.showPostForm = ko.observable(false);
            this.currentUsername = "";

            //Get all comments as array
            $.getJSON(
                "/src/view/requests/get_comments.php", 
                (resp) => { 
                    let arr = resp;
                    arr.map((obj) => (obj.deleteComment = this.deleteComment)); //add to every comment in array the delete function, otherwise knockout doesnt find it
                    this.comments(arr);
                }
            );

            //Find out wheither post comment form should show or not
            $.getJSON(
                "/src/view/requests/get_login.php",
                (resp) => {
                    this.showPostForm(resp.loggedIn);
                    if (resp.loggedIn) {
                        this.currentUsername = resp.username;
                    }
                }
            );
        }

        /* Post comment and add it to the current observable array without reloading page
        */
        postComment() {
            const data = {
                posttext: ko.toJS(this.posttext)
            };

            $.post(
                "/src/view/requests/post_comment.php",
                data,
                (resp) => {
                    this.comments.push({byCurrentUser: true, comment_id: resp, username: this.currentUsername, comment: data.posttext, deleteComment: this.deleteComment});
                },
                "json"
            );
        }

        deleteComment(formElement) {
            const cID = $(formElement).find('input').val(); //find the hidden value in form element
            const data = {
                commentID: ko.toJS(cID)
            };

            $.post(
                "/src/view/requests/delete_comment.php",
                data,
                (resp) => (this.comments.remove((comment) => comment.comment_id == cID)),
                "json"
            );
        }
    }

    ko.applyBindings(new commentSection(), document.getElementById('commentSection'));
});
