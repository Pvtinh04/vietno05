<?php
class User extends Controller{

    public $userModel;

    public $types = ['1' => 'Sinh viên', '2' => 'Giáo viên', '3' => 'Sinh viên cũ'];

    function __construct() {
        $this->userModel = $this->models('UserModel');
    }

    public function index() {
        
        $rs = $this->userModel->select_array();

        $this->render('masterlayout', [
            'page' => 'user/index',
            'array' => $rs,
            'types' => $this->types
        ]);
    }

    // Handle search
    public function search() {
        $type = $_GET["type"];
        $keyword = $_GET["keyword"];

        $t = 0;
        $k = '%%';

        if(!empty($type)) {
            $t = $type;
        }
        if(!empty($keyword)) {
            $k = '%'.$keyword.'%';
        }

        if ($t == 0) {
            $where_string = ['name' => $k, 'description' => $k];

            $rs = $this->userModel->searchUser('*', NULL, $where_string, 'OR');

            $this->render('masterlayout', [
                'page' => 'user/index',
                'array' => $rs,
                'types' => $this->types
            ]);
        } else {
            $where = ['type' => $t];
            $where_string = ['name' => $k, 'description' => $k];

            $rs = $this->userModel->searchUser('*', $where, $where_string, 'OR');

            $this->render('masterlayout', [
                'page' => 'user/index',
                'array' => $rs,
                'types' => $this->types
            ]);
        }
    }

    public function add() {
        
    }

    public function update($id) {
        echo 'id: '.$id;
    }

    public function delete() {
        $user_id = $_POST['user_id'];
        $rs = $this->userModel->deleteByUserId($user_id);
        if ($rs == true) {
            echo "successfully";
        }
    }
}
?>