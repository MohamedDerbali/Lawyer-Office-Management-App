
<?php
session_start();
if(!empty($_SESSION)&&($_SESSION['role']=='Admin')){

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
                    <div class="card" style="padding:50px;">
                        <h1 class="m-0 text-dark" style="text-align:center;">إضافة كاتب</h1>
                        <form action="agentAdd.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nom</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" placeholder="nom agent ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">prenom</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" name="prenom" placeholder="prenom agent ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">adresse e-mail</label>
                                <input type="email" class="form-control" id="exampleFormControlInput3" name="email" placeholder="name@example.com" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">mot de passe</label>
                                <input type="text" class="form-control" id="exampleFormControlInput4" name="password" placeholder="mot de passe ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">adresse</label>
                                <input type="text" class="form-control" id="exampleFormControlInput5" name="adresse" placeholder="adresse ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <button type="submit" class="btn btn-success" name="addagent">Ajouter agent</button>
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
<?php }
else{
    header('location:../Login.php');
}
?>
