<?php
include_once('../model.param_access/param_connexion.php');
class param_pays {
    private static  $idPays;
    private static  $nomPays;
    private static $codePays;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }

    //GETTEURS
    public static function getidPays(){
        return self::$idPays;
    }
    public static function getnomPays(){
        return self::$nomPays;
    }
    //METHODES
    public static function ajouter($nomPays,$codePays,$idUtilisateur)
    {
        $nomPays=htmlspecialchars($nomPays);
        $codePays=htmlspecialchars($codePays);
        $req=self::$con->prepare('INSERT INTO param_pays (nomPays, codePays, idUtilisateur) VALUES (?,?,?)');
        if($req->execute(array($nomPays,$codePays))){
            self::$nomPays=$nomPays;
            self::$codePays=$codePays;
            self::$idUtilisateur = $idUtilisateur;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idPays,$nomPays, $codePays)
    {
        $idPays = htmlspecialchars($idPays);
        $nomPays = htmlspecialchars($nomPays);
        $codePays= htmlspecialchars($codePays);
        if(self::$con->exec('UPDATE param_pays SET nomPays="'.$nomPays.'", codePays="'.$codePays.'" WHERE idPays="'.$idPays.'"'))
            {
                $idPays = htmlspecialchars($idPays);
                self::$nomPays=htmlspecialchars($nomPays);
                self::$codePays =htmlspecialchars($codePays);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public static function supprimer($idPays){
        $idPays = htmlspecialchars($idPays);
        if(self::$con->exec('DELETE FROM  param_pays  WHERE idPays="'.$idPays.'"')){
            self::$idPays = '';
            self::$codePays = "";
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM param_pays ORDER BY idPays ASC');
    }
    public static function selectionnerDesc(){
        return  self::$con->query('SELECT * FROM param_pays ORDER BY idPays DESC');
    }

    public static function rechercher($idPays){
        $idPays = htmlspecialchars($idPays);
        $var = self::$con->query("SELECT * FROM param_pays WHERE idPays ='".$idPays."' ORDER BY idPays ASC LIMIT 1");
            
        return $var; 
    }
   
    public function filtrer($nomPays){
        $nomPays=htmlspecialchars($nomPays);
        $var = self::$con->query("SELECT * FROM param_pays WHERE nomPays like '".$nomPays."%' ORDER BY idPays ASC");

        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


