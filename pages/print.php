<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
  // include file
  include('../layouts/header.php');




?>

  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <img src="../dist/images/note.png" width="25px">Sổ nhật ký phòng máy
              <small class="pull-right">Date: <?php echo date("d/m/Y"); ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Phòng</th>
                  <th>Ngày</th>
                  <th>Thời gian sử dụng</th>
                  <th>Mục đích/môn học</th>
                  <th>Tình trạng trước khi sử dụng</th>
                  <th>Tình trạng sau khi sử dụng</th>
                  <th>Giảng viên sử dụng</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $showNKPM = "SELECT phongtructhuoc.tenP,nhatkysudung.ngaysudung, nhatkysudung.giovao, nhatkysudung.giora,nhatkysudung.mucdichsudung,nhatkysudung.tinhtrangtruocsudung, nhatkysudung.tinhtrangsausudung,nhatkysudung.giangviensudung FROM nhatkysudung,phongtructhuoc where phongtructhuoc.id_tructhuoc = nhatkysudung.id_tructhuoc ORDER BY id DESC";
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
                    <td><?php echo $row['giovao']; ?> - <?php echo $row['giora']; ?></td>
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
          <!-- /.col -->
        </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
  <?php
  // include
} else {
  // go to pages login
  header('Location: dang-nhap.php');
}

  ?>