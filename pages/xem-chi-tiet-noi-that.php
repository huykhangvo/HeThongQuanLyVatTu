<?php 

// create session
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['level']))
{
  // include file
  include('../layouts/header.php');
  include('../layouts/topbar.php');
  include('../layouts/sidebar.php');

  // show data
  if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $showData = "SELECT * FROM danhsachdonoithat,donvitinh";
    $result = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($result);
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông tin chi tiết nội thất
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
        <li><a href="ds-thiet-bi-noi-that.php?p=noithat&a=dsvt">Danh sách đồ gỗ</a></li>
        <li class="active">Thông tin chi tiết nội thất</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Mã nội thất: <?php echo $row['maNT']; ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-lg-2">
                  <img src="../uploads/thietbinoithat/<?php echo $row['img']; ?>" width="100%">
                </div>
                <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                  <p class="box-title">Tên thiết bị: <b><?php echo $row['tenNT']; ?></b></p>
                  <p class="box-title">Mô tả chi tiết: 
                  <?php echo $row['mota']; ?>
                  </p>
                  <p class="box-title">Năm: 
                    <?php echo $row['namsudung']; ?> "thiết bị được đưa vào sử dụng"
                  </p>
                  <p class="box-title">Nguồn gốc: 
                  <?php 
                        if($row['nguongoc'] == 1)
                        {
                          echo '<span class="badge bg-blue"> Dự án </span>';
                        }
                        else
                        {
                          echo '<span class="badge bg-red"> Ngân sách </span>';
                        }
                      ?>
                  </p>
                  <p class="box-title">Đơn vị tính: 
                    <b> <?php echo $row['id_dvt']; ?> </b>
                  </p>
                  <p class="box-title">Giá thiết bị:
                  <?php echo number_format($row['gia']) . 'VNĐ' ?>
                  </p>
                </div>
                <!-- col-5 -->
                <div class="col-lg-5 col-sm-5 col-md-6 col-xs-12">
                  <p class="box-title">Phòng/Kho: 
                    <b> <?php echo $row['id_tructhuoc']; ?> </b>
                  </p>
                  <p class="box-title">Chất lượng thiết bị: 
                    <?php echo $row['chatluong']; ?>%
                  </p>
                  <p class="box-title">Loại thiết bị: 
                  <?php
                                                        if ($row['phanloai'] == 1) {
                                                            echo "<span class='label label-success'>Bàn - Ghế</span>";
                                                        } elseif ($row['phanloai'] == 2) {
                                                            echo "<span class='label label-primary'>Tủ</span>";
                                                        } else {
                                                            echo "<span class='label label-warning'>Chưa phân loại</span>";
                                                        }
                                                        ?>
                  </p>
                  <p class="box-title">Người tạo/thêm thiết bị: 
                    <b><?php echo $row['nguoitao']; ?></b>
                  </p>
                  <p class="box-title">Ngày tạo: 
                    <b> <?php $date = date_create($row['ngaytao']); echo date_format($date, 'd-m-Y'); ?></b>
                  </p>
                  <p class="box-title">Người cập nhật/người chỉnh sử thông tin: 
                    <b style="color:red;"><?php echo $row['nguoicapnhat']; ?></b>
                  </p>
                  <p class="box-title">Ngày cập nhật/Ngày chỉnh sửa: 
                  <b style="color:red;"> <?php $date = date_create($row['ngaycapnhat']); echo date_format($date, 'd-m-Y'); ?></b>
                  </p>
                  <p class="box-title">Trạng thái: 
                    
                  <?php
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
                    </span>
                  </p>
                </div>
                <!-- col-5 -->
              </div>
              <!-- row -->
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
}
else
{
  // go to pages login
  header('Location: dang-nhap.php');
}

?>