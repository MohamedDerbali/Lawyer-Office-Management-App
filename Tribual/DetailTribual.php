<?php
    include "../core/tribualC.php";
session_start();
    $tribuaC=new tribualC();
    $id=(int)$_GET['id'];
    $tribual=$tribuaC->recupererTribual($id);
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
                        <h1 class="m-0 text-dark">Ajouter un Agent</h1>
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
                        <form action="AddTribual.php" method="post">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="nom" value="<?php echo $tribual['nom'] ?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Addresse</label>
                                <input type="text" class="form-control" name="addresse" placeholder="Addresse" value="<?php echo $tribual['adresse'] ?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Telephone</label>
                                <input type="text" class="form-control" name="tel" placeholder="Telephone" value="<?php echo $tribual['telephone'] ?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" class="form-control" name="mail" placeholder="Email" value="<?php echo $tribual['email'] ?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Gouvernorat</label>
                                <select class="form-control" name="gouvernorat" >
                                    <option selected value="<?php echo $tribual['gouvernorat'] ?>"><?php echo $tribual['gouvernorat'] ?></option>
                                    <option value="ولاية أريانة">ولاية أريانة</option>
                                    <option value="ولاية باجة">ولاية باجة</option>
                                    <option value="ولاية بن عروس">ولاية بن عروس</option>
                                    <option value="ولاية بنزرت">ولاية بنزرت</option>
                                    <option value="ولاية تطاوين">ولاية تطاوين</option>
                                    <option value="ولاية توزر">ولاية توزر</option>
                                    <option value="ولاية تونس">ولاية تونس</option>
                                    <option value="ولاية جندوبة">ولاية جندوبة</option>
                                    <option value="ولاية زغوان">ولاية زغوان</option>
                                    <option value="ولاية سليانة">ولاية سليانة</option>
                                    <option value="ولاية سوسة">ولاية سوسة</option>
                                    <option value="ولاية سيدي بوزيد">ولاية سيدي بوزيد</option>
                                    <option value="ولاية صفاقس">ولاية صفاقس</option>
                                    <option value="ولاية قابس">ولاية قابس</option>
                                    <option value="ولاية قبلي">ولاية قبلي</option>
                                    <option value="ولاية القصرين">ولاية القصرين</option>
                                    <option value="ولاية قفصة">ولاية قفصة</option>
                                    <option value="ولاية القيروان">ولاية القيروان</option>
                                    <option value="ولاية الكاف">ولاية الكاف</option>
                                    <option value="ولاية مدنين">ولاية مدنين</option>
                                    <option value="ولاية المنستير">ولاية المنستير</option>
                                    <option value="ولاية منوبة">ولاية منوبة</option>
                                    <option value="ولاية المهدية">ولاية المهدية</option>
                                    <option value="ولاية نابل">ولاية نابل</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Doyen</label>
                                <input type="text" class="form-control" name="doyen" placeholder="doyen" value="<?php echo $tribual['doyen'] ?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Categorie</label>
                                <select class="form-control" name="categorie">
                                    <option value="<?php echo $tribual['categorie'] ?>" selected> value="<?php echo $tribual['categorie'] ?>"</option>
                                    <option value="محاكم القضاء العدلي">محاكم القضاء العدلي</option>
                                    <option value="المحاكم الابتدائية">المحاكم الابتدائية</option>
                                    <option value="المحكمة العقارية">المحكمة العقارية</option>
                                    <option value="محاكم الناحية">محاكم الناحية</option>
                                    <option value="محاكم الاستئناف">محاكم الاستئناف</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn-info" name="addclient">Modifier tribual</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
        window.location='AfficheTribual.php';
        return false;
    }


</script>


<?php include '../Elements/scripts.php'; ?>
</body>
</html>






