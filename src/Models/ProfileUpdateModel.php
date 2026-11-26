<?php

require_once '../../Config/DBConnection.php';

class ProfileUpdateModel extends DBConnection
{

    public function profileUpdate($username, $password, $fullname, $nic, $email)
    {

        if ($password === '') {
            $query = "UPDATE user SET username = ?, name = ?, email = ? WHERE nic = ?";
            $stat = $this->conn->prepare($query);
            $stat->bind_param("ssss", $username, $fullname, $email, $nic);
        } else {
            $query = "UPDATE user SET username = ?, password = ?, name = ?, email = ? WHERE nic = ?";
            $stat = $this->conn->prepare($query);
            $stat->bind_param("sssss", $username, $password, $fullname, $email, $nic);
        }

        return $stat && $stat->execute();
    }

    public function fetch_single($nic)
    {
        $data = null;

        $query = "SELECT * FROM user WHERE nic = ?";

        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("s", $nic);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_assoc() ?: null;
        }
        return $data;
    }
}