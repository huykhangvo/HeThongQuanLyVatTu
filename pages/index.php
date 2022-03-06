<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
	// include file
	include('../layouts/header.php');
	include('../layouts/topbar.php');
	include('../layouts/sidebar.php');

	// dem so phong ban
	$tk = "SELECT count(id) as soluong FROM tai_khoan";
	$resultTK = mysqli_query($conn, $tk);
	$rowTK = mysqli_fetch_array($resultTK);
	$tongTK = $rowTK['soluong'] - 1;

	//dem kiểm kê tài sản 
	// $KKTS = "SELECT count(maTB ) as soluong FROM thietbi";
	// $resultKKTS = mysqli_query($conn, $KKTS);
	// $rowKKTS = mysqli_fetch_array($resultKKTS);
	// $tongKKTS = $rowKKTS['soluong'];

	//dem thanh toán
	$tt = "SELECT count(id_folder) as soluong FROM folder";
	$resultTT = mysqli_query($conn, $tt);
	$rowTT = mysqli_fetch_array($resultTT);
	$tongTT = $rowTT['soluong'];


?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Tổng quan
				<small>Đề tài thực tập | Quản lý vật tư tại Trường ĐH SPKT Vĩnh Long</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
				<li class="active">Thống kê</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?php echo $tongTK; ?></h3>

							<p>Quản lý người dùng</p>
						</div>
						<div class="icon">
							<i class="fas fa-user-plus"></i>
						</div>
						<a href="ds-tai-khoan.php?p=account&a=list-account" class="small-box-footer">Danh sách tài khoản <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3>3</h3>
							<p>Đề nghị vật tư</p>
						</div>
						<div class="icon">
							<i class="fas fa-money-check-alt"></i>
						</div>
						<a href="de-nghi-vat-tu.php?p=denghi&a=vattu" class="small-box-footer">Gửi phiếu đề nghị <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->


				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>4</h3>
							<p>Yêu cầu sữa chữa</p>
						</div>
						<div class="icon">
							<i class="fas fa-plane-departure"></i>
						</div>
						<a href="#" class="small-box-footer">Gửi phiếu yêu cầu sữa chữa <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->

				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-olive">
						<div class="inner">
							<h3>5</h3>
							<p>Giao nhận thiết bị</p>
						</div>
						<div class="icon">
							<i class="fas fa-exchange-alt"></i>
						</div>
						<a href="#" class="small-box-footer">Quản lý giao nhận thiết bị <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->


				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-purple">
						<div class="inner">
							<h3>3</h3>
							<p>Kiểm kê tài sản</p>
						</div>
						<div class="icon">
							<i class="fas fa-cubes"></i>
						</div>
						<a href="ds-thiet-bi.php?p=salary&a=dsvt" class="small-box-footer">Kiểm kê tài sản <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?php echo $tongTT; ?></h3>
							<p>Biểu mẫu</p>
						</div>
						<div class="icon">
							<i class="fas fa-file"></i>
						</div>
						<a href="thanh-toan.php?p=salary&a=thanhtoan" class="small-box-footer">Biểu mẫu<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->

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