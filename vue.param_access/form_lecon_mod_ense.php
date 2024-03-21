<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_lecon.class.php');
?>

<?php
$idCours = htmlspecialchars($_GET["idCours"]);
$idleco = '';
if (isset($_GET['ajouterL'])) {
  $selc = crs_lecon::selectionnerDerByCours($idCours)->fetch();
  $idleco = $selc['idLecon'];
} elseif (isset($_GET['Modifier']) || isset($_GET['LireLecon_ense'])) {
  $idleco = htmlspecialchars($_GET['idlc']);
} else {
  echo "ATTENTION IDLECON MOD_ENSE";
}
$tpe = htmlspecialchars($_GET['type']);
if ($tpe == '1') {
  $lecon =  crs_lecon::rechercher($idleco);
} elseif ($tpe == '2') {
  $lecon =  crs_lecon_video::rechercher($idleco);
} elseif ($tpe == '3') {
  $lecon =  crs_lecon_pdf::rechercher($idleco);
} else {
  echo "echec";
}
$lecon = $lecon->fetch();
?>
<div class="heightContSous_Fen">
  <!-- <center class="col-sm-12" style="font-size:20px">
    REDACTION D'UNE LECON YYYYYYYYYYYYY <?= " <b>[ " . $_GET['cours'] . "]</b> à  " . $_GET['maClasse'] ?> (COTE ENSEIGNANT)
  </center> -->

  <form class="form-inline" style="width:100%; height:100%" id="lecon1">
    <div class="col-sm-12 rubaBoutonDoc">
      <input value="Nouv. lecon" type="button" class="btn btn-xs btn-default pull-left col-sm-1" onclick='Orientation("../control.param_access/ctr_lecon.php?premiF&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $idCours ?>&type=<?= $_GET["type"] ?>","#editLeco","");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&idCours=<?= $idCours ?>&type=<?= $_GET["type"] ?>","#leconsgauche","");' />
      <?php
      if (isset($_GET['modif'])) {
      ?>
        <input value="Enregistrer" type="button" class="btn btn-xs btn-default pull-left  col-sm-1 " onclick='Orientation("../control.param_access/ctr_lecon.php?Modifier=true&LireLecon_ense=true&maClasse=<?= $_GET["maClasse"] ?>&type=<?= $_GET["type"] ?>&idlc=<?= $idleco ?>&idCours=<?= $idCours ?>","#editLeco","#lecon1");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $idCours ?>&type=<?= $_GET["type"] ?>","#leconsgauche","");' />
      <?php
      } else {
      ?>
        <input value="Imprimer" type="button" class="btn btn-xs btn-default col-sm-1 " onclick="imprimer('maLc')" />

        <input value="Modifier" type="button" class="btn btn-xs btn-default pull-left  col-sm-1 " onclick='Orientation("../control.param_access/ctr_lecon.php?LireLecon_ense=tue&modif=true&maClasse=<?= $_GET["maClasse"] ?>&type=<?= $_GET["type"] ?>&idlc=<?= $idleco ?>&idCours=<?= $idCours ?>","#editLeco","#lecon");Orientation("../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $idCours ?>&type=<?= $_GET["type"] ?>","#leconsgauche","");' />

        <input value="Fiche d'Exploitation.." type="button" class="btn btn-xs btn-default pull-left  col-sm-1" onclick='Orientation("../control.param_access/ctr_exploitation.php?sous_dmn=true&info=sous_dmn","#fenetre2");Orientation("../control.param_access/ctr_exploitation.php?dsc=true&info=dsc","#fenetre3");Orientation("../control.param_access/ctr_exploitation.php?FicheExp=true&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $idCours ?>&idlc=<?= $idleco ?>&type=<?= $_GET["type"] ?>","#editLeco","");' />
      <?php
      }
      ?>

      <!-- <input value="Fiche d'Exploitation.." type="button" class="btn btn-xs btn-default pull-left  col-sm-1" onclick='Orientation("../control.param_access/ctr_exploitation.php?sous_dmn=true&info=sous_dmn","#fenetre2");Orientation("../control.param_access/ctr_exploitation.php?dsc=true&info=dsc","#fenetre3");Orientation("../control.param_access/ctr_exploitation.php?FicheExp=true&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $idCours ?>&idlc=<?= $idleco ?>&type=<?= $_GET["type"] ?>","#editLeco","");' /> -->


    </div>
    <div class="form-group text-align: center;" style="width:100%; height:100%; padding:50px" id="maLc">
      <?php
      include_once('../vue.param_access/enteteDL.php');
      ?>



      <?php
      if (isset($_GET['LireLecon_ense'])) {
        $lec = new crs_lecon();
        $lec = $lec->rechercher($idleco);
        $lec = $lec->fetch();
        if (isset($_GET['modif'])) {
      ?>
          <input id="tlecon" name="tlecon" type="text" style="width:100%; height:30px; font-size:18px;text-align:center;border-bottom: 0px solid white;" placeholder="Titre de la lecon" value="<?= $lecon['titreLecon'] ?>" />
          <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?= $lec['lecon'] ?></textarea>
        <?php
        } else {
        ?>
          <p class="titreLecon"><?= $lecon['titreLecon'] ?></p>
          <?= html_entity_decode($lec['lecon']) ?>

        <?php
        }
      } else if (isset($_GET['LireLecon_dir'])) {
        $lec = new crs_lecon();
        $lec = $lec->rechercher($idleco);
        $lec = $lec->fetch();
        ?>
        <textarea id="lcn" name="lcn" class="textarea" style="width:99%"><?= $lec['lecon'] ?></textarea>
      <?php
      } else {
      ?>
        echec lire enseignant

      <?php
      }

      ?>

    </div>

  </form>
</div>
<script>
  $(function() {
    $('.textarea').summernote()
  })
</script>