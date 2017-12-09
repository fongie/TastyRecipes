$(document).ready(() => {
    class commentSection {
        constructor() {

            this.commentUser= ko.observable("User");
            this.commentText = ko.observable ("COMMENTTEXT");

        }
    }

    ko.applyBindings(new commentSection(), document.getElementById('comments-list'));

});
