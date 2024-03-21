<?php
include_once('../model.param_access/param_connexion.php');
class org_affectation
{
    private static  $idAffectation;
    private static $idClasse;
    private static $actif;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidAffectation()
    {
        return self::$idAffectation;
    }
    //METHODES
    public function ajouter($idClasse, $idAnneSco, $idutilisateur, $actif)
    {

        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($idAnneSco);
        $idUtil = htmlspecialchars($idutilisateur);
        $act = htmlspecialchars($actif);


        $req = con()->prepare('INSERT INTO org_affectation (idClasse,idAnneeSco,idUtilisateur,actif) VALUES (?,?,?,?)');
        if ($req->execute(array($idCls, $idAn, $idUtil, $act))) {
            return 1;
        } else {
            return 0;
        }
    }

    public function modifier($idAffectation, $idClasse, $idUtilisateur, $actif)
    {
        $idAffect = htmlspecialchars($idAffectation);
        $idUtil = htmlspecialchars($idUtilisateur);
        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($actif);
        if (con()->exec('UPDATE `org_affectation` SET `idClasse`=' . $idCls . ',`actif`=' . $idAn . ',`idUtilisateur`=' . $idUtil . ' WHERE idAffectation=' . $idAffect)) {
            self::$idAffectation = $idUtil;
            self::$idClasse = $idCls;
            self::$idUtilisateur = $idUtil;
            self::$actif = $idAn;
            return "true";
        } else {
            return "false";
        }
    }

    public function supprimer($idAffectation)
    {
        $idAffect = htmlspecialchars($idAffectation);
        if (con()->exec('DELETE FROM `org_affectation` WHERE idAffectation="' . $idAffect . '"')) {
            self::$idAffectation = '';
            return true;
        } else {
            return false;
        }
    }

    public function selectionner()
    {
        return  con()->query('SELECT * FROM org_affectation ORDER BY idAffectation ASC');
    }

    public function rechercherByUtiCls($idUti, $idCls)
    {
        $idUti = htmlspecialchars($idUti,);
        $idCls = htmlspecialchars($idCls);
        return $var = con()->query("SELECT * FROM org_affectation AS `is` 
        INNER JOIN org_classe AS `cl` ON `is`.`idClasse` = `cl`.`idClasse` 
        INNER JOIN `param_utilisateur` AS `ut` ON `is`.`idUtilisateur` = `ut`.`idUtilisateur` WHERE is.idUtilisateur='" . $idUti . "' AND is.idClasse='" . $idCls . "' AND is.actif=1 ORDER BY is.idAffectation DESC LIMIT 1");
    }
    public function rechercherByUtiClsAnnee($idUti, $idCls, $idAnneeSco)
    {
        $idUti = htmlspecialchars($idUti,);
        $idCls = htmlspecialchars($idCls);
        $idAnnee = htmlspecialchars($idAnneeSco);
        return $var = con()->query("SELECT * FROM org_affectation AS `is` 
        INNER JOIN org_classe AS `cl` ON `is`.`idClasse` = `cl`.`idClasse` 
        INNER JOIN `param_utilisateur` AS `ut` ON `is`.`idUtilisateur` = `ut`.`idUtilisateur` WHERE is.idUtilisateur='" . $idUti . "' AND is.idClasse='" . $idCls . "' AND is.idAnneeSco='" . $idAnnee . "' AND is.actif=1 ORDER BY is.idAffectation DESC LIMIT 1");
    }


    public function filtrerByUti($idUti)
    {
        $idUti = htmlspecialchars($idUti,);
        return con()->query("SELECT*FROM org_affectation AS aff 
        INNER JOIN org_classe AS cls ON aff.idClasse = cls.idClasse 
        INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion INNER JOIN org_anneesco AS ann ON aff.idAnneeSco = ann.idAnneeSco INNER JOIN param_utilisateur AS ut ON aff.idUtilisateur = ut.idUtilisateur WHERE aff.idUtilisateur='" . $idUti . "' ORDER BY aff.idAffectation DESC");
    }
    public function filtrerByUtiEcole($idUti, $idEcole)
    {
        $idUti = htmlspecialchars($idUti,);
        return con()->query("SELECT*FROM org_affectation AS aff 
        INNER JOIN org_classe AS cls ON aff.idClasse = cls.idClasse 
        INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion INNER JOIN org_anneesco AS ann ON aff.idAnneeSco = ann.idAnneeSco INNER JOIN param_utilisateur AS ut ON aff.idUtilisateur = ut.idUtilisateur WHERE aff.idUtilisateur='" . $idUti . "' AND ann.idEcole='" . $idEcole . "' ORDER BY aff.idAffectation DESC");
    }
    public static function rechercherByClAnnee($idCls, $idAnn)
    {
        $idClass = htmlspecialchars($idCls);
        $idAnnee = htmlspecialchars($idAnn);
        return $var = con()->query("SELECT * FROM org_affectation AS afct 
        INNER JOIN org_classe AS cl ON afct .idClasse = cl.idClasse 
        INNER JOIN param_utilisateur AS ut ON afct .idUtilisateur = ut.idUtilisateur 
        INNER JOIN param_genre AS gr ON ut.idGenre = gr.idGenre 
        WHERE afct.idClasse=" . $idClass . " AND afct.idAnneeSco=" . $idAnnee);
    }
    //
    public function rechercher($idAffectation)
    {
        $idAffect = htmlspecialchars($idAffectation);
        return con()->query("SELECT * FROM org_affectation WHERE idAffectation =" . $idAffect);
    }
    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
