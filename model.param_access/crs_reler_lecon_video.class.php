<?php
include_once('../model.param_access/param_connexion.php');
class crs_reler_lecon_video
{
    private static  $idReleVideo;
    private static  $idLeconVideo;
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
        return self::$idReleVideo;
    }
    public static function getidLeconVideo()
    {
        return self::$idLeconVideo;
    }
    //METHODES
    public static function ajouter($idL, $idC, $idAn)
    {
        $idLeconVideo = htmlspecialchars($idL);
        $idCours = htmlspecialchars($idC);
        $idAnneeSco = htmlspecialchars($idAn);

        $req = self::$con->prepare('INSERT INTO crs_reler_lecon_video (idLeconVideo, idCours, idAnneeSco) VALUES (?,?,?)');
        if ($req->execute(array($idLeconVideo, $idCours, $idAnneeSco))) {
            self::$idLeconVideo = $idLeconVideo;
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
