<?php
include "../core/AgentC.php";
include "../Entity/Agent.php";
$agentC=new AgentC();
$id=(int)$_GET['id'];
$agent=$agentC->recupererAgent($id);

session_start();
if (!empty($_SESSION) && ($_SESSION['role'] == 'Admin')){
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
                    <div class="card" style="padding: 50px;">


                        <h1 class="m-0 text-dark">mise a jour un Agent</h1>
                        <form method="post" action="UpdateAgent.php" onsubmit="return submitForm(this);">
                            <div class="form-group">
                                <label>nom
                                    <input type="text" class="form-control" name="nom" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" value="<?php echo $agent['nom']?>" >
                                </label>
                            </div>
                            <div class="form-group">
                                <label>prenom
                                    <input type="text" class="form-control"  name="prenom" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" value="<?php echo $agent['prenom']?>">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Email
                                    <input type="text" class="form-control"  name="mail" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" value="<?php echo $agent['mail']?>">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Adresse
                                    <input type="text" class="form-control"  name="adresse" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" value="<?php echo $agent['adresse']?>">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Password
                                    <input type="text" class="form-control"  name="password" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" value="<?php echo $agent['password']?>">
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="hidden"  class="form-control"  name="id" value="<?php echo $agent['id']?>">
                            </div>

                            <input type="submit"  class="btn btn-success"    value="update">
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
            xhr.onload = function(){ alert ("agent Updated"); } // success case
            xhr.onerror = function(){ alert ("Error"); } // failure case
            xhr.open (oFormElement.method, oFormElement.action, true);
            xhr.send (new FormData (oFormElement));
            window.location='AfficheAgent.php';
            return false;
        }


    </script>


    <?php include '../Elements/scripts.php'; ?>
    </body>
    </html>


<?php }
else{
    header('location:../Login.php');
}
?>


