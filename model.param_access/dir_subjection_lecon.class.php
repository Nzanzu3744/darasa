<?php
include_once('param_connexion.php');
class dir_subjection_lecon {
    private static  $idSubjection;
    private static  $idDirecteur;
    private static  $idLecon;
    private static  $subjection;
    private static  $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($idDir,$idLec, $subj)
    {
        $idDirect=htmlspecialchars($idDir);
        $idLecon=htmlspecialchars($idLec);
        $subj=$subj;
       
                  $req=self::$con->prepare('INSERT INTO dir_subjection_lecon (idDirecteur, idLecon, subjection) VALUES (?,?,?)');
                    if($req->execute(array($idDirect,$idLecon,$subjection))){
                        self::$idDirecteur=$idDirect;
                        self::$idLecon=$idLecon;
                        self::$subjection=$subj;
                        return true;               
                    }else{
                        return false;
                    }  
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


