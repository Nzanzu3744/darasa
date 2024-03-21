<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_cours.class.php')
?>
<div style="padding-bottom: 50px; margin:0px; width:100%; height:200px">
    <center>FORMULAIRE SOUS <br> DOAMAINE</center>
    <form id="frmpcours" style="width:100%; height:200px">
        <label for="dmn"> Selectionner le sous domaine du cours. </label>
        <?php
        include_once('../model.param_access/crs_sous_domaine.class.php');
        $sdom = crs_sous_domaine::selectionner();
        ?>
        <div class="contenaire">
            <select id="sdomaine" class="form-control" style="width:90%">
                <?php
                foreach ($sdom as $seldom) {
                ?>
                    <option style="color:red; background:black" value=<?= $seldom['idSousDomaine'] ?>><?= '[' . $seldom['domaine'] . ']' . $seldom['sousDomaine'] ?></option>
                <?php
                }
                ?>

            </select>
            <input id="" type="button" style="width:10%;height:100%;" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?courssgauche_sdom","#leconsgauche");' class="btn btn-success" value="+">
        </div>
        <div>
            <labelle for="nomC" class=" col-sm-12"> Nom du Cours </labelle>
            <input style="width:100%" style="width:100%" id="nomC" type="text" class="form-control " placeholder="Nom du cours">
        </div>
        <div style="padding-top:10px">
            <input type="button" class="btn btn-success pull-left col-sm-5 btn-xs" id="enrg" onclick='showme("#leconsgauche","#editLeco","true"); Orientation("../control.param_access/ctr_cours.php?ajouterCrsPre=true&sdomaine="+$("#sdomaine").val()+"&nomC="+$("#nomC").val(),"#editLeco");Orientation("../control.param_access/ctr_cours.php?courssgauche_prepcours","#leconsgauche");' value="Enregistrer" />
            <button onclick="Encour()" class="btn btn-xs btn-danger pull-right col-sm-5">Annuler</button>
        </div>
    </form>
</div>


<?php

include_once('../model.param_access/crs_domaine.class.php');
?>