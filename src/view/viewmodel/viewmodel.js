//Loads KO bindings. Classes are in separate files with filenames corresponding to class name
$(document).ready(() => {

    ko.applyBindings(new loginHeader(), document.getElementById('login-div'));
    ko.applyBindings(new loginPage(), document.getElementById('login-page'));

});
