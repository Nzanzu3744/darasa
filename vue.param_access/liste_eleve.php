<div class=" heightSous_Fen">
    <div class="col-sm-12 rubaBoutonDoc">
        <input type="button" class="btn btn-default" onclick="imprimer('liste_eleve');" value="Emprimer">
    </div>
    <div id="liste_eleve" style="padding:50px;">
        <?php
        include_once('../control.param_access/mes_methodes.php');
        // $etab = $_SESSION['monEcole']['nomEcole'];;
        // $logo = $_SESSION['monEcole']['logoEcole'];
        // $bp = "B.P." . $_SESSION['monEcole']['bpEcole'] . " " . $_SESSION['monEcole']['nomVilleTerritoire'];
        // $t1 = "LISTE D'ELEVES";
        // $t2 = " CLASSE :" . $_GET['maClasse'];
        // $editer = '';
        // entete_doc($etab, $logo, $bp, $t1, $t2, $editer);

        ?>

        <?php
        include_once('../vue.param_access/enteteDL.php');
        ?>

<p class="titreLecon">
            LISTE ELEVES
        </p>
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
                        <center>DATE DE NAIS</center>
                    </th>
                    <th>
                        <center>AGE</center>
                    </th>
                    <th>
                        <center>GENRE</center>
                    </th>
                    <th>
                        <center>TELEPHONE</center>
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
                foreach ($eleve as $selEleve) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><label style="color:green"><?= $selEleve['idUtilisateur'] ?></label></td>
                        <td><img style="width:30px; height:30px" src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" /></td>
                        <td><?= $selEleve['nomUtilisateur'] ?></td>
                        <td><?= $selEleve['postnomUtilisateur'] ?></td>
                        <td><?= $selEleve['prenomUtilisateur'] ?></td>
                        <td><?= $selEleve['dateNais'] ?></td>
                        <td><?= calcul_age($selEleve['dateNais']) ?>ans</td>
                        <td><?= $selEleve['genre'] ?></td>
                        <td><?= $selEleve['telUtilisateur'] ?></td>

                    </tr>
                <?php

                }
                ?>


            </tbody>
        </table>
    </div>
</div>