<?php

class DatabaseRequest {
    private $conn;
    
    /** Constructor makes connection to database using PDO
     */
    public function __construct() {
        # mysql connection
        $this->conn = new pdo("mysql:host=localhost;dbname=tasty_recipes;charset=utf8mb4", "tasty_user", "tasty");
    }

    /**
     * Find out wheither there is a matching user/pass combination in database
     * Returns true if found false if no
     */
    public function findUserAccountMatch($username, $password) {

        # returns above 0 if found a matching username/pass combination
        $query = "SELECT COUNT(*) FROM user_accounts WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($query);

        if ($result->fetchColumn() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>