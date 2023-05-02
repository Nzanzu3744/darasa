<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:490px;background-color: transparent">
            <table class="table table-bordered table-striped table-condensed">
                 </thead>
                </thead>
                <tbody>
           <?php
           $util = new param_utilisateur();
           $utilisateur = $util->selectionnerByIdGroupe($_GET['idGroupe']);
           $i=0;
           $tr =0;
           foreach($utilisateur as $selut){
            $tr++;
            ?>
               <!--  -->

                    <?php if($tr==1){echo '<tr style="margin:3px">';}?>
                                
                            <td style="background-color: aliceblue"><?=$i++;?></td>
                            <td><?=$selut['idUtilisateur']?></td>
                            <td ><i class="labelles" >Nom</i><?=":".strtoupper($selut['nomUtilisateur']);?><i class="labelles" ><br>Post-Nom</i><?=":".strtoupper($selut['postnomUtilisateur'])?><i class="labelles"><br>Prenom :    </i><?=strtoupper($selut['prenomUtilisateur'])?></td>
                            <td>

                            <i class="labelles"> Groupe/Niveau d'acces</i>
                        <select id="groupe" class="form-control col-sm-12">
                        <?php
                            $groupe = new param_groupe();
                            $grp = $groupe->selectionner();
                            $u=0;
                            foreach($grp as $sel01){
                            echo "N : ".$u++;
                        ?>
                                <option class="" id="<?=$sel01['idGroupe']?>"> <a><?=$sel01['idGroupe']." : ".strtoupper($sel01['groupe']);?></a></option>
                        <?php
                            
                            }
                        ?>
                        </select>

                            </td>
                            <td><a onclick="Orientation('../control.param_access/ctr_membre.php','#panel')"><img id="image" src="<?=$selut['photoUtilisateur']?>"></a></td>
                        <?php if($tr>=3){$tr=0; echo "</td>";}?>
            <?php
            ?>
                <!--  -->
                <td style="height:100%; padding:0px; background:#f2f2f2"> 
                <center>

                            <button class="btn btn-sm btn-defaulter" style="color: blue"    href="#" onclick="Orientation('../control.param_access/ctr_eleve.php?eleve&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')">INSCRIRE ELEVE</button>
                            <button class="btn btn-sm btn-defaulter" style="color: blue"  href="#" onclick="Orientation('../control.param_access/ctr_enseignant.php?enseigna&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')">AFFECTER ENSEIG.</button>
                            <button class="btn btn-sm btn-defaulter" style="color: blue"  href="#" onclick="Orientation('../control.param_access/ctr_directeur.php?directeur&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')">AFFECTER DIR.</button>

                            <button class="btn btn-sm btn-defaulter" style="color: blue" href="#" onclick="Encour()">Rapport</button>                
        </center>
                    </td>
                    
                    
            <?php
           }
           ?>
           </tbody>
            </table>
        </section>
</div>


           

