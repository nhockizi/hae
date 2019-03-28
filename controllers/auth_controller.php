<?php
require_once('controllers/base_controller.php');
require_once('models/user.php');

class AuthController extends BaseController
{
    function __construct()
    {
        $this->folder = 'auth';
    }

    public function index()
    {
        $this->renderPartial('index');
    }

    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);
            $password = md5($password);
            $result = User::login($username, $password);
            echo json_encode($result);
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
    public function logout(){
        unset($_SESSION['user']);
        header('Location: index.php?controller=pages&action=index');
    }
}