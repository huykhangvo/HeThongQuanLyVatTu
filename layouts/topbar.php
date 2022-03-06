<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php?p=index&a=statistic" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>QL</b>VT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>QUẢN LÝ</b> VẬT TƯ</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Bạn có 4 tin nhắn mới</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                          <small><i class="fa fa-clock-o"></i> 1 phút trước</small>
                        </h4>
                        <p><i class="fa fa-circle text-success"></i> Đang Online</p>
                      </a>
                    </li>
                    <!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                          <small><i class="fa fa-clock-o"></i> 2 giờ trước</small>
                        </h4>
                        <p><i class="fa fa-circle text-error"></i> Đã Office</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                          <small><i class="fa fa-clock-o"></i> Hôm nay</small>
                        </h4>
                        <p><i class="fa fa-circle text-error"></i> Đã Office</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                          <small><i class="fa fa-clock-o"></i> Hôm kia</small>
                        </h4>
                        <p><i class="fa fa-circle text-error"></i> Đã Office</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                          <small><i class="fa fa-clock-o"></i> 2 ngày trước</small>
                        </h4>
                        <p><i class="fa fa-circle text-error"></i> Đã Office</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Xem tất cả tin nhắn</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">50</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Bạn có 50 thông báo</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 người đang chờ bạn xác nhận
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> 10 yêu cầu sữa chữa
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> Bạn đã huỷ 5 đề nghị
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 đề nghị đang đặt mua
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> Giao nhận thiết bị
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Xem tất cả thông báo</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Báo cáo</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Chờ xác nhận
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Đang đặt mua
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Đã huỷ đề nghị
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li>
                      <!-- Task item -->
                      <a href="#">
                        <h3>
                          Yêu cầu sữa chữa
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">Xem tất cả báo cáo</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?> -
                    <?php
                    if ($row_acc['quyen'] == 0) {
                      echo "Quản lý";
                    } elseif ($row_acc['quyen'] == 1) {
                      echo "Giảng viên QLPM";
                    } elseif ($row_acc['quyen'] == 2) {
                      echo "Giảng viên";
                    }
                    ?>
                    <small>
                      <?php
                      echo "Lượt truy cập: " . $row_acc['truy_cap'];
                      ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="thong-tin-tai-khoan.php?p=account&a=profile" class="btn btn-default btn-flat">Thông tin</a>
                  </div>
                  <div class="pull-right">
                    <a href="dang-xuat.php" class="btn btn-default btn-flat">Đăng xuất</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>