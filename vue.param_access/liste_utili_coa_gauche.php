 <?php
    include_once('../model.param_access/param_utilisateur.class.php');
    include_once('../model.param_access/crs_co_animation.class.php');
 ?>
 <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>N</th>
                    <th></th>
                    <th>PHOTO</th>
                    <th>ID_UT</th>
                    <th>NOM</th>
                    <th>POST-NOM</th>
                    <th>PRENOM</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $uti = new param_utilisateur();
                    $uti = $uti->selectionner();
                    $i=1;
                    $utiDroite = new crs_co_animation();
                    $utiDroite = $utiDroite->liste_co_animateur_crs($_GET['idCours'])->fetchAll();
                    foreach($uti as $selutl){
                        $existe=false;
                        foreach($utiDroite as $selutlDroit){
                            if($selutl['idUtilisateur']==$selutlDroit['idUtilisateur']){
                                $existe=true;
                                
                            }
                         }
                        
                        if($existe==false){
                                ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><input style="width:20px; height:20px" id="<?=$selutl['idUtilisateur']?>" name="<?=$selutl['idUtilisateur']?>" value="<?=$selutl['idUtilisateur']?>" type="checkbox" class="form-control"></td>
                                        <td><img style="width:30px; height:30px" src="<?='../images/'.$selutl['photoUtilisateur']?>"/></td>
                                        <td><?=$selutl['idUtilisateur']?></td>
                                        <td><?=$selutl['nomUtilisateur']?></td>
                                        <td><?=$selutl['postnomUtilisateur']?></td>
                                        <td><?=$selutl['prenomUtilisateur']?></td>
                                    </tr>


                                <?php
                        }

                    }
                ?>

            </tbody>
        </table>