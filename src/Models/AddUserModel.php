<?php

require_once '../../Config/DBConnection.php';

class AddUserModel extends DBConnection{
    

    public function __construct() {
        parent::__construct();
    }

    public function addMember($name, $nic, $email, $username, $password, $roleid, $profilepic) {
        $stmt = $this->conn->prepare(
            "INSERT INTO user (name, nic, email, username, password, roleid, profilepic)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssis", $name, $nic, $email, $username, $password, $roleid, $profilepic);
        return $stmt->execute();
    }
}