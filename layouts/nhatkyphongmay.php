<section class="content-header">
            <h1>
                Quản lý phòng máy
            </h1>
            <?php 
            $id = $_GET["id"];
            $tenP = "SELECT * FROM phongtructhuoc where id_tructhuoc = $id";
            $selecttenP = mysqli_query($conn, $tenP);
            $tenP2 = mysqli_fetch_assoc($selecttenP);
            ?>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li class="active">Phòng: <?= $tenP2['tenP']; ?></li>
            </ol>
        </section>