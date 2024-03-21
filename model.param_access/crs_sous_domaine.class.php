<?php
include_once('../model.param_access/param_connexion.php');
class crs_sous_domaine
{
    private static  $idDomaine;
    private static $domaine;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidDomaine()
    {
        return self::$idDomaine;
    }
    //METHODES
    public static function ajouter($domaine, $iddom, $msd)
    {
        $dmne = htmlspecialchars($domaine);
        $req = con()->prepare('INSERT INTO crs_sous_domaine(sousDomaine,idDomaine,masqueSousDomaine) VALUES (?,?,?)');
        if ($req->execute(array($dmne, $iddom, $msd))) {
            return true;
        } else {
            return false;
        }
    }

    public static function supprimer($idDomaine)
    {
        $sdomn = htmlspecialchars($idDomaine);
        if (con()->exec('DELETE FROM crs_sous_domaine WHERE idSousDomaine="' . $sdomn . '"')) {
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_sous_domaine as sdom INNER JOIN crs_domaine as dom ON dom.idDomaine=sdom.idDomaine ORDER BY dom.idDomaine ASC');
    }
    public static function selectionnerByDom($idDom)
    {
        $domn = htmlspecialchars($idDom);
        return con()->query("SELECT * FROM crs_sous_domaine as sdom INNER JOIN crs_domaine as dom ON dom.idDomaine=sdom.idDomaine WHERE dom.idDomaine =" . $domn . ' ORDER BY sdom.masqueSousDomaine ASC');
    }
    //
    public static function rechercher($idSousDomaine)
    {
        $sdomn = htmlspecialchars($idSousDomaine);
        return con()->query("SELECT * FROM crs_sous_domaine as sdom INNER JOIN crs_domaine as dom ON dom.idDomaine=sdom.idDomaine WHERE dom.idSousDomaine =" . $sdomn . " LIMIT 1");
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
