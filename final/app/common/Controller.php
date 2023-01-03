<?php
class Controller {
    public function __construct()
    {
        if(!isset($_SESSION['authen'])){
            header('location:'.$this->base_url('login'));
        }
    }

    protected function render($view, $data=[]) {
        require_once _DIR_ROOT.'/app/view/'.$view.'.php';
    }

    protected function models($models) {
        require_once _DIR_ROOT.'/app/model/'.$models.'.php';
        return new $models;
    }
    function base_url($url = ''){
        return 'http://localhost/project_web/no5_quan_ly_su_kien_v1.0/final/'.$url;
    }
}
?> 