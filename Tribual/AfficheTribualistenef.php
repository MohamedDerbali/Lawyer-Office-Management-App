<?php
include "../core/tribualC.php";
if(!isset($_SESSION)){
    session_start();

}
$t=new tribualC();
$tribuals=$t->AllTribualistenef();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Lawyer</title>
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
        <section class="content">
            <div class="container">
                <h1 class="m-0 text-dark">قائمة المحاكم الإستئنافية</h1>
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                <tr>






                                    <td>الإعدادت</td>
                                    <td>الولاية</td>
                                    <td>البريد الالكتروني</td>
                                    <td>الهاتف</td>
                                    <td>الجدول</td>
                                    <td>العنوان</td>
                                    <td>إسم المحكمة</td>
                                </tr>
                                </thead>
                                <?php
                                foreach ($tribuals as $tr):
                                    ?>
                                    <tr>







                                        <td><a class="fas fa-eye" href="DetailTribual.php?id=<?php echo $tr['id'] ?>"></a>
                                            <a class="fas fa-trash" style="color: red" href="DeleteTribual.php?id=<?php echo $tr['id'] ?>"></a></td>

                                        <td><?php echo $tr['gouvernorat'] ?></td>
                                        <td><?php echo $tr['email'] ?></td>
                                        <td><?php echo $tr['telephone'] ?></td>
                                        <td><?php echo $tr['categorie'] ?></td>
                                        <td><?php echo $tr['adresse'] ?></td>
                                        <td><?php echo $tr['nom'] ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </table>
                        </div></div>
                </div><!-- /.container-fluid -->

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
