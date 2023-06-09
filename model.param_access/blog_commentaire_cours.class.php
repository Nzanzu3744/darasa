<?php
include_once('param_connexion.php');
class blog_commentaire_cours {
    private static  $idCommentaire;
    private static  $commentaire;
    private static  $idUtilisateur;
    private static  $idCours;
    private static  $reponseA;
    private static  $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($cmt,$idUt,$idCrs,$repA)
    {
        $cmtaire=htmlspecialchars($cmt);
        $idUtil=htmlspecialchars($idUt);
        $idCours=htmlspecialchars($idCrs);
        $reponseA=htmlspecialchars($repA);
       
                  $req=self::$con->prepare('INSERT INTO blog_commentaire_cours (commentaire, idCours, idUtilisateur, reponseA) VALUES (?,?,?,?)');
                    if($req->execute(array($cmtaire,$idCours,$idUtil,$reponseA))){
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public function selectionCmtCrs($idCours){
        return  self::$con->query('SELECT bcc.idCommentaire,	bcc.commentaire,	ut.idUtilisateur,	bcc.idCours,	bcc.reponseA,	bcc.dateCreation,	bcc.idUtilisateur,	ut.nomUtilisateur,	ut.postnomUtilisateur,	ut.prenomUtilisateur,	ut.telUtilisateur,ut.	mailUtilisateur,	ut.idGenre,	ut.photoUtilisateur FROM `blog_commentaire_cours` as bcc INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=bcc.idUtilisateur WHERE bcc.idCours="'.$idCours.'" AND bcc.reponseA=-1 ORDER BY bcc.idCommentaire DESC');
    }
    public function selectionRepCmtCrs($idCours,$idCmt){
        return  self::$con->query('SELECT bcc.idCommentaire,	bcc.commentaire,	ut.idUtilisateur,	bcc.idCours,	bcc.reponseA,	bcc.dateCreation,	bcc.idUtilisateur,	ut.nomUtilisateur,	ut.postnomUtilisateur,	ut.prenomUtilisateur,	ut.telUtilisateur,ut.	mailUtilisateur,	ut.idGenre,	ut.photoUtilisateur FROM `blog_commentaire_cours` as bcc INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=bcc.idUtilisateur WHERE bcc.idCours="'.$idCours.'" AND bcc.reponseA='.$idCmt.' ORDER BY bcc.idCommentaire DESC');
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


