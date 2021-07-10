<?php
include '../Core/tribualC.php';
include '../Core/AgentC.php';
if(!isset($_SESSION)){
    session_start();

}
$Tr=new tribualC();
$Ag=new AgentC();
$agent=$Ag->AllAgent();
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
                        <h1 class="m-0 text-dark">Ajouter un client</h1>
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
                <div class="row">

                    <div class="col-md-6 of"></div>
                    <form action="ajoutclient.php" method="post">
                        <input type="text" name="nom" placeholder="nom">
                        <input type="text" name="prenom" placeholder="prenom">
                        <input type="date" name="dateNaissance" placeholder="Date Naissance">
                        <input type="date" name="identite" placeholder="identite">
                        <input type="text" name="adresse" placeholder="addresse">
                        <input type="text" name="mail" placeholder="mail">
                        <input type="number" name="tel" placeholder="tel">
                        <input type="number" name="fix" placeholder="fix">
                        <br>
                        <label>Tribunal</label>

                        <label>Agent</label>
                        <select type="text"  id="exampleFormControlInput1" name="idagent" >
                            <?php
                            foreach ($agent as $a):
                                ?>
                                <option value="<?php  echo $a['id']?>"><?php  echo $a['prenom']?> <?php  echo $a['nom']?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <input type="text" name="identite" placeholder="identite">
                        <button type="submit" name="addclient">Ajouter client</button>
                    </form>

                </div><!-- /.container-fluid --></div>
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