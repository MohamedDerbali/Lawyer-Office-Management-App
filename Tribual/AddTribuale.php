<?php
if(!isset($_SESSION)){
    session_start();

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
            <div class="container-fluid">
                <div class="row">

                    <div class="card col-md-8 offset-2" style="width:500px;padding: 20px;">
                        <h1 class="m-0 text-dark" style="text-align: center">إظافة محكمة</h1>
                    <form action="AddTribual.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Catégorie du tribunal</label>
                            <select class="form-control" name="categorie">
                                <option value="محاكم القضاء العدلي">محاكم القضاء العدلي</option>
                                <option value="المحاكم الابتدائية">المحاكم الابتدائية</option>
                                <option value="المحكمة العقارية">المحكمة العقارية</option>
                                <option value="محاكم الناحية">محاكم الناحية</option>
                                <option value="محاكم الاستئناف">محاكم الاستئناف</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nom Du tribunal</label>
                        <input type="text" class="form-control" name="nom" placeholder="nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Adresse du tribunal</label>
                        <input type="text" class="form-control" name="addresse" placeholder="Addresse">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Numéro du téléphone</label>
                        <input type="text" class="form-control" name="tel" placeholder="Telephone">
                        </div>


                        <div class="form-group">

                        <button type="submit" name="addclient">Ajouter tribual</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
