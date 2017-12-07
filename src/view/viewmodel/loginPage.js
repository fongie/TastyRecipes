
class loginPage {

    constructor() {
        this.loginUser = this.loginUser.bind(this);

        this.username = ko.observable();
        this.password = ko.observable();
        this.showLoginFail = ko.observable();
    }

    loginUser() {

        const data = {
            uname : ko.toJS(this.username),
            psw : ko.toJS(this.password)
        };

        $.post(
            "/src/view/requests/handle_login.php",
            data,
            (resp) => {
                if (resp.result) {
                    //TODO WORK HERE
                    console.log("SUCCESS");
                    window.location = '/index.php';
                } else {
                    this.showLoginFail(true);
                    console.log("FAIL");
                }
            },
            "json"
        );
    }


}
