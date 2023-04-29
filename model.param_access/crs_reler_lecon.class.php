<?php
include_once('param_connexion.php');
class crs_reler_lecon {
    private static  $idRele;
    private static  $idLecon;
    private static  $idCours;
    private static $idAnneeSco;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidRele(){
        return self::$idRele;
    }
    public static function getidLecon(){
        return self::$idLecon;
    }
    //METHODES
    public static function ajouter($idL,$idC, $idAn)
    {
        $idLecon=htmlspecialchars($idL);
        $idCours=htmlspecialchars($idC);
        $idAnneeSco=htmlspecialchars($idAn);
       
                  $req=self::$con->prepare('INSERT INTO crs_reler_lecon (idLecon, idCours, idAnneeSco) VALUES (?,?,?)');
                    if($req->execute(array($idLecon,$idCours,$idAnneeSco))){
                        self::$idLecon=$idLecon;
                        self::$idCours=$idCours;
                        self::$idAnneeSco=$idAnneeSco;               
                    }else{
                        return 'ECHEC AJOUT RELER ';
                    }  
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


