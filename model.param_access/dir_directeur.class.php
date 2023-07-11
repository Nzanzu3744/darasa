<?php
include_once('param_connexion.php');
class dir_directeur {
    private static  $idDirection;
    private static  $idPromotion;
    private static  $idUtilisateur;
    private static  $idAnneeSco;
    private static  $dateCreation;
    private static  $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($idPro,$idU,$ann, $act)
    {
        $idPromo=htmlspecialchars($idPro);
        $idUtil=htmlspecialchars($idU);
        $an=htmlspecialchars($ann);
        $actif=htmlspecialchars($act);
       
                  $req=self::$con->prepare('INSERT INTO dir_directeur (idPromotion, idUtilisateur,idAnneeSco, actif) VALUES (?,?,?,?)');
                    if($req->execute(array($idPromo,$idUtil,$an,$actif))){
                        self::$idPromotion=$idPromo;
                        self::$idUtilisateur=$idUtil;
                        self::$idAnneeSco=$an;
                        self::$actif=$actif;
                        return true;               
                    }else{
                        return false;
                    }  
    }
    public function selectionnerByUtiActif($idUt){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="'.$idUt.'" AND dir.actif=1 ');
    }
    public function selectionnerByUtiPromActif($idUt,$pro){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="'.$idUt.'" AND dir.idPromotion="'.$pro.'" AND dir.actif=1 ORDER BY dir.idDirecteur DESC LIMIT 1');
    }
    public function selectionnerByUti($idUt){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur='.$idUt.' ORDER BY dir.idPromotion DESC');
    }
    public function selectionnerByUtiAnn($idUt,$ann){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur='.$idUt.' AND dir.idAnneeSco="'.$ann.'" ORDER BY dir.idPromotion DESC');
    }
   public function selectionnerByUtiAnnDescLimit($idUt,$ann){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur='.$idUt.' AND dir.idAnneeSco="'.$ann.'" ORDER BY dir.idPromotion DESC limit 1');
    }
    public function selectionnerByUtiDescLimit($idUt){
        return  self::$con->query('SELECT * FROM `dir_directeur` as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur='.$idUt.'" ORDER BY dir.idPromotion DESC limit 1');
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


