<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    $id = $_GET["id"];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    $sql_select_donvi = mysqli_query($conn, "SELECT * FROM donvi,phongtructhuoc WHERE donvi.id_donvi  =phongtructhuoc.id_donvi   AND phongtructhuoc.id_donvi  ='$id' ORDER BY phongtructhuoc.id_donvi  DESC");
    if (isset($_POST["submit"])) {
        // create error array
        $error = array();
        $success = array();
        $showMess = false;

        $id = $_GET["id"];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }

        $tenP = $_POST['tenP'];
        $khu = $_POST['khu'];
        $loaiP = $_POST['loaiP'];
        $sodo = $_POST['sodo'];
        $GVQL = $_POST['GVQL'];

        // validate
        if (empty($_POST['tenP']))
        $error['tenP'] = 'Vui lòng nhập <b> tên phòng</b>';



        // save to db
        if (!$error) {
            $showMess = true;
            // update record
            $sql_themphong = mysqli_query($conn, "INSERT INTO phongtructhuoc(id_donvi,tenP,loaiP,khu,id_sodo,quanly) VALUES('$id','$tenP','$loaiP','$khu','$sodo','$GVQL')");
            
            $success['success'] = 'Thêm thành công.';
            echo '<script>setTimeout("window.location=\'quan-ly-tai-san-chi-tiet-khoa.php?quanlytaisan=xem&id='.$id.'\'",1000);</script>';
        }
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Quản lý tài sản
                <?php 
            $id = $_GET["id"];
            $tendonvi = "SELECT * FROM donvi where id_donvi = '$id'";
            $selecttendv = mysqli_query($conn, $tendonvi);
            $tendonvi = mysqli_fetch_assoc($selecttendv);
            ?>
                <small> <?= $tendonvi['tendonvi']; ?> </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Quản lý tài sản</a></li>
                <li class="active" ><a href="quan-ly-tai-san-phong-ban.php?p=quanly&a=khoa">Phòng ban</a></li>
                <li><?= $tendonvi['tendonvi']; ?></li>
            </ol>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="list-itemmm">


                    <div class="itemK" data-toggle="modal" data-target="#themPhong">
                        <img src="../dist/images/add.png" width="60">
                        <div class="itemmname">Thêm mới</div>
                    </div>

                    <?php
                    while ($row = mysqli_fetch_array($sql_select_donvi)) {
                    ?>


                        <div class="itemK2">
                            <div class="edit-itemm">
                                <span class="edit-bttt"><i class="fas fa-edit"></i></span>
                                <span class="delete-bttt"><i class="fas fa-trash-alt"></i></span>
                            </div>
                            <a href="nhat-ky-phong-may-phong-ban.php?nhatky=nkpm&id=<?php echo $row['id_tructhuoc'] ?>">
                                <div class="abcde">
                                    <img src="../dist/images/loaiphong/<?= $row['loaiP']; ?>.png" width="65">
                                </div>
                                <div class="itemmname2" style="font-size: 12px; color:black;"><?= $row['tenP'] ?></div>
                            </a>
                            <img src="../dist/images/icons/<?= $row['khu']; ?>.png" width="20" style="margin:0px; position: absolute;z-index: 800;top:5px; left: 5px;">
                        </div>

                    <?php
                    }
                    ?>



                </div>


                            <!-- modal -->
            <div class="modal fade" id="themPhong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width: 105%;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm phòng</h5>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div style="display: flex; margin-top:10px;">
                                    <div>
                                        <label><i class="fas fa-file-signature"></i> Tên phòng:</label>
                                        <input type="" name="tenP" style="width: 150px;" id="txttenP">
                                    </div>
                                    <div style="margin-left: 30px;">
                                        <label><i class="fas fa-building"></i> Khu nhà:</label>
                                        <select class="slKhu" name="khu">
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="e">E</option>
                                            <option value="f">F</option>
                                        </select>
                                    </div>
                                </div>


                                <div style="display: flex; margin-top: 15px;">
                                    <div>
                                        <label><i class="fas fa-list"></i> Loại phòng:</label>
                                        <select class="loaiP" name="loaiP" style="width: 150px;">
                                            <option value="1">Phòng máy tính</option>
                                            <option value="2">Văn phòng</option>
                                            <option value="3">Kho</option>
                                            <option value="4">Xưởng cơ khí</option>
                                            <option value="5">Phòng họp</option>
                                            <option value="6">Phòng học lý thuyết</option>
                                        </select>
                                    </div>
                                    <div style="margin-left: 30px;">
                                        <label><i class="fas fa-sitemap"></i> Sơ đồ:</label>
                                        <select class="id_sodo" name="sodo">
                                            <option value="0">Không theo sơ đồ phòng máy</option>
                                            <option value="1">Theo sơ đồ phòng máy</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="margin-top: 18px;margin-bottom: 10px;">
                                    <label><i class="fas fa-user-shield"></i> Giáo viên quản lý:</label>
                                    <select class="slGVQL" name="GVQL" style="width: 67%;">
                                        <option value="Trần Thái Bảo">Trần Thái Bảo</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Hủy</button>
                                <input type="submit" name="submit" value="Thêm Phòng" class="btn btn-success">
                            </div>
                </form>
                        </div>
                    </div>
                </div>
                 <!-- modal -->

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