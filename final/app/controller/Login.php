<?php
class Login extends Controller {
    public $AdminModel;

    function __construct() {
        // parent::__construct();
        // Session::init();
        $this->AdminModel = $this->models('AdminModel');
    }

    public function index() {
        $this->render('masterlayout', [
            'page' => 'login/index'
        ]);
    }
    public function login(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $input_valid = true;
        unset($_SESSION['authen']);
        $err_login="";
        $error = array(	"login_id"=>"",
                        "password"=>"");
        
        if (isset($_POST['submit_login'])) {
            if (empty($_POST["account"])) {
                $error["login_id"] = "Hãy nhập login id";
                $input_valid = false;
            } elseif (strlen($_POST["account"])<4) {
                $error["login_id"]="Hãy nhập login tối thiểu 4 ký tự";
                $input_valid = false;
            }
            if (empty($_POST["password"])) {
                $error["password"] = "Hãy nhập password";
                $input_valid = false;
            } elseif (strlen($_POST["password"])<6) {
                $error["password"]="Hãy nhập password tối thiểu 6 ký tự";
                $input_valid = false;
            }
            
            if ($input_valid) {

                    $idlogin = $_POST['account'];
                    $pass = md5($_POST['password']);
                    $admin = $this->AdminModel->Checklogin($idlogin,$pass);
                    if (!empty($admin)) {
                        $_SESSION['authen']= $admin;
                        $_SESSION['timelogin'] = date("Y-m-d h:i:s");
                        // header('location: '.URL);
                        header('location:'.$this->base_url('home'));
                    }else {
                        $err_login = "Login ID và password không đúng";
                        $this->render('masterlayout', [
                            'page' => 'login/index',
                            'error_login' =>$err_login
                        ]);
                    }
                
            } else {
                $this->render('masterlayout', [
                    'page' => 'login/index',
                    'error_id' =>$error['login_id'],
                    'error_password' =>$error['password'],
                ]);
            }
        }
    }
    public function run(){

    }
    public function logout(){
        unset($_SESSION['authen']);
        session_destroy();
        header('location:'.$this->base_url('login'));
    }

}
?> 