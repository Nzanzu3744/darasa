<?php
include_once('../model.param_access/param_connexion.php');
class param_ville_territoire {
    private static  $idVilleTerritoire;
    private static  $nomVilleTerritoire;
    private static $idPays;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //GETTEURS
    public static function getidPays(){
        return self::$idVilleTerritoire;
    }
    public static function getVilleTerritoire(){
        return self::$nomVilleTerritoire;
    }
    //METHODES
    public static function ajouter($nomVilleTerritoire,$idPays,$idUtilisateur)
    {
        $nomVilleTerritoire=htmlspecialchars($nomVilleTerritoire);
        $idUtilisateur=htmlspecialchars($idUtilisateur);
        $idPays=htmlspecialchars($idPays);
        $req=self::$con->prepare('INSERT INTO param_ville_territoire (nomPays, codePays,idPays) VALUES (?,?,?)');
        if($req->execute(array($nomVilleTerritoire,$idUtilisateur,$idPays))){
            self::$nomVilleTerritoire=$nomVilleTerritoire;
            self::$idUtilisateur=$idUtilisateur;
            self::$idPays=$idPays;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idVilleTerritoire,$nomVilleTerritoire,$idPays, $idUtilisateur)
    {
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        $nomVilleTerritoire = htmlspecialchars($nomVilleTerritoire);
        $idUtilisateur= htmlspecialchars($idUtilisateur);
        if(self::$con->exec('UPDATE param_ville_territoire SET nomPays="'.$nomVilleTerritoire.'", codePays="'.$idUtilisateur.'" WHERE idPays="'.$idVilleTerritoire.'"'))
            {
                $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
                self::$nomVilleTerritoire=htmlspecialchars($nomVilleTerritoire);
                self::$idUtilisateur =htmlspecialchars($idUtilisateur);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public static function supprimer($idVilleTerritoire){
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        if(self::$con->exec('DELETE FROM  param_ville_territoire  WHERE idPays="'.$idVilleTerritoire.'"')){
            self::$idVilleTerritoire = '';
            self::$idUtilisateur = "";
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM param_ville_territoire ORDER BY idVilleTerritoire ASC');
    }
    public static function selectionnerDesc(){
        return  self::$con->query('SELECT * FROM param_ville_territoire ORDER BY idVilleTerritoire DESC');
    }

    public static function rechercher($idVilleTerritoire){
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        $var = self::$con->query("SELECT * FROM param_ville_territoire WHERE idVilleTerritoire ='".$idVilleTerritoire."' ORDER BY idVilleTerritoire ASC LIMIT 1");
            
        return $var; 
        
    }
    public static function rechercherByProv($idProvince){
        $idProvince = htmlspecialchars($idProvince);
        $var = self::$con->query("SELECT * FROM param_ville_territoire WHERE idProvince ='".$idProvince."' LIMIT 1");
            
        return $var; 
      
    }
    public static function rechercherByPremieProvPays($idPy){
        include_once("../model.param_access/param_province.class.php");
        $idPy = htmlspecialchars($idPy);
        $pron = new param_province();
        $pron = $pron->rechercherPremProvPays($idPy)->fetch();
        if($pron!=false){
        return self::rechercherByProv($pron['idProvince']);
        }else{
            return false;
        }
      
    }
    
    public function filtrer($nomVilleTerritoire){
        $nomVilleTerritoire=htmlspecialchars($nomVilleTerritoire);
        $var = self::$con->query("SELECT * FROM param_ville_territoire WHERE nomVilleTerritoire like '".$nomVilleTerritoire."%' ORDER BY idVilleTerritoire ASC");

        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


