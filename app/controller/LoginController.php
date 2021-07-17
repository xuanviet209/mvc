<?php
namespace app\controller;

use app\controller\BaseController as Controller;
use app\model\LoginModel;

class LoginController extends Controller
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        // load view : giao dien trang dang nhap
        $this->loadView('login/index_view');
    }

    public function handle()
    {
        if(isset($_POST['btnLogin'])){
            $user = $_POST['username'] ?? '';
            $user = strip_tags($user);

            $pass = $_POST['password'] ?? '';
            $pass = strip_tags($pass);

            // hay kiem tra du lieu roi moi truyen vao model

            $info = $this->loginModel->checkLoginUser($user, $pass);
//            echo "<pre>";
//            print_r($info);
//            die;

            if(!empty($info)){
                // vao trang dashboard
                // luu thong tin user vao session
                $_SESSION['user'] = $info['username'];
                $_SESSION['id_user'] = $info['id'];
                $_SESSION['email'] = $info['email'];
                $_SESSION['role'] = $info['role'];
                $_SESSION['phone'] = $info['phone'];
                
                header('Location:index.php?c=dashboard');
            } else {
                header('Location:index.php?state=fail');
            }

        }
    }

    public function logout()
    {
        if(isset($_POST['btnLogout'])){
            //hủy hết session
            session_destroy();
            header('Location:index.php?c=login');
        }
    }
}

?>