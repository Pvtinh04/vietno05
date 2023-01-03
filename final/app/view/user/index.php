<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Người dùng</title>
    <base href="http://localhost/final/">
    <link rel="stylesheet" href="web/css/user/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div class="main">
    <div class="wrapper">
        <div class="form-search">
            <form action="user/search" method="GET">
                <div class="field">
                    <label for="type" class="field__label">Phân loại</label>
                    <select id="type" name="type">
                        <option></option>
                        <?php
                            foreach($data['types'] as $key => $value) {
                                echo '<option value="' . $key . '">' . $value . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="field">
                    <label for="keyword" class="field__label">Từ khóa</label>
                    <input type="text" name="keyword" id="keyword" class="field__input"/>
                </div>

                <div class="button">
                    <button type="submit" class="btn-submit">Tìm kiếm</button>
                </div>
            </form>
        </div>

        <div class="result">
            <div>
                <span>Số thành viên tìm thấy: <span class="total"><?php echo count($data['array']); ?></span></span>
            </div>

            <div>
                <a href="user/add">
                    <input type="submit" class="btn-add" value="Thêm" />
                </a>
            </div>
        </div>

        <div class="list-student">
            <table>
                <tr>
                    <th>No</th>
                    <th>Tên thành viên</th>
                    <th>Phân loại</th>
                    <th>Mô tả chi tiết</th>
                    <th>Action</th>
                </tr>

                <?php
                    $i = 1;
                    foreach($data['array'] as $key => $value) {
                        $type = '';
                        if ($value['type'] == '1') {
                            $type = 'Sinh viên';
                        } else if ($value['type'] == '2') {
                            $type = 'Giáo viên';
                        } else if ($value['type'] == '3') {
                            $type = 'Sinh viên cũ';
                        } ?>

                        <tr class="user<?= $value['user_id'] ?>">
                            <td><?= $i ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $type ?></td>
                            <td><?= $value['description'] ?></td>
                            <td>
                                <div class="actions">
                                    <button id="del<?= $value['user_id'] ?>" class="btn-action" onclick="del('<?= $value['user_id'] ?>')" data-control="user">Xóa</button>
                                    <a href="user/update/<?= $value['id'] ?>"><button class="btn-action">Sửa</button></a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>

            </table>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function del(user_id) {
        const control = $('#del' + user_id).attr('data-control');

        Swal.fire({
        text: `Bạn chắc chắn muốn xóa user ${user_id}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: control + '/delete',
                    method: "post",
                    data: {user_id},
                    // dataType: 'json',
                    success: function(response) {
                        if (response === 'successfully') {
                            Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công user ' + user_id + '!',
                            'success'
                            );
                            $('.user' + user_id).remove();
                            let t = $('.total').html();
                            $('.total').html(t-1);
                        }
                    }
                });
            }
        })
    }
</script>
</body>
</html>