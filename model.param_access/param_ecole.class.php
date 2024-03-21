<?php
include_once('../model.param_access/param_connexion.php');
class param_ecole
{
    private static  $idEcole;
    private static  $nomEcole;
    private static $idVilleTerritoire;
    private static $adresseEcole;
    private static $idUtilisateur;
    private static $telephoneEcole1;
    private static $telephoneEcole2;
    private static $singleEcole;
    private static $mailEcole;

    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }

    //GETTEURS
    public static function getidEcole()
    {
        return self::$idEcole;
    }
    public static function getEcole()
    {
        return self::$nomEcole;
    }
    //METHODES
    public static function ajouter($nomEcole, $deviseEcole, $idVilleTerritoire, $adresseEcole, $logoEcole, $idUtilisateur, $telephoneEcole1, $telephoneEcole2, $singleEcole, $mailEcole)
    {
        $nomEcole = htmlspecialchars($nomEcole);
        $idUtilisateur = htmlspecialchars($idUtilisateur);
        $deviseEcole = htmlspecialchars($deviseEcole);
        $adresseEcole = htmlspecialchars($adresseEcole);
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        $telephoneEcole1 = htmlspecialchars($telephoneEcole1);
        $telephoneEcole2 = htmlspecialchars($telephoneEcole2);
        $singleEcole = htmlspecialchars($singleEcole);
        $mailEcole  = htmlspecialchars($mailEcole);
        $logoEcole  = htmlspecialchars($logoEcole);




        $req = con()->prepare('INSERT INTO param_ecole (nomEcole,deviseEcole,idVilleTerritoire,adresseEcole,logoEcole,idUtilisateur,telephoneEcole1,telephoneEcole2,singleEcole, mailEcole) VALUES (?,?,?,?,?,?,?,?,?,?)');
        if ($req->execute(array($nomEcole, $deviseEcole, $idVilleTerritoire, $adresseEcole, $logoEcole, $idUtilisateur, $telephoneEcole1, $telephoneEcole2, $singleEcole, $mailEcole))) {
            $ecole =  self::selectionnerDern()->fetch();
            return  $ecole['idEcole'];
        } else {
            return false;
        }
    }

    public function modifier($idEcole, $nomEcole, $deviseEcole, $idVilleTerritoire, $adresseEcole, $telephoneEcole1, $telephoneEcole2, $singleEcole, $mailEcole)
    {
        $idEcole = htmlspecialchars($idEcole);
        $nomEcole = htmlspecialchars($nomEcole);
        $deviseEcole = htmlspecialchars($deviseEcole);
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        $adresseEcole = htmlspecialchars($adresseEcole);
        $telephoneEcole1 = htmlspecialchars($telephoneEcole1);
        $telephoneEcole2 = htmlspecialchars($telephoneEcole2);
        $singleEcole = htmlspecialchars($singleEcole);
        $mailEcole = htmlspecialchars($mailEcole);

        if (con()->exec('UPDATE param_ecole SET nomPays="' . $nomEcole . '", deviseEcole="' . $deviseEcole . '", idVilleTerritoire="' . $idVilleTerritoire . '", adresseEcole="' . $adresseEcole . '", telephoneEcole1="' . $telephoneEcole1 . '", telephoneEcole2="' . $telephoneEcole2 . '", singleEcole="' . $singleEcole . '", mailEcole="' . $mailEcole . '" WHERE idEcole="' . $idEcole . '"')) {
            echo true;
        } else {
            echo false;
        }
    }

    public static function supprimer($idEcole)
    {
        $idEcole = htmlspecialchars($idEcole);
        if (con()->exec('DELETE FROM  param_ecole  WHERE idEcole="' . $idEcole . '"')) {
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM param_ecole');
    }
    public static function selectionnerDern()
    {
        return  con()->query('SELECT * FROM param_ecole ORDER BY idEcole DESC limit 1');
    }
    public static function selectionnerTout()
    {
        return  con()->query('SELECT * FROM `param_ecole` as eco INNER JOIN param_ville_territoire as vt ON eco.idVilleTerritoire=vt.idVilleTerritoire INNER JOIN param_province as pv ON vt.idProvince=pv.idProvince INNER JOIN param_pays as py ON py.idPays=pv.idPays');
    }

    public static function filtrerecolesByRoleUti($idUtil)
    {
        return  con()->query('SELECT * FROM `param_ecole` as eco INNER JOIN param_ville_territoire as vt ON eco.idVilleTerritoire=vt.idVilleTerritoire INNER JOIN param_province as pv ON vt.idProvince=pv.idProvince INNER JOIN param_pays as py ON py.idPays=pv.idPays  INNER JOIN param_groupe as gp ON eco.idEcole=gp.idEcole INNER JOIN param_role as rl ON rl.idGroupe=gp.idGroupe WHERE rl.idUtilisateur="' . $idUtil . '" GROUP BY eco.idEcole ORDER BY eco.idEcole DESC');
    }

    public static function rechercher($idEcole)
    {
        $idEcole = htmlspecialchars($idEcole);
        $var = con()->query('SELECT * FROM `param_ecole` as eco INNER JOIN param_ville_territoire as vt ON eco.idVilleTerritoire=vt.idVilleTerritoire INNER JOIN param_province as pv ON vt.idProvince=pv.idProvince INNER JOIN param_pays as py ON py.idPays=pv.idPays  INNER JOIN param_groupe as gp ON eco.idEcole=gp.idEcole INNER JOIN param_role as rl ON rl.idGroupe=gp.idGroupe WHERE eco.idEcole="' . $idEcole . '" GROUP BY eco.idEcole ORDER BY eco.idEcole DESC');

        return $var;
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
