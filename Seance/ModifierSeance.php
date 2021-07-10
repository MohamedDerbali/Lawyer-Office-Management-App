<?php
include '../Core/seanceC.php';
include  '../Entity/seance.php';
session_start();
$Sc=new seanceC();
$Seance=$Sc->getsc($_GET['id']);


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
<form method="post" action="../Seance/ModifierSeanceporcess.php?id=<?php echo $_GET['id']?>" onsubmit="return submitForm(this);" >
    <?php  foreach ($Seance as $s):?>
    <input type="hidden" id="cc"  name="idContentieux" value="<?php echo $s['idcontentieux']?>"/>

    <div class="form-group">
        <label for="exampleFormControlInput1">Libelle</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" name="libelle" placeholder="Titre" value="<?php echo $s['libelle']?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Date Seance</label>
        <input type="date" class="form-control" id="exampleFormControlInput3" name="date" placeholder="Date Theorique" value="<?php echo $s['datesc']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Lieux</label>
        <input type="text" class="form-control" name="lieux" value="<?php echo $s['lieux']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
    </div>

    <input type="submit" value="Modifier Seance" onclick="refresh()">
    <?php endforeach;?>
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
            alert("ناجحة");
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
