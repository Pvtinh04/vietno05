<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <!-- Bootstrap DatePicker -->
    <link rel="stylesheet" href="./web/css/style_login.css" type="text/css" />
    <title>Trang Chủ</title>
</head>
<body> 
<?php
if(!isset($_SESSION['authen'])){
    header('location:http://localhost/project_web/no5_quan_ly_su_kien_v1.0/final/login');
}
?>
    <div style="border: 1px solid #5b9bd5; height:500px" class="container">
        <div class="row" style="margin-bottom:5px;">
        <label for="">Tên login: <span>
            <?php
             if(isset($_SESSION['authen'])){
        echo $_SESSION['authen']['login_id'];
    } 
    ?>
    </span></span></label> 
        </div>
        <div class="row" style="margin-bottom:50px;">
        <label for="">Thời gian login : <span><?php if(isset($_SESSION['timelogin'])){
        echo $_SESSION['timelogin'];
    } ?></span></label>
        </div>
        <div class="row" style="margin-bottom:20px;">
        <a href="login/logout">LOGOUT</a>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Phòng học</label>
                <ul class="list-group list-group-flush">
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li></a>
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Thêm mới</li></a>
                </ul>
            </div>
            <div class="col">
                <label for="">Người dùng</label>
                <ul class="list-group list-group-flush">
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li></a>
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Thêm mới</li></a>
                </ul>
            </div>
            <div class="col">
                <label for="">Sự kiện</label>
                <ul class="list-group list-group-flush">
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li></a>
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Thêm mới</li></a>
                </ul>
            </div>
            <div class="col">
                <label for="">Tổ chức sự kiện</label>
                <ul class="list-group list-group-flush">
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Tìm kiếm</li></a>
                    <a style="text-decoration: none" href=""><li style="color:blue;border:none" class="list-group-item">Thêm mới</li></a>
                </ul>
            </div>
            
            
        </div>
    </div>

</body>
</html>