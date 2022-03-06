<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Đề nghị vật tư
                <small>Đề nghị mua sắm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Đề nghị vật tư</a></li>
                <li class="active">Đề nghị mua sắm</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#all" data-toggle="tab">Tất cả</a></li>
                            <li><a href="#choxacnhan" data-toggle="tab">Chờ xác nhận</a></li>
                            <li><a href="#dangdatmua" data-toggle="tab">Đang đặt mua</a></li>
                            <li><a href="#dahoantat" data-toggle="tab">Đã hoàn tất</a></li>
                            <li><a href="#dahuy" data-toggle="tab">Đã huỷ</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="all">

                                <!-- Mở -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary">Tạo đơn đề nghị</button>

                                                <div class="box-tools">
                                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Người tạo đơn</th>
                                                        <th>Loại đơn</th>
                                                        <th>Khoa</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Học kỳ</th>
                                                        <th>Năm học</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chức năng</th>
                                                        <th>Xác nhận duyệt mua</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Huy Khang</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-success">Đã hoàn tất</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-danger">Xoá</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Hoàng Phúc</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-warning">Chờ xác nhận</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-success" style="width:auto;border:2px solid black; text-align:center;">Đặt hàng</button>||<button type="button" style="width:47%;width:50%;border:2px solid black; text-align:center;" class="btn btn-danger">Huỷ</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Thanh Hoàng</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-primary">Đang đặt mua</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-primary">Giao thiết bị</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Trần Thái Bảo</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-danger">Đã huỷ</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-danger">Xoá</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <!-- Đóng -->
                            </div>

                            <div class="tab-pane" id="choxacnhan">
                                <!-- Mở -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary">Tạo đơn đề nghị</button>

                                                <div class="box-tools">
                                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Người tạo đơn</th>
                                                        <th>Loại đơn</th>
                                                        <th>Khoa</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Học kỳ</th>
                                                        <th>Năm học</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chức năng</th>
                                                        <th>Đặt mua</th>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Hoàng Phúc</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-warning">Chờ xác nhận</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn btn-success">Đặt mua</button>||<button type="button" class="btn btn btn-danger">Huỷ</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <!-- Đóng -->
                            </div>

                            <div class="tab-pane" id="dangdatmua">
                                <!-- Mở -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary">Tạo đơn đề nghị</button>

                                                <div class="box-tools">
                                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Người tạo đơn</th>
                                                        <th>Loại đơn</th>
                                                        <th>Khoa</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Học kỳ</th>
                                                        <th>Năm học</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chức năng</th>
                                                        <th>Đặt mua</th>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Thanh Hoàng</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-primary">Đang đặt mua</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-primary">Giao thiết bị</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <!-- Đóng -->
                            </div>

                            <div class="tab-pane" id="dahoantat">
                                <!-- Mở -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary">Tạo đơn đề nghị</button>

                                                <div class="box-tools">
                                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Người tạo đơn</th>
                                                        <th>Loại đơn</th>
                                                        <th>Khoa</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Học kỳ</th>
                                                        <th>Năm học</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chức năng</th>
                                                        <th>Đặt mua</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Huy Khang</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-success">Đã hoàn tất</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-danger">Xoá</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <!-- Đóng -->
                            </div>

                            <div class="tab-pane" id="dahuy">
                                <!-- Mở -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <button type="submit" class="btn btn-primary">Tạo đơn đề nghị</button>

                                                <div class="box-tools">
                                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Người tạo đơn</th>
                                                        <th>Loại đơn</th>
                                                        <th>Khoa</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Học kỳ</th>
                                                        <th>Năm học</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chức năng</th>
                                                        <th>Đặt mua</th>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Trần Thái Bảo</td>
                                                        <td>Đề nghị vật tư - Giảng viên</td>
                                                        <td>Công nghệ thông tin</td>
                                                        <td>11-7-2014</td>
                                                        <td>Học kỳ 1</td>
                                                        <td>2</td>
                                                        <td><span class="label label-danger">Đã huỷ</span></td>
                                                        <td><a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a></td>
                                                        <td><button type="button" class="btn btn-block btn-danger">Xoá</button></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                                <!-- Đóng -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>