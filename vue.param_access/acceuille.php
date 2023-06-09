    <?php
  include_once("head.php");
  ?>
<section style= "width:102%;" id="panel" style="">
<div style="border: 1px solid green; margin-top: 50px; width:100%">
</div>
<br>
<center style="margin-top:60px; height:50%" class="col-sm-4 col-lg-4 col-xs-4 col-sm-offset-4 col-lg-offset-4 col-xs-offset-4">
  <b style="color:green; font-size:20px; margin-top:50px" class="col-sm-12 col-lg-12 col-xs-12">VOUS ETES CONNECTE ETANT  QUE</b>
  <span style="margin-top:10px"><?=$_SESSION['nom'].' '.$_SESSION['postnom'].' '.$_SESSION['prenom']?></span>
  <center class="col-sm-offset-2 col-lg-offset-4 col-sm-8 col-lg-4 col-xs-12" style="margin-top:10px">
    <img style="width:100%"class="img-circle" src="../images/<?=$_SESSION['photoUtilisateur']?>"/>
  </center>
  <b class="col-sm-12 col-lg-12 col-xs-12" style="col-sm-12 col-lg-12 col-xs-12" >MATRICUL : <?=$_SESSION['idUtilisateur']?></b>
</center>
<div>
</div?>
</div?>
<?php include_once("footer.php");?>