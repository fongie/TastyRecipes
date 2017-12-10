$(document).ready(() => {
    class commentSection {
        constructor() {
            this.deleteComment = this.deleteComment.bind(this);
            this.postComment = this.postComment.bind(this);

            this.comments = ko.observableArray();
            this.posttext = ko.observable();

            //Get all comments as array
            $.getJSON(
                "/src/view/requests/get_comments.php", 
                (resp) => { 
                    let arr = resp;
                    arr.map((obj) => (obj.deleteComment = this.deleteComment)); //add to every comment in array the delete function, otherwise knockout doesnt find it
                    this.comments(arr);
                }
            );
        }

        postComment() {
            const data = {
                posttext: ko.toJS(this.posttext)
            };

            $.post(
                "/src/view/requests/post_comment.php",
                data,
                (resp) => (window.location.reload()), // use javascript to reload after server is done deleting
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
                (resp) => (window.location.reload()), // use javascript to reload after server is done deleting
                "json"
            );
        }
    }

    ko.applyBindings(new commentSection(), document.getElementById('commentSection'));
});
