$(document).ready(() => {
    class commentSection {
        constructor() {
            this.fetchComments = this.fetchComments.bind(this);
            const comments = this.fetchComments();
            this.comment = ko.observableArray(comments);

        }

        fetchComments() {
            $.getJSON(
                "/src/view/requests/get_comments.php", 
                (resp) => { 
                    console.log(resp);
                }
            );
            let comments = [
                { 
                    commentUser: 'User',
                    commentText: 'Hello guys'
                },
                {
                    commentUser: 'Foo',
                    commentText: 'Bar'
                }
            ];

            return comments;
        }
    }

    ko.applyBindings(new commentSection(), document.getElementById('comments-list'));
});
