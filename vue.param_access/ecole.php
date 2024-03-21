<?php
include_once('../model.param_access/param_ecole.class.php');
?>
<div class="col-sm-12">
    <header id="titre">
        <nav class="navbar navbar-default table-responsive" style="height:56px;">
            <ul class="nav navbar-nav col-sm-11 ">
                <?php
                $ecole = new param_ecole();


                foreach ($ecole->selectionnerTout() as $sel) {
                ?>
                    <li class="dropdown" style="border: 1px dashed black; width:20%; height:50px; font-size:11px"> <a data-toggle="dropdown" href="#" onclick="showme('#leconsgauche','#editLecoParant','false'); Orientation('../control.param_access/ctr_ecole.php?VueEcole&idEcole=<?= $sel['idEcole'] ?>','#editEcole');"><?= $sel['nomEcole'] ?></a>
                        <?php
                        if ($_SESSION['param_ecole_supprimer'] == 1) {
                        ?>
                            <span href="#" style="color:red; margin-top:-45px; margin-right:3px; " class="glyphicon glyphicon-trash pull-right pull-top" onclick='Orientation("../control.param_access/ctr_ecole.php?SupprEcole=true&idEco=<?= $sel["idEcole"] ?>","#panel")'></span>
                        <?php
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>

        </nav>

    </header>
    <section class="" id="corps" style="height:500px">
        <div style="margin:0px;"> <i class="btn-xs glyphicon glyphicon-circle-arrow-left" style="color:red;font-size:20px" onclick="showme('#leconsgauche','#editLecoParant','false')"></i><i class="btn-xs glyphicon glyphicon-circle-arrow-right" style="color:red;font-size:20px" onclick="showme('#leconsgauche','#editLecoParant','true')"></i>
        </div>

        <div class="well" id="editLecoParant">
            <div id="editEcole" class=" table-responsive">
                <img src="../images/enseignant21.PNG" style="height: 100%; width:100%" />
            </div>
            <div id="" class="" style="padding:0px; margin:0px; height:5px; width:100%;">
                <?php
                if ($_SESSION['param_ecole_ajouter'] == 1) {
                ?>
                    <input class="btn btn-xs btn-default pull-right col-sm-2" type="button" style="margin-right:40px; border: 1px solid red" onclick='showme("#leconsgauche","#editLecoParant","true"); Orientation("../control.param_access/ctr_ecole.php?frm_ecole","#leconsgauche")' value="NOUVELLE ECOLE">
                <?php
                }
                ?>
            </div>
        </div>
        <div id="leconsgauche" style="background:white" class="col-sm-3">
        </div>

    </section>

</div>