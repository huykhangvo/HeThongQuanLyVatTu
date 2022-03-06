<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    if (isset($_POST["submit"])) {
        #lấy tiêu đề tệp
        // create error array
        $error = array();
        $success = array();
        $showMess = false;
        $id = $_GET["id"];
        $title = $_POST["title"];

        if (empty($_POST['title']))
            $error['title'] = 'Vui lòng nhập <b> tên  file</b>';
        $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

        #tên tệp tạm thời để lưu trữ tệp
        $tname = $_FILES["file"]["tmp_name"];

        #tải lên đường dẫn thư mục
        $uploads_dir = '../uploads/drive/';
        #ĐỂ di chuyển tệp đã tải lên đến vị trí cụ thể
        move_uploaded_file($tname, $uploads_dir . '/' . $pname);

        if (!$error) {
            $showMess = true;
            #truy vấn sql để chèn vào cơ sở dữ liệu
            $sql = "INSERT into fileup(id_folder,title_fileup,image_fileup) VALUES('$id','$title','$pname')";
            $success['success'] = 'Thêm thành công.';
            if (mysqli_query($conn, $sql)) {

                echo "File Sucessfully uploaded";
                echo '<script>setTimeout("window.location=\'thanh-toan-chi-tiet.php?quanly=xem&id=' . $id . '\'",1000);</script>';
            } else {
                echo "Lỗi";
            }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }
    $sql_select = mysqli_query($conn, "SELECT * FROM folder,fileup WHERE folder.id_folder=fileup.id_folder AND fileup.id_folder='$id' ORDER BY fileup.id_fileup DESC");

    //Xóa
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        if (!$error) {
            $showMess = true;

            // remove image
            $dir = '../uploads/drive/';
            $getImage = "SELECT image_fileup FROM fileup WHERE id_fileup = $id";
            $rs_getImage = mysqli_query($conn, $getImage);
            $row_getImage = mysqli_fetch_array($rs_getImage);
            $image = $row_getImage['image_fileup'];
            if ($image != 'file.png') //nếu có hình admin.png thì ko xoá được còn khác thì xoá
                unlink($dir . $image);

            // remove record
            $delRecord = "DELETE FROM fileup WHERE id_fileup ='$id'";
            mysqli_query($conn, $delRecord);
            $success['success'] = 'Xoá thành công.';
            echo '<script>setTimeout("window.location=\'thanh-toan.php?p=salary&a=thanhtoan\'",1000);</script>';
        }
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php
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
        // show error
        if (isset($success)) {
            if ($showMess == true) {
                echo "<div class='alert alert-success alert-dismissible'>";
                echo "<h4><i class='icon fa fa-check'></i>Thành công !</h4>";
                foreach ($success as $suc) {
                    echo $suc . "<br/>";
                }
                echo "</div>";
            }
        }
        ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thanh toán
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li class="active">Thanh toán</li>
            </ol>
            <div>
                <div>
                    <div class="list-itemmm">
                        <div class="itemK" data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="../dist/images/add.png" width="60">
                            <div class="itemmname">Update File</div>
                        </div>

                        <?php
                        while ($row = mysqli_fetch_array($sql_select)) {
                        ?>
                            <div class="itemK2">
                                <div class="edit-itemm">
                                    <span class="edit-bttt"><a href="../uploads/drive/<?php echo $row['image_fileup']; ?>"><i class="fas fa-cloud-download-alt"></i></a></span>
                                    <span class="delete-bttt"><a href="?xoa=<?php echo $row['id_fileup'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa file: <?= $row['image_fileup'] ?>?')"><i class="fas fa-trash-alt"></i></a></span>
                                </div>
                                <div class="abcde">
                                    <img src="../uploads/drive/file.png" width="65">
                                </div>
                                <div class="itemmname2" style="height: 25px; font-size: 15px;"><?php echo $row['title_fileup']; ?></div>
                            </div>





                        <?php
                        }
                        ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Update File Phiếu thanh toán</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name File Upload</label>
                                            <input type="text" name="title" class="form-control" placeholder="Name File Upload">
                                        </div>


                                        <div class="form-group">
                                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                                            <small id="exampleFormControlFile1" class="form-text text-muted">Vui lòng chọn file đúng định dạng: .jpg, .jpeg, .png, .gif, .pdf.</small>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="close" value="Close" data-dismiss="modal" class="btn btn-danger">
                                            <input type="submit" name="submit" value="Upload" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
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