<?php
include_once '../Core/JugementCalendarC.php';
include_once '../Core/CotentieuxC.php';
include_once '../Core/AgentC.php';
include_once '../Core/ClientC.php';
session_start();
$c=(new JugementCalendarC())->recupererjugementcalendar($_GET['id']);

$q=(new JugementCalendarC())->recupererjugementcalendar($_GET['id']);




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
                        <h1 class="m-0 text-dark">Rappel : <?php //echo $c[0]['id']; ?> </h1>

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


            <div class="container">

                <br>
                <br>
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body" >
                        <div class="table-responsive" >

                        <table id="example1" class="table table-bordered table-striped" >


                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Titre de cotentieu</td>
                                <td>date cotentieu</td>
                                <td>Client</td>
                                <td>CIN client</td>
                                <td>Num affaire</td>
                                <td>sujet</td>
                                <td>Petition</td>
                                <td>objectif</td>
                                <td>statut</td>
                                <td>Agent</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <?php
                            $i=1;
                            if(!empty($c)){
?>
                                <tr>
                                    <td>#1</td>
                                    <td><?php echo $c['title']; ?></td>
                                    <td><?php
                                        $bddd=(new CotentieuxC())->getContentieuxbyId($c['cotentieu']);

                                        echo $bddd[0]['dateContentieux']; ?> </td>
                                    <td><?php
                                        $kd=(new ClientC())->getClientbyId($bddd[0]['idClient']);
                                        echo $kd[0]['nom'] ?>&nbsp; <?php echo $kd[0]['prenom'] ?></td>
                                    <td><?php echo $kd[0]['identite'] ?></td>
                                    <td><?php echo $bddd[0]['codeinterne'] ?></td>
                                    <td><?php echo $bddd[0]['sujet'] ?></td>
                                    <td><?php echo $bddd[0]['petition'] ?></td>
                                    <td><?php echo $bddd[0]['objectif'] ?></td>
                                    <td><?php echo $bddd[0]['statut'] ?></td>
                                    <td><?php

                                        $ct=(new AgentC())->recupererAgent($bddd[0]['idagent']);

                                        echo $ct['nom'] ?>&nbsp;<?php echo $ct['prenom'] ?></td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Modifier Rappel
                                        </button></td>


                                </tr>
                            <?php

                            }


                            ?>
                        </table>
                        </div></div></div>
            </div>

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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="modifiiiiiiiii.php?id=<?php echo $_GET['id'] ?>" id="rapel" method="post">
                <?php

                if(!empty($q)){
                   ?>
                        <div class="form-group">
<label >Titre:</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $q['title']; ?>" />
                     </div>
                         <div class="form-group">
                      <label >Date start:</label>
                            <input type="date" name="start" class="form-control"  value="<?php echo $q['start']; ?>" />
                             </div>
                        <div class="form-group">
<label >Date end:</label>
                            <input type="date" name="end" class="form-control"  value="<?php echo $q['end']; ?>" />
</div>
                     <?php
                }


                ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('rapel').submit();">update Rappel</button>
            </div>
        </div>
    </div>
</div>