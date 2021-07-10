
<?php
include "../core/ClientC.php";
include "../Entity/Client.php";
include '../Core/tribualC.php';

$CLientC=new ClientC();
$Tr=new tribualC();
$tribunals=$Tr->AllTribual();
$id=(int)$_GET['id'];
$client=$CLientC->getClientbyId($id);
if(!isset($_SESSION)){
    session_start();

}

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
                        <h1 class="m-0 text-dark">Modifier Client</h1>
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
            <div class="card card-primary">
                <div class="row">

                    <div class="card col-md-8 offset-2" style="width:200px;padding: 20px;">

                        <?php
                        foreach ($client as $c):?>
                            <form method="post" action="UpdateClient.php" onsubmit="return submitForm(this);" >

                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">الاسم</label>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $c['nom']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">

                                </div>
                                </label>
                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">اللقب</label>
                                    <input type="text" class="form-control" name="prenom" value="<?php echo $c['prenom']?>"  required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">تاريخ الميلاد </label>
                                    <input type="Date" class="form-control" name="datenaissance" value="<?php echo $c['datenaissance']?>"  required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">البريد الإلكتروني
                                    </label>
                                    <input type="text" class="form-control" name="mail" value="<?php echo $c['mail']?>"  >
                                </div>

                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">عنوان
                                    </label>
                                    <input type="text" class="form-control" name="adresse" value="<?php echo $c['adresse']?>"  required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">الهاتف القار
                                    </label>
                                    <input type="number" class="form-control" name="fix" value="<?php echo $c['fix']?>"  >
                                </div>


                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">الهاتف</label>
                                    <input type="number" class="form-control" name="tel" value="<?php echo $c['tel']?>"  >
                                </div>
                                <div class="card card-primary">
                                    <label for="exampleFormControlInput1">هوية</label>
                                    <input type="text" class="form-control" name="identite" value="<?php echo $c['identite']?>"  required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>



                                <input type="password" class="form-control" hidden name="id" value="<?php echo $c['id']?>" >
                                <input class="btn btn-info" type="submit"   value="تحديث">
                            </form>









                        <?php
                        endforeach;
                        ?>




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

            window.location = 'AfficheClient.php';
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





