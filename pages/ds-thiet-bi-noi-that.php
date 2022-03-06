<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    if (isset($_POST['edit'])) {
        $id = $_POST['idNoithat'];
        echo "<script>location.href='sua-thiet-bi-noi-that.php?p=noithat&a=dsvt&id=" . $id . "'</script>";
    }

// delete record
    if(isset($_POST['delete']))
    {
    $showMess = true;

    $id = $_POST['idNoithat'];

    

    //   $delete = "DELETE FROM danhsachdonoithat WHERE id_noithat = $id";
    //   mysqli_query($conn, $delete);
    //   $success['success'] = 'Xóa vật tư thành công.';
    //   echo '<script>setTimeout("window.location=\'ds-thiet-bi-noi-that.php?p=noithat&a=dsvt\'",1000);</script>';
    }

    if (isset($_POST['xem'])) {
        $id = $_POST['idNoithat'];
        echo "<script>location.href='xem-chi-tiet-noi-that.php?p=noithat&a=dsvt&id=" . $id . "'</script>";
    }
    // show data
    $showData = "SELECT * FROM danhsachdonoithat ORDER BY id_noithat DESC";
    $result = mysqli_query($conn, $showData);
?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <span style="font-size: 18px;">Thông báo</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idNoithat">
                        <?php
                            
                        ?>
                        Bạn có thực sự muốn xóa tài khoản này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary" name="delete">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh sách đồ gỗ
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li><a href="ds-thiet-bi.php?p=salary&a=dsvt">Danh sách đồ gỗ</a></li>
                <li class="active">Kiểm kê tài sản</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Kiểm kê tài sản</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên thiết bị</th>
                                            <th>Giá</th>
                                            <th>Loại</th>
                                            <th>Tình trạng</th>
                                            <th>Xem</th>
                                            <th>Sửa</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><img src="../uploads/thietbinoithat/<?php echo $row['img']; ?>" width="80"></td>
                                                <td><?php echo $row['tenNT']; ?></td>
                                                <td style="color: #f72585;"><?php echo number_format($row['gia']) . 'VNĐ' ?></td>
                                                <td> <?php
                                                        if ($row['phanloai'] == 1) {
                                                            echo "<span class='label label-success'>Bàn - Ghế</span>";
                                                        } elseif ($row['phanloai'] == 2) {
                                                            echo "<span class='label label-primary'>Tủ</span>";
                                                        } else {
                                                            echo "<span class='label label-warning'>Chưa phân loại</span>";
                                                        }
                                                        ?>
                                                    </th>
                                                </td>
                                                <td> <?php
                                                        if ($row['tinhtrang'] == 1) {
                                                            echo "<span class='label label-success'>Đang sử dụng</span>";
                                                        } elseif ($row['tinhtrang'] == 2) {
                                                            echo "<span class='label label-primary'>Chưa sử dụng</span>";
                                                        }elseif ($row['tinhtrang'] == 3) {
                                                            echo "<span class='label label-primary'>Chờ thanh lý</span>";
                                                        }elseif ($row['tinhtrang'] == 4) {
                                                            echo "<span class='label label-primary'>Đã thanh lý</span>";
                                                        } else {
                                                            echo "<span class='label label-warning'>Hư hỏng</span>";
                                                        }
                                                        ?>
                                                    </th>
                                                </td>
                                                <th>
                                                    <?php
                                                    if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) {
                                                        echo "<form method='POST'>";
                                                        echo "<input type='hidden' value='" . $row['id_noithat'] . "' name='idNoithat'/>";
                                                        echo "<button type='submit' class='btn btn-primary'  name='xem'><i class='fas fa-eye'></i></button>";
                                                        echo "</form>";
                                                    } else {
                                                        echo "<button type='button' class='btn btn-primary' disabled><i class='fas fa-eye'></i></button>";
                                                    }
                                                    ?>

                                                </th>

                                                <th>
                                                    <?php
                                                    if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) {
                                                        echo "<form method='POST'>";
                                                        echo "<input type='hidden' value='" . $row['id_noithat'] . "' name='idNoithat'/>";
                                                        echo "<button type='submit' class='btn bg-orange btn-flat'  name='edit'><i class='fa fa-edit'></i></button>";
                                                        echo "</form>";
                                                    } else {
                                                        echo "<button type='button' class='btn bg-orange btn-flat' disabled><i class='fa fa-edit'></i></button>";
                                                    }
                                                    ?>

                                                </th>
                                                <th>
                                                    <?php
                                                    if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) {
                                                        echo "<button type='button' class='btn bg-maroon btn-flat' data-toggle='modal' data-target='#exampleModal' data-whatever='" . $row['id_noithat'] . "'><i class='fa fa-trash'></i></button>";
                                                    } else {
                                                        echo "<button type='button' class='btn bg-maroon btn-flat' disabled><i class='fa fa-trash'></i></button>";
                                                    }
                                                    ?>
                                                </th>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>