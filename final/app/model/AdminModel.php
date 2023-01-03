<?php 
require_once _DIR_ROOT."/app/model/MyModels.php";

class AdminModel extends MyModels {
    protected $table = "admins";
    public function Checklogin($idlogin,$password)
        {
            return $this->select_one('login_id,password,actived_flag',['login_id'=>$idlogin,'password'=>$password,'actived_flag'=>1]);
        }
}
?>