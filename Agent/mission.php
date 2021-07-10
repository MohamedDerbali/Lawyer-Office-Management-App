<?php
include "../core/AgentC.php";
include "../Entity/Agent.php";
$agentC=new AgentC();

$agent=$agentC->AllAgent();

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
                    <div class="card" style="padding: 50px;width: 50%;margin-right: 25%;">


                        <h1 class="m-0 text-dark" style="text-align: center">إظافة مهمة خارج المكتب</h1>
                        <form method="post" action="ajoutmission.php" >
                            <div class="form-group">
                                <label>الكاتب </label>
                                    <select class="form-control" name="Agent">
                                        <?php
                                        foreach ($agent as $key) {


                                            ?>
                                            <option value="<?php echo $key['id']; ?>"> <?php echo $key['nom']; ?></option>
                                            <?php
                                        }
                                         ?>
                                    </select>

                            </div>
                            <div class="form-group">
                                <label>المهمة</label>
                                    <textarea class="form-control" name="mission" required oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">



                                    </textarea>


                            </div>



                            <input type="submit"  class="btn btn-success" name="Addmission" value="إظافة المهمة">
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


