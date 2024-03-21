<?php
include_once('../model.param_access/crs_question.class.php');
include_once('../model.param_access/crs_devoirs.class.php');
include_once('../model.param_access/crs_assertion.class.php');

$dev = new crs_devoirs();
$devv = $dev->rechercherr($_GET['iddv'])->fetch();
$qst = new crs_question();
$qst = $qst->selectionnerByIdDevASC($_GET['iddv']);

?>

<div role="" enctype="" class=" row well" style="width:100%;margin:1px" id="utilisa">
  <center class="col-sm-12 titres" style="font-size:20px; margin-bottom:10px">QUESTIONNAIRE DEVOIR DU COURS <?= " <b>[ " . $devv['cours'] . "]</b> à  " . $_GET['maClasse'] ?> (COTE ELEVE) ID DEVOIR:<?= "" . $devv['idDevoir'] . ' CREER LE <b>' . $devv['dateCreation'] . ' </b>A REMETRE LE <b>' . $devv['dateRemise'] . '</b>' ?></center>




  <?php
  $verif = new crs_assertion();
  $nub = 1;
  $idasCk1 = '';
  $idasCk2 = '';
  $idasCk3 = '';
  $idasCk4 = '';
  $idasCk5 = '';
  $idasCk6 = '';
  foreach ($qst as $selQst) {

    $ver = $verif->selectionnerByQst($selQst['idQuestion']);
    $veri = $ver->fetch();
    if (empty($veri['idAssertion'])) {
  ?>
      <form id=<?= 'QuestT' . $nub ?> nam=<?= 'QuestT' . $nub ?>>

        <labelle for=<?= 'qstT' . $nub ?> class="col-sm-11" style="font-size:20px"> Question :<?= $nub ?></labelle>
        <textarea name=<?= 'qstT' . $nub ?> class="textarea " cols="140" type="text"><?= $selQst['question'] ?></textarea>

        <input id=<?= 'pond' . $nub ?> type="text" class="" value="<?= $selQst['ponderation'] ?>" />
      </form>
      <div class="col-sm-12">
        <input type="button" onclick="Orientation('../control.param_access/ctr_questionnaire.php?INTERDIT&idvv=<?= $_GET['iddv'] ?>&n=<?= $nub ?>&modifQst=<?= $selQst['idQuestion'] ?>&idQt=<?= $selQst['idQuestion'] ?>&idPond=<?= 'pond' . $nub ?>&AjoutQstTr&idDev='
             +$('#idDev').val()
             +'&pond='+$('#pond'+<?= $nub ?>).val(),'#<?= 'QuestT' . $nub ?>','#<?= 'QuestT' . $nub ?>')" class="btn btn-success btn-xs pull-right  col-sm-2 col-lg-2 col-xs-2" value="Valider Question :<?= $nub ?>" />
      </div>

    <?php

      $nub++;
    } else {
    ?>
      <div class="col-sm-12  ">
        <div id="clef" name="clef" style="color:white">

          <?php
          $asstion = new crs_assertion();
          $Tbasstion = $asstion->selectionnerByQst($selQst['idQuestion']);
          $tura = 1;
          foreach ($Tbasstion as $selAzioni) {
            if ($tura == 1) {
          ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif1<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
            <?php
              $tura++;
            } else if ($tura == 2) {
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif2<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
            <?php
              $tura++;
            } else if ($tura == 3) {
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif3<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
            <?php
              $tura++;
            } else if ($tura == 4) {
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif4<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
            <?php
              $tura++;
            } else if ($tura == 5) {
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif5<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
            <?php
              $tura++;
            } else if ($tura == 6) {
            ?>
              <input style="height:0px; width:0px; border: 0px solid transparent" disabled id="modif6<?= $nub ?>" value='<?= $selAzioni['idAssertion'] ?>' />
          <?php
              $tura++;
            }
          }

          ?>
        </div>
        <div id=<?= 'QuestC' . $nub ?> name=<?= 'QuestC' . $nub ?>>
          <labelle for=<?= 'qstC' . $nub ?> class="col-sm-12" style="font-size:20px"> Question :<?= $nub ?></labelle>
          <form id="<?= 'fseria' . $nub ?>" name="<?= 'fseria' . $nub ?>">
            <textarea id=<?= 'qstC' . $nub ?> name=<?= 'qstC' . $nub ?> class="textarea" cols="140"><?= $selQst['question'] ?></textarea>
          </form>

          <?php

          $tur = 1;
          ?>

          <?php
          $Tbasstion2 = $asstion->selectionnerByQst($selQst['idQuestion']);
          foreach ($Tbasstion2 as $selAss) {

            if ($tur == 1) {

          ?>
              <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
                <input id=<?= 'asCk1' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass1' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

            <?php
              $idasCk1 = $selAss['idAssertion'];
              $tur++;
            } else  if ($tur == 2) {

            ?>
              <div class="col-sm-4" style="border: 1px dashed gray">
                <input id=<?= 'asCk2' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass2' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

            <?php
              $idasCk2 = $selAss['idAssertion'];
              $tur++;
            } else  if ($tur == 3) {

            ?>
              <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
                <input id=<?= 'asCk3' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass3' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

            <?php
              $idasCk3 = $selAss['idAssertion'];
              $tur++;
            } else  if ($tur == 4) {

            ?>
              <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
                <input id=<?= 'asCk4' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass4' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

            <?php
              $idasCk4 = $selAss['idAssertion'];
              $tur++;
            } else  if ($tur == 5) {

            ?>
              <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
                <input id=<?= 'asCk5' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass5' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

            <?php
              $idasCk5 = $selAss['idAssertion'];
              $tur++;
            } else  if ($tur == 6) {

            ?>
              <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
                <input id=<?= 'asCk6' . $nub ?> type='checkbox' onclick="$(this).val()=='on'?value='checked':value='on'" value="<?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?>" <?= ($selAss['correctAssertion'] == 1) ? 'checked' : 'on'; ?> />
                <input id=<?= 'ass6' . $nub ?> type="text" class="form-control" value="<?= $selAss['assertion'] ?>" />
              </div>

          <?php
              $idasCk6 = $selAss['idAssertion'];
              $tur++;
            }
          }

          ?>
          <input id=<?= 'pond' . $nub ?> type="text" placeholder="Point" value='<?= $selQst['ponderation'] ?>' />

          <div class="col-sm-12">
            <input type="button" onclick="showme1('#clef');Orientation('../control.param_access/ctr_questionnaire.php?idDev=<?= $_GET['iddv'] ?>&n=<?= $nub ?>&modifQst=<?= $selQst['idQuestion'] ?>&AjoutQstCh&INTERDIT&idqstC=<?= 'qstC' . $nub ?>&idass1=<?= $idasCk1 ?>&idass2=<?= $idasCk2 ?>&idass3=<?= $idasCk3 ?>&idass4=<?= $idasCk4 ?>&idass5=<?= $idasCk5 ?>&idass6=<?= $idasCk6 ?>&idasCk1=<?= $idasCk1 ?>&idasCk2=<?= $idasCk2 ?>&idasCk3=<?= $idasCk3 ?>&idasCk4=<?= $idasCk4 ?>&idasCk5=<?= $idasCk5 ?>&idasCk6=<?= $idasCk6 ?>&idqst=<?= $selQst['idQuestion'] ?>&n=<?= $nub ?>&form=<?= 'qstC' . $nub ?>&idpond=<?= 'pond' . $nub ?>&pond='+$('#pond'+<?= $nub ?>).val()
                +'&asCk1='+$('#asCk1'+<?= $nub ?>).val()
                +'&ass1='+$('#ass1'+<?= $nub ?>).val()
                +'&asCk2='+$('#asCk2'+<?= $nub ?>).val()
                +'&ass2='+$('#ass2'+<?= $nub ?>).val()
                +'&ass3='+$('#ass3'+<?= $nub ?>).val()
                +'&asCk3='+$('#asCk3'+<?= $nub ?>).val()
                +'&asCk4='+$('#asCk4'+<?= $nub ?>).val()
                +'&ass4='+$('#ass4'+<?= $nub ?>).val()
                +'&asCk5='+$('#asCk5<?= $nub ?>').val()
                +'&ass5='+$('#ass5'+<?= $nub ?>).val()
                +'&asCk6='+$('#asCk6'+<?= $nub ?>).val()
                +'&ass6='+$('#ass6'+<?= $nub ?>).val()
                +'&modif1='+$('#modif1<?= $nub ?>').val()
                +'&modif2='+$('#modif2<?= $nub ?>').val()
                +'&modif3='+$('#modif3<?= $nub ?>').val()
                +'&modif4='+$('#modif4<?= $nub ?>').val()
                +'&modif5='+$('#modif5<?= $nub ?>').val()
                +'&modif6='+$('#modif6<?= $nub ?>').val(),'#<?= 'QuestC' . $nub ?>','#<?= 'fseria' . $nub ?>')" class="btn btn-xs btn-success pull-right  col-sm-2 col-lg-2 col-xs-2" value="Valider Question :<?= $nub ?>" />
          </div>
        </div>
      </div>
</div>
<?php
      $nub++;
    }
  }

?>
<script>
  $(function() {
    $('.textarea').summernote()
  })
</script>