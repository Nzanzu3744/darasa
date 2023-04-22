<?php
include_once('param_connexion.php');
class org_inscription {
    
    private static  $idInscription;
    private static $idClasse;
    private static $idAnneesco;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidInscription(){
        return self::$idInscription;
    }
    //METHODES
    public function ajouter($idClasse, $idAnneesco,$idutilisateur)
    {

        $idCls= htmlspecialchars($idClasse);
        $idAn= htmlspecialchars($idAnneesco);
        $idUtil = htmlspecialchars($idutilisateur);
        $actif=1;
        $req=self::$con->prepare('INSERT INTO org_inscription (idClasse, idAnneeSco, idUtilisateur, actif) VALUES (?,?,?,?)');
        if($req->execute(array($idCls,$idAn,$idUtil,$actif))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idAnneesco = htmlspecialchars($idAn);
            self::$idClasse = htmlspecialchars($idCls);
            self::$idUtilisateur = htmlspecialchars($idUtil);
            return 1;
        }else{
            return 0;
        }

    }
    
    public function modifier($idInscription,$idClasse, $idAnneesco,$idUtilisateur)
    {
        $idIns = htmlspecialchars($idInscription);
        $idUtil= htmlspecialchars($idUtilisateur);
        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($idAnneesco);
        if(self::$con->exec('UPDATE `org_inscription` SET `idClasse`='.$idCls.',`idAnneeSco`='.$idAn.',`idUtilisateur`='.$idUtil.' WHERE idInscription='.$idIns))
           {  
            self::$idInscription = $idUtil;
            self::$idClasse = $idCls;
            self::$idUtilisateur = $idUtil;
            self::$idAnneesco = $idAn;
            return "true";
         }else{
             return "false";
    }
    }
   
    public function supprimer($idInscription){
        $idIns = htmlspecialchars($idInscription);
        if(self::$con->exec('DELETE FROM `org_inscription` WHERE idInscription="'.$idIns.'"')){
            self::$idInscription = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM org_inscription ORDER BY idInscription ASC');
    }
    //
    public function rechercher($idInscription){
        $idIns = htmlspecialchars($idInscription);
        return $var = self::$con->query("SELECT * FROM org_inscription WHERE idInscription =".$idIns);
        // foreach($var as $sel){
        //     self::$idInscription = $sel['idInscription'];
        //     self::$idInscription = $sel['idInscription'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    public function rechercherByUti($idInscription){
        $idIns = htmlspecialchars($idInscription);
        return $var = self::$con->query("SELECT * FROM org_inscription AS `is` 
        INNER JOIN org_classe AS `cl` ON `is`.`idClasse` = `cl`.`idClasse` 
        INNER JOIN `param_utilisateur` AS `ut` ON `is`.`idUtilisateur` = `ut`.`idUtilisateur` WHERE is.idUtilisateur=".$idIns);
        // foreach($var as $sel){
        //     self::$idInscription = $sel['idInscription'];
        //     self::$idInscription = $sel['idInscription'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


