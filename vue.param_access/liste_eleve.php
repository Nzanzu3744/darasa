 <div role="form" enctype="multipart/form-data" class="form-inline well" style="width:700px; font-size:12px; margin-left:20%;margin-top:1%; background:white" id="">
    <center style="margin-left:10px" class="col-sm-12" > LISTE D'ELEVES PARTICIPANT A  <?="_".$_GET['maClasse']?></center> 

<div style="margin:30px; padding-top:10px; border-top: 1px solid black">
 <table  class="table table-bordered table-striped table-condensed" > 
 
                <thead>
                    <tr>
                        <th>N</th>
                        <th><center>MATRICUL</center></th>
                        <th><center>PHOTO</center></th>
                        <th><center>NOM</center></th>
                        <th><center>POST-NOM</center></th>
                        <th><center>PRENOM</center></th>
                        <th><center>GENRE</center></th>
                        <th><center>INSC</center></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    include_once('../model.param_access/org_inscription.class.php');
                    $eleve = new org_inscription();
                    $idCls=$_GET['idClasse'];
                    $idAnn=$_GET['idAnneeSco'];
                    $eleve = $eleve->rechercherByClAnnee($idCls, $idAnn);
                    $i=1;
                    foreach($eleve as $selEleve){
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><label style="color:green"><?=$selEleve['idUtilisateur']?></label></td>

                        <td><img style="width:30px; height:30px" src="<?='../images/'.$selEleve['photoUtilisateur']?>"/></td>
                       <td><?=$selEleve['nomUtilisateur']?></td>
                       <td><?=$selEleve['postnomUtilisateur']?></td>
                       <td><?=$selEleve['prenomUtilisateur']?></td>
                       <td><?=$selEleve['genre']?></td>
                       <td><?=$selEleve['idInscription']?></td>
                       </tr>
                        <?php
                        
                    }
                        ?>
                    
                            
                </tbody>
            </table>
    </div>
    </div>