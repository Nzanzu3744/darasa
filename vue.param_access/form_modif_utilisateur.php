<?php
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/param_utilisateur.class.php');
$util = new param_utilisateur();
$util=$util->rechercher($_SESSION['idUtilisateur']);
?>
<form action="control.param_access/ctr_utilisateur.php" method="POST" enctype="multipart/form-data" class="form_control" style="margin:20px">
    <div class="form-group col-sm-6">
        <label for="nom" class=" col-sm-2 col-xs-2"> Nom </label>
        <input id="nom" name="nom" type="text" value="<?=$util['nomUtilisateur']?>" class="form-control col-sm-5 col-xs-5 col-lg-5 " placeholder="Nom de l'utilisateur" >
        <label for="postnom" class=" col-sm-5"> Post-nom </label>
        <input style="width:100%" id="postnom" value="<?=$util['postnomUtilisateur']?>" name="postnom" type="text" class="form-control col-sm-9" placeholder="Postnom de l'utilisateur">
        <label class=" col-sm-12"> Prenom de l'utilisateur </label>
        <input style="width:100%" id="prenom" name="prenom" value="<?=$util['prenomUtilisateur']?>" type="text" class="form-control" placeholder="Prenom de l'utilisateur">
        <label for="idGenre">Genre</label>
            <select id="idGenre" name="idGenre" class="form-control">
                <?php
                include_once('../model.param_access/param_genre.class.php');       
                $genre = new param_genre();
                $genre = $genre->rechercher($util['idGenre'])->fetch();
                ?>
                 <option value="<?=$genre['idGenre']?>"><?=$genre['idGenre']." : ".strtoupper($genre['genre']);?></option>
                <?php
                            $genre = new param_genre();
                            $genre = $genre->selectionner();
                            $u=0;
                            foreach($genre as $sel){
                        ?>
                                <option value="<?=$sel['idGenre']?>"><?=$sel['idGenre']." : ".strtoupper($sel['genre']);?></option>
                        <?php
                            }
                        ?>                        
            </select>
    </div>
    <div class="form-group col-sm-6">
        <label fo="mail" class=" col-sm-12">Mail </label>
        <input style="width:100%" id="mail" value="<?=$util['mailUtilisateur']?>" name="mail" type="mail" class="form-control" placeholder="Mail de l'utilisateur">
        <label fo="mail" class=" col-sm-12">Tel </label>
        <input style="width:100%" id="tel" name="tel" value="<?=$util['telUtilisateur']?>" type="Telephone" class="form-control" placeholder="Telephone">
        <label for="photo" name="photo" class=" col-sm-12">Photo</label>    
        <input style="width:100%" id="photo" name="photo" type="file" class=" form-control" >
        <label fo="mail" class=" col-sm-12">login </labelle>
        <input style="width:100%" id="login" value="<?=$util['log']?>" name="login" type="txt" placeholder="Login"  class=" form-control" ><p>
        <label fo="mail" class=" col-sm-12">Mot de Passe </label>
        <input style="width:100%" id="ps" name="ps" value="<?=$util['pass']?>" type="password" placeholder="Mot de passe" class=" form-control" ><p>
    </div>          
    <div class="modal-footer">
          <input id="btn_add" name="btn_add" class="btn btn-success pull-left col-sm-4" type="submit" value="Valider"/>
          <!-- <button onclick="Encour()"  class="btn btn-danger pull-right col-sm-4">Annuler</button> -->
    </div>
</form>