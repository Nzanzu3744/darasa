<?php
include_once('../model.param_access/param_connexion.php');

class param_groupe
{
    private static  $idGroupe;
    private static  $groupe;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidgroupe()
    {
        return self::$idGroupe;
    }
    public static function getgroupe()
    {
        return self::$groupe;
    }
    //METHODES
    public static function ajouter($groupe, $idEcole, $premier)
    {
        $idUti = $_SESSION['idUtilisateur'];
        $grpe = htmlspecialchars($groupe);

        $req = con()->prepare('INSERT INTO param_groupe (idGroupe,groupe,idEcole,idUtilisateur) VALUES (?,?,?,?)');
        $grp = new param_groupe();
        if ($premier == false) {

            $groupe = $grp->selectioneerDerEnreg()->fetch();
            $idGroupe = $groupe['idGroupe'] + 1;

            if ($req->execute(array($idGroupe, $grpe, $idEcole, $idUti))) {

                include_once('param_table.class.php');
                include_once('param_permission.class.php');
                $tble = new param_table();
                $tble = $tble->selectionner();
                $nomTable = $tble->fetchAll();
                $ajouter = '0';
                $modifier = '0';
                $afficher = '0';
                $sup = '0';
                $pms = new param_permission();
                foreach ($nomTable as $selTble) {
                    $pms->ajouter($selTble['nomTable'], $idGroupe, $ajouter, $modifier, $afficher, $sup);
                }
                return $idGroupe;
            } else {
                return false;
            }
        } else {

            $groupe = $grp->selectioneerPremEnreg()->fetch();
            $idGroupe = $groupe['idGroupe'] - 1;

            if ($req->execute(array($idGroupe, $grpe, $idEcole, $idUti))) {

                include_once('param_table.class.php');
                include_once('param_permission.class.php');
                include_once('../model.param_access/param_role.class.php');

                $tble = new param_table();
                $tble = $tble->selectionner();
                $nomTable = $tble->fetchAll();
                $ajouter = '1';
                $modifier = '1';
                $afficher = '1';
                $sup = '1';
                $pms = new param_permission();
                foreach ($nomTable as $selTble) {
                    $pms->ajouter($selTble['nomTable'], $idGroupe, $ajouter, $modifier, $afficher, $sup);
                }

                $role = new param_role();
                $role->ajouter($idGroupe, 0);

                return $idGroupe;
            } else {
                return false;
            }
        }
    }

    public static  function modifier($idGroupe, $groupe)
    {
        $idGp = htmlspecialchars($idGroupe);
        $grpe = htmlspecialchars($groupe);
        if (con()->exec('UPDATE param_groupe SET groupe="' . $grpe . '"WHERE idGroupe="' . $idGp . '"')) {
            self::$groupe = htmlspecialchars($groupe);
            echo true;
        } else {
            echo false;
        }
    }

    public static  function supprimer($idGroupe)
    {
        $idGp = htmlspecialchars($idGroupe);
        if (con()->exec('DELETE FROM param_groupe WHERE idGroupe="' . $idGp . '"')) {
            include_once('param_permission.class.php');

            $permi = new param_permission();
            if ($permi->supprimer_permi_groupe($idGp)) {
                self::$idGroupe = '';
                return true;
            } else {
                return false;
            };
        } else {
            return false;
        }
    }

    public static  function selectionner()
    {
        return  con()->query('SELECT * FROM param_groupe ORDER BY idGroupe ASC');
    }
    public static  function selectionnerByEcole($idEcole)
    {
        return  con()->query('SELECT * FROM param_groupe WHERE idEcole="' . $idEcole . '" ORDER BY idGroupe ASC');
    }
    public static function selectionDerRolActif($idUtil, $idEcole)
    {
        return  con()->query('SELECT * FROM param_groupe as pg LEFT JOIN param_role as pr ON pg.idGroupe=pr.idGroupe LEFT JOIN param_utilisateur as pu ON pr.idUtilisateur=pu.idUtilisateur  WHERE pr.actifRole=1 AND pu.idUtilisateur=' . $idUtil . ' AND idEcole="' . $idEcole . '"  ORDER BY pr.idRole DESC LIMIT 1');
    }
    public static function selectionRole($idUtil, $idEcole)
    {
        return  con()->query('SELECT * FROM param_groupe as pg LEFT JOIN param_role as pr ON pg.idGroupe=pr.idGroupe LEFT JOIN param_utilisateur as pu ON pr.idUtilisateur=pu.idUtilisateur  WHERE pu.idUtilisateur=' . $idUtil . ' AND idEcole="' . $idEcole . '"  ORDER BY pr.idRole DESC');
    }
    public static function selectioneerDerEnreg()
    {
        return  con()->query('SELECT idGroupe FROM param_groupe ORDER BY idGroupe DESC LIMIT 1');
    }

    public static function selectioneerPremEnreg()
    {
        return  con()->query('SELECT idGroupe FROM param_groupe ORDER BY idGroupe ASC LIMIT 1');
    }
    public static  function rechercher($idGroupe)
    {
        $idGp = htmlspecialchars($idGroupe);
        return  con()->query("SELECT * FROM param_groupe WHERE idGroupe ='" . $idGp . "' ORDER BY idGroupe ASC");
    }
    public static  function filtrer($groupe)
    {
        $gpe = htmlspecialchars($groupe);
        return con()->query("SELECT * FROM param_groupe WHERE groupe like '" . $gpe . "%' ORDER BY idGroupe ASC");
    }
    //DESTRUCTEUR
    public static  function __destuct()
    {
    }
}
