<?php
include_once('param_connexion.php');
class org_affectation {
    private static  $idAffectation;
    private static $idClasse;
    private static $actif;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidAffectation(){
        return self::$idAffectation;
    }
    //METHODES
    public function ajouter($idClasse,$idAnneSco,$idutilisateur,$actif)
    {

        $idCls= htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($idAnneSco);
        $idUtil = htmlspecialchars($idutilisateur);
        $act = htmlspecialchars($actif);


        $req=self::$con->prepare('INSERT INTO org_affectation (idClasse,idAnneeSco,idUtilisateur,actif) VALUES (?,?,?,?)');
        if($req->execute(array($idCls,$idAn,$idUtil,$act))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            // self::$idAnneSco = htmlspecialchars($idAn);
            // self::$idClasse = htmlspecialchars($idCls);
            // self::$idUtilisateur = htmlspecialchars($idUtil);
            return 1;
        }else{
            return 0;
        }

    }
    
    public function modifier($idAffectation,$idClasse, $idUtilisateur,$actif)
    {
        $idAffect = htmlspecialchars($idAffectation);
        $idUtil= htmlspecialchars($idUtilisateur);
        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($actif);
        if(self::$con->exec('UPDATE `org_affectation` SET `idClasse`='.$idCls.',`actif`='.$idAn.',`idUtilisateur`='.$idUtil.' WHERE idAffectation='.$idAffect))
           {  
            self::$idAffectation = $idUtil;
            self::$idClasse = $idCls;
            self::$idUtilisateur = $idUtil;
            self::$actif = $idAn;
            return "true";
         }else{
             return "false";
    }
    }
   
    public function supprimer($idAffectation){
        $idAffect = htmlspecialchars($idAffectation);
        if(self::$con->exec('DELETE FROM `org_affectation` WHERE idAffectation="'.$idAffect.'"')){
            self::$idAffectation = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM org_affectation ORDER BY idAffectation ASC');
    }
    public function rechercherByUti($idAffectation){
        $idAff = htmlspecialchars($idAffectation);
        return $var = self::$con->query("SELECT * FROM org_affectation AS `is` 
        INNER JOIN org_classe AS `cl` ON `is`.`idClasse` = `cl`.`idClasse` 
        INNER JOIN `param_utilisateur` AS `ut` ON `is`.`idUtilisateur` = `ut`.`idUtilisateur` WHERE is.idUtilisateur=".$idAff);
        // foreach($var as $sel){
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
     public function rechercherByUtiCls($idUti,$idCls){
        $idUti = htmlspecialchars($idUti,);
        $idCls = htmlspecialchars($idCls);
        return $var = self::$con->query("SELECT * FROM org_affectation AS `is` 
        INNER JOIN org_classe AS `cl` ON `is`.`idClasse` = `cl`.`idClasse` 
        INNER JOIN `param_utilisateur` AS `ut` ON `is`.`idUtilisateur` = `ut`.`idUtilisateur` WHERE is.idUtilisateur='".$idUti."' AND is.idClasse='".$idCls."' AND is.actif=1 ORDER BY is.idAffectation DESC LIMIT 1");
        // foreach($var as $sel){
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //
    public function rechercher($idAffectation){
        $idAffect = htmlspecialchars($idAffectation);
        return $var = self::$con->query("SELECT * FROM org_affectation WHERE idAffectation =".$idAffect);
        // foreach($var as $sel){
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idAffectation = $sel['idAffectation'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


