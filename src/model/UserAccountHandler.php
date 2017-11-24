<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';

/** Handles users logging in or registering and provides access to the username and loggedin status
 */
class UserAccountHandler {

    private $username;
    private $loggedIn = false;

    /** Attempt to log in a user to the website
     */
    public function loginUser($username, $password) {

        $db = new DatabaseRequest();
        $hash = $db->getHashedPassword($username);

        if (password_verify($password, $hash)) {
            $this->username = $username;
            $this->loggedIn = true;
        }
    }

    /** Return wheither a user is logged in or not
     */
    public function loggedIn() {
        return $this->loggedIn;
    }

    /** Register new user account in the database
     *  Returns true on success, false on failure
     */
    public function registerNewUser($username, $password) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $db = new DatabaseRequest();
        $success = $db->addNewUser($username, $hashedPassword);

        # If succeeded, also log in
        if ($success) {
            $this->username = $username;
            $this->loggedIn = true;
            return true;
        } else {
            return false;
        }
    }

    /** Get currently logged in username
     */
    public function getUsername() {
        return $this->username;
    }
}
?>
