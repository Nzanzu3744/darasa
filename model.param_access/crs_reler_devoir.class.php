<?php
include_once('param_connexion.php');
class crs_reler_devoir {
    private static  $idRele;
    private static  $idDevoir;
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
    public static function getidDevoir(){
        return self::$idDevoir;
    }
    //METHODES
    public static function ajouter($idD,$idC, $idAn)
    {
        $idDevoir=htmlspecialchars($idD);
        $idCours=htmlspecialchars($idC);
        $idAnneeSco=htmlspecialchars($idAn);
       
                  $req=self::$con->prepare('INSERT INTO crs_reler_devoir (idDevoir, idCours, idAnneeSco) VALUES (?,?,?)');
                    if($req->execute(array($idDevoir,$idCours,$idAnneeSco))){
                        self::$idDevoir=$idDevoir;
                        self::$idCours=$idCours;
                        self::$idAnneeSco=$idAnneeSco;
                        return "Rapportage du devoir code ".$idD.' a reussi';               
                    }else{
                        return 'ECHEC AJOUT RELER ';
                    }  
    }
   
    //DESTRUCTEUR
    public function __destuct(){
    }
}


