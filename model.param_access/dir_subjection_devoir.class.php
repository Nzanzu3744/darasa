<?php
include_once('param_connexion.php');
class dir_subjection_devoir {
    private static  $idSubjection;
    private static  $idDirecteur;
    private static  $idDevoir;
    private static  $subjection;
    private static  $cote;
    private static  $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //METHODES
    public static function ajouter($idDir,$idDv, $subj, $cpt)
    {
        $idDirect=htmlspecialchars($idDir);
        $idDevoir=htmlspecialchars($idDv);
        $cote=htmlspecialchars($cpt);
        $subj=$subj;
       
                  $req=self::$con->prepare('INSERT INTO dir_subjection_devoir (idDirecteur, idDevoir, subjection,cpt) VALUES (?,?,?,?)');
                    if($req->execute(array($idDirect,$idDevoir,$subj,$cote))){
                        self::$idDirecteur=$idDirect;
                        self::$idDevoir=$idDevoir;
                        self::$subjection=$subj;
                        self::$cote=$cote;
                        return true;               
                    }else{
                        return false;
                    }  
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


