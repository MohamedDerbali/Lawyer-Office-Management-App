<?php
include "../core/ChargeC.php";
session_start();
$Charges=new ChargeC();
$id=(int)$_GET['id'];
$c=$Charges->recupererCharge($id);
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
                        <h1 class="m-0 text-dark">Modifier Charges</h1>
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


                        <form method="post" action="UpdateChargeProcess.php" onsubmit="return submitForm(this);"  enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Montant</label>
                                <input type="text" class="form-control" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')"  oninput="this.setCustomValidity('')"id="exampleFormControlInput3" name="montant" value="<?php echo $c['montant'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Date Theorique</label>
                                <input type="date" class="form-control" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')"  oninput="this.setCustomValidity('')"id="exampleFormControlInput3" name="datecharge" value="<?php echo $c['datecharge'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Etat</label>
                                <select type="text" class="form-control"  id="exampleFormControlInput3" name="etat" >
                                    <option value="<?php echo $c['etat'] ?>" selected><?php echo $c['etat'] ?></option>
                                    <option value="paye">paye</option>
                                    <option value="non paye">non paye</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">fichier</label>
                                <input type="file" class="form-control"  name="fichier" >
                            </div>
                            <input hidden type="text"  name="id"  value="<?php echo $c['id']?>">
                            <input hidden type="text" name="idContentieux"  value="<?php echo $c['idcontentieux']?>">
                            <input type="submit"  class="btn-info" value="update">
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

        } } // success case
        xhr.onerror = function(){ alert ("Error"); } // failure case
        xhr.open (oFormElement.method, oFormElement.action, true);
        xhr.send (new FormData (oFormElement));

        return false;
    }


</script>


<?php include '../Elements/scripts.php'; ?>
</body>
</html>






