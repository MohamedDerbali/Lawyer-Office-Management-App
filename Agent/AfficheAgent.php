<?php

include "../core/AgentC.php";
$Ag=new AgentC();
$Agents=$Ag->AllAgent();

session_start();


if (!empty($_SESSION) && ($_SESSION['role'] == 'Admin')){


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
                        <h1 class="m-0 text-dark" style="text-align: center">liste des clercs d’avocats
                        </h1>
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

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <td>الاسم</td>
                            <td>اللقب</td>
                            <td>البريد الالكتروني</td>
                            <td>العنوان</td>
                            <td>كلمة السر </td>
                            <td>Action</td>
                          
                        </tr>
                        </thead>
                        <?php
                        foreach ($Agents as $agent):
                            ?>
                            <tr>
                                <td><?php echo $agent['nom'] ?></td>
                                <td><?php echo $agent['prenom'] ?></td>
                                <td><?php echo $agent['mail'] ?></td>
                                <td><?php echo $agent['adresse'] ?></td>
                                <td><?php echo $agent['password'] ?></td>
                                <td><a class="btn btn-block bg-gradient-info btn-xs" href="AgentDetail.php?id=<?php echo $agent['id'] ?>">تحيين </a></td>
                                <td><a class="btn btn-block bg-gradient-danger btn-xs" href="DeleteAgent.php?id=<?php echo $agent['id'] ?>">حذف </a></td>

                            </tr>
                        <?php
                        endforeach;
                        ?>
                            </table></div></div>
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
<?php }
else{
    header('location:../Login.php');
}
?>