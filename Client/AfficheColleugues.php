<?php
include "../core/ColleguesC.php";

$C=new ColleguesC();
$CLients=$C->recuperercolleugue();
if(!isset($_SESSION)){
    session_start();

}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart  Loywer</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../Elements/stylesheets.php'; ?>
    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
        }
    </style>
</head>
<span class="se-pre-con">
</span>
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
                        <h1 class="breadcrumb-item" style="text-decoration-style: solid;"> جدول المحامين </h1>
                    <a href="#">Home</a>
                    </div><!-- /.col -->
                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content" style="padding: 50px;">

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table-striped" cellspacing="2">


                                    <thead>










                                       <th>إرسال رسالة</th>
                                       <th>ت.بريدي</th>
                                        <th>البريد الالكتروني</th>
                                        <th>العنوان</th>
                                        <th>الفاكس</th>
                                        <th>الهاتف</th>
                                        <th>الولاية</th>
                                        <th>الجدول</th>
                                        <th>اللقب</th>
                                        <th>الاسم</th>
   </thead>
                                <tbody>
                                    <?php
                                    foreach ($CLients as $client){
                                        ?>
                                        <tr>









                                            <td><?php
                                               if(strpos($client['email'], '@')){
?>
                                                   <a href="../mailbox/compose.php?mail=<?php echo trim($client['email']); ?>&&user=<?php echo  trim($client['nom']).' '.trim($client['prenom']); ?>"> <button class="btn btn-danger">إرسال</button>
                                                   </a>
                                                   <?php
                                               }


                                                ?></td>
                                            <td><?php echo trim($client['codpost']); ?></td>
                                            <td><?php echo trim($client['email']); ?></td>
                                            <td><?php echo trim($client['adresse']); ?></td>
                                            <td><?php echo trim($client['fax']); ?></td>
                                            <td><?php echo trim($client['tel']); ?></td>
                                            <td><?php echo trim($client['gouv']); ?></td>
                                            <td><?php echo trim($client['tb']); ?></td>
                                            <td><?php echo trim($client['prenom']); ?></td>
                                            <td><?php echo  trim($client['nom']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table></div>
                        </div></div>
               <!-- /.container-fluid -->

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $(".table").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });



    });
</script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
    $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>

    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").hide();
    });
</script>
</body>
</html>
