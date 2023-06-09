<?php
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/param_genre.class.php');
?>
<div class="form-inline well" style="width:241px; height:600px" id="utilisa">
<div class="form-group">
            <label for="nom" class=" col-sm-12"> Nom </label>
            <input id="nom"style="width:100%" style="width:100%"  type="text" class="form-control " placeholder="Nom de l'utilisateur">
            <label for="postnom" class=" col-sm-12"> Post-nom </label>
            <input id="postnom" style="width:100%"  type="text" class="form-control" placeholder="Postnom de l'utilisateur">
            <label for="prenom" class=" col-sm-12" > Prenom de l'utilisateur </label>
            <input id="prenom" style="width:100%" type="text" class="form-control" placeholder="Prenom de l'utilisateur">

            <label for="genre" class="col-sm-12">Genre</label>
            <select id="genre" class="form-control col-sm-12 col-lg-12 col-xs-12">
                        <?php
                            $groupe = new param_genre();
                            $grp = $groupe->selectionner();
                            $u=0;
                            foreach($grp as $sel){
                        ?>
                                <option value="<?=$sel['idGenre']?>"><?=$sel['idGenre']." : ".strtoupper($sel['genre']);?></option>
                        <?php
                            }
                        ?>                        
            </select>
            

            <label for="tel" class=" col-sm-12">Telephone </label>
            <input style="width:100%" id="tel" type="txt" class="form-control" placeholder="tel de l'élève/parent">
            <label for="mail" class=" col-sm-12">Mail </label>
            <input style="width:100%" id="mail" type="mail" class="form-control" placeholder="Mail de l'élève/parent">
            <label for="photo" class=" col-sm-12">Photo</label>    
            <input style="width:100%" id="photo" onchange="charge_Image()" type="file" class=" form-control" ><p>
            <div id="image01" class="alert alert-block alert-success " style="display:none; width:100%; height:190px">

            </div>
            
            <label for="groupe1">Groupe</label>
            <select id="groupe1" class="form-control col-sm-12">
                        <?php
                            $groupe = new param_groupe();
                            $grp = $groupe->selectionner();
                            $u=0;
                            foreach($grp as $sel){
                        ?>
                                <option value="<?=$sel['idGroupe']?>"><?=$sel['idGroupe']." : ".strtoupper($sel['groupe']);?></option>
                        <?php
                            }
                        ?>                        
            </select>
                        </div>      

    <div style="padding: 10px" >
    <button id="enrg" onclick="Orientation('control.param_access/ctr_utilisateur.php?ajouterU=true&nom='+$('#nom').val()+'&postnom='+$('#postnom').val()+'&prenom='+$('#prenom').val()+'&mail='+$('#mail').val()+' & photo='+$('#photo').val()+'&groupe1='+$('#groupe1').val()+'&genre='+$('#genre').val()+'&tel='+$('#tel').val(),'#frmuti')"  class="btn btn-success pull-left col-sm-4">Valider</button>
   
    <button onclick="Encour()"  class="btn btn-danger pull-right col-sm-4">Annuler</button>
</div>
<!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script> -->

