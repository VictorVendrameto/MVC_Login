<?php

use Controller\Controller;
use \Model\LoginModel;

class LoginController extends Controller
{
    public static function index()
    {
        $model = new LoginModel();
        $model->getAllRows();

        include 'View/modules/Login/FormLogin.php';
        parent::render('Login/FormLogin');
    }

    public static function form()
    {
        $model = new LoginModel();

        if(isset($_GET['id']))
        {
            $model = $model->getById((int) $_GET['id']);
        }

        include 'View/modules/Login/FormLogin.php';
    }

    public static function auth()
    {
        $model = new LoginModel();

        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $user_log= $model->autenticar();

        if ($user_log !== null)
        {
            $_SESSION['user_log'] = $user_log;

            header("Location: /");
        }
        else
            header("Location: /login?erro=true");
    }

    public static function logout()
    {
        unset($_SESSION["user_log"]);

        parent::isAuthenticated();
    }

    public static function save()
    {
        $Login = new LoginModel();
        $Login->id = $_POST['id'];
        $Login->email = $_POST['email'];
        $Login->senha = $_POST['senha'];
        $Login->save();
        header("Location: /login");
    }
}