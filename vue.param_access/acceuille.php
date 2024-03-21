<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/dist/css/monstyle.css" rel=stylesheet>
  <script src="../jquery/dist/jquery.min.js"></script>
  <script src="../plugins/stream/stream.js"></script>
  <script src="../plugins/stream/stream-min.js"></script>
  <script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../moncss.css">
  <title>E-ecole</title>
</head>

<body class="formbody" id="app">
  <?php
  if (isset($_SESSION)) {
    include_once("head.php");
    include_once('../plugins/phpqrcode/genererqr.php');
  ?>
    <section class="heightFenpanel" style="padding-top: 80px;" id="panel">

      <center class="centrer box-shadow-mx" style="height:570px;padding-top:25px; width:400px; position:center;  font-size:25px;">
        VOUS ETES CONNECTE <br>
        <?= $_SESSION['monEcole']['nomEcole'] ?></br>
        <x style="font-size: 18px;"> <?= strtoupper($_SESSION['nom'] . ' ' . $_SESSION['postnom'] . ' ' . $_SESSION['prenom']) ?></x><br>
        <center style="margin-top:10px">
          <img style="width:200px; height:220px" class="img-rounded" src="../images/<?= $_SESSION['photoUtilisateur'] ?>" />
        </center>
        <a>
          MATRICUL : <?= $_SESSION['idUtilisateur'] ?>
        </a> <br>
        <x style="font-size: 10px;"> SCANNER POUR VOUS CONNECTE SUR AUTRE TERMINAL</x>

        <center>
          <?php
          $message =  $_SESSION['urlserver'] . '/e-ecole/control.param_access/ctr_con.php?acgrd&log=' . $_SESSION['log'] . '&pass=' . $_SESSION['pass'];
          $idqr = 'qrcarte&idEl=' . $_SESSION['idUtilisateur'];
          $ds = "../qrcartesAc&IdEco=" . $_SESSION['monEcole']['idEcole'] . "/";
          ?>
          <img src="<?= genererqr($idqr, $message, $ds) ?>" style="width:150px; height:170;margin:1px" /><br>
        </center>
      </center>
    </section>
  <?php
    include_once("footer.php");
  }
  ?>
</body>

</html>

<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vue.param_access/script.js"></script>
<a>
  <table>
    
</table>
</a>