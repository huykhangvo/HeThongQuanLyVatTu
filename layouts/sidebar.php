<?php

// get active sidebar
if (isset($_GET['p']) && isset($_GET['a'])) {
  $p = $_GET['p'];
  $a = $_GET['a'];
}
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i>
          <?php
          if ($row_acc['quyen'] == 0) {
            echo "Quản lý";
          } elseif ($row_acc['quyen'] == 1) {
            echo "Giảng viên quản lý phòng máy";
          } elseif ($row_acc['quyen'] == 2) {
            echo "Giảng viên";
          }
          ?>
        </a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">CƠ SỞ DỮ LIỆU</li>
      <li class="<?php if ($p == 'index') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($a == 'statistic') echo 'active'; ?>"><a href="index.php?p=index&a=statistic"><i class="fa fa-circle-o"></i> Thống kê</a></li>
          <li class="<?php if (($p == 'index') && ($a == 'taikhoan')) echo 'active'; ?>"><a href="index_taikhoan.php?p=index&a=taikhoan"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
        </ul>
      </li>
      <li class="<?php if ($p == 'thietbi') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-desktop"></i>
          <span>Máy móc thiết bị</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <!-- <li class="<?php if (($p == 'thietbi') && ($a == 'yeucau')) echo 'active'; ?>"><a href="yeu-cau-sua-chua.php?p=thietbi&a=yeucau"><i class="fa fa-circle-o"></i> Yêu cầu sữa chữa</a></li>
          <li class="<?php if (($p == 'thietbi') && ($a == 'giaonhan')) echo 'active'; ?>"><a href="giao-nhan-thiet-bi.php?p=thietbi&a=giaonhan"><i class="fa fa-circle-o"></i> Giao nhận thiết bị</a></li>
          <li class="<?php if (($p == 'thietbi') && ($a == 'kiemke')) echo 'active'; ?>"><a href="kiem-ke-bao-cao.php?p=thietbi&a=kiemke"><i class="fa fa-circle-o"></i> Kiểm kê tài sản &amp; Báo cáo</a></li> -->
          <li class="<?php if (($p == 'thietbi') && ($a == 'themvt')) echo 'active'; ?>"><a href="them-thiet-bi.php?p=thietbi&a=themvt"><i class="fa fa-circle-o"></i> Thêm máy móc thiết bị</a></li>
          <li class="<?php if (($p == 'thietbi') && ($a == 'dsvt')) echo 'active'; ?>"><a href="ds-thiet-bi.php?p=thietbi&a=dsvt"><i class="fa fa-circle-o"></i> Danh sách thiết bị</a></li>
        </ul>
      </li>

      <li class="<?php if ($p == 'noithat') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Đồ nội thất</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if (($p == 'noithat') && ($a == 'themvt')) echo 'active'; ?>"><a href="them-thiet-bi-noi-that.php?p=noithat&a=themvt"><i class="fa fa-circle-o"></i> Thêm đồ nội thất</a></li>
          <li class="<?php if (($p == 'noithat') && ($a == 'dsvt')) echo 'active'; ?>"><a href="ds-thiet-bi-noi-that.php?p=noithat&a=dsvt"><i class="fa fa-circle-o"></i> Danh sách đồ gỗ</a></li>
        </ul>
      </li>

      <li class="<?php if (($p == 'bieumau') && ($a == 'tailieu')) echo 'active'; ?>">
        <a href="thanh-toan.php?p=bieumau&a=tailieu">
          <i class="fas fa-file"></i> <span>Biểu mẫu</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

      <li class="<?php if ($p == 'quanly') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fas fa-sitemap"></i> <span>Quản lý tài sản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li class="<?php if ($a == 'themdonvi') echo 'active'; ?>"><a href="them-don-vi.php?p=themdonvi&a=themdonvi"><i class="fa fa-circle-o"></i> Thêm đơn vị</a></li>
          <li class="<?php if ($a == 'khoa') echo 'active'; ?>"><a href="quan-ly-tai-san-khoa.php?p=quanly&a=khoa"><i class="fa fa-circle-o"></i> Khoa</a></li>
          <li class="<?php if ($a == 'phongban') echo 'active'; ?>"><a href="quan-ly-tai-san-phong-ban.php?p=quanly&a=phongban"><i class="fa fa-circle-o"></i> Phòng ban</a></li>
          <li class="<?php if ($a == 'trungtam') echo 'active'; ?>"><a href="quan-ly-tai-san-trung-tam.php?p=quanly&a=trungtam"><i class="fa fa-circle-o"></i> Trung tâm</a></li>
        </ul>
      </li>

      <li class="<?php if (($p == 'denghi') && ($a == 'vattu')) echo 'active'; ?>">
        <a href="de-nghi-vat-tu.php?p=denghi&a=vattu">
          <i class="fa fa-envelope"></i> <span>Đề nghị vật tư</span>
          <span class="pull-right-container">

            <small class="label pull-right bg-red">1</small>
            <small class="label pull-right bg-blue">5</small>
            <small class="label pull-right bg-green">8</small>
            <small class="label pull-right bg-yellow">6</small>
          </span>
        </a>
      </li>

      <li class="<?php if ($p == 'account') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Quản lý người dùng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($a == 'profile') echo 'active'; ?>"><a href="thong-tin-tai-khoan.php?p=account&a=profile"><i class="fa fa-circle-o"></i> Thông tin tài khoản</a></li>
          <li class="<?php if ($a == 'add-account') echo 'active'; ?>"><a href="tao-tai-khoan.php?p=account&a=add-account"><i class="fa fa-circle-o"></i> Tạo tài khoản</a></li>
          <li class="<?php if (($p == 'account') && ($a == 'list-account')) echo 'active'; ?>"><a href="ds-tai-khoan.php?p=account&a=list-account"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
          <li class="<?php if ($a == 'changepass') echo 'active'; ?>"><a href="doi-mat-khau.php?p=account&a=changepass"><i class="fa fa-circle-o"></i> Đổi mật khẩu</a></li>
          <li><a href="dang-xuat.php"><i class="fa fa-circle-o"></i> Đăng xuất</a></li>
        </ul>
      </li>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>