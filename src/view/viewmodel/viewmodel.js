//Loads KO bindings. Classes are in separate files with filenames corresponding to class name
$(document).ready(() => {

    if (!ko.dataFor(document.getElementById('login-div'))) {
        ko.applyBindings(new loginHeader(), document.getElementById('login-div'));
    }
    if (!ko.dataFor(document.getElementById('login-page'))) {
        ko.applyBindings(new loginPage(), document.getElementById('login-page'));
    }

    ko.applyBindings(new commentSection(), document.getElementById('comments-list'));

});
