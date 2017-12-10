$(document).ready(() => {
    class commentSection {
        constructor() {
            this.deleteComment = this.deleteComment.bind(this);

            this.comments = ko.observableArray();
            $.getJSON(
                "/src/view/requests/get_comments.php", 
                (resp) => { 
                    let arr = resp;
                    arr.map((obj) => (obj.deleteComment = this.deleteComment));
                    console.log(arr);

                    this.comments(arr);
                }
            );
        }

        deleteComment(formElement) {
            const cID = $(formElement).find('input').val();
            const data = {
                commentID: ko.toJS(cID)
            };
            console.log(data);

            $.post(
                "/src/view/requests/delete_comment.php",
                data,
                (resp) => (console.log(resp)),
                "json"
            );
        }
    }
    ko.applyBindings(new commentSection(), document.getElementById('comments-list'));
});
