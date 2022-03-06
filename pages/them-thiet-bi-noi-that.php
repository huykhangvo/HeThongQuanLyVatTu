<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');
    // create code room
    $maNT = "MaNT" . time();

    
    if(isset($_POST['themvattu']))
    {
    // create array error
    $error = array();
    $success = array();
    $showMess = false;

    // get id in form
    $tenNT = $_POST['tenNT'];
    $mota = $_POST['mota'];
    $namsudung = $_POST['namsudung'];
    $nguongoc = $_POST['nguongoc'];
    $id_dvt = $_POST['id_dvt'];
    $gia = $_POST['gia'];
    $id_tructhuoc = $_POST['id_tructhuoc'];
    $chatluong = $_POST['chatluong'];
    $ghichu = $_POST['ghichu'];
    $phanloai = $_POST['phanloai'];
    $nguoitao = $_POST['nguoitao'];
    $ngaytao = date("Y-m-d H:i:s");
    $tinhtrang = $_POST['tinhtrang'];

    // validate
    if (empty($_POST['tenNT']))
    $error['tenNT'] = 'Vui lòng nhập<b> Tên thiết bị</b>';

    if (empty($_POST['mota']))
    $error['mota'] = 'Vui lòng nhập<b> Mô tả</b>';

    if (empty($_POST['gia']))
    $error['gia'] = 'Vui lòng nhập<b> Giá thiết bị</b>';

    // validate file image
    $target_dir = '../uploads/thietbinoithat/';
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($image) {
      // check file type
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
        ) {
        $error['formatImage'] = 'Ảnh không đúng định dạng: <b>jpg</b>, <b>jpeg</b>, <b>png</b>, <b>gif</b>';
        } else {
        // check exists
        if (file_exists($target_file)) {
            $nameImage = time() . "." . $imageFileType;
        } else {
            $nameImage = time() . "." . $imageFileType;
        }
    }
}

    // save to db
    if (!$error) {
        $showMess = true;

    if ($image) {

          // insert record
                $insert = "INSERT INTO danhsachdonoithat (maNT,img,tenNT,mota,namsudung,nguongoc,id_dvt,gia,id_tructhuoc ,chatluong,ghichu,phanloai,nguoitao,ngaytao,tinhtrang) VALUES ('$maNT', '$nameImage', '$tenNT', '$mota', '$namsudung', '$nguongoc', '$id_dvt', '$gia', '$id_tructhuoc', '$chatluong', '$ghichu', '$phanloai', '$nguoitao', '$ngaytao', '$tinhtrang')";
                // var_dump($insert);
                // exit;
                mysqli_query($conn, $insert);
                // add image to folder
                $dirFile = $target_dir . $nameImage;
                move_uploaded_file($_FILES["image"]["tmp_name"], $dirFile);
                $success['success'] = 'Thêm thiết bị mới thành công.';
                echo '<script>setTimeout("window.location=\'ds-thiet-bi-noi-that.php?p=noithat&a=dsvt\'",10000);</script>';
            } else {
                $nameImage = 'admin.png';
                // insert record
                $insert = "INSERT INTO danhsachdonoithat (maNT,img,tenNT,mota,namsudung,nguongoc,id_dvt,gia,id_tructhuoc ,chatluong,ghichu,phanloai,nguoitao,ngaytao,tinhtrang) VALUES ('$maNT', '$nameImage', '$tenNT', '$mota', '$namsudung', '$nguongoc', '$id_dvt', '$gia', '$id_tructhuoc', '$chatluong', '$ghichu', '$phanloai', '$nguoitao', '$ngaytao', '$tinhtrang')";
                mysqli_query($conn, $insert);
                $success['success'] = 'Thêm thiết bị mới thành công.';
                echo '<script>setTimeout("window.location=\'ds-thiet-bi-noi-that.php?p=noithat&a=dsvt\'",10000);</script>';
            }
        }


}
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm đồ nội thất
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li><a href="ds-thiet-bi-noi-that.php?p=noithat&a=dsvt">Thiết bị nội thất</a></li>
                <li class="active">Thêm thiết bị</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm thiết bị</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
                            <div class="box-body">
                                <?php
                                // show error
                                if ($row_acc['quyen'] != 0) {
                                    echo "<div class='alert alert-warning alert-dismissible'>";
                                    echo "<h4><i class='icon fa fa-ban'></i> Thông báo!</h4>";
                                    echo "Bạn <b> không có quyền </b> thực hiện chức năng này.";
                                    echo "</div>";
                                }
                                ?>

                                <?php
                                // show error
                                if (isset($error)) {
                                    if ($showMess == false) {
                                        echo "<div class='alert alert-danger alert-dismissible'>";
                                        echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                        echo "<h4><i class='icon fa fa-ban'></i> Lỗi!</h4>";
                                        foreach ($error as $err) {
                                            echo $err . "<br/>";
                                        }
                                        echo "</div>";
                                    }
                                }
                                ?>

                                <?php
                                // show success
                                if (isset($success)) {
                                    if ($showMess == true) {
                                        echo "<div class='alert alert-success alert-dismissible'>";
                                        echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                                        foreach ($success as $suc) {
                                            echo $suc . "<br/>";
                                        }
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chọn ảnh thiết bị: </label>
                                    <input type="file" class="form-control" name="image">
                                    <p class="help-block">Vui lòng chọn file đúng định dạng: jpg, jpeg, png, gif.</p>
                                </div>
                                <div class="form-group">
                                    <label >Tên thiết bị: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" placeholder="Nhập tên thiết bị..." name="tenNT">
                                </div>
                                <div class="form-group">
                                    <label >Mô tả: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" placeholder="Nhập mô tả..." name="mota">
                                </div>
                                <div class="form-group">
                                    <label >Năm sử dụng:<b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" name="namsudung" placeholder="Nhập năm sử dụng...">
                                </div>
                                <div class="form-group">
                                    <label >Nguồn gốc: <b style="color: red;">*</b></label>
                                    <select name="nguongoc" class="form-control">
                                        <option selected value="1">Dự án</option>
                                        <option value="2">Ngân sách</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Đơn vị tính: <b style="color: red;">*</b></label>
                                    <select name="id_dvt" class="form-control">
                                        <option selected value="1">Bộ</option>
                                        <option value="2">Đơn</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label >Giá: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control"  placeholder="Nhập giá của thiết bị..." name="gia">
                                </div>

                                
                                <div class="form-group">
                                    <label >Phòng kho: <b style="color: red;">*</b></label>
                                    <select name="id_tructhuoc" class="form-control">
                                    <?php 
                            $tenP = "SELECT * FROM phongtructhuoc";
                            $selecttenP = mysqli_query($conn, $tenP);
                            while($row = mysqli_fetch_array($selecttenP)){
                                            ?>
                                        <option selected value="<?= $row['id_tructhuoc']; ?>"><?= $row['tenP']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Chất lượng: <b style="color: red;">*</b></label>
                                    <select name="chatluong" class="form-control">
                                        <option selected value="100">100</option>
                                        <option value="80">80</option>
                                        <option value="60">60</option>
                                        <option value="40">40</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Loại thiết bị:<b style="color: red;">*</b></label>
                                    <select name="phanloai" class="form-control">
                                        <option value="1">Bàn - Ghế</option>
                                        <option value="2">Tủ</option>
                                        <option selected value="3">Chưa Phân Loại</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Ghi chú:</label>
                                    <input type="text" class="form-control" placeholder="Viết ghi chú thiết bị..." name="ghichu">
                                </div>

                                <div class="form-group">
                                    <label >Người tạo: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" disabled="" value="<?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>" name="nguoitao">
                                </div>
                                <div class="form-group">
                                    <label >Ngày tạo:</label>
                                    <input type="text" class="form-control" disabled="" data-inputmask="'alias': 'dd/mm/yyyy'" name="ngaytao" value="<?php echo date("d/m/Y"); ?>" data-mask>
                                </div>
                                <div class="form-group">
                                    <label >Tình trạng thiết bị:<b style="color: red;">*</b></label>
                                    <select class="form-control select2" style="width: 100%;" name="tinhtrang">
                                        <option selected="selected" value="1">Đang xử dụng</option>
                                        <option value="2">Chưa sử dụng</option>
                                        <option value="3">Chờ thanh lý</option>
                                        <option value="4">Đã thanh lý</option>
                                        <option value="5">Hư hỏng</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <?php
                                if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1)
                                    echo "<button type='submit' class='btn btn-primary' name='themvattu'><i class='fa fa-plus'></i> Thêm vật tư vào kho</button>";
                                ?>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>