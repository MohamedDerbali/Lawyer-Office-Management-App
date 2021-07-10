<?php
include "../core/CotentieuxC.php";
include "../Entity/Cotentieux.php";
session_start();
$C=new CotentieuxC();
$Contentieux=$C->afficherAllContentieux();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
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
                        <h1 class="m-0 text-dark">Liste des Contentieux</h1>
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

                <button class="btn btn-primary" onclick="location.href='FormulaireGlobal.php'">Ajouter un Contentieux</button>
<br>
<br>
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">


                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>nom Client</td>
                                    <td>Categorie</td>
                                    <td>Statut</td>
                                    <td>Date</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <?php
                                foreach ($Contentieux as $ct):
                                    ?>
                                    <tr>
                                        <td><?php echo $ct['id'] ?></td>
                                        <td><?php echo $ct['prenom'] ?> <?php echo $ct['nom'] ?></td>
                                        <td><?php echo $ct['Categorie'] ?></td>
                                        <td><?php echo $ct['statut'] ?></td>
                                        <td><?php echo $ct['dateContentieux'] ?></td>
                                        <td><a href="DetailContentieux.php?id=<?php echo $ct['id'] ?>">Update</a>
                                        <a href="DeleteContentieux.php?id=<?php echo $ct['id'] ?>">Delete</a></td>

                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </table>
                        </div></div>
            </div>
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
