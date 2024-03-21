<div role="form" enctype="multipart/form-data" class="form-inline well" style="font-size:12px;margin-top:1%; background:white" id="">
    <center style="margin-left:10px" class="col-sm-12"> LISTE MEMBRES</center>


    <table class="table table-bordered table-striped table-condensed table-responsive">

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
            include_once('../model.param_access/param_utilisateur.class.php');

            $idgroup = $_GET['idGroupe'];

            $membr = param_utilisateur::selectionnerByIdGroupeRoleActif($idgroup);
            $i = 1;
            foreach ($membr as $selmembr) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><input style="width:20px; height:20px" id="<?= $selmembr['idUtilisateur'] ?>" name="<?= $selmembr['idUtilisateur'] ?>" value="<?= $selmembr['idUtilisateur'] ?>" type="checkbox" class="form-control"></td>

                    <td><img style="width:30px; height:30px" src="<?= '../images/' . $selmembr['photoUtilisateur'] ?>" /></td>
                    <td><?= $selmembr['nomUtilisateur'] ?></td>
                    <td><?= $selmembr['postnomUtilisateur'] ?></td>
                    <td><?= $selmembr['prenomUtilisateur'] ?></td>

                </tr>
            <?php

            }
            ?>


        </tbody>
    </table>
</div>