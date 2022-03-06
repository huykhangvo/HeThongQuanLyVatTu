<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    if (isset($_POST["themdonvi"])) {
        // create error array
        $error = array();
        $success = array();
        $showMess = false;

        $donvi = $_POST['donvi'];
        $id = $_POST['tochuc'];
        $hinhanh = $_POST['hinhanh'];
        // validate
        if (empty($_POST['donvi']))
            $error['donvi'] = 'Vui lòng nhập<b> Tên đơn vị</b>';

        if (empty($_POST['hinhanh']))
        $error['hinhanh'] = 'Vui lòng gán link<b> Hình ảnh</b>';

        if (!$error) {
            $showMess = true;
            $insert = "INSERT INTO `donvi` (`tendonvi`, `id_tochuc`, `icon`) VALUES ('$donvi','$id','$hinhanh')";
            // var_dump($insert);
            // exit;
            $result = mysqli_query($conn, $insert);
            if ($result) {
                $success['success'] = 'Thêm đơn vị thành công';
                echo '<script>setTimeout("window.location=\'them-don-vi.php?p=themdonvi&a=themdonvi\'",1000);</script>';
            }
        }
    }






?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm đơn vị
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li class="active">Thêm đơn vị</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" enctype="multipart/form-data">
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
            <div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Thêm đơn vị</div>
						<div class="panel-body">
							<form method="post" enctype="multipart/form-data" role="form">
                                                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn tổ chức:<b style="color: red;">*</b></label>
                                    <select class="form-control select2" name="tochuc" style="width: 100%;">
                                    <?php
                                    $sql_tochuc = mysqli_query($conn,"SELECT * FROM tochuc ORDER BY id_tochuc  ASC");
                                    ?>
                                        <?php while($rows_tochuc = mysqli_fetch_array($sql_tochuc)){
                 echo '<option value="'.$rows_tochuc['id_tochuc'].'">'.$rows_tochuc['tentochuc'].'</option>';   
                }?>
                                    </select>
                                </div>
								<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên đơn vị: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên đơn vị..." name="donvi">
                                </div>

								</div>


								<div class="col-md-6">
									<div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh:<a href="https://huykhangvo.github.io/api-img/" target="_blank"> Update ảnh lấy link tại đây</a></label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên đơn vị..." name="hinhanh">
									</div>


								</div>
					</div>

				</div>
			</div>
		</div>





                            <!-- /.box-body -->
                            <div class="box-footer">
                                <?php
                                if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1)
                                    echo "<button type='submit' class='btn btn-primary' name='themdonvi'><i class='fa fa-plus'></i> Thêm đơn vị</button>";
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