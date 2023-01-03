<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="../../../web/css/user" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
        .container_login {
    height: 280px;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #5b9bd5;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.error {
    color: red;
    width: 400px;
    text-align: left;
    height: 30px;
    padding-top: 10px;
    padding-left: 10px;
}

.form-container {
    display: flex;
    width: 450px;
    margin-left: 125px;
}

.form-label {
    text-align: center;
    padding: 10px 0;
}

.input-label {
    margin-left: 20px;
    height: 40px;
    width: 320px;
    border: 1px solid #42719b;
}

.button-container {
    margin: 0 auto;
    display: flex;
    justify-content: center;
}

.button {
    height: 45px;
    width: 130px;
    font-size: 15px;
    background-color: #5b9bd5;
    border-radius: 5px;
    color: white;
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Đăng nhập</title>
</head>
<body>
    <div style="height: 350px; width: 550px;  margin: 0 auto; border: 1px solid #5b9bd5; display: flex; justify-content:center;  flex-direction: column; align-items: center;" class="container_login">
            <form action="login/login" method="post">
                 <div class="form-container" style="width: 450px; margin-left:255px;">
                    <label style="color: red">
                    <?php 
                        if (isset($data['error_id'])) {
                            echo $data['error_id'];
                        }

                        if (isset($data['error_login'])) {
                            echo $data['error_login'];
                        }
                        
                    ?>
                    </label>
                </div> 
                <div class="form-container">
                    <div class="form-label" style="width: 110px;"><label>Người dùng</label></div>
                    <input type="text" name="account" class="input-label" placeholder="" autofocus value="<?php echo isset($_POST["account"]) ? $_POST["account"] : ''; ?>">
                </div>
                <div class="form-container" style="width: 450px; margin-left:255px;">
                    <label style="color: red">
                    <?php 
                        if (isset($data['error_password'])) {
                            echo $data['error_password'];
                        }
                    ?>
                    </label>
                </div>
                <div class="form-container">
                    <div class="form-label" style="width: 110px;"><label>Password</label></div>
                    <input type="password" name="password" class="input-label" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                </div>
                <div class="form-container" style="margin-left:250px;">
                <a style="color:black;  font-style: oblique;" href="index.php?page=resetpassword">Quên mật khẩu</a>
                </div>  
                <div class="button-container" style="margin-top: 20px;">
                    <input type="submit" value="Đăng nhập" class="button" name="submit_login" style="cursor: pointer">
                </div>
            </form>
        </div>
</body>
</html>