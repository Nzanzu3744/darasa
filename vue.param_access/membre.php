<?php
include_once('../model.param_access/param_groupe.class.php');
?>
<div class="col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;">
            <ul class="nav navbar-nav col-sm-9">
                <?php
                $perm = new param_groupe();
                foreach ($perm->selectionnerByEcole($_SESSION['monEcole']['idEcole']) as $sel) {

                    if ($sel['idGroupe'] > 0) {

                ?>
                        <li class="dropdown " style="border: 1px dashed pink; width:200px; height:50px; font-size:12px" href="#" onclick="Orientation('../control.param_access/ctr_membre.php?list_membre&idGroupe=<?= $sel['idGroupe'] ?>','#editLeco'); Orientation('../control.param_access/ctr_membre.php?btnbas=true&idGroupe=<?= $sel['idGroupe'] ?>','#frmbtn');showme('#frmuti','#editLeco','false'); " name="<?php echo $sel['idGroupe'] ?>">

                            <a data-toggle="dropdown" style="margin-top:0pxpx">
                                <?php echo strtoupper($sel['groupe']) ?>
                            </a>
                        </li>
                        <?php
                    } else {
                        if ($_SESSION['idUtilisateur'] <= 0) {
                        ?>
                            <li class="dropdown " style="border: 1px dashed red; width:200px; height:50px; font-size:12px" href="#" onclick="Orientation('../control.param_access/ctr_membre.php?list_membre&idGroupe=<?= $sel['idGroupe'] ?>','#editLeco'); Orientation('../control.param_access/ctr_membre.php?btnbas=true&idGroupe=<?= $sel['idGroupe'] ?>','#frmbtn');showme('#frmuti','#editLeco','false'); " name="<?php echo $sel['idGroupe'] ?>">

                                <a data-toggle="dropdown" style="margin-top:0px">
                                    <?php echo strtoupper($sel['groupe']) ?>
                                </a>
                            </li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
            <div class="col-sm-3" style="background:black; padding:0px; font-size:10px">
                <form class="from-control col-sm-10" id="frm_rech" name="frm_rech" style="padding:0px; height:53px; border:1px solid black;color:white; background: black">
                    <!-- <div style="height:100%;" class="from-control rows col-sm-4"> -->

                    <center class=" rows col-sm-12">
                        <span>
                            <input type="radio" value="id" name="slectbtn" id="slectbtn" class=" formredio" />Id
                        </span>
                        <span>
                            <input type="radio" value="nom" name="slectbtn" id="slectbtn" class=" formredio" />Nom
                        </span>
                        <span>
                            <input type="radio" value="postnom" name="slectbtn" id="slectbtn" class=" formredio" />Post..
                        </span>
                        <span>
                            <input type="radio" value="prenom" name="slectbtn" id="slectbtn" class=" formredio" />Pren.. </span>
                        <span>
                            <input type="radio" value="tous" name="slectbtn" id="slectbtn" class=" formredio" />Tous
                        </span>
                        <span>
                            <input type="radio" checked value="aucun" name="slectbtn" id="slectbtn" class=" formredio" />Auc
                        </span>
                        <span>
                            <input type="checkbox" checked value="mnecole" name="mnecole" id="mnecole" class=" formredio" /><?= strtoupper($_SESSION['monEcole']['singleEcole']) ?>
                        </span>
                    </center>


                    <!-- </div> -->
                    <input type="txt" id="rech" name="rech" style="height:25px; color:black; font-size:17px;margin:0px" class="col-sm-12 form-control">
                </form>
                <input type="button" value="OK" style="margin:0px; height:53px; color:red;background:black;" class="btn pull-right col-sm-2" onclick="Orientation('../control.param_access/ctr_membre.php?list_tous_membre','#editLeco','#frm_rech');showme3('#btncarte')">
            </div>


        </nav>
</div>
<section class="" id=" corps" style="height:500px;">
    <div class="col-sm-12">
        <i class="btn-xs glyphicon glyphicon-circle-arrow-left" onclick="showme('#frmuti','#editLeco','false')"></i>
        <i class="btn-xs glyphicon glyphicon-circle-arrow-right" onclick="showme('#frmuti','#editLeco','true')"></i>
    </div>

    <div id="editLeco" class="table-responsive heightSous_Fen">
        <img src="../images/enseignant21.PNG" class="heightContSous_Fen" />
    </div>

    <div id="frmuti" class="col-sm-3 heightContSous_Fen_wid_0" style="display: none;">
    </div>
    <div id="frmbtn" class="col-sm-12" style="padding:0px; margin:1px; background:#f2f2f2">

    </div>
</section>