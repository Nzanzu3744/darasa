<?php
include_once('../model.param_access/param_connexion.php');
class dir_directeur
{
    private static  $idDirection;
    private static  $idPromotion;
    private static  $idUtilisateur;
    private static  $idAnneeSco;
    private static  $dateCreation;
    private static  $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //METHODES
    public static function ajouter($idPro, $idU, $ann, $act, $idEcole)
    {
        $idPromo = htmlspecialchars($idPro);
        $idUtil = htmlspecialchars($idU);
        $an = htmlspecialchars($ann);
        $actif = htmlspecialchars($act);
        $idEcol = htmlspecialchars($idEcole);

        $req = con()->prepare('INSERT INTO dir_directeur (idPromotion, idUtilisateur,idAnneeSco, actif, idEcole) VALUES (?,?,?,?,?)');
        if ($req->execute(array($idPromo, $idUtil, $an, $actif, $idEcol))) {

            return true;
        } else {
            return false;
        }
    }
    public static function selectionnerByUtiActif($idUt)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="' . $idUt . '" AND dir.actif=1 ');
    }
    public static function selectionnerByUtiActifEcole($idUt, $idEcole)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="' . $idUt . '" AND dir.actif=1 AND dir.idEcole="' . $idEcole . '" ');
    }
    public static function selectionnerByUtiPromActif($idUt, $pro)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="' . $idUt . '" AND dir.idPromotion="' . $pro . '" AND dir.actif=1 ORDER BY dir.idDirecteur DESC LIMIT 1');
    }
    public static function selectionnerByUti($idUt)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur=' . $idUt . ' ORDER BY dir.idPromotion DESC');
    }

    public static function selectionnerByUtiEcole($idUt, $idEcole)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur=' . $idUt . ' AND dir.idEcole=' . $idEcole . ' ORDER BY dir.idPromotion DESC');
    }


    public static function selectionnerByUtiAnn($idUt, $ann)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur="' . $idUt . '" AND dir.idAnneeSco="' . $ann . '" ORDER BY dir.idPromotion DESC');
    }
    public static function selectionnerByUtiAnnDescLimit($idUt, $ann)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur=' . $idUt . ' AND dir.idAnneeSco="' . $ann . '" ORDER BY dir.idPromotion DESC limit 1');
    }
    public static function selectionnerByUtiDescLimit($idUt)
    {
        return  con()->query('SELECT * FROM  dir_directeur  as dir INNER JOIN org_anneesco as ann ON dir.idAnneeSco=ann.idAnneeSco INNER JOIN org_promotion as pr ON pr.idPromotion=dir.idPromotion INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=dir.idUtilisateur WHERE dir.idUtilisateur=' . $idUt . '" ORDER BY dir.idPromotion DESC limit 1');
    }

    public static function supprimer($id_Dir)
    {
        $id_Dir = htmlspecialchars($id_Dir);
        $reqt = con()->prepare('DELETE FROM dir_directeur WHERE idDirecteur=?');
        try {
            $reqt->execute(array($id_Dir));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
