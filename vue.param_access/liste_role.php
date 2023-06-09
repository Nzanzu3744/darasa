<?php 
include_once('../model.param_access/param_utilisateur.class.php');
include_once('../model.param_access/param_groupe.class.php');
?>


         <section class="fenetre " style="height:490px;background-color: transparent;">
            <table class="table table-bordered table-striped table-condensed">
                </thead>
                </thead>
                <tbody>
           <?php
           $util = new param_utilisateur();
           $utilisateur = $util->selectionnerByIdGroupeRoleActif($_GET['idGroupe']);
           $i=0;
           $tr =0;
           foreach($utilisateur as $selut){
            $tr++;
            ?>
               <!--  -->

                    <?php if($tr==1){echo '<tr style="">';}?>
                                
                            <td style="background-color: aliceblue"><?=$i++;?></td>
                            <td><?=$selut['idUtilisateur']?></td>
                            <td ><i class="labelles" ></i><?=strtoupper($selut['nomUtilisateur']);?><i class="labelles" ><br></i><?=strtoupper($selut['postnomUtilisateur'])?><i class="labelles"><br></i><?=strtoupper($selut['prenomUtilisateur'])?></td>
                            <td>

                                    <i class="labelles"> Groupe</i>
                                    <select id="groupe" class="form-control col-sm-12" onchange="Orientation('control.param_access/ctr_membre.php?modifGroupe&idUtilisateur=<?=$selut['idUtilisateur']?>&idGroupe='+$(this).val(),'#corps')">
                                    <?php
                                        $groupeActif = new param_groupe();
                                        $groupeActif = $groupeActif ->selectionDerRolActif($selut['idUtilisateur'])->fetch();
                                    ?>
                                        <option value="<?=$groupeActif['idGroupe']?>"> <a style="color:green"><?=$groupeActif['idGroupe']." : ".strtoupper($groupeActif['groupe']);?></a></option>
                                    <?php
                                        $groupe = new param_groupe();
                                        $grp = $groupe->selectionner();
                                        $u=0;
                                        foreach($grp as $sel01){
                                        echo "N : ".$u++;
                                    ?>
                                            <option value="<?=$sel01['idGroupe']?>"> <a><?=$sel01['idGroupe']." : ".strtoupper($sel01['groupe']);?></a></option>
                                    <?php
                                        
                                        }
                                    ?>
                                    </select>

                            </td>
                        <td>
                            <a onclick="Orientation('control.param_access/ctr_membre.php','#panel')"><img style="height:50px; width:50px" id="image" src="images/<?=$selut['photoUtilisateur']?>"></a>
                        </td>
                        <?php if($tr>=4){$tr=0; echo "</td>";}?>
            <?php
            ?>
                <!--  -->
                <td style="height:100%; padding:0px; background:#f2f2f2"> 
                 <z class="dropdown">
                  <button data-toggle="dropdown" style=""><b class="caret ppull-right"></b></button>
                        <ul class="dropdown-menu pull-left">
                              <center>
                                    <?php
                                    if($_SESSION['org_inscription_afficher']==1){
                                    ?>
                                        <li class="btn btn-sm btn-defaulter" style="color: blue"    href="#" onclick="Orientation('control.param_access/ctr_eleve.php?eleve&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')"><a href="#">INSCRIRE ELEVE</a></li>
                                <?php
                                    }
                                    if($_SESSION['org_affectation_afficher']==1){
                                    ?>
                                        <li class="btn btn-sm btn-defaulter" style="color: blue"  href="#" onclick="Orientation('control.param_access/ctr_enseignant.php?enseigna&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')"><a href="#">AFFECTER ENSEIG.</a></li>
                                    <?php
                                    }
                                    if($_SESSION['dir_directeur_afficher']==1){
                                    ?>
                                                <li class="btn btn-sm btn-defaulter" style="color: blue"  href="#" onclick="Orientation('control.param_access/ctr_directeur.php?directeur&idutil=<?=$selut['idUtilisateur']?>&idGroupe=<?=$_GET['idGroupe']?>','#corps')"><a href="#">AFFECTER DIR.</a></li>
                                    <?php
                                    }
                                    ?>
                                     <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick="Encour()">Rapport Eleve</a>
                                    </li>
                                                         
                            </center>
                           
                        </ul>
                     </z> 
              
                </td>
                    
                    
            <?php
           }
           ?>
           </tbody>
            </table>
        </section>
</div>


           

