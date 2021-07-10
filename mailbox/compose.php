
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if (array_key_exists('email', $_POST)) {
    $err = false;
    $msg = '';
    $email = '';

    //Apply some basic validation and filtering to the query
    if (array_key_exists('reason', $_POST)) {
        //Limit length and strip HTML tags
        $reason = substr(strip_tags($_POST['reason']), 0, 16384);
    } else {
        $reason = '';
        $msg = 'No feedback provided!';
        $err = true;
    }
    //Apply some basic validation and filtering to the name
    if (array_key_exists('username', $_POST)) {
        //Limit length and strip HTML tags
        $username = substr(strip_tags($_POST['username']), 0, 255);
    } else {
        $username = '';
    }
    //Validate to address
    //Never allow arbitrary input for the 'to' address as it will turn your form into a spam gateway!
    //Substitute appropriate addresses from your own domain, or simply use a single, fixed address

    //Make sure the address they provided is valid before trying to use it
    if (array_key_exists('email', $_POST) and PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg .= "Error: invalid email address provided";
        $err = true;
    }

    if (array_key_exists('attachment', $_FILES)) {
        $img_name = $_FILES['attachment']['name'];
        $upload = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['attachment']['name']));
        $uploadfile =  $_SERVER['DOCUMENT_ROOT'].'/Avocat/mailbox/assets/' . $img_name;

        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
            if (!$err) {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                // $mail->SMTPDebug = 3;
                $mail->SMTPSecure = 'tls';
                $mail->Host = 'smtp.gmail.com';
                // set a port
                $mail->Port = 25;
                $mail->SMTPAuth = true;
                // set login detail for gmail account
                $mail->Username = 'derbalios.mohamed@gmail.com';
                $mail->Password = 'Mm123456789.0';
                $mail->CharSet = 'utf-8';
                // set subject
                $mail->setFrom($email, $username);
                $mail->addAddress($email);
                $mail->addReplyTo($email, $username);
                $mail->addAttachment($uploadfile, 'My uploaded image');
                $mail->IsHTML(true);
                $mail->Subject = $_POST['sujet'];
                $mail->Body = $reason;
                if (!$mail->send()) {
                    $msg .= "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $msg .= "Message sent!";
                }
            }
        } else {
            $msg .= 'Failed to move file to ' . $uploadfile;
        }
    }
}

if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Compose Message</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../Elements/stylesheets.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->


    <!-- Main Sidebar Container -->
    <?php include '../Elements/navbar.php'; ?>
    <?php include '../Elements/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h1 style="text-align: center">تبادل التقارير و المؤيدات بين الزملاء و تنسيق الجلسات</h1>
        <div class="row" style="padding: 80px;">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">

                <form method="POST" enctype="multipart/form-data">
              <div class="card-header">
                <h3 class="card-title">Échange des conclusions et documents et coordination</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                  <input class="form-control" placeholder="à:" value="<?php if(isset($_GET['mail'])){
                      echo $_GET['mail'];
                  } ?>" name="email">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Sujet:" name="sujet">
                </div>
                  <div class="form-group">
                  <input type="hidden" class="form-control"  name="username" value="<?php
                  if(isset($_GET['user'])){
                  echo $_GET['user'];
                  } ?>">
                </div>
                <div class="form-group">
                    <label for="compose-textarea">

                    </label>
                    <textarea id="compose-textarea" class="form-control" name="reason" style="height: 300px;" placeholder="Ecrire quelque chose ...."></textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Ajouter un fichier
                    <input type="file" name="attachment" />
                  </div>
                  <small class="help-block">Max. 32MB</small>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Supprimer</button>
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyer</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
                    <!-- /.card-footer --></form>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
