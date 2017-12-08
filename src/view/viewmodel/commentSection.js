
class commentSection {

    constructor() {
        this.fetchComments = this.fetchComments.bind(this);

        this.comments = ko.observableArray([
            {
                username: 'Username',
                commentText: 'Hello comments'
            },
            {
                username: 'hey',
                commentText: 'boy'
            }
        ]);

    }

    fetchComments() {
    }



}
