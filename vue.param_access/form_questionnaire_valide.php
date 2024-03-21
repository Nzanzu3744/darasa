<?php
include_once('../model.param_access/crs_assertion.class.php');
if (isset($_GET['AjoutQstTr'])) {
?>
    <div id="<?= 'QuestT' . $_GET['n'] ?>" name="<?= 'QuestT' . $_GET['n'] ?>" class="col-sm-12" style="margin:1px;padding:0px">
        <labelle for=<?= 'qstT' . $_GET['n'] ?> class="col-sm-11" style="font-size:20px"> Question :<?= $_GET['n'] ?></labelle>
        <textarea id=<?= 'qstT' . $_GET['n'] ?> name=<?= 'qstT' . $_GET['n'] ?> class="textarea" type="text" class="form-control" placeholder=""><?= $_POST['qstT' . $_GET['n']] ?></textarea>
    </div>
    <div class="col-sm-12">
        <input id=<?= $_GET['idPond'] ?> placeholder="Point" value='<?= $_GET['pond'] ?>' />
    </div>
<?php
} else if (isset($_GET['AjoutQstCh'])) {

?>


    <labelle for=<?= 'qstC' . $_GET['n'] ?> class="col-sm-12" style="font-size:20px; color:green"> Question :<?= $_GET['n'] ?></labelle>
    <form id=<?= 'fseria' . $_GET['n'] ?> name=<?= 'fseria' . $_GET['n'] ?>>
        <textarea id=<?= $_GET['idqstC'] ?> name=<?= $_GET['idqstC'] ?> class="textarea" cols="140"><?= $_POST['qstC' . $_GET['n']] ?></textarea>
    </form>
    <div class="col-sm-12" style="padding-left:1%">
        <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
            <input value='asCk1<?= $_GET['n'] ?>' <?= $_GET['asCk1'] ?> id=<?= $_GET['idasCk1'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=<?= 'ass1' . $_GET['n'] ?> name type="text" class="form-control" value='<?= $_GET['ass1'] ?>' />
        </div>
        <div class="col-sm-4" style="border: 1px dashed gray">
            <input id=asCk2<?= $_GET['n'] ?> value='<?= $_GET['asCk2'] ?>' <?= $_GET['asCk2'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=ass2<?= $_GET['n'] ?> type="text" class="form-control" value='<?= $_GET['ass2'] ?>' />
        </div>
        <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=asCk3<?= $_GET['n'] ?> value='<?= $_GET['asCk3'] ?>' <?= $_GET['asCk3'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=ass3<?= $_GET['n'] ?> type="text" class="form-control" value='<?= $_GET['ass3'] ?>' />
        </div>
        <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=asCk4<?= $_GET['n'] ?> value='<?= $_GET['asCk4'] ?>' <?= $_GET['asCk4'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=ass4<?= $_GET['n'] ?> type="text" class="form-control" value='<?= $_GET['ass4'] ?>' />
        </div>
        <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=asCk1<?= $_GET['n'] ?> value='<?= $_GET['asCk5'] ?>' <?= $_GET['asCk4'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=ass5<?= $_GET['n'] ?> type="text" class="form-control" value='<?= $_GET['ass5'] ?>' />
        </div>
        <div class="col-sm-4" style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=asCk6<?= $_GET['n'] ?> value='<?= $_GET['asCk6'] ?>' <?= $_GET['asCk6'] ?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=ass6<?= $_GET['n'] ?> type="text" class="form-control" value='<?= $_GET['ass6'] ?>' />
        </div>

    </div>
    <div>
        <input id=<?= $_GET['idpond'] ?> type="text" placeholder="Point" value='<?= $_GET['pond'] ?>' />
    </div>
    <div class="col-sm-12">
        <input type="button" onclick='Orientation("control.param_access/ctr_questionnaire.php?idDev=<?= $_GET["idDev"] ?>&modifQst=<?= $_GET["modifQst"] ?>&AjoutQstCh&INTERDIT&idqstC=<?= $_GET["idqstC"] ?>&idass1=<?= $_GET["idass1"] ?>&idass2=<?= $_GET["idass2"] ?>&idass3=<?= $_GET["idass3"] ?>&idass4=<?= $_GET["idass4"] ?>&idass5=<?= $_GET["idass5"] ?>&idass6=<?= $_GET["idass6"] ?>&idasCk1=<?= $_GET["idasCk1"] ?>&idasCk2=<?= $_GET["idasCk2"] ?>&idasCk3=<?= $_GET["idasCk3"] ?>&idasCk4=<?= $_GET["idasCk4"] ?>&idasCk5=<?= $_GET["idasCk5"] ?>&idasCk6=<?= $_GET["idasCk6"] ?>&idqst=<?= $_GET["idqst"] ?>&n=<?= $_GET["n"] ?>&form=<?= $_GET["form"] ?>&idpond=<?= $_GET["idpond"] ?>&pond="+$("#<?= $_GET["idpond"] ?>").val()
                +"&asCk1="+$("#asCk1"+<?= $_GET["n"] ?>).val()
                +"&ass1="+$("#ass1"+<?= $_GET["n"] ?>).val()
                +"&asCk2="+$("#asCk2"+<?= $_GET["n"] ?>).val()
                +"&ass2="+$("#ass2"+<?= $_GET["n"] ?>).val()
                +"&ass3="+$("#ass3"+<?= $_GET["n"] ?>).val()
                +"&asCk3="+$("#asCk3"+<?= $_GET["n"] ?>).val()
                +"&asCk4="+$("#asCk4"+<?= $_GET["n"] ?>).val()
                +"&ass4="+$("#ass4"+<?= $_GET["n"] ?>).val()
                +"&asCk5="+$("#asCk5"+<?= $_GET["n"] ?>).val()
                +"&ass5="+$("#ass5"+<?= $_GET["n"] ?>).val()
                +"&asCk6="+$("#asCk6"+<?= $_GET["n"] ?>).val()
                +"&ass6="+$("#ass6"+<?= $_GET["n"] ?>).val()
                +"&modif1="+$("#modif1<?= $_GET["n"] ?>").val()
                +"&modif2="+$("#modif2<?= $_GET["n"] ?>").val()
                +"&modif3="+$("#modif3<?= $_GET["n"] ?>").val()
                +"&modif4="+$("#modif4<?= $_GET["n"] ?>").val()
                +"&modif5="+$("#modif5<?= $_GET["n"] ?>").val()
                +"&modif6="+$("#modif6<?= $_GET["n"] ?>").val(),"#<?= "QuestC" . $_GET["n"] ?>","#<?= "fseria" . $_GET["n"] ?>")' class="btn btn-success pull-right btn-xs col-sm-2 col-lg-2 col-xs-2" value="Valider Question :<?= $_GET["n"] ?>" />
    </div>


<?php
}
?>
<script>
    $(function() {
        $('.textarea').summernote()
    })
</script>