<?php
include_once('../control.param_access/mes_methodes.php');
include_once('..//model.param_access/param_ecole.class.php');

if(isset($_GET['idPays'])){
   include_once('..//model.param_access/param_province.class.php');
   $idPays = htmlspecialchars($_GET['idPays']);
   $prov = new param_province();
   $prov = $prov ->rechercherByProvPays($idPays);
?>
   Province :
   <select id="idProvinceEcole" name="idProvinceEcole" style="width:100%"  type="text" class="form-control"onchange="Orientation('../control.param_access/ctr_adresse.php?idProvinceEcole='+$(this).val(),'#lb_idVilleTerritoire')">
   <?php
   foreach($prov as $selP){
   ?>
   <option value=<?=$selP['idProvince']?>><?=$selP['nomProvince']?></option>
   <?php
   }
   ?>
   </select>
<?php
}elseif(isset($_GET['idProvinceEcole'])){
   include_once('..//model.param_access/param_ville_territoire.class.php');
   $idPro = htmlspecialchars($_GET['idProvinceEcole']);
   $prov = new param_ville_territoire();
   $prov = $prov ->rechercherByProv($idPro);
?>
   Ville/Territoire :
   <select id="idVilleTerritoire" name="idVilleTerritoire" style="width:100%"  type="text" class="form-control">
   <?php
   
   foreach($prov as $selV){
   ?>
   <option value=<?=$selV['idVilleTerritoire']?>><?=$selV['nomVilleTerritoire']?></option>
   <?php
   }
   ?>
   </select>
<?php

}elseif(isset($_GET['actuByidPays'])){
  
   include_once('..//model.param_access/param_ville_territoire.class.php');
   $idPays = htmlspecialchars($_GET['actuByidPays']);
   $vilT = new param_ville_territoire();
   $vilT = $vilT ->rechercherByPremieProvPays($idPays);
?>
Ville/Territoire :
<select id="idVilleTerritoire" name="idVilleTerritoire" style="width:100%"  type="text" class="form-control">
<?php
foreach($vilT as $selVt){
?>
<option value=<?=$selVt['idVilleTerritoire']?>><?=$selVt['nomVilleTerritoire']?></option>
<?php
}
?>
</select>
<?php
}else{
   include_once('../control.param_access/mes_methodes.php');
   echec_controleur('CTRS ADRESSE');

}

?>

