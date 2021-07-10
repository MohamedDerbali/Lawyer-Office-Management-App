<?php
include '../Core/ClientC.php';
include '../Core/tribualC.php';
session_start();
$clientC=new ClientC();
$client=$clientC->getClientbyIdAgent($_SESSION['id']);
$Tr=new tribualC();
$tribunals=$Tr->AllTribual();

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
            <div class="container-fluid">
                <div class="card col offset-1" style="padding: 30px;width: 80%;">
                    <div style="width: 100%">
                        <h1 class="m-0 text-dark" style="text-align: center">Ajouter un Contentieux</h1>
                    <form action="AjoutContenttieux.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Client</label>
                            <select type="text" class="form-control" id="exampleFormControlInput1" name="idclient" placeholder="nom agent ...">
                                <?php
                                foreach ($client as $c):
                                ?>
                                <option value="<?php  echo $c['id']?>"><?php  echo $c['prenom']?> <?php  echo $c['nom']?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Categorie</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="categorie" placeholder="categorie">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput3" name="date" placeholder="././.">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Code Interne</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" name="codeinterne" placeholder="code interne">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">objectif</label>
                            <textarea  class="form-control" id="exampleFormControlInput3" name="objectif" placeholder="objectif"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tribunal</label>
                            <select type="text" class="form-control" id="exampleFormControlInput1" name="idTribual" >
                                <?php
                                foreach ($tribunals as $t):
                                    ?>
                                    <option value="<?php  echo $t['id']?>"><?php  echo $t['nom']?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Petition</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" name="petition" placeholder="Petition">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Sujet</label>
                            <textarea  class="form-control" id="exampleFormControlInput3" name="sujet" placeholder="Sujet"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="addagent">Ajouter Contentieux</button>
                    </form>
                </div><!-- /.container-fluid --></div>
            </div>
        </section>
        <br>
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
