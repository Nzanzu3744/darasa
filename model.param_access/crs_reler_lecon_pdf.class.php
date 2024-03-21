<?php
include_once('../model.param_access/param_connexion.php');
class crs_reler_lecon_pdf
{
    private static  $idRelePdf;
    private static  $idLeconPdf;
    private static  $idCours;
    private static $idAnneeSco;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidRele()
    {
        return self::$idRelePdf;
    }
    public static function getidLeconPdf()
    {
        return self::$idLeconPdf;
    }
    //METHODES
    public static function ajouter($idL, $idC, $idAn)
    {
        $idLeconPdf = htmlspecialchars($idL);
        $idCours = htmlspecialchars($idC);
        $idAnneeSco = htmlspecialchars($idAn);

        $req = self::$con->prepare('INSERT INTO crs_reler_lecon_pdf (idLeconPdf, idCours, idAnneeSco) VALUES (?,?,?)');
        if ($req->execute(array($idLeconPdf, $idCours, $idAnneeSco))) {
            self::$idLeconPdf = $idLeconPdf;
            self::$idCours = $idCours;
            self::$idAnneeSco = $idAnneeSco;
        } else {
            return 'ECHEC AJOUT RELER ';
        }
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
