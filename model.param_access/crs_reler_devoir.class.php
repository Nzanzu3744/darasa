<?php
include_once('../model.param_access/param_connexion.php');
class crs_reler_devoir {
    private static  $idRele;
    private static  $idDevoir;
    private static  $idPeriode;
    private static  $dateRemise;
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
    public static function ajouter($idD,$dtRm,$idP,$idC, $idAn)
    {
        $idDevoir=htmlspecialchars($idD);
        $dtRm01=htmlspecialchars($dtRm);
        $idP01=htmlspecialchars($idP);
        $idCours=htmlspecialchars($idC);
        $idAnneeSco=htmlspecialchars($idAn);
                  $req=self::$con->prepare('INSERT INTO crs_reler_devoir (idDevoir, idPeriode, dateRemise, idCours, idAnneeSco) VALUES (?,?,?,?,?)');
                    if($req->execute(array($idDevoir,$idP01,$dtRm01,$idCours,$idAnneeSco))){
                        self::$idDevoir=$idDevoir;
                        self::$dateRemise=$dtRm01;
                        self::$idPeriode=$idP01;
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


