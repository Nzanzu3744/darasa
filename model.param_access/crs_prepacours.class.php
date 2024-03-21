<?php

include_once('../model.param_access/param_connexion.php');
class crs_prepacours
{
    private static  $idPrepaCours;
    private static $idUtilisateur;
    private static $cours;

    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidCours()
    {
        return self::$idPrepaCours;
    }
    //METHODES
    public static function ajouter($idUtilisateur, $cours, $idSousDom)
    {

        $idut = htmlspecialchars($idUtilisateur);
        $crs = htmlspecialchars($cours);
        $idSousD = htmlspecialchars($idSousDom);

        $req = con()->prepare('INSERT INTO crs_prepacours (`idUtilisateur`, `cours`,idSousDomaine) VALUES (?,?,?)');
        if ($req->execute(array($idut, $crs, $idSousD))) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function rechercherPrepabyIdCrs($idcours)
    {
        $idcrs = htmlspecialchars($idcours);
        return con()->query('SELECT * FROM crs_prepacours as prepcrs INNER JOIN crs_cours as cr ON prepcrs.idPrepaCours=cr.idPrepaCours WHERE cr.idCours=' . $idcrs . ' limit 1');
    }

    public function supprimer($idPrepaCours)
    {
        $idPrepaCours = htmlspecialchars($idPrepaCours);
        if (con()->exec('DELETE FROM `crs_prepacours` WHERE idPrepaCours="' . $idPrepaCours . '"')) {
            self::$idPrepaCours = '';
            return true;
        } else {
            return false;
        }
    }

    public function selectionner()
    {
        return  con()->query('SELECT * FROM crs_prepacours as prepCrs 
        INNER JOIN crs_sous_domaine AS sdom ON prepCrs.idSousDomaine=sdom.idSousDomaine 
        INNER JOIN crs_domaine AS dom ON sdom.idDomaine=dom.idDomaine
        
         ORDER BY dom.idDomaine ASC');
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
