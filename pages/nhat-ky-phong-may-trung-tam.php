<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');
    $sql_select_sodo = mysqli_query($conn, "SELECT * FROM `sodophongmay`");
	$sql_select_hocky = mysqli_query($conn, "SELECT * FROM hocky ORDER BY idhocky DESC");
    if (isset($_POST["save"])) {
        #lấy tiêu đề tệp
        // create error array
        $error = array();
        $success = array();
        $showMess = false;
        $id = $_GET["id"];

        $giangviensudung = $_POST['giangviensudung'];
        $ngaysudung = date("Y-m-d H:i:s");
        $giovao = $_POST["giovao"];
        $giora = $_POST["giora"];
        $mucdichsudung = $_POST["mucdichsudung"];
        $tinhtrangtruocsudung = $_POST["tinhtrangtruocsudung"];
        $tinhtrangsausudung = $_POST["tinhtrangsausudung"];

        // validate
        if (empty($_POST['giangviensudung']))
            $error['giangviensudung'] = '<b>Không thấy giảng viên sử dụng </b>';

        if (empty($_POST['giovao']))
            $error['giovao'] = 'Vui lòng nhập <b> giờ vào </b>';

        if (empty($_POST['giora']))
            $error['giora'] = 'Vui lòng nhập <b> giờ ra </b>';

        if (empty($_POST['mucdichsudung']))
            $error['mucdichsudung'] = 'Vui lòng nhập <b> mục đích sử dụng </b>';

        if (empty($_POST['tinhtrangtruocsudung']))
            $error['tinhtrangtruocsudung'] = 'Vui lòng nhập <b> tình trạng trước sử dụng </b>';

        if (empty($_POST['tinhtrangsausudung']))
            $error['tinhtrangsausudung'] = 'Vui lòng nhập <b> tình trạng sau sử dụng </b>';

        if (!$error) {
            $showMess = true;
            $insert = "INSERT INTO `nhatkysudung` (`id`, `id_tructhuoc`, `ngaysudung`, `giovao`, `giora`, `mucdichsudung`, `tinhtrangtruocsudung`, `tinhtrangsausudung`, `giangviensudung`) VALUES (NULL, '$id', '$ngaysudung', '$giovao', '$giora', '$mucdichsudung', '$tinhtrangtruocsudung', '$tinhtrangsausudung', '$giangviensudung')";
            // var_dump($insert);
            // exit;
            $result = mysqli_query($conn, $insert);
            if ($result) {
                $success['success'] = 'Ghi nhật ký phòng máy thành công';
                echo '<script>setTimeout("window.location=\'nhat-ky-phong-may-khoa.php?nhatky=nkpm&id=' . $id . '\'",1000);</script>';
            }
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
                echo "<h4><i class='icon fa fa-ban'></i> KHÔNG XONG RỒI ĐẠI VƯƠNG ƠI!!!</h4>";
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
                echo "<h4><i class='icon fa fa-check'></i>Bạn đã ghi nhật ký phòng máy thành công !</h4>";
                foreach ($success as $suc) {
                    echo $suc . "<br/>";
                }
                echo "</div>";
            }
        }
        ?>
        <!-- Content Header (Page header) -->
        <?php include("../layouts/nhatkyphongmay.php");?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <!-- sơ đồ -->
                    <div class="box box-primary">
                        <div class="box-body box-profile" style="padding: 10px 32px;">
                            <div class="title" style="text-align:center; color: red;"><b>Sơ đồ phòng máy</b></div>
                            <!-- Show sơ đồ phòng máy -->
                            <div class="center" style="text-align:center;">
                                <div class="x" style="border: 1px solid black;">
                                    <img class="x" src="../dist/images/down-arrow.png" width="32px">
                                </div>
                                <div class="sodophongmay">
                                    <div class="khoangcach" style="margin-top: 10px;">
                                        <button class="btn btn-primary btn-sm">01</button>
                                        <button class="btn btn-primary btn-sm">02</button>
                                        <button class="btn btn-primary btn-sm">03</button>
                                        <button class="btn btn-primary btn-sm">04</button>
                                        <button class="btn btn-primary btn-sm">05</button>
                                        <button class="btn btn-primary btn-sm">06</button>
                                    </div>
                                    <div class="khoangcach" style="margin-top: 5px;">
                                        <button class="btn btn-primary btn-sm">07</button>
                                        <button class="btn btn-primary btn-sm">08</button>
                                        <button class="btn btn-primary btn-sm">09</button>
                                        <button class="btn btn-primary btn-sm">10</button>
                                        <button class="btn btn-primary btn-sm">11</button>
                                        <button class="btn btn-primary btn-sm">12</button>
                                    </div>
                                    <div class="khoangcach" style="margin-top: 5px;">
                                        <button class="btn btn-primary btn-sm">13</button>
                                        <button class="btn btn-primary btn-sm">14</button>
                                        <button class="btn btn-primary btn-sm">15</button>
                                        <button class="btn btn-primary btn-sm">16</button>
                                        <button class="btn btn-primary btn-sm">17</button>
                                        <button class="btn btn-primary btn-sm">18</button>
                                    </div>
                                    <div class="khoangcach" style="margin-top: 5px;">
                                        <button class="btn btn-primary btn-sm">19</button>
                                        <button class="btn btn-primary btn-sm">20</button>
                                        <button class="btn btn-primary btn-sm">21</button>
                                        <button class="btn btn-primary btn-sm">22</button>
                                        <button class="btn btn-primary btn-sm">23</button>
                                        <button class="btn btn-primary btn-sm">24</button>
                                    </div>
                                    <div class="khoangcach" style="margin-top: 5px;">
                                        <button class="btn btn-primary btn-sm">25</button>
                                        <button class="btn btn-primary btn-sm">26</button>
                                        <button class="btn btn-primary btn-sm">27</button>
                                        <button class="btn btn-primary btn-sm">28</button>
                                        <button class="btn btn-primary btn-sm">29</button>
                                        <button class="btn btn-primary btn-sm">30</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Nhật ký phòng máy</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="x_panel">
                                <select class="form-control select1" name="hocky" style="width: 25%;">
                                <?php
											while ($row = mysqli_fetch_array($sql_select_hocky)) {
												if ($row == $row['idhocky']) {
											?>
                                    <option selected value="<?php echo $row['idhocky'] ?>"><?php echo $row['tenhocky'] ?></option>
                                    <?php
												} else {
												?>
                                    <option value="<?php echo $row['idhocky'] ?>"><?php echo $row['tenhocky'] ?></option>
                                    <?php
												}
											}
											?>
                                </select></br>
                                    <input class="btn btn-primary" style="float: left;" name="locdanhsach" type="button" value="Lọc" />
                                </br></br>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalthem">
                                    <i class="fa fa-calendar"></i>
                                    Thêm lịch sử dụng
                                </button>
                                <input class="btn btn-primary" type="button" onclick="location.href='print.php';" value="In sổ nhật ký phòng máy" />

                                <span style="float: right;">
                                    <label>GIÁO VIÊN QUẢN LÝ: <span style="color:red">Trần Thái Bảo</span></label>
                                </span>

                                <div class="x">
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên phòng</th>
                                                        <th>Ngày</th>
                                                        <th>Thời gian sử dụng</th>
                                                        <th>Mục đích/môn học:</th>
                                                        <th>Tình trạng trước khi sử dụng</th>
                                                        <th>Tình trạng sau khi sử dụng</th>
                                                        <th>Giảng viên sử dụng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $id = $_GET["id"];
                                                        $showNKPM = "SELECT phongtructhuoc.tenP,nhatkysudung.ngaysudung, 
                                                        nhatkysudung.giovao, nhatkysudung.giora,nhatkysudung.mucdichsudung,
                                                        nhatkysudung.tinhtrangtruocsudung, nhatkysudung.tinhtrangsausudung,
                                                        nhatkysudung.giangviensudung FROM nhatkysudung,phongtructhuoc 
                                                        where phongtructhuoc.id_tructhuoc = nhatkysudung.id_tructhuoc 
                                                        AND tenP = (SELECT tenP FROM phongtructhuoc where id_tructhuoc = ".$id.") ORDER BY id DESC";
                                                        $resultNKPM = mysqli_query($conn, $showNKPM);
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_array($resultNKPM)) {
                                                        
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $row['tenP']; ?></td>
                                                            <td><?php
                                                                $date_cre = date_create($row['ngaysudung']);
                                                                echo date_format($date_cre, 'd/m/Y');
                                                                ?></td>
                                                            <td style="color: #007BFF"><?php echo $row['giovao']; ?> - <?php echo $row['giora']; ?></td>
                                                            <td><?php echo $row['mucdichsudung']; ?></td>
                                                            <td><?php echo $row['tinhtrangtruocsudung']; ?></td>
                                                            <td><?php echo $row['tinhtrangsausudung']; ?></td>
                                                            <td><?php echo $row['giangviensudung']; ?></td>
                                                        </tr>
                                                    <?php
                                                        $count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="modal fade" id="modalthem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Ghi nhật ký phòng máy</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="tab-pane active" id="all">
                                                            <form role="form" action="" method="POST">
                                                                <div class="box-body">
                                                                    <div class=" form-group">

                                                                        <div style="margin-top: 10px;margin-bottom: 10px;">
                                                                            <label>
                                                                                <img src="../dist/images/teacher.png" width="25px"><span style="vertical-align: middle;"> Giảng viên sử dụng:</span>
                                                                            </label>
                                                                            <input class="txtmdsd" type="text" value="<?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>" name="giangviensudung" readonly="" style="margin-left: 10px; width: 25%;border: none; border-bottom: 2px solid gray; color:red;">
                                                                        </div>
                                                                        <div style="margin-top: 10px;margin-bottom: 10px;">
                                                                            <label>
                                                                                <img src="../dist/images/target.png" width="25px"><span style="vertical-align: middle;"> Mục đích/môn học:</span>
                                                                            </label>
                                                                            <input class="txtmdsd" type="text" name="mucdichsudung" style="margin-left: 10px; width: 70%;border: none; border-bottom: 2px solid gray;">
                                                                        </div>
                                                                        <div style="display: flex;">
                                                                            <div style="width: 50%;">
                                                                                <label>
                                                                                    <img src="../dist/images/clock.png" width="25px"><span style="vertical-align: middle;"> Thời gian sử dụng:</span>
                                                                                </label>
                                                                                </br>
                                                                                <input class="txtgiovao" type="text" name="giovao" placeholder="Giờ vào" style="width: 85px;margin-left: 10px;border: none; border-bottom: 2px solid gray;text-align: center;font-size:14px;font-weight: bold;color: blue;"> -
                                                                                <input class="txtgiora" type="text" name="giora" placeholder="Giờ ra" style="width: 85px;border: none; border-bottom: 2px solid gray;text-align: center;font-size:14px;font-weight: bold;color: green;">
                                                                            </div>
                                                                            <div style="width: 50%;text-align: right;">
                                                                                <label>
                                                                                    <img src="../dist/images/schedule.png" width="15px"> Ngày:
                                                                                </label>
                                                                                <input class="txtngayssdPM" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" name="ngaysudung" value="<?php echo date("d/m/Y"); ?>" style="width: 150px;" disabled="">
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div style="color: #26b99a; font-weight: bold; font-size: 15px; margin-top: 15px;"> Tình trạng trước khi sử dụng
                                                                            </div>
                                                                            <textarea class="txttinhtrang1" name="tinhtrangtruocsudung" style="width: 100%;margin-top: 2px;height: 80px;"></textarea>
                                                                        </div>
                                                                        <div style="color: #007BFF; font-weight: bold; font-size: 15px; margin-top: 5px; margin-bottom: 5px; position: relative;">Tình trạng sau khi sử dụng
                                                                        </div>
                                                                        <textarea class="txttinhtrang2" name="tinhtrangsausudung" style="width: 100%; font-size: 15px; margin-top: 2px; height: 80px; line-height: 15px;"></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Hủy</button>
                                                                        <button type="submit" class="btn btn-primary" name="save"><i class="fas fa-save"></i> Lưu</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
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