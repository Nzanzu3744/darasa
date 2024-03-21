<div class="table-responsive heightSous_Fen " style="margin:0px; padding:0px">
    <form class=" " id="srlListeElve" name="srlListeElve">
        <?php
        include_once('../vue.param_access/liste_eleve_blt.php');
        ?>
    </form>
    <div class="col-sm-12 " style="height:3px; margin:0px;">


        <input type="button" class="col-sm-4  btn btn-sm btn-success" style="margin-top:3px" onclick='Orientation2("../control.param_access/ctr_bulletin.php?aff_blt=true&idClasse=<?= $_GET["idClasse"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&maClasse=<?= $_GET["maClasse"] ?>","#monBlt","#srlListeElve"); showme("#leconsgauche","#editLeco","false")' value="Valider">

    </div>

</div>

<!-- <li><a href='#' onclick="showme2('#dessoueditLeco'); Orientation('../control.param_access/ctr_lecon.php?LireLecon_ense=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $selLc['titreLecon'] ?>&idCours=<?= $selLc['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idlc=<?= $selLc['idLecon'] ?>','#editLeco',''); Orientation('../control.param_access/ctr_lecon.php?Evalue=tue&idPromotion=<?= $_GET['idPromotion'] ?>&maClasse=<?= $_GET['maClasse'] ?>&tlecon=<?= $selLc['titreLecon'] ?>&idCours=<?= $selLc['idCours'] ?>&cours=<?= $sel_C['cours'] ?>&idLecon=<?= $selLc['idLecon'] ?>','#dessoueditLeco','')">Lire la leçon</a></i></li> -->

<!-- <input id="rechleco" placeholder="Recherche lecon par titre" type="text" class="form-control" style="width:120px; padding:6px; width:100%" onkeyup="Orientation('../control.param_access/ctr_lecon.php?maClasse=<?= $_GET['maClasse'] ?>&idCours=<?= $_GET['idCours'] ?>&cours=<?= $_GET['cours'] ?>&clerech_dir='+$('#rechleco').val(),'#filtrer','');"> -->