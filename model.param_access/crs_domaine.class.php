<?php
include_once('../model.param_access/param_connexion.php');
class crs_domaine
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
    public static function ajouter($domaine)
    {
        $dmne = htmlspecialchars($domaine);
        $req = con()->prepare('INSERT INTO crs_domaine(domaine) VALUES (?)');
        if ($req->execute(array($dmne))) {
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$domaine = htmlspecialchars($dmne);
            return true;
        } else {
            return false;
        }
    }

    public static function modifier($idDomaine, $domaine)
    {
        $idPmt = htmlspecialchars($idDomaine);
        $dmne = htmlspecialchars($domaine);
        if (con()->exec('UPDATE crs_domaine SET domaine = "' . $dmne . '" WHERE idDomaine="' . $idPmt . '"')) {
            self::$idDomaine = htmlspecialchars($idDomaine);
            self::$domaine = htmlspecialchars($domaine);
            return true;
        } else {
            return false;
        }
    }

    public static function supprimer($idDomaine)
    {
        $idPmt = htmlspecialchars($idDomaine);
        if (con()->exec('DELETE FROM crs_domaine WHERE idDomaine="' . $idPmt . '"')) {
            self::$idDomaine = '';
            return true;
        } else {
            return false;
        }
    }
    public static function selectionnerByClass($idClass)
    {
        return  con()->query('SELECT * FROM crs_domaine as dom 
        INNER JOIN crs_sous_domaine as sdom ON dom.idDomaine=sdom.idDomaine
        INNER JOIN crs_prepacours as prepCrs ON prepCrs.idSousDomaine=sdom.idSousDomaine
        INNER JOIN crs_cours as crs ON crs.idPrepaCours=prepCrs.idPrepaCours
        INNER JOIN org_affectation as aff ON crs.idAffectation=aff.idAffectation
        WHERE aff.idClasse=' . $idClass . ' GROUP BY dom.idDomaine');
    }
    //

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_domaine ORDER BY idDomaine ASC');
    }
    //
    public static function rechercher($idDomaine)
    {
        $idPmt = htmlspecialchars($idDomaine);
        return $var = con()->query("SELECT * FROM crs_domaine WHERE idDomaine =" . $idPmt . " LIMIT 1");
    }
    public static function rechercherDer()
    {
        return $var = con()->query("SELECT * FROM crs_domaine ORDER BY idDomaine DESC LIMIT 1");
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
