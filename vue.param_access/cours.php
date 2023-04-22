<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/org_classe.class.php');
include_once('../model.param_access/org_anneesco.class.php');
?>
 <?php
 (empty($_SESSION))?session_start():'';
 ?>
<div class="panel panel-default col-sm-12">
   
    
    <header  id="titre">
        <nav class="navbar navbar-default"> 
            <ul class="nav navbar-nav">
                <?php 
                    $perm = new org_classe();
                    $ann = new org_anneesco();
                    $ann= $ann->selectionnerDerAn()->fetch();
                    $idAnneeSco =0;
                    (isset($_GET['idAnnee']))?$idAnneeSco=$_GET['idAnnee']:$idAnneeSco =$ann['idAnneeSco'];


                    foreach($perm->selectionnerByUt($_SESSION['idUtilisateur'],$idAnneeSco) as $sel){
                        $maClasse =" <z>".$sel['section'].":".$sel['unite']." ".$sel['promotion'].' '.$sel['anneeSco']."</z>";
                    ?>
                    <li style="border: 2px dashed black"> <a href="#" onclick="showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_cours.php?VueCours&maClasse=<?=$maClasse?>&idAfft=<?=$sel['idAffectation']?>&idClasse=<?=$sel['idClasse']?>','#editLeco')" name="<?php echo $sel['idClasse']?>"><?php echo strtoupper("<b style=color:black>".$maClasse."</b>")?></a></li> 
                    <?php 
                     }
                ?>   
            </ul>
            <!-- onclick="showme('#leconsgauche','#editLeco','false'); Orientation('../control.param_access/ctr_classe.php?VueClasses&idAfft&idClasse','#editLeco','')" -->
            <select onchange="Orientation('../control.param_access/ctr_cours.php?VueClasseAff=true&idAnnee='+$(this).val(),'#panel');" style="border: 1px solid white; background:black; height:55px; width:150px; font-size:25px;" class="pull-right">
             <?php 
                    $perm = new org_anneesco();
                    if(isset($_GET['idAnnee'])){
                        $annSelect = org_anneesco::rechercher($_GET['idAnnee'])->fetch();
                        ?>
                        <option style="color:green"  value="<?php echo $annSelect ['idAnnee']?>"><?php echo strtoupper($annSelect ['anneeSco'])?></option>
                        <?php
                    }
                    foreach($perm->selectionnerByUtAff($_SESSION['idUtilisateur']) as $sel){
                    ?>
                    
                    <option  value="<?php echo $sel['idAnneeSco']?>"><?php echo strtoupper($sel['anneeSco'])?></option> 
                    <?php 
                     }
                ?>   
                </select>
        </nav>
        
    </header>
<section class="" id="corps" style="height:580px">
    <div id="editLeco" style="padding:0px; margin:0px; height:560px; with:100% display: inline-block;" class="well table-responsive">
        <center class="titres" style="font-size:30px; padding:18%" > Selectionner une classe pour visualiser tes cours de cette derniere.</center>
    </div>
    <div id="leconsgauche" class="col-sm-2" style="display:none">
    </div>
    
</section>

</div>

