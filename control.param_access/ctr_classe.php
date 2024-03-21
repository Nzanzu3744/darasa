<?php
(empty($_SESSION))?session_start():'';
if(isset($_GET['PrepaClasse'])){
   include_once("../vue.param_access/prepaClasse.php");

 }else if(isset($_GET['actual_section_sect'])){
   include_once("../vue.param_access/form_section.php");

 }elseif(isset($_GET['actual_section_unit'])){
   include_once("../vue.param_access/form_unite.php");
   
 }elseif(isset($_GET['liste_eleve_cls'])){

    include_once('../vue.param_access/liste_eleve.php');


 }elseif(isset($_GET['val'])){
  include_once('../control.param_access/mes_methodes.php');
  $cls = deserialiser($_POST['data1']);
  if(!empty($cls)==true){
      include_once("../model.param_access/org_classe.class.php");
      $idEcole = $_SESSION['monEcole']['idEcole'];
      foreach($cls as $sel){
        org_classe::ajouter($sel, $idEcole);
      }
      include_once("../vue.param_access/classe.php");
    
  }else{
    echo '<center class="col-sm-12" style="color:red">VEUILLEZ SELECTINNER AUMOINS UNE CLASSE <center> <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick=Orientation("../vue.param_access/classe.php","#panel")>Returner</button>';
  }
 }elseif(isset($_GET['actu'])){
  include_once("../vue.param_access/classe.php");

 }else{
    include_once('../control.param_access/mes_methodes.php');
    echec_controleur('CLASSE');
 }
?>