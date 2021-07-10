<?php
include '../Core/RapportC.php';
session_start();
$Rapport=new RapportC();
$Rapports=$Rapport->getrapport($_GET['id']);

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
                        <h1 class="m-0 text-dark">Modifier Paiement</h1>
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

                    <div class="card col-md-8 offset-2" style="width:500px;padding: 20px;">
                        <form method="post" action="../Rapport/updateRapport.php?id=<?php echo $_GET['id']?>" onsubmit="return submitForm(this);" enctype="multipart/form-data">
                            <?php foreach ($Rapports as $rp):?>
                            <input  id="rr" type="hidden" name="idcontentieux" value="<?php echo $rp['idcontentieux']?>"/>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">libelle</label>
                                <input type="text" class="form-control" id="exampleFormControlInput3" name="libelle" placeholder="Titre" value="<?php echo $rp['libelle']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">fichier</label>
                                <input type="file" class="form-control"  name="fichier" value="<?php echo $rp['fichier']?>" >
                            </div>

                            <input type="submit" value="ajouter rapport" class="btn btn-success">
                            <?php endforeach; ?>
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
<script>
    function submitForm(oFormElement)
    {
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){ if (xhr.status === 200) {
            alert("succès");
        }else
        {
            alert(""+xhr.status);

        }  } // success case
        xhr.onerror = function(){ alert ("Error"); } // failure case
        xhr.open (oFormElement.method, oFormElement.action, true);
        xhr.send (new FormData (oFormElement));

        return false;
    }


</script>


<?php include '../Elements/scripts.php'; ?>
</body>
</html>
