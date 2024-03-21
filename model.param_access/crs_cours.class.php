<?php

include_once('../model.param_access/param_connexion.php');
class crs_cours
{
    private static  $idCours;
    private static $idAffectation;
    private static $idAnneesco;
    private static $idPrepaCours;
    private static $url;
    private static $ponderation;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidCours()
    {
        return self::$idCours;
    }
    //METHODES
    public static function ajouter($idAffectation, $idAnneesco, $idPrepaCours, $url, $ponde, $comt)
    {

        $idAft = htmlspecialchars($idAffectation);
        $idAn = htmlspecialchars($idAnneesco);
        $idPrepaCours = htmlspecialchars($idPrepaCours);
        $url1 = htmlspecialchars($url);
        $ponderation1 = htmlspecialchars($ponde);
        $comnt = htmlspecialchars($comt);
        $req = con()->prepare('INSERT INTO crs_cours (`idAffectation`, `idAnneeSco`, `idPrepaCours`, `url`,ponderation, `commentaire`) VALUES (?,?,?,?,?,?)');
        if ($req->execute(array($idAft, $idAn, $idPrepaCours, $url1, $ponderation1, $comnt))) {
            self::$idAnneesco = $idAn;
            self::$idAffectation = $idAft;
            self::$idPrepaCours = $idPrepaCours;
            self::$url = $url1;
            self::$ponderation = $ponderation1;
            self::$commentaire = $comnt;
            return 1;
        } else {
            return 0;
        }
    }

    public static function modifier($idCours, $idAffectation, $idAnneesco, $idPrepaCours, $ponde)
    {
        $idCrs = htmlspecialchars($idCours);
        $idPrepaCours = htmlspecialchars($idPrepaCours);
        $idAff = htmlspecialchars($idAffectation);
        $idAn = htmlspecialchars($idAnneesco);
        $ponderation = htmlspecialchars($ponde);
        if (con()->exec('UPDATE crs_cours SET idAffectation=' . $idAff . ',idAnneeSco=' . $idAn . ',ponderation=' . $ponderation . ',cours="' . $idPrepaCours . '" WHERE idCours=' . $idCrs)) {
            self::$idCours = $idCrs;
            self::$idAffectation = $idAff;
            self::$idPrepaCours = $idPrepaCours;
            self::$idAnneesco = $idAn;
            return "true";
        } else {
            return "false";
        }
    }
    public static function supprimer($idCours)
    {
        $idCrs = htmlspecialchars($idCours);
        try {
            if (con()->exec('DELETE FROM `crs_cours` WHERE idCours="' . $idCrs . '"')) {
                self::$idCours = '';
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            include_once('../control.param_access/mes_methodes.php');
            echec_controleur('(:<) Suppresion échouée Il existe de traveau lieu à ce cours');
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_cours as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours ORDER BY ponderation DESC');
    }
    public static function selectionnerCrsByUtClsAnn($idUt, $cls, $idAn)
    {
        return  con()->query('
        SELECT * FROM (SELECT crs.idCours, af.idUtilisateur,af.idClasse, crs.idAnneeSco, crs.ponderation, prepaCrs.idPrepaCours, prepaCrs.cours, crs.url, crs.commentaire, ut.nomUtilisateur, ut.postnomUtilisateur , ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM `crs_cours` as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as ut ON ut.idUtilisateur=af.idUtilisateur

        UNION 

        SELECT crs.idCours, coa.idUtilisateur, coa.idClasse, crs.idAnneeSco, crs.ponderation,prepaCrs.idPrepaCours, prepaCrs.cours, crs.url, crs.commentaire, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM crs_co_animation as coa INNER JOIN crs_cours as crs ON coa.idCours=crs.idCours INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as af ON af.idAffectation=crs.idAffectation INNER JOIN param_utilisateur as ut ON af.idUtilisateur=ut.idUtilisateur) AS sel WHERE sel.idUtilisateur=' . $idUt . ' AND sel.idAnneeSco=' . $idAn . ' AND sel.idClasse=' . $cls . ' GROUP BY sel.idCours ORDER BY sel.ponderation ASC
        ');
    }
    public static function selectionnerCrsByClsAnn($cls, $ann)
    {
        return  con()->query('SELECT * FROM `crs_cours`  as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours LEFT JOIN org_affectation as af ON crs.idAffectation=af.idAffectation LEFT JOIN param_utilisateur as ut ON ut.idUtilisateur=af.idUtilisateur WHERE crs.idAnneeSco=' . $ann . ' AND af.idClasse=' . $cls . ' ORDER BY crs.ponderation ASC');
    }

    public static function selectionnerCrsEleveByCls($cls, $ann)
    {
        return  con()->query('SELECT * FROM `crs_cours`  as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=af.idUtilisateur  INNER JOIN org_classe as cls ON cls.idClasse=af.idClasse WHERE af.idAnneeSco=' . $ann . ' AND af.idClasse=' . $cls . ' ORDER BY crs.ponderation ASC');
    }
    public static function selectionnerCrsEleveByClsAnnDom($cls, $ann, $idsDom)
    {
        return  con()->query('SELECT * FROM `crs_cours`  as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as af ON crs.idAffectation=af.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=af.idUtilisateur  INNER JOIN org_classe as cls ON cls.idClasse=af.idClasse WHERE af.idAnneeSco=' . $ann . ' AND af.idClasse=' . $cls . ' AND prepaCrs.idSousDomaine=' . $idsDom . ' ORDER BY prepaCrs.cours ASC');
    }

    //
    public static function rechercher($idCours)
    {
        $idCrs1 = htmlspecialchars($idCours);
        return con()->query('SELECT * FROM crs_cours as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=crs.idAffectation  INNER JOIN param_utilisateur as ut ON aff.idUtilisateur=ut.idUtilisateur WHERE crs.idCours ="' . $idCrs1 . '" ORDER BY crs.ponderation ASC');
    }
    public static function rechercherPrepa($idPrepaCours, $idClasse, $idAnneeSco)
    {
        $idPrepaCours = htmlspecialchars($idPrepaCours);
        return con()->query('SELECT * FROM crs_cours as crs INNER JOIN crs_prepacours as prepaCrs ON crs.idPrepaCours=prepaCrs.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=crs.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur WHERE crs.idPrepaCours ="' . $idPrepaCours . '"  AND aff.idClasse="' . $idClasse . '" AND crs.idAnneeSco="' . $idAnneeSco . '" ORDER BY crs.ponderation ASC');
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
