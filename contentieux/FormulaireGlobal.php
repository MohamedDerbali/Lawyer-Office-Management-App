<?php
include '../Core/ClientC.php';
include '../Core/tribualC.php';
include '../Core/PaiementC.php';
include '../Core/AgentC.php';

session_start();
if (!empty($_SESSION)){


$clientC=new ClientC();
$Tr=new tribualC();
$tribunals=$Tr->AllTribual();
    $Ag=new AgentC();
    $agent=$Ag->AllAgent();
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
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">اضافة حريف</li>
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

                        <div id="div0">
                            <h4 class="m-0 text-dark" style="text-align: center">اضافة حريف</h4>
                            <form action="../Client/ajoutclient.php" onsubmit="return submitForm(this);"  method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">اللقب</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="nom" placeholder="nom" required="" oninvalid="this.setCustomValidity('هذا الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الاسم</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="prenom" placeholder="prenom" required="" oninvalid="this.setCustomValidity('هذا الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">تاريخ الولادة</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput3" name="dateNaissance" placeholder="Date Naissance" required="" oninvalid="this.setCustomValidity('هذا الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">بطاقة التعريف</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput3" name="identite" placeholder="CIN" required="" oninvalid="this.setCustomValidity('هذا الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                    <div class="alert alert-danger" role="alert" id="exist" >
                                        موجود
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">العنوان</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="adresse" placeholder="addresse" required="" oninvalid="this.setCustomValidity('هذا الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">البريد الالكتروني</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3"  name="mail" placeholder="mail">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الهاتف</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput3"  name="tel" placeholder="tel">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الهاتف القار</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput3"  name="fix" placeholder="fix">
                                </div>

                                <br>


                                <div class="form-group">

                                <button type="submit" class="btn btn-info" name="addclient">اضافة الحريف</button>
                                </div>
                            </form>
                            <br>
                            <button class="btn btn-success" id="next1" style="float:right;" onclick="hidecurrentShowNext('#div0','#div1')">Suivant </button>
                        </div>







                        <div id="div1">
                        <h4 class="m-0 text-dark" style="text-align: center">Ajouter une Affaire</h4>
                    <form action="AjoutContenttieuxAdmin.php" onsubmit="return submitForm(this);"  method="post">

                            <input type="text" hidden class="form-control" id="idcl" name="idclient">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">فئة الأعمال</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="categorie" placeholder="categorie" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">بتاريخ</label>
                            <input type="date" class="form-control" id="exampleFormControlInput3" name="date" placeholder="././." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">القضية رقم.</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" name="NumAffaire" placeholder="N° Affaire" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            <div class="alert alert-danger" role="alert" id="exist" >
                                موجود
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">هدف</label>
                            <textarea  class="form-control" id="exampleFormControlInput3" name="objectif" placeholder="objectif" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">محكمة</label>
                            <select type="text" class="form-control" id="exampleFormControlInput1" name="idTribual" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                <?php
                                foreach ($tribunals as $t):
                                    ?>
                                    <option value="<?php  echo $t['id']?>"><?php  echo $t['nom']?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">المستشار</label>
                            <select type="text" class="form-control" id="exampleFormControlInput1" name="idagent" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                <?php
                                foreach ($agent as $a):
                                    ?>
                                    <option value="<?php  echo $a['id']?>"><?php  echo $a['prenom']?> <?php  echo $a['nom']?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">عريضة</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" name="petition" placeholder="Petition" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">الموضوع</label>
                            <textarea  class="form-control" id="exampleFormControlInput3" name="sujet" placeholder="Sujet" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="addagent">اضافة مستشار</button>
                    </form>

                        <button class="btn btn-success" id="next1" style="float:right;" onclick="hidecurrentShowNext('#div1','#div2')">next</button>
                        </div>
                        <div id="div2">
                            <h4 class="m-0 text-dark" style="text-align: center">أضف دفعة</h4>
                            <form method="post" action="../Paiement/ajoutPaiement.php" onsubmit="return submitFormJustificatif(this);" enctype="multipart/form-data">
                                <input hidden id="gg" name="idContentieux"/>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">العنوان</label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">المبلغ</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="montant" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">التاريخ النظري</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput3" name="dateth" placeholder="Date Theorique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">طريقة</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="modalite" placeholder="modalite" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">موعد عملي</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput3" name="datePr" placeholder="date Pratique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الملفات</label>
                                    <input type="file" class="form-control"  name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')">
                                </div>
                                <input type="submit" class="btn btn-success" value="ajouter paiement">

                            </form>
                            <br>
                            <button class="btn btn-success" id="next1" style="float:right;" onclick="hidecurrentShowNext('#div2','#div3')">next</button>
                            <button class="btn btn-success" id="next1" style="float:left;" onclick="hidecurrentShowNext('#div2','#div1')">previous</button>

                        </div>

                        <div id="div3">
                            <h4 class="m-0 text-dark" style="text-align: center">إضافة مؤيد</h4>
                            <form action="JustificatifAdd.php"  onsubmit="return submitFormJustificatif(this);" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الصياغة</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="libelle" placeholder="Libelle ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <input type="hidden"  id="just" name="contentieux" />
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">قم باستيراد ملف</label>
                                    <input type="file" class="form-control"  name="fil" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الفئة</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="categorie" placeholder="Categorie ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>

                                <button type="submit" class="btn btn-primary" name="addjustificatif">إضافة مؤيد</button>
                            </form>
                            <br>
                            <button class="btn btn-success" id="next1" style="float:right;" onclick="hidecurrentShowNext('#div3','#div4')">next</button>
                            <button class="btn btn-success" id="next1" style="float:left;" onclick="hidecurrentShowNext('#div3','#div2')">previous</button>
                        </div>
                        <div id="div4">
                            <h4 class="m-0 text-dark" style="text-align: center">أضف تكلفة</h4>
                            <form method="post" action="../Charges/ajoutCharge.php" onsubmit="return submitFormJustificatif(this);" enctype="multipart/form-data">
                                <input type="hidden" id="cc"  name="idContentieux"/>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">المبلغ</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="montant" placeholder="Titre" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">تاريخ الشحن</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput3" name="datecharge" placeholder="Date Theorique" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الملف</label>
                                    <input type="file" class="form-control" name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الملف</label>
                                    <select  class="form-control" id="exampleFormControlInput3" name="etat" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')" >
                                        <option value="paye">دفع</option>
                                        <option value="non paye">غير مدفوع الأجر</option>
                                    </select>
                                </div>
                                <input type="submit" value="ajouter paiement">
                            </form>
                            <br>
                            <button class="btn btn-success" id="next1" style="float:right;" onclick="hidecurrentShowNext('#div4','#div5')">next</button>
                            <button class="btn btn-success" id="next1" style="float:left;" onclick="hidecurrentShowNext('#div4','#div3')">previous</button>
                        </div>
                        <div id="div5">
                            <h4 class="m-0 text-dark" style="text-align: center">إضافة تقرير</h4>
                            <form method="post" action="../Rapport/ajoutRapport.php" onsubmit="return submitFormJustificatif(this);" enctype="multipart/form-data">
                                <input  id="rr" type="hidden" name="idcontentieux"/>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الصياغة</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput3" name="libelle" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الملف</label>
                                    <input type="file" class="form-control"  name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                                </div>

                                <input type="submit" value="ajouter rapport" class="btn btn-success">
                            </form>
                            <br>
                            <button class="btn btn-success" id="next1" style="float:left;" onclick="hidecurrentShowNext('#div5','#div4')">previous</button>
                        </div>

                    </div>

                </div>
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">إضافة ناجحة</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Test OK&hellip;</p>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

                    <!-- /.container-fluid --></div>
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
<script>
    document.getElementById("exist").style.display = "none";


    $( document ).ready(function() {

        if( $("#gg").val()==''){
            $("#next1").prop('disabled', true);
        }
        window.localStorage.setItem('user', JSON.stringify(0));
        $("#div1").hide();
        $("#div2").hide();
        $("#div3").hide();
        $("#div4").hide();
        $("#div5").hide();
        $("#div6").hide();
        $("#div7").hide();
        $("#div8").hide();

    });
    function hidecurrentShowNext(current,next){
           $(current).hide();
            $(next).show();


    }

    function submitForm(oFormElement)
    {

        var xhr = new XMLHttpRequest();
        xhr.onerror = function(){ alert ("Error"); } // failure case
        xhr.open (oFormElement.method, oFormElement.action, true);
        xhr.send (new FormData (oFormElement));

        xhr.onload = function () {
            if (xhr.status === 200) {
                //File(s) uploaded
               if( xhr.responseText!="")
                {window.localStorage.setItem('user', JSON.stringify(xhr.responseText));
              console.log( xhr.responseText);
                    document.getElementById("exist").style.display = "none";

                $('#myModal').modal('show');

                var x = localStorage.getItem("user");
                document.getElementById('idcl').value=x.replace(/(^"|"$)/g, '');
                document.getElementById('gg').value=x.replace(/(^"|"$)/g, '');
                document.getElementById('just').value=x.replace(/(^"|"$)/g, '');
                document.getElementById('cc').value=x.replace(/(^"|"$)/g, '');
                document.getElementById('rr').value=x.replace(/(^"|"$)/g, '');
                $("#next1").prop('disabled', false);}
               else
                  {
                      document.getElementById("exist").style.display = "block";

                     }
            } else {
                alert('An error occurred!');
            }
        };
      //
        return false;
    }
    function submitFormJustificatif(oFormElement)
    {
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){if (xhr.status === 200) {
         alert("ناجحة");
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
</body>
</html>
<?php }
else{
    header('location:../Login.php');
}
?>
