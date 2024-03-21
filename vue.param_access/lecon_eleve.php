<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/crs_lecon.class.php');
?>
<!--  -->
<script src="jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->

<div class="form-inline" id="lecon">
    <div class="col-sm-12 rubaBoutonDoc">
        <input value="Imprimer" type="button" class="btn btn-xs btn-default col-sm-1 " onclick="imprimer('lcons')" />
    </div>
    <div class="form-group text-align: center;" style="width:80%; height:80%; margin:10%" id="lcons">

        <!-- <center class="col-sm-12 titres" style="font-size:20px">LECON <?= " <b>[ " . $_GET['cours'] . "]</b> à  " . $_GET['maClasse'] ?> (COTE ELEVE)</center> -->

        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>
        <p class="titreLecon">
            <?= $_GET['tlecon'] ?>
        </p>
        <?php
        if (isset($_GET['LireLecon_eleve'])) {
            $lec = new crs_lecon();
            $lec = $lec->rechercher($_GET['idlc']);
            $lec = $lec->fetch();
        ?>
            <p style="" id="lcn" name="lcn"><?= html_entity_decode($lec['lecon']) ?></p>
        <?php
        }

        ?>
    </div>

</div>