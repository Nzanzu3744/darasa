<?php
    include_once('../model.param_access/param_utilisateur.class.php');
    
    $util= new param_utilisateur();
    $util = $util->rechercher($_GET['idutil']);
    
?>

                <div class="col-sm-12 well" style="height:110px;">
                    <center class="col-sm-2" >
                        <a href="#" class="thumbnail"><img  style="height:75px; width:145px;" id="image" src="<?=$util['photoUtilisateur']?>" class="img-rounded"></a>
                    </center>
                    <div class="col-sm-8" style="padding:0%; height:80%">
                        <h4 id="modalTitre" class="modal-title"><i class="labelles" >Nom</i><?=" : ".strtoupper($util['nomUtilisateur']);?><i class="labelles" ><br>Post-Nom</i><?=":".strtoupper($util['postnomUtilisateur'])?><i class="labelles" ><br>Prenom </i><?=" :".strtoupper($util['prenomUtilisateur'])?> </h4>
                    </div>

                    <button class="btn btn-warning pull-right" style="height:40px; margin-top:13px;" onclick="Orientation('../control.param_access/ctr_membre.php?rtn=true&idGroupe=<?=$_GET['idGroupe']?>','#corps')" >Returner</button>               
    
                </div>

                <div class="col-sm-7" style="padding:0px; margin:0px">
                    <center style="font-size:20px;" class="col-sm-12"><bold>FORMULAIRE D'AFFECTATION ENSEIGNANT</bold></center>
                    <div style="margin:10px" class="row">
                       <a style="padding-top:10px" class="col-sm-6" >LISTE DES CLASSES</a><input  id="" type="text" class="form-control col-sm-3 " style="width:280px;"  placeholder="RECH PAR PROMOTION">
                    </div>
                    <div id="" style="padding:0px">
                        <?php
                            include("liste_classe.php");
                        ?>   
                    </div>
                    </div>
                                        
                    <div class="col-sm-5" style="padding:0px">
                    <center style="font-size:20px;" class="col-sm-12"><bold>LISTE DE CLASSES AFFECTE</bold></center>
                    <div style="margin:10px" class="row">
                       <a style="padding-top:10px" class="col-sm-8" > EST AFFECTE COMME ENSEIGNANT</a><input  id="" type="text" class="form-control col-sm-3 " style="width:150px;"  placeholder="RECH PAR PROMOTION">
                    </div>
                    <div id="" style="padding:0px">
                        <?php
                        include("classe_Affect.php");
                        ?>
                    </div>
                </div>
                       
                    <button class="btn btn-success" style="height:30px;" onclick="Orientation('../control.param_access/ctr_enseignant.php?Valide=true&idGroupe=<?=$_GET['idGroupe']?>&idutil=<?=$_GET['idutil']?>','#corps')" >Valider</button> 
                    <button class="btn btn-default pull-right" style="height:30px;" onclick="Orientation('../control.param_access/ctr_enseignant.php?annul=true&idutil=<?=$_GET['idutil']?>','#corps')" >Annuler</button> 
                       
                </div>
                <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
                
