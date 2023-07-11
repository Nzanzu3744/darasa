 <?php
 (empty($_SESSION))?session_start():'';
    include_once('../model.param_access/org_promotion.class.php');
    include_once('../model.param_access/param_groupe_periode.class.php');
    include_once('../model.param_access/dir_directeur.class.php');
    include_once('../model.param_access/org_anneesco.class.php');

 ?>

<div id="periode02" style="">
<?php
   $annee=null;
   $idann=null;
   $idPromo=null;
   if(!isset($_GET['idann'])){
         $ann= new org_anneesco();
         $ann = $ann->selectionnerDerAn()->fetch();
         $idann = $ann['idAnneeSco'];
         $annee = $ann['anneeSco'];    
   }else{
      $idann= htmlspecialchars($_GET['idann']);
      $annee = $_GET['annee'];
   }
?>
<label for="promo" class="col-sm-12">PROMOTION</label>

<select id="promo" class="form-control" style="width:100%" onchange="Orientation('control.param_access/ctr_periode.php?selectProm=true&idProm='+$('#promo').val(),'#classeOrg');Orientation('control.param_access/ctr_periode.php?selectPeriod&idann=<?=$idann?>&annee=<?=$annee?>&idProm='+$('#promo').val(),'#list_pr2')">
<?php
   if(isset($_GET['idProm'])){
      $pro = new org_promotion();
      $idPromo=htmlspecialchars($_GET['idProm']);
      $pro = $pro->rechercher($idPromo)->fetch();
   ?>
      <option value="<?=$pro['idPromotion']?>"><?=$pro['idPromotion']." : ".strtoupper($pro['promotion']);?></option>
   <?php
    }
   

   $Attridir= new dir_directeur();
   $Attridir = $Attridir->selectionnerByUtiAnn($_SESSION['idUtilisateur'],$idann);
   foreach($Attridir as $selpz){
      if($idPromo!=$selpz['idPromotion']){
   ?>
      <option value="<?=$selpz['idPromotion']?>"><?=$selpz['idPromotion']." : ".strtoupper($selpz['promotion']);?></option>
   <?php
      }
   }
   ?>                        
   </select>
</div>
<div id="classeOrg" style="height:250px" class="table-responsive">  
 
   <?php
      include_once('../vue.param_access/liste_classe_periode.php');
   ?>        
</div> 
<div style="">
<label for="idGp" class="col-sm-12">GOUPE PERIODE</label>
<select id="idGp" class="form-control" style="width:100%">
<?php
   $grpz = new param_groupe_periode();
   $u=0;
   foreach($grpz->selectionner() as $selpz){
      if($idgrp!=$selpz['idGroupePeriode']){
   ?>
      <option value="<?=$selpz['idGroupePeriode']?>"><?=$selpz['idGroupePeriode']." : ".strtoupper($selpz['groupePeriode']);?></option>
   <?php
      }
   }
   ?>                        
   </select>
</div>
<div style="">
   <div>
      <label for="peri02" class="col-sm-12">LIBELLE</label>
      <input id="peri02" class="form-control" >
   </div>
   <div class="col-sm-6" >
      <label for="dtD" class="col-sm-12">DATE DEBIT</label>
      <input id="dtD" class="form-control" type='date' >
   </div>
   <div class="col-sm-6">
      <label for="dtF" class="col-sm-12">DATE FIN</label>
      <input  id="dtF" class="form-control" type='date'>
   </div>
   <div style="margin-top:100px">
      <button  id="enrg" onclick="Orientation('control.param_access/ctr_periode.php?Valide&idProm='+$('#promo').val()+'&idGp='+$('#idGp').val()+'&peri02='+$('#peri02').val()+'&dtD='+$('#dtD').val()+'&dtF='+$('#dtF').val()+'&annee=<?=$annee?>&idann=<?=$idann?>','#list_pr2')"  class="btn btn-success pull-left col-sm-2">Ajouter</button>
      <button  id="" onclick="Orientation('control.param_access/ctr_periode.php?selectProm=true&idProm='+$('#promo').val(),'#classeOrg');Orientation('control.param_access/ctr_periode.php?selectPeriod&idann=<?=$idann?>&annee=<?=$annee?>&idProm='+$('#promo').val(),'#list_pr2')"  class="btn btn-default pull-right col-sm-2">Actualiser</button>      
   </div>
   <div style="height:50px;widht:100%color:green;font-size:20px"><center><?=$annee?></center></div>;
</div>     