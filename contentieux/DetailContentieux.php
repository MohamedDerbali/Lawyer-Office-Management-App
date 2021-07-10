<?php
include '../Core/CotentieuxC.php';
include '../Core/tribualC.php';
include '../Core/ClientC.php';
include '../Core/PaiementC.php';
include '../Core/ChargeC.php';
include '../Core/justificatifC.php';
include '../Core/RapportC.php';
include '../Core/JugementCalendarC.php';
include '../Core/seanceC.php';
session_start();

$c=new CotentieuxC();
$Cont=$c->getContentieuxbyId($_GET['id']);
$id=$_GET['id'];
$cl=new ClientC();
$Trib=new tribualC();
foreach ($Cont as $c) {
    $client = $cl->getClientbyId($c['idClient']);
    $tribual = $Trib->recupererTribual($c['idTribual']);
}
$listtribunals=$Trib->AllTribual();
$p=new PaiementC();
$c=new ChargeC();
$r=new RapportC();
$paiment=$p->afficherAllPaiment($_GET['id']);
$charge=$c->afficherAllCharges($_GET['id']);
$rapport=$r->afficherAllrapport($_GET['id']);
$calenderieC=new JugementCalendarC();
$calenderie=$calenderieC->Alljugementcalendar();
$seanceC=new seanceC();
$listSeance=$seanceC->afficherAllscContentieux($_GET['id']);
$jst=(new justificatifC())->afficherAlljust($_GET['id']);
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
        <div class="container">
<div class="card" style="padding: 30px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="generale-tab" data-toggle="tab" href="#generale" role="tab" aria-controls="generale" aria-selected="true">اعدادات عامة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Justificatifs-tab" data-toggle="tab" href="#Justificatifs" role="tab" aria-controls="Justificatifs" aria-selected="false">الوثائق الداعمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Paiements-tab" data-toggle="tab" href="#Paiements" role="tab" aria-controls="Paiements" aria-selected="false">المدفوعات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Seances-tab" data-toggle="tab" href="#Seances" role="tab" aria-controls="Seances" aria-selected="false">الجلسات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Rapports-tab" data-toggle="tab" href="#Rapports" role="tab" aria-controls="Rapports" aria-selected="false">التقارير</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Charges-tab" data-toggle="tab" href="#Charges" role="tab" aria-controls="Charges" aria-selected="false">Charges</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="RendezVous-tab" data-toggle="tab" href="#RendezVous" role="tab" aria-controls="RendezVous" aria-selected="false">موعد</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="generale" role="tabpanel" aria-labelledby="generale-tab">

                <form action="UpdateContentieux.php?id=<?php echo $id ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                    <?php
                    foreach ($Cont as $Contentieux):
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">الموكل</label>
                        <select type="text" class="form-control" id="exampleFormControlInput1" name="idclient">

                        <?php
                        foreach ($client as $cc):
                        ?>
                            <option value="<?php  echo $cc['id']?>" selected><?php  echo $cc['nom']?> </option>
                        <?php
                        endforeach;
                        ?>

                        </select>
                    </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">نوع القضية</label>
                                <select type="text" class="form-control" id="exampleFormControlInput1" name="categorie">
                                    <option value="categorie1">قضية مدنية</option>
                                    <option value="categorie2">قضية جزائية</option>
                                     <option value="categorie1">قضية التجارية</option>
                                    <option value="categorie2">القضية الضريبية</option>
                                     <option value="categorie1">Affaire Foncier</option>
                                    <option value="categorie2">مسألة إدارية</option>
                                     <option value="categorie1">Contentieux Arbitrale</option>
                                    <option value="categorie2">وساطة</option>

                                    <option value="<?php  echo $Contentieux['Categorie']?>" selected><?php  echo $Contentieux['Categorie']?> </option>

                                </select>

                            </div>
                            <div class="form-group">
                        <label for="exampleFormControlInput1">رقم الملف الداخلي.</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="codeinterne" value="<?php  echo $Contentieux['codeinterne']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">بتاريخ</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" name="date" value="<?php  echo $Contentieux['dateContentieux']?>" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">objectif</label>
                        <textarea  class="form-control" id="exampleFormControlInput3" name="objectif" placeholder="objectif"required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')"><?php  echo $Contentieux['objectif']?></textarea>
                    </div>
                        </div>
                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">محكمة</label>


                        <select type="text" class="form-control" id="exampleFormControlInput1" name="idTribual">


                            <option value="<?php  echo $tribual['id']?>" selected><?php  echo $tribual['nom']?> </option>

                            <?php
                            foreach ($listtribunals as $cc):
                                ?>
                                <option value="<?php  echo $cc['id']?>" selected><?php  echo $cc['nom']?> </option>
                            <?php
                            endforeach;
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">عريضة</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="petition"value="<?php  echo $Contentieux['petition']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">موضوع</label>
                        <textarea  class="form-control" id="exampleFormControlInput3" name="sujet" placeholder="Sujet"><?php  echo $Contentieux['sujet']?></textarea>
                    </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">الحالة</label>
                                <select type="text" class="form-control" id="exampleFormControlInput1" name="statut">
                                        <option value="status1">staut1</option>
                                        <option value="sataus2">staut2</option>
                                        <option value="<?php  echo $Contentieux['statut']?>" selected><?php  echo $Contentieux['statut']?> </option>

                                </select>

                            </div>
                    <?php
                    endforeach;
                    ?>
                    <button type="submit" class="btn btn-success" name="update">تحديث</button>
                        </div>
                        </div>
                </form>



















            </div>
            <div class="tab-pane fade" id="Justificatifs" role="tabpanel" aria-labelledby="Justificatifs-tab">


                <div class="form-group"> <button class="btn-info" data-toggle="modal" data-target="#exampleModal">ajout justfication</button></div>

<div id="just">
                <table id="exampleJ" class="table table-bordered table-striped" >

                    <thead>
                    <tr>
                        <td>Libelle</td>
                        <td>Fichier</td>
                        <td>Catégorie de justificatif</td>
                        <td>Action</td>

                    </tr>
                    </thead>



                    <?php
                    foreach ($jst as $keypt):
                    ?>
                        <tr>
                            <td><?php echo $keypt['libelle'] ?> </td>
                            <td><a href="ConusltFichier.php?filename=<?php echo $keypt['fichier'] ?>"><?php echo $keypt['fichier'] ?></a></td>
                            <td><?php echo $keypt['categorie'] ?></td>

                            <td><a href="../Justificatif/modifjustifFom.php?id=<?php echo $keypt['id'] ?>"><i class="fa fa-edit" ></i></a>
                                <i class="fa fa-trash"  onclick="DelJust(<?php echo $keypt['id'] ?>)"></i></td>

                        </tr>

                        <?php
                endforeach;
                ?>


                </table>

</div>


            </div>

            <div class="tab-pane fade" id="Seances" role="tabpanel" aria-labelledby="Seances-tab">
<div id="rsSeance">
                <div class="form-group"> <button class="btn-info" data-toggle="modal" data-target="#SeanceAdd">ajout Seance</button></div>

                <table id="exampleS" class="table table-bordered table-striped" >

                    <thead>
                    <tr>
                        <td>Libelle</td>
                        <td>Date</td>
                        <td>lieux</td>
                        <td>Action</td>

                    </tr>
                    </thead>



                    <?php

                        foreach ($listSeance as $keypt){
                            ?>
                            <tr>
                                <td><?php echo $keypt['libelle'] ?> </td>
                                <td><?php echo $keypt['datesc'] ?></td>
                                <td><?php echo $keypt['lieux'] ?></td>

                                <td><a href="../Seance/ModifierSeance.php?id=<?php echo $keypt['id'] ?>"><i class="fa fa-edit" ></i></a>
                                    <i class="fa fa-trash"  onclick="DeleteSeance(<?php echo $keypt['id'] ?>)"></i></td>

                            </tr>

                            <?php
                        }

                    ?>


                </table>
</div>


               </div>

            <div class="tab-pane fade" id="Paiements" role="tabpanel" aria-labelledby="Paiements-tab">
                <div class="form-group"> <button class="btn-info" data-toggle="modal" data-target="#paimenetadd">ajout Paiement</button></div>
                <div id="rs">
                    <table id="exampleP" class="table table-bordered table-striped">


                        <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Montant</td>
                            <td>Date de paiement theorique</td>
                            <td>Modalite de paiement</td>
                            <td>Etat</td>
                            <td>Date de paiement pratique</td>
                            <td>fichier</td>
                            <td>Actions</td>
                        </tr>
                        </thead>



                        <?php
                        foreach ($paiment as $p):
                        ?>
                </div>
                <tr>
                    <td><?php echo $p['titre'] ?> </td>
                    <td><?php echo $p['montant'] ?> DT</td>
                    <td><?php echo $p['dateth'] ?></td>
                    <td><?php echo $p['modalite'] ?></td>
                    <td><?php echo $p['etat'] ?></td>
                    <td><?php echo $p['datePR'] ?></td>
                    <td><a href="ConusltFichier.php?filename=<?php echo $p['fichier'] ?>"><?php echo $p['fichier'] ?></a></td>
                    <td><a href="../Paiement/updatePaiment.php?id=<?php echo $p['id'] ?>"><i class="fa fa-edit" ></i></a>

                        <i class="fa fa-trash" onclick="deletePaiement(<?php echo $p['id'] ?>)"></i></td>
                </tr>


                <?php
                endforeach;
                ?>



                </table>
            </div>
            </div>
            <div class="tab-pane fade" id="Rapports" role="tabpanel" aria-labelledby="Rapports-tab">

                <div class="form-group"> <button class="btn-info" data-toggle="modal" data-target="#Rapportadd">ajout Rapport</button></div>

                <div id="rsRapport">
                    <table id="exampleR" class="table table-bordered table-striped">


                        <thead>
                        <tr>
                            <td>libelle</td>
                            <td>fichier</td>
                            <td>Actions</td>

                        </thead>



                        <?php
                        foreach ($rapport as $rr):
                        ?>
                </div>
                <tr>
                    <td><?php echo $rr['libelle'] ?> </td>
                    <td><a href="ConusltFichier.php?filename=<?php echo $rr['fichier'] ?>"><?php echo $rr['fichier'] ?></a></td>
                    <td><a href="../Rapport/updateRapportProcess.php?id=<?php echo $rr['id'] ?>"><i class="fa fa-edit" ></i></a>
                        <i class="fa fa-trash" onclick="deleteRapport(<?php echo $rr['id'] ?>)"></i></td>
                </tr>


                <?php
                endforeach;
                ?>



                </table>
            </div>
            </div>
            <div class="tab-pane fade" id="Charges" role="tabpanel" aria-labelledby="Charges-tab">
                <div class="form-group"> <button class="btn-info" data-toggle="modal" data-target="#Chargeadd">ajout Charge</button></div>

                <div id="rsCharge">
                    <table id="exampleCH" class="table table-bordered table-striped">


                        <thead>
                        <tr>
                            <td>Montant</td>
                            <td>Date de charge</td>
                            <td>Etat</td>
                            <td>Fichier</td>
                            <td>Actions</td>

                        </thead>



                        <?php
                        foreach ($charge as $cc):
                        ?>

                <tr>
                    <td><?php echo $cc['montant'] ?> </td>
                    <td><?php echo $cc['datecharge'] ?></td>
                    <td><?php echo $cc['etat'] ?></td>
                    <td><a href="ConusltFichier.php?filename=<?php echo $cc['fichier'] ?>"><?php echo $cc['fichier'] ?></a></td>

                    <td><a href="../Charges/UpdateCharge.php?id=<?php echo $cc['id'] ?>"><i class="fa fa-edit" ></i></a><i class="fa fa-trash" onclick="deletecharges(<?php echo $cc['id'] ?>)"></i></td>
                </tr>


                <?php
                endforeach;
                ?>



                </table>
            </div>

            </div>
            <div class="tab-pane fade" id="RendezVous" role="tabpanel" aria-labelledby="RendezVous-tab">
                <div id="rsCharge">
                    <table id="example1" class="table table-bordered table-striped">


                        <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Debut</td>
                            <td>Fin</td>
                            <td>Actions</td>

                        </thead>



                        <?php
                        foreach ($calenderie as $cal):
                        ?>

                <tr>
                    <td><?php echo $cal['title'] ?> </td>
                    <td><?php echo $cal['start'] ?></td>
                    <td><?php echo $cal['end'] ?></td>
                    <td><a href="../Charges/UpdateCharge.php?id=<?php echo $cc['id'] ?>"><i class="fa fa-edit" ></i></a></td>
                    <td><i class="fa fa-trash"
                           onclick="deletecharges(<?php echo $cc['id'] ?>)"></i></td>
                </tr>


                <?php
                endforeach;
                ?>



                </table>
                </div>
            </div>



    </div>
        </div>

        <!-- /.content -->
        </div></div>
    </div>
    <?php include '../Elements/footer.php'; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!---ajout justfi-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="JustificatifAdd.php"  onsubmit="return submitFormJustificatif(this,'exampleJ');" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Libelle</label>
                        <input type="text" class="form-control" id="libelleid" name="libelle" placeholder="Libelle ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <input type="hidden"  id="just" name="contentieux" value="<?php echo $_GET['id']?>" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Importer un fichier</label>
                        <input type="file" class="form-control"  name="fil" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Categorie</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="categorie" placeholder="Categorie ..." required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>

                    <button type="submit"  class="btn btn-primary" name="addjustificatif">Ajouter un Justificatif</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------>


<!---ajout paiement-->

<div class="modal fade" id="paimenetadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../Paiement/ajoutPaiement.php" onsubmit="return submitFormJustificatif(this,'exampleP');" enctype="multipart/form-data">
                    <input hidden id="gg" name="idContentieux" value="<?php echo $_GET['id'] ?>"/>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="titre" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Montant</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="montant" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date Theorique</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" name="dateth" placeholder="Date Theorique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Modalite</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="modalite" placeholder="modalite" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">date Pratique</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" name="datePr" placeholder="date Pratique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">fichier</label>
                        <input type="file" class="form-control"  name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <input type="submit" class="btn btn-success" value="ajouter paiement" >

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------>


<!---ajout Rapport-->

<div class="modal fade" id="Rapportadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../Rapport/ajoutRapport.php" onsubmit="return submitFormJustificatif(this,'exampleR');" enctype="multipart/form-data">
                    <input  id="rr" type="hidden" name="idcontentieux" value="<?php  echo $_GET['id'] ?>"/>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">libelle</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="libelle" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">fichier</label>
                        <input type="file" class="form-control"  name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>

                    <input type="submit" value="ajouter rapport"   class="btn btn-success">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------>


<!---ajout charge-->

<div class="modal fade" id="Chargeadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../Charges/ajoutCharge.php" onsubmit="return submitFormJustificatif(this,'exampleCH');" enctype="multipart/form-data">
                    <input type="hidden" id="cc"  name="idContentieux" value="<?php echo $_GET['id']?>"/>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Montant</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="montant" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date charge</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" name="datecharge" placeholder="Date Theorique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">fichier</label>
                        <input type="file" class="form-control" name="fichier" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">fichier</label>
                        <select  class="form-control" id="exampleFormControlInput3" name="etat" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                            <option value="paye">paye</option>
                            <option value="non paye">non paye</option>
                        </select>
                    </div>
                    <input type="submit" value="ajouter paiement" class="btn btn-info">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------>

<!---ajout Seance-->

<div class="modal fade" id="SeanceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../Seance/AjoutSeance.php" onsubmit="return submitFormJustificatif(this,'exampleS');" >
                    <input type="hidden" id="cc"  name="idContentieux" value="<?php echo $_GET['id']?>"/>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Libelle</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="libelle" placeholder="Titre" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date Seance</label>
                        <input type="date" class="form-control" id="exampleFormControlInput3" name="date" placeholder="Date Theorique" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Lieux</label>
                        <input type="text" class="form-control" name="lieux" required="" oninvalid="this.setCustomValidity('هذه الخانة إلزامية')"  oninput="this.setCustomValidity('')">
                    </div>

                    <input type="submit" value="ajouter Seance" class="btn btn-info">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!------>
<?php include '../Elements/scripts.php'; ?>
<script>
    function DelJust(x) {
        var data = 'rr';
        $.ajax({
            type: "GET",
            url:"DeLjust.php",
            data: {'id':x},
            success: function (data) {

                $( "#exampleJ" ).load(window.location.href + " #exampleJ" );

            }
        });
    }
    function deletePaiement(x) {
        var data = 'rr';
        $.ajax({
            type: "GET",
            url:"../Paiement/deletePaiement.php",
            data: {'id':x},
            success: function (data) {
                console.log('hello')
                $( "#exampleP" ).load(window.location.href + " #exampleP" );
            }
        });
    } function deletecharges(x) {
        var data = 'rr';
        $.ajax({
            type: "GET",
            url:"../Charges/DeleteCharge.php",
            data: {'id':x},
            success: function (data) {
                console.log('hello')
                $( "#exampleCH" ).load(window.location.href + " #exampleCH" );
            }
        });
    }
    function deleteRapport(x) {
        var data = 'rr';
        $.ajax({
            type: "GET",
            url:"../Rapport/DeleteRapport.php",
            data: {'id':x},
            success: function (data) {
                console.log('rr')
                $( "#exampleR" ).load(window.location.href + " #exampleR" );
            }

        });
    } function DeleteSeance(x) {
        var data = 'rr';
        $.ajax({
            type: "GET",
            url:"../Seance/DeleteSeance.php",
            data: {'id':x},
            success: function (data) {

                $( "#exampleS" ).load(window.location.href + " #exampleS" );
            }

        });
    }

    function submitFormJustificatif(oFormElement)
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
    }function submitFormJustificatif(oFormElement,x)
    {
        var xhr = new XMLHttpRequest();
        xhr.onload = function(){ if (xhr.status === 200) {
            alert("succès");
            $( "#"+x ).load(window.location.href + " #"+x );
        }else
        {
            alert(""+xhr.status);

        }

        } // success case
        xhr.onerror = function(){ alert ("Error"); } // failure case
        xhr.open (oFormElement.method, oFormElement.action, true);
        xhr.send (new FormData (oFormElement));
        return false;
    }
    function refresh() {
       location.reload();
    }
</script>
</body>
</html>
