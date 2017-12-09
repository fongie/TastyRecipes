$(document).ready(() => {
    class commentSection {
        constructor() {
            this.comments = ko.observableArray();
            $.getJSON(
                "/src/view/requests/get_comments.php", 
                (resp) => (this.comments(resp))
            );
        }
    }
    ko.applyBindings(new commentSection(), document.getElementById('comments-list'));
});
