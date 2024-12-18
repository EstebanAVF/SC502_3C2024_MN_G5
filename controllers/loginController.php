<?php
class LoginController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function login($username, $password) {
        $user = $this->userModel->authenticate($username, $password);

        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: /dashboard");
        } else {
            return "Invalid username or password.";
        }
    }
}
?>
