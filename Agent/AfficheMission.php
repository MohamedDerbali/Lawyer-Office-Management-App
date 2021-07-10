<?php

include "../core/AgentC.php";
$Ag=new AgentC();


session_start();


if (!empty($_SESSION)){

    if ($_SESSION['role'] == 'Admin'){
        $Agents=$Ag->Allmission();
    }else{
        $Agents=$Ag->AllmissionByagent($_SESSION['id']);
    }
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

                <h1 class="m-0 text-dark" style="text-align: center">liste des clercs d’avocats
                </h1>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <td>الكاتب</td>
                            <td>المهمة</td>
<td>تثبيت</td>
                          
                        </tr>
                        </thead>
                                <tbody>
                        <?php
                        foreach ($Agents as $agent):
                            ?>
                            <tr>

                                <td><?php
                            if ($_SESSION['role'] == 'Admin') {
                                echo $Ag->recupererAgent($agent['idagent'])['nom'] . ' ';
                                echo $Ag->recupererAgent($agent['idagent'])['prenom'];
                            }else{
                                echo $_SESSION['nom'].' '.$_SESSION['prenom'];
                            }
                                      ?></td>
                                <td><?php echo $agent['mission'] ?></td>

                               <td>
                                   <?php if($agent['status']==0){ ?>
                                   <a class="btn btn-danger" href="valider.php?id=<?php echo $agent['id'] ?>">يوافق
                                   </a>
                               <?php } ?>

                               </td>

                            </tr>
                        <?php
                        endforeach;
                        ?></tbody>
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