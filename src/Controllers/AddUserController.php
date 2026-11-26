<?php

require_once __DIR__ . '/../Models/AddUserModel.php';

class AddUserController 
{
    private $addUserModel;

    public function __construct() 
    {
        $this->addUserModel = new AddUserModel();
    }

    public function formsubmit() 
    {
        $requiredFields = ['name', 'nic', 'email', 'username', 'password', 'roleid'];

        
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                header("Location: /Mini-Library/src/Views/registerstudent.php?status=empty");
                exit;
            }
        }

        $name     = trim($_POST['name']);
        $nic      = trim($_POST['nic']);
        $email    = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']); 
        $roleid   = intval($_POST['roleid']);

        $profilepicData = null;
        if (!empty($_FILES['profilepic']['tmp_name'])) {
            $profilepicData = file_get_contents($_FILES['profilepic']['tmp_name']);
        }

        
        $result = $this->addUserModel->addMember($name, $nic, $email, $username, $password, $roleid, $profilepicData);

        if ($result) {
            header("Location: /Mini-Library/src/Views/libariandashboard.php?status=success");
        } else {
            header("Location: /Mini-Library/src/Views/registerstudent.php?status=error");
        }
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AddUserController())->formsubmit();
}