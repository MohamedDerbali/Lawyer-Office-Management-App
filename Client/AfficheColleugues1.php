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
                        <h1 class="m-0 text-dark">List Collegues</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
  
        <!-- /.content-header -->
<div class="one-third last" id="sidebar">
 <style>
.control{padding: 0px 10px 3px 10px; }
.button_search{
    height: 24px;
    width: 20%;
    cursor: pointer;
    background-color: #335EFF;
    color: #fff;
    border: solid 1px #a9a9a9;
    font-size: 18px;
    margin-right: 100px;
    /*margin-left: 36%;*/
    text-align:center;
    margin-top: 3px;
}
.list{height:102px}
 .data_ann{color:#6D6D6D}
.label{
    font-size: 16px;
}
 .label_rch{
        font-size:16px;
    }

.input_rch{border: solid 1px #a9a9a9;width:53%;}
</style>
<aside class="widget" style="margin-bottom:5px;height:270px;text-align: right; direction:rtl">
        <h6 class="widget-title" dir="rtl" style="text-align: right;">?????????? ???? ????????</h6>
        <div class="newsletter" style="padding:7px 19px 0px 20px;">
        <div class="search">
            <div style="display:table-cell;width:30%">
        <h2></h2>
       <form method="GET" action="">
       <input type="hidden" name="mayor" value="compte">
        <input type="hidden" name="action" value="annu">
        <div class="control"> 
             <label class="label_rch" style=" padding-left: 79px">??????????</label>
             <span class="form">
                <input type="text" id="nom" name="nom" value="" class="input_rch">
            </span><br>
        </div>
            <div class="control"> 
            <label class="label_rch" style=" padding-left: 82px"> ?????????? </label>
                <span class="form">
                    
                 <input type="text" id="prenom" name="prenom" value="" class="input_rch">
                </span><br>
        </div>
        
       <div class="control"> 
             <label class="label_rch" style=" padding-left: 75px"> ???????????? </label>
             <span class="form">
                 <select id="table" name="table" style="width:53%;">
                      <option value="0">????????</option>
                      <option value="1">??????????</option>
                      <option value="2">??????????????</option>
                      <option value="3">??????????</option>
                 </select>
             </span><br>
         </div>
         <div class="control">  
             <label class="label_rch" style=" padding-left: 85px">?????????? </label>
                <span class="form">
                    <select id="bronche" name="bronche" style="width:53%;">
                         <option value="0">????????</option>
                                                         
                            <option value="1">????????</option>
                                                            
                            <option value="2">????????</option>
                                                            
                            <option value="3">??????????</option>
                                                            
                            <option value="4">??????????</option>
                                                            
                            <option value="5">??????????</option>
                                                            
                            <option value="6">????????</option>
                                                            
                            <option value="7">??????????????</option>
                                                            
                            <option value="8">????????</option>
                                                            
                            <option value="9">????????</option>
                                                            
                            <option value="10">????????????????</option>
                                                            
                            <option value="11">??????????</option>
                                                            
                            <option value="12">???????? ??????????</option>
                             
                     </select>
                     
                     <script>
                            $(document).ready(function(){
                               $("#bronche").change(function(){
                                 if($('#bronche').val() !=0)
                                    { 
                                        document.getElementById("bronche").selectedIndex=document.getElementById("bronche").selectedIndex; 
                                        xd=document.getElementById("bronche").value;
                                        changer(xd);
                                    }
                                    else
                                    {
                                      retour();
                                    }
                                        
                                  });
                            });
                            </script>
                </span><br>
         </div>
         <div class="control"> 
            <label class="label_rch" style=" padding-left: 78px"> ??????????????</label>
                <span class="form" id="Gouv">
                                    <select id="gov" name="gov" style="width:53%;">
                        <option value="0">????????</option>
                                                        
                        <option value="1">????????</option>
                                                
                        <option value="2">??????????</option>
                                                
                        <option value="3">??????????</option>
                                                
                        <option value="4">????????????</option>
                                                
                        <option value="13">??????????</option>
                                                
                        <option value="16">????????</option>
                                                
                        <option value="17">????????????????</option>
                                                
                        <option value="45">??????????</option>
                                                
                        <option value="46">???? ????????</option>
                                                
                        <option value="47">??????????</option>
                                                
                        <option value="48">????????????</option>
                                                
                        <option value="50">??????????????</option>
                                                
                        <option value="51">????????</option>
                                                
                        <option value="52">????????????</option>
                                                
                        <option value="53">????????</option>
                                                
                        <option value="54">????????????????</option>
                                                
                        <option value="55">??????????????</option>
                                                
                        <option value="56">????????</option>
                                                
                        <option value="57">???????? ??????????</option>
                                                
                        <option value="58">????????</option>
                                                
                        <option value="59">????????</option>
                                                
                        <option value="60">????????</option>
                                                
                        <option value="61">??????????</option>
                                                
                        <option value="62">????????????</option>
                                                
                        <option value="63">??????????</option>
                    
                    </select>
                                    </span><br>
        </div>
        <div class="control">  
             <label class="label_rch" style=" padding-left: 24px"> 
              ?????? ???????????? ??????????</label>
             <span class="form">
                <input type="text" id="tel" name="tel" value="" class="input_rch">
            </span><br>
        </div>
        <div class="control">
            <label class="label_rch" style="padding-left:13px ;display:inline-block;"> ?????? ???????????? ????????????</label>
                <span class="form">
                    <input type="text" id="mobile" name="mobile" value="" class="input_rch">
                </span><br>
        </div>
          <div class="control" style="text-align:center"> 
            <input type="button" name="submit" value="??????" title="??????" class="button_search" style="" onclick="chargement();">
         </div>
    </div>

</div>
</div>

</div>

         </form>
    </div> 
        </div>
    </div>
</aside>  

<!-- ./wrapper -->
<?php include '../Elements/footer.php'; ?>
<?php include '../Elements/scripts.php'; ?>
</body>
</html>
