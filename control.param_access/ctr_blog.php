<?php
(empty($_SESSION))?session_start():'';

if(isset($_GET['commentaire_cours'])){
    include("../vue.param_access/commentaire_cours.php");

 }elseif(isset($_GET['reponse'])  AND isset($_GET['idut']) AND isset($_GET['idCmt'])){
    include_once('../model.param_access/param_utilisateur.class.php');

    $ut= new param_utilisateur();
    $ut=$ut->rechercher($_GET['idut']);
    echo "<button desabled id='cmtp' name='cmtp' style='background:black; color:white' value=".$_GET['idCmt'].">Reponse a".strtoupper($ut['idUtilisateur']." ".$ut['nomUtilisateur']." ".$ut['postnomUtilisateur']." ".$ut['prenomUtilisateur'])."[".$_GET['idCmt']."]</center>";
 }elseif(isset($_GET['ajt']) AND isset($_GET['cmtaire'])){
include_once('../model.param_access/blog_commentaire_cours.class.php');

$cmt= new blog_commentaire_cours();
$cmt=$cmt->ajouter($_GET['cmtaire'], $_SESSION['idUtilisateur'],$_GET['idCours'],($_GET['cmtp']!='undefined')?$_GET['cmtp']:-1);
include("../vue.param_access/commentaire_cours.php");
 }else{
 echo 'ECHEC BLOCG';
 }
?>