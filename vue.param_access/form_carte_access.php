<div class=" table-responsive heightContSous_Fen">
    <form id="srlListeElve" name="srlListeElve">
        <?php
        include_once('../vue.param_access/liste_membre_groupe.php');
        ?>
    </form>
    <div class="col-sm-12 " style="height:3px; margin:0px;">
        <input type="button" class="col-sm-4  btn btn-sm btn-success" style="margin-top:3px" onclick='Orientation2("../control.param_access/ctr_carte_access.php?aff_carte=true&idGroupe=<?= $_GET["idGroupe"] ?>","#monCRT","#srlListeElve"); showme("#frmuti","#editLeco","false")' value="Valider">
    </div>

</div>