 <?php
    include_once('../model.param_access/crs_co_animation.class.php');
    ?>
 <table class="table table-bordered table-striped table-condensed">
     <thead>
         <tr>
             <th>N</th>
             <th>PHOTO</th>
             <th>ID_UT</th>
             <th>NOM</th>
             <th>POST-NOM</th>
             <th>PRENOM</th>
         </tr>
     </thead>
     <tbody>

         <?php
            $uti = new crs_co_animation();
            $uti = $uti->liste_co_animateur_crs($_GET['idCours'], $_SESSION['monEcole']['idEcole']);
            $i = 1;
            foreach ($uti as $selutl) {
            ?>
             <tr>
                 <td><?= $i++ ?></td>
                 <td><input style="width:20px; height:20px" id="<?= $selutl['idCoAnimation'] ?>" name="<?= $selutl['idCoAnimation'] ?>" value="<?= $selutl['idCoAnimation'] ?>" type="checkbox" class="form-control"></td>
                 <td><img style="width:30px; height:30px" src="<?= '../images/' . $selutl['photoUtilisateur'] ?>" /></td>
                 <td><?= $selutl['idUtilisateur'] ?></td>
                 <td><?= $selutl['nomUtilisateur'] ?></td>
                 <td><?= $selutl['postnomUtilisateur'] ?></td>
                 <td><?= $selutl['prenomUtilisateur'] ?></td>
             </tr>
         <?php
            }
            ?>

     </tbody>
 </table>