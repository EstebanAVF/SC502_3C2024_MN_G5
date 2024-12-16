<?php

require_once '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // Method to create a new user
    public function createUser($data) {
        if (isset($data['name'], $data['email'], $data['password'], $data['role_id'])) {
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
            return $this->userModel->create($data['name'], $data['email'], $hashedPassword, $data['role_id']);
        } else {
            return ['status' => 'error', 'message' => 'Missing required fields.'];
        }
    }

    // Method to get all users
    public function getAllUsers() {
        return $this->userModel->getAll();
    }
}
?>
