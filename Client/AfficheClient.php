<?php
include "../core/ClientC.php";
include "../Entity/Client.php";
$C=new ClientC();
$CLients=$C->afficherAllClient();
if(!isset($_SESSION)){
    session_start();

}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Loywer Clients</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../Elements/stylesheets.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Main Sidebar Container -->
    <?php include '../Elements/navbar.php'; ?>
    <?php include '../Elements/header.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <h1 class="m-2 text-dark" style="text-align: center">قائمة الحرفاء</h1>
        <section class="content" style="padding: 50px;">


                    <div class="card">

                        <div class="card-header">
                            <div class="form-group" style="padding:5px;">
                                <a class="btn btn-info" href ="../contentieux/FormulaireGlobal.php" >إضافة حريف </a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">


                                    <thead>
                                    <tr>

                                        <td>اللقب</td>
                                        <td>الاسم</td>
                                        <td>رقم بطاقة التعريف </td>
                                        <td>تاريخ الولادة </td>
                                        <td> الالكتروني</td>
                                        <td>الهاتف</td>
                                        <td>الخدمات</td>
                                    </tr>
                                    </thead>
                                    <?php
                                    foreach ($CLients as $client):
                                        ?>
                                        <tr>
                                        <td><?php echo $client['prenom'] ?></td>
                                            <td><?php echo $client['nom'] ?></td>
                                            <td><?php echo $client['identite'] ?></td>
                                            <td><?php echo $client['datenaissance'] ?></td>
                                            <td><?php echo $client['mail'] ?></td>
                                            <td><?php echo $client['tel'] ?></td>

                                        <td>
                                            <a class="btn btn-block bg-gradient-warning btn-xs" href="../contentieux/AfficherContentieuxClient.php?id=<?php echo $client['id'] ?>">
                                            الخدمات المسدات للحرفاء
                                             </a>
                                            <a class ="btn btn-block bg-gradient-info btn-xs" href="ClientDetail.php?id=<?php echo $client['id'] ?>">
                                            تحيين
                                            </a>
                                            <a class="btn btn-block bg-gradient-danger btn-xs" href="DeleteClient.php?id=<?php echo $client['id'] ?>">
                                            حذف
                                            </a></td>
                                            
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </table>
                        </div></div>
               <!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>

    <?php include '../Elements/footer.php'; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include '../Elements/scripts.php'; ?>
</body>
</html>
