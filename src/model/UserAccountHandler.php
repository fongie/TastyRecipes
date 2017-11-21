<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/integration/DatabaseRequest.php';

class UserAccountHandler {

    private $username;
    private $loggedIn = false;

    public function loginUser($username, $password) {

        $db = new DatabaseRequest();
        $foundMatch = $db->findUserAccountMatch($username, $password);

        #login if found matching user/pass
        if ($foundMatch) {

            # remember current username
            $this->username = $username;
            $this->loggedIn = true;
            $_SESSION["uname"] = $username;
        }
    }
    
    public function loggedIn() {
        return $this->loggedIn;
    }
}
?>
