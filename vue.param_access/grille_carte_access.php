<?php
(empty($_SESSION)) ? session_start() : '';


include_once('../plugins/phpqrcode/genererqr.php');
include_once('../model.param_access/org_inscription.class.php');
include_once('../model.param_access/org_anneesco.class.php');
include_once('../control.param_access/mes_methodes.php');

$idGroupe = $_GET['idGroupe'];


$cptDoc = 1;
$sommeCoteTG = 0.0;
$sommepondeTG = 0.0;

$ListMembre = deserialiser($_POST['data1']);

?>
<div class=" heightSous_Fen">
    <div class="rubaBoutonDoc" style="width:965px">
        <span type="button" class=" btn btn-sm btn-default  glyphicon glyphicon-print" style="margin:3px" value="Imprimer" onclick="imprimer('carte_access')"></span>

    </div>
    <div class="heightSous_Fen" id="carte_access">
        <table>
            <tbody>

                <?php
                $i = 0;
                $u = 0;
                foreach ($ListMembre as $idMemb) {

                    $u++;
                    ($u == 1) ? '<tr style="border: 1px solid #f2f2f2; width:1000px; height:10px" >' : '';
                    include_once('../model.param_access/param_utilisateur.class.php');

                    $idgroup = $_GET['idGroupe'];

                    $membr = param_utilisateur::selectionnerByIdGroupeRoleActifUtil($idgroup, $idMemb);
                    foreach ($membr as  $selMemb) {
                        $i++;

                        // rgba(53, 141, 224, 0.851)


                ?>
                        <!-- ENTETE BULLETIN -->
                        <td class="" style="border: 5px solid white; width:320px; height:180px; font-size:10px; background-color:white" id='carte001'>
                            <div style="background: #f3f3f3; color:gray; height:30px;width:100%">
                                <center>
                                    <p>REPUBLIQUE DEMOCRATIQUE DU CONGO</p>
                                    <p style="font-size: 8px;margin-top:-10px"> MINISTERE DE L’ENSEIGNEMENT PRIMAIRE, SECONDAIRE ET PROFESSIONNEL</p>
                                </center>
                            </div>
                            <div style="height:50px;margin:0px; width:100%; border-top: 1px solid #f3f3f3">
                                <div class="col-sm-12" style="margin:0px;padding:0px;">
                                    <center style="margin-top:5px;font-size:14px"><label>CARTE D'ACCES e-ECOLE</label></center>
                                    <center>
                                        <?= '[' . $selMemb['idUtilisateur'] . '] ' . $selMemb['nomUtilisateur'] . ' ' . $selMemb['postnomUtilisateur'] . ' ' . $selMemb['prenomUtilisateur'] ?>
                                    </center>
                                </div>

                            </div>

                            <div class="contenaire" style="height:90px; width: 100%; margin:0px;border-top: 1px solid #f3f3f3;">
                                <div style="height:100%; width: 90px; margin:0px;padding:0px; border-top: 3px solid blue">
                                    <img src="<?= '../images/' . $selMemb['photoUtilisateur'] ?>" style="width:98%; height:98%;margin:1px">
                                </div>
                                <div style="height:100%;width:140px; font-size:9px; margin:0px;padding:0px;border-top: 3px solid red">

                                    <center class=" col-sm-12" style="height:100%;margin:5px;padding:0px; font-size:12px">

                                        LOGIN
                                        <label class="col-sm-12">
                                            <?= $selMemb['log'] ?>
                                        </label>
                                        <br>
                                        MOT DE PASSE
                                        <label class="col-sm-12">
                                            <?= $selMemb['pass'] ?>
                                        </label>


                                    </center>
                                </div>

                                <div style="height:100%;width:80px ;margin:0px;padding:0px; border-top: 3px solid yellow">
                                    <center>
                                        <?php
                                        $message =  $_SESSION['urlserver'] . '/e-ecole/control.param_access/ctr_con.php?acgrd&log=' . $selMemb['log'] . '&pass=' . $selMemb['pass'];
                                        $idqr = 'qrcarte&idEl=' . $selMemb['idUtilisateur'];
                                        $ds = "../qrcartesAc&IdEco=" . $_SESSION['monEcole']['idEcole'] . "/";
                                        ?>
                                        <img src="<?= genererqr($idqr, $message, $ds) ?>" style="width:98%; height:90%;margin:1px" /><br>
                                    </center>
                                </div>
                            </div>
                            <div class="col-sm-12" style="height:30px; margin:0px;padding:0px;background: #f3f3f3; color:gray">

                                <div class="col-sm-7" style="padding:1px;">
                                    Lieu de delivrance : <?= $_SESSION['monEcole']['codePays'] . '/' . $_SESSION['monEcole']['nomProvince'] . '/' . $_SESSION['monEcole']['nomVilleTerritoire'] ?></BR>
                                    Nom : <label style=" font-size:9px"> <?= strtoupper($_SESSION['nom'] . ' ' . $_SESSION['postnom'] . ' ' . $_SESSION['postnom']) ?></label>
                                </div>
                            </div>
    </div>
    </td>
    <!-- </tr> -->
<?php


                    }
                    if ($u == 3) {
                        $u = 0;
                        echo '</tr>';
                    }
                }

?>
</tbody>
</table>
</div>
</div>
<div>
    <?= $i ?> CARTES GENEREES
</div>