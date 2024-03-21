<div class=" table-responsive heightContSous_Fen">
    <form class=" " id="srlListeElve" name="srlListeElve">
        <?php
        include_once('../vue.param_access/liste_eleve_blt.php');
        ?>
    </form>
    <div class="col-sm-12 " style="height:3px; margin:0px;">


        <input type="button" class="col-sm-4  btn btn-sm btn-success" style="margin-top:3px" onclick='Orientation2("../control.param_access/ctr_carte_membre.php?aff_carte=true&idClasse=<?= $_GET["idClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&maClasse=<?= $_GET["maClasse"] ?>","#monCRT","#srlListeElve"); showme("#leconsgauche","#editLeco","false")' value="Valider">
    </div>

</div>