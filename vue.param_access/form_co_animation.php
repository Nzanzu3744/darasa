<?php
include_once('../model.param_access/crs_co_animation.class.php');
?>
<div class="col-sm-12 " style="margin:0px;padding:0px" id="utilzaturaCAO" name="utilzaturaCAO">
    <div class="col-sm-6 well" style="height:350px" style="margin:0px;padding:0px">
        <div class="col-sm-12" style="height:30px">
            <input type="text" placeholder="Recherche" />
            <input type="button" class=" btn-xs btn-success" value="OK" onclick="Encours()" />
        </div>
        <form class="col-sm-12 table-responsive " style="height:300px; margin:0px;padding:0px" id="utilizt" name="utilizt">
            <?php
            include_once('../vue.param_access/liste_utili_coa_gauche.php');
            ?>
        </form>
    </div>
    <center class="col-sm-1" style="margin:0px;padding:0px">
        <button type="button" style="margin-top:160px;color:green" onclick='Orientation2("../control.param_access/ctr_co_animateur.php?ajouter_coa&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $_GET["idCours"] ?>","#header_fenetre","#utilizt")'><span class="glyphicon glyphicon-share-alt"></span></button><br>
        <button type="button" style="margin-top:10px;color:green; transform:rotate(-180deg)" onclick='Orientation2("../control.param_access/ctr_co_animateur.php?sup_coa&idClasse=<?= $_GET["idClasse"] ?>&idCours=<?= $_GET["idCours"] ?>","#header_fenetre","#utilisateurCoA")'><span class="glyphicon glyphicon-share-alt"></span></button>
    </center>
    <div class="col-sm-5 well" style="height:350px;margin:0px;padding:0px">
        <div class="col-sm-12" style="height:30px;margin:0px;padding:0px">
            <input type="text" placeholder="Recherche" />
            <input type="button" class=" btn-xs btn-success" value="OK" onclick="Encours()" />
        </div>
        <form id="utilisateurCoA" name="utilisateurCoA" class="form-control table-responsive" style="height:300px;margin:0px;padding:0px">
            <?php
            include_once('../vue.param_access/liste_utili_coa_droite.php');
            ?>
        </form>
    </div>
</div>