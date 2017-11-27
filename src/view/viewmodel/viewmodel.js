$(document).ready(function () {

    function loginHeader() {
        this.loggedIn = false;
        this.notLoggedIn = ko.observable(this.loggedIn);
        this.isLoggedIn = ko.observable(!(this.loggedIn));
        this.userName = ko.observable();
        this.text = ko.observable("Logged in as");
        this.loggedinText = ko.computed(
            () => (this.text() + " " + this.userName()),
            this
        );

    }

    
ko.applyBindings(new loginHeader(), document.getElementById('login-div'));


});
