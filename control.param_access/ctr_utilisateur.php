<script src="../vue.param_access/script.js"></script>
<?php
(empty($_SESSION))?session_start():'';
include_once('../model.param_access/param_utilisateur.class.php');

    if(isset($_GET['formUt'])){
      include_once("../vue.param_access/form_utilisateur.php");

   }else if(isset($_GET['ajouterU'])){

    if(isset($_GET['nom']) AND !empty($_GET['nom']) AND  isset($_GET['postnom']) AND !empty($_GET['postnom']) AND isset($_GET['prenom']) AND isset($_GET['mail']) ){

        $photo="img1.png";
        $util=new param_utilisateur();
        if($util->ajouter($_GET['nom'],$_GET['postnom'],$_GET['prenom'],$_GET['genre'],$_GET['tel'],$_GET['mail'],$photo)){
            $util->selectionnerDsc();
            $util->getidutilisateur();
            include_once('../model.param_access/param_role.class.php');
            $role=new param_role(); 
            if($role->ajouter($_GET['groupe1'],$util->getidutilisateur())){
                 include_once("../vue.param_access/form_utilisateur.php");
            }else{
              include_once("../vue.param_access/form_utilisateur.php");
            }
        }else{
          include_once("../vue.param_access/form_utilisateur.php");
        }
    }else {
       echo "Echec cote Utilisateur<><><><><><><crt_utl...><>>><><>";
    }
    
}else if(isset($_GET['profil'])){
         include_once("../vue.param_access/header_fenetre.php");
         include_once("../vue.param_access/form_modif_utilisateur.php");
         include_once("../vue.param_access/footer_fenetre.php");
 }else if(isset($_POST['btn_add'])){
    $dossier_img="../images";
    $infosfichier = pathinfo($_FILES['photo']['name']);
    $identifiant = $_POST['nom'].'_'.mt_rand (0, 1000000 ).'.'.$infosfichier['extension'];
    if(is_dir($dossier_img)==false){
      mkdir($d );
      }
      move_uploaded_file($_FILES['photo']['tmp_name'],
      $dossier_img.'/'.basename($identifiant));
      $photo=$identifiant;
      $util=new param_utilisateur();
      $idUtilisateur=$_SESSION['idUtilisateur'];
    if($photo!=''){
      $util->modifier($idUtilisateur,$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['idGenre'],$_POST['tel'],$_POST['mail'],$photo,$_POST['login'],$_POST['ps']);
      header('location:../vue.param_access/login.php');
      
    }else{
       $util->modifierSP($idUtilisateur,$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['idGenre'],$_POST['tel'],$_POST['mail'],$_POST['login'],$_POST['ps']);
        header('location:../vue.param_access/login.php');
      
    }  
 }else {
    echo "Echec controleur utilisateur";
  }
?>