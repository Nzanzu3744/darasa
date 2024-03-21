<?php
include_once('../model.param_access/param_connexion.php');
class param_role
{
    private static  $idRole;
    private static $idGroupe;
    private static $idUtilisateur;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidrole()
    {
        return self::$idRole;
    }
    //METHODES
    public static function ajouter($idGroupe, $idutilisateur)
    {
        $idGrp = htmlspecialchars($idGroupe);
        $idUtil = htmlspecialchars($idutilisateur);
        $req = con()->prepare('INSERT INTO param_role(idGroupe, idUtilisateur) VALUES (?,?)');
        if ($req->execute(array($idGrp, $idUtil))) {
            return 1;
        } else {
            return 0;
        }
    }
    public function desactiverPrecRlEcole($idUtilisateur, $idEcole)
    {
        $idUtil = htmlspecialchars($idUtilisateur);
        $idEcol = htmlspecialchars($idEcole);

        if (self::$con->exec('UPDATE param_role as rl  INNER JOIN param_groupe as gp ON rl.idGroupe=gp.idGroupe  SET rl.actifRole=0 WHERE rl.idUtilisateur =' . $idUtil . ' AND gp.idEcole=' . $idEcol)) {
            return true;
        } else {
            return false;
        }
    }




    public function supprimer($idRole)
    {
        $idRl = htmlspecialchars($idRole);
        if (self::$con->exec('DELETE FROM param_role WHERE idRole="' . $idRl . '"')) {
            self::$idRole = '';
            return true;
        } else {
            return false;
        }
    }

    public function selectionner()
    {
        return  self::$con->query('SELECT * FROM param_role ORDER BY idRole ASC');
    }
    public static function selectionnerDerRoleUti($idUti)
    {
        return  self::$con->query('SELECT * FROM param_role WHERE actifRole=1 AND idUtilisateur=' . $idUti . ' ORDER BY idRole DESC LIMIT 1');
    }

    // 
    public static function selectionnerDerRoleByGroupe($idgrp)
    {
        return  self::$con->query('SELECT * FROM param_role WHERE actifRole=1 AND idGroupe=' . $idgrp . ' ORDER BY idRole DESC LIMIT 1');
    }


    public static function selectionnerDerRoleByUtilEcole($idEcole, $idUtil)
    {
        return  self::$con->query('SELECT rl.idRole,rl.actifRole,rl.idGroupe, gp.groupe,gp.idEcole,	rl.idUtilisateur FROM param_role as rl INNER JOIN param_groupe as gp ON rl.idGroupe=gp.idGroupe WHERE rl.actifRole=1 AND gp.idEcole=' . $idEcole . ' AND rl.idUtilisateur=' . $idUtil . ' ORDER BY idRole DESC LIMIT 1');
    }
    //selectionnerDerRoleByGroupeEcole
    public function rechercher($idRole)
    {
        $idRl = htmlspecialchars($idRole);
        return $var = self::$con->query("SELECT * FROM param_role WHERE idRole =" . $idRl . " ORDER BY idRole ASC");
    }
    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
