<table class="table table-bordered table-striped table-condensed">

    <thead>
        <tr>
            <th>N</th>
            <th>CASE</th>
            <th>PHOTO</th>
            <th>NOM</th>
            <th>POST-NOM</th>
            <th>PRENOM</th>

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
                <td><input style="width:20px; height:20px" id="<?= $selEleve['idUtilisateur'] ?>" name="<?= $selEleve['idUtilisateur'] ?>" value="<?= $selEleve['idUtilisateur'] ?>" type="checkbox" class="form-control"></td>

                <td><img style="width:30px; height:30px" src="<?= '../images/' . $selEleve['photoUtilisateur'] ?>" /></td>
                <td><?= $selEleve['nomUtilisateur'] ?></td>
                <td><?= $selEleve['postnomUtilisateur'] ?></td>
                <td><?= $selEleve['prenomUtilisateur'] ?></td>

            </tr>
        <?php

        }
        ?>


    </tbody>
</table>