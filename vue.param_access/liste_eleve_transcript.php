<?php
include_once('../model.param_access/crs_devoirs_trad.class.php');
include_once('../model.param_access/org_periode.class.php');
?>
<div class="form-inline well" style="width:850px; font-size:12px; margin-left:15%;margin-top:1%; background:white">
    <?php
    $modifTran = 'undefined';
    if (isset($_GET['modifTran'])) {
        $modifTran = htmlspecialchars($_GET['modifTran']);
    ?>
        <center style="margin-left:10px" class="col-sm-12"><label> MODIFICATION DE COTES TRANSCIPT A<?= 'xxxxxx  CLASSE :' . $_GET['maClasse'] ?></label></center>

    <?php

    } else {
    ?>

        <center style="margin-left:10px" class="col-sm-12"><label> TRANSCIPTION DE COTE <?= " xxx  CLASSE :" . $_GET['maClasse'] ?></label></center>
    <?php
    }
    ?>
    <div class=" col-sm-12 well" style="padding-top:10px; ">
        <p></p>
    </div>


    <form id="lstEleve" name="lstEleve" enctype="multipart/form-data">
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>N</th>
                    <th>
                        <center>MATRICUL</center>
                    </th>
                    <th>
                        <center>PHOTO</center>
                    </th>
                    <th>
                        <center>NOM</center>
                    </th>
                    <th>
                        <center>POST-NOM</center>
                    </th>
                    <th>
                        <center>PRENOM</center>
                    </th>
                    <th>
                        <center>GENRE</center>
                    </th>
                    <th>
                        <center>POINT</center>
                    </th>

                </tr>
            </thead>
            <tbody>


                <?php
                include_once('../model.param_access/org_inscription.class.php');
                $eleve = new org_inscription();
                $idCls = $_GET['idClasse'];
                $idAnn = $_GET['idAnneeSco'];
                $eleve = $eleve->rechercherByClAnnee($idCls, $idAnn);

                $i = 1;
                include_once('../model.param_access/crs_cote_devoirs_trad.class.php');


                foreach ($eleve as $selEleve) {
                ?>
                    <tr>
                        <td><?= $i ?></td>

                        <td style="display:none"><input id="<?= $i ?>" name="<?= $i ?>" style="width:50px;" type="hidden" class="form-control" value="<?= $selEleve['idInscription'] ?>" /></td>
                        <td><label style="color:green"><?= $selEleve['idUtilisateur'] ?></label></td>
                        <td><img style="width:30px; height:30px" src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" /></td>
                        <td><?= $selEleve['nomUtilisateur'] ?></td>
                        <td><?= $selEleve['postnomUtilisateur'] ?></td>
                        <td><?= $selEleve['prenomUtilisateur'] ?></td>
                        <td><?= $selEleve['genre'] ?></td>
                        <?php
                        $coteTranscri = new crs_cote_devoirs_trad();
                        $cote = '';
                        if ($modifTran != 'undefined') {
                            if (isset($_GET['idDevoir'])) {
                                $idDevoir = htmlspecialchars($_GET['idDevoir']);
                            }
                            $cote = $coteTranscri->filterDevTraEleve($idDevoir, $selEleve['idInscription'])->fetch();
                        }

                        ?>


                        <td><input id="ct<?= $selEleve['idInscription'] ?>" name="ct<?= $selEleve['idInscription'] ?>" value="<?= ($modifTran != 'undefined') ? $cote['coteDevoirTrad'] : '' ?>" style="width:50px" type="text" class="form-control"></td>

                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <?php
        if (isset($_GET['idAffectation'])) {
        ?>
            <div style="padding: 10px">
                <input data-toggle="modal" id="enrg" type="button" onclick='Orientation2("../control.param_access/ctr_devoirs_trad.php?ajouterDT=ture&idClasse=<?= $_GET["idClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idAnneeSco=<?= $_GET["idAnneeSco"] ?>&maClasse=<?= $_GET["maClasse"] ?>&idAffectation=<?= $_GET["idAffectation"] ?>&idCours=<?= $_GET["idCours"] ?>&modifTran&idDevoir="+$("#idDevoir").val(),"#editLeco","#lstEleve");' class="btn btn-xs btn-success pull-left col-sm-3" value="Enregistrer" />
                <input id="ann" type="button" onclick="Encour()" class="btn btn-xs btn-default pull-right col-sm-3" value="Annuler" />
            </div>
        <?php
        } else {
        ?>
            <div style="padding: 10px; color:gray">
                <center> Seul l'<x style="text-decoration: underline">enseignant</x> du cours ou le <x style="text-decoration: underline">co-animateur</x> du cours peuvent modifier ces cotes</center>
            </div>

        <?php
        }
        ?>
</div>
</form>