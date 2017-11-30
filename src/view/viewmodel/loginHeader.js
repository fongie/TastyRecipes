//Controls the login header part
class loginHeader {
    constructor() {
        this.getInformationFromServer = this.getInformationFromServer.bind(this);

        //Class variables
        this.loggedIn = false;
        this.notLoggedIn = ko.observable(this.loggedIn);
        this.isLoggedIn = ko.observable(!(this.loggedIn));
        this.userName = ko.observable();
        this.text = ko.observable("Logged in as");
        this.logoutLink = "/src/view/requests/handle_logout.php";

        this.logOut = () => {
            $.post("/src/view/requests/handle_logout.php");
            this.isLoggedIn(true);
            this.notLoggedIn(false);
        };

        this.loggedinText = ko.computed(
            () => (this.text() + " " + this.userName()),
            this
        );

        //Ajax call
        this.getInformationFromServer();

    }

    getInformationFromServer() {
        $.getJSON(
            "/src/view/requests/getLogin.php", 
            (resp) => { 
                this.userName(resp.username); 
                this.notLoggedIn(resp.loggedIn);
                this.isLoggedIn(!resp.loggedIn);
            }
        );
    }
}
