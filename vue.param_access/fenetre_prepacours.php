<?php
include_once("../model.param_access/param_utilisateur.class.php");
include_once("../model.param_access/org_classe.class.php");
include_once("../model.param_access/org_anneesco.class.php");
?>
<section class="" id="corps">
    <div> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" style="color:green;font-size:20px" onclick='showme("#leconsgauche","#editLeco","false")'></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" style="color:green;font-size:20px" onclick='showme("#leconsgauche","#editLeco","true")'></i>
    </div>
    <div id="editLeco" class="table-responsive heightSous_Fen">
        <?php
        include_once("liste_prepacours.php");
        ?>
    </div>
    <div id="leconsgauche" class="col-sm-3 heightContSous_Fen_wid_0 box-shadow-spec" style="display: none;">
    </div>

</section>
<div class="pull-right">
    <button class="btn btn-xs btn-default tailleBtn" style="margin-right:50px; border: 1px solid green" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?courssgauche_dom","#leconsgauche");'> AJOUTER DOMAINE</button>
    <button class="btn btn-xs btn-default tailleBtn" style="margin-right:50px; border: 1px solid green" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?courssgauche_sdom","#leconsgauche");'> AJOUTER S-DOMAINE</button>
    <button class="btn btn-xs btn-default tailleBtn" style="margin-right:50px; border: 1px solid green" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?courssgauche_prepcours","#leconsgauche")'> AJOUTER COURS</button>
</div>