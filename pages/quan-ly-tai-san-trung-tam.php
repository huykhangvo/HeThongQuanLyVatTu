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
                Quản lý tài sản
                <small>Trung tâm</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="quan-ly-tai-san-trung-tam.php?p=quanly&a=trungtam"><i class="fa fa-dashboard"></i> Quản lý tài sản</a></li>
                <li class="active">Trung tâm</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div>
                        <div class="list-itemmm">
                        <?php
                            $sql_select = "SELECT * FROM donvi WHERE id_tochuc=3";
                            $query_select = mysqli_query($conn, $sql_select);
                            while ($row = mysqli_fetch_array($query_select)) {
                            ?>
                                <div class="itemK2" style="width: 160px;">
                                    <a href="quan-ly-tai-san-chi-tiet-trung-tam.php?quanlytaisan=xem&id=<?php echo $row['id_donvi'] ?>">
                                        <div class="abcde">

                                            <img src="<?= $row['icon'] ?>" width="65">

                                        </div>
                                        <div class="itemmname2" style="font-size: 12px; color:black;"><?= $row['tendonvi'] ?></div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
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