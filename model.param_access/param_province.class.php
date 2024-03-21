<?php
include_once('../model.param_access/param_connexion.php');
class param_province {
    private static  $idProvince;
    private static  $nomProvince;
    private static $idPays;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //GETTEURS
    public static function getidPays(){
        return self::$idProvince;
    }
    public static function getProvince(){
        return self::$nomProvince;
    }
    //METHODES
    public static function ajouter($nomProvince,$idPays,$idUtilisateur)
    {
        $nomProvince=htmlspecialchars($nomProvince);
        $idUtilisateur=htmlspecialchars($idUtilisateur);
        $idPays=htmlspecialchars($idPays);
        $req=self::$con->prepare('INSERT INTO param_province (nomPays, codePays,idPays) VALUES (?,?,?)');
        if($req->execute(array($nomProvince,$idUtilisateur,$idPays))){
            self::$nomProvince=$nomProvince;
            self::$idUtilisateur=$idUtilisateur;
            self::$idPays=$idPays;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idProvince,$nomProvince,$idPays, $idUtilisateur)
    {
        $idProvince = htmlspecialchars($idProvince);
        $nomProvince = htmlspecialchars($nomProvince);
        $idUtilisateur= htmlspecialchars($idUtilisateur);
        if(self::$con->exec('UPDATE param_province SET nomPays="'.$nomProvince.'", codePays="'.$idUtilisateur.'" WHERE idProvince="'.$idProvince.'"'))
            {
                $idProvince = htmlspecialchars($idProvince);
                self::$nomProvince=htmlspecialchars($nomProvince);
                self::$idUtilisateur =htmlspecialchars($idUtilisateur);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public static function supprimer($idProvince){
        $idProvince = htmlspecialchars($idProvince);
        if(self::$con->exec('DELETE FROM  param_province  WHERE idProvince="'.$idProvince.'"')){
            self::$idProvince = '';
            self::$idUtilisateur = "";
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM param_province ORDER BY idProvince ASC');
    }
    public static function selectionnerDesc(){
        return  self::$con->query('SELECT * FROM param_province ORDER BY idProvince DESC');
    }

    public static function rechercher($idProvince){
        $idProvince = htmlspecialchars($idProvince);
        $var = self::$con->query("SELECT * FROM param_province WHERE idProvince ='".$idProvince."' ORDER BY idProvince ASC LIMIT 1");
            
        return $var; 
    }
    public static function rechercherPremProvPays($idPays){
        $idPays = htmlspecialchars($idPays);
        $var = self::$con->query("SELECT * FROM param_province WHERE idPays ='".$idPays."' ORDER BY idProvince ASC LIMIT 1");
            
        return $var; 
    }
    public static function rechercherByProvPays($idPays){
        $idPays = htmlspecialchars($idPays);
        $var = self::$con->query("SELECT * FROM param_province WHERE idPays ='".$idPays."' ORDER BY idProvince ASC");
            
        return $var; 
    }
   
    public function filtrer($nomProvince){
        $nomProvince=htmlspecialchars($nomProvince);
        $var = self::$con->query("SELECT * FROM param_province WHERE nomPays like '".$nomProvince."%' ORDER BY idProvince ASC");

        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


