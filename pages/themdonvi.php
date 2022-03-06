<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="class col-md-12">
            <?php
                include("db.php");
            $sql_tochuc = mysqli_query($conn,"SELECT * FROM tochuc ORDER BY id_tochuc  ASC");
            $sql_donvi = mysqli_query($conn, "SELECT * FROM phongtructhuoc ORDER BY id_tructhuoc ASC");
            ?>

            <h3>Select dữ liệu bằng Ajax</h3>
            <form action="POST" id="insert_data_hoten">
            <label>Tổ chức</label>
            <select class="form-control" id="tochuc" name="tochuc">
                <option>----Chọn tổ chức----</option>
                <?php while($rows_tochuc = mysqli_fetch_array($sql_tochuc)){
                 echo '<option value="'.$rows_tochuc['id_tochuc'].'">'.$rows_tochuc['tentochuc'].'</option>';   
                }?>
                <br>
                </select>


                <label>Đơn vị</label>
                <select class="form-control" id="donvi" name="donvi">
                <option>-----Chọn tổ chức trước-----</option>
                <br>
                </select>
<?php
 $id  = $_GET['id_tochuc'];
 $sql_tructhuoc = mysqli_query($conn,"SELECT phongtructhuoc.id_tructhuoc, phongtructhuoc.tenP FROM donvi, phongtructhuoc WHERE donvi .id_donvi = phongtructhuoc.id_donvi AND phongtructhuoc.id_donvi = '$id'");
 
?>
                <label>Tên phòng</label>
                <select class="form-control" id="phong" name="phong">
                    <?php 
                    while($rows_tructhuoc = mysqli_fetch_array($sql_tructhuoc)){
                        $output.= '<option value="'.$rows_tructhuoc['id_tructhuoc'].'">'.$rows_tructhuoc['tenP'].'</option>';
}
                    ?>
            </select>
            <!-- <label>Họ và tên</label>
            <input type="text" class="form-control" id="hovaten" placeholder="Điền họ và tên...">
            <br>
            <input type="button" name="insert_data" id="button_insert" value="Insert" class="btn btn-primary"> -->
            </form>
        </div>
    </div>
    <script type="text/javascript">
       $(document).ready(function (){
        $('#tochuc').change(function () {
            var id_tochuc  = $(this).val();
            // alert(id_tochuc);
            $.ajax({
                    url: "ajax-action.php", //gửi dữ liệu đến file ... để xử lý
                    method:"POST",
                    data:{id_tochuc:id_tochuc },
                    success:function (data) {
                            // alert('Loading dữ liệu thành công');
                            $('#donvi').html(data);
                            $('#phong').html(data);
                    }
                });
        });
       });
        </script>
    <!-- <script type="text/javascript">
        $('#button_insert').on('click',function () {
            var hovaten = $('#hovaten').val();
            var phone = $('#phone').val();
            var diachi = $('#diachi').val();
            var email = $('#email').val();
            var note = $('#note').val();

            if(hovaten == '' || phone == '' || diachi == '' || email == '' || note == ''){
                alert('Không được bỏ trống các trường');
            }else{
                $.ajax({
                    url: "ajaxaction.php", //gửi dữ liệu đến file ... để xử lý
                    method:"POST",
                    data:{hovaten:hovaten,phone:phone,diachi:diachi,email:email,note:note},
                    success:function (data) {
                            alert('Gửi dữ liệu thành công');
                            $('#insert_data_hoten')[0].reset();
                        
                    }
                });
            }
        })
        </script> -->
</body>
</html>