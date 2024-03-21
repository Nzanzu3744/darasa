<?php
include_once('../model.param_access/param_connexion.php');
class crs_lecon_pdf
{
    private static  $idLeconPdf;
    private static  $idCours;
    private static $urlPdf;
    private static $titreLeconPdf;
    private static  $idUtilisateur;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidLeconPdf()
    {
        return self::$idLeconPdf;
    }

    public static function getidCours()
    {
        return self::$idCours;
    }
    //METHODES
    public static function ajouter($idCours, $titreL, $urlPdf, $resumePdf, $iduti)
    {
        $idCrs = htmlspecialchars($idCours);
        $urlPdf = $urlPdf;
        $resumePdf = htmlspecialchars($resumePdf);

        $idutil = htmlspecialchars($iduti);
        $titreLeconPdf = htmlspecialchars($titreL);
        $actif = 1;
        $req = con()->prepare('INSERT INTO crs_lecon_pdf (idCours, titreLeconPdf, urlPdf, resumePdf, idUtilisateur, actif) VALUES (?,?,?,?,?,?)');
        if ($req->execute(array($idCrs, $titreLeconPdf, $urlPdf, $resumePdf, $idutil, $actif))) {
            return true;
        } else {
            return false;
        }
    }
    public static function modifier($idLe, $idCours, $titreL, $urlPdf, $idUti)
    {
        $idLeconPdf = htmlspecialchars($idLe);
        $idCrs = htmlspecialchars($idCours);
        $titreLec = htmlspecialchars($titreL);
        $urlPdf = $urlPdf;
        $idUtr = htmlspecialchars($idUti);
        $req = con()->prepare('UPDATE crs_lecon_pdf SET idCours=?,titreLeconPdf=?,urlPdf=?, idUtilisateur=?  WHERE idLeconPdf=?');
        if ($req->execute(array($idCrs, $titreLec, $urlPdf, $idUtr, $idLeconPdf))) {
            $idLeconPdf = htmlspecialchars($idLeconPdf);
            self::$idCours = htmlspecialchars($idCours);
            self::$urlPdf = $urlPdf;
            self::$titreLeconPdf = htmlspecialchars($titreL);
        } else {
            echo false;
        }
    }
    public static function activer($idLe, $val)
    {
        $idLeconPdf = htmlspecialchars($idLe);
        $value = htmlspecialchars($val);
        $req = con()->prepare('UPDATE crs_lecon_pdf SET actif=? WHERE idLeconPdf=?');
        if ($req->execute(array($value, $idLeconPdf))) {
            self::$actif = $value;
            self::$idLeconPdf = $idLeconPdf;
            echo true;
        } else {
            echo false;
        }
    }
    public static function supprimer($idLeconPdf)
    {
        $idLeconVid = htmlspecialchars($idLeconPdf);
        if (con()->exec('DELETE FROM `crs_lecon_pdf` WHERE idLeconPdf=' . $idLeconVid)) {

            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_lecon_pdf ORDER BY idLeconPdf ASC');
    }
    public static function selectionnerByIdCours()
    {
        return  con()->query('SELECT * FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco LIMIT 1');
    }
    public static function selectionnerByIdCoursAll()
    {
        return  con()->query('SELECT * FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco');
    }
    public static function selectionnerByPrepaCoursAll($idPrepaCours)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconPdf, lc.titreLeconPdf, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco  FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE  prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lc.idLeconPdf DESC');
    }
    public static function selectionnerByPrepaCours($idPrepaCours)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconPdf, lc.titreLeconPdf, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco  FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lc.idLeconPdf DESC');
    }
    public static function selectionnerBytitrelC($cours, $titrelc)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconPdf, lc.titreLeconPdf, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND lc.titreLeconPdf like "%' . $titrelc . '%" AND prepacrs.cours LIKE "%' . $cours . '%" ORDER BY lc.idLeconPdf DESC');
    }

    public static function selectionnerDerByCours($idCrs)
    {
        return  con()->query('SELECT * FROM crs_lecon_pdf WHERE idCours=' . $idCrs . '  ORDER BY idLeconPdf DESC LIMIT 1');
    }
    public static function selectionnerDerByLec($idlc)
    {
        return  con()->query('SELECT  lc.actif, lc.idLeconPdf, lc.titreLeconPdf, 3 as typee FROM crs_lecon_pdf as lc  WHERE lc.idLeconPdf=' . $idlc . ' ORDER BY lc.idLeconPdf DESC LIMIT 1');
    }
    public static function selectionnerByCours($idCours)
    {
        return  con()->query('SELECT * FROM (SELECT lc.actif, lc.idLeconPdf, lc.titreLeconPdf, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours=' . $idCours . ' UNION SELECT lc.actif, lc.idLeconPdf, lc.titreLeconPdf, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon_Pdf` as rl INNER JOIN crs_lecon_pdf as lc ON rl.idLeconPdf=lc.idLeconPdf INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ') AS lcvisit ORDER BY lcvisit.idLeconPdf ASC');
    }
    public static function selectionnerByCoursActif($idCours)
    {
        return  con()->query('SELECT lc.idLeconPdf, lc.actif, lc.titreLeconPdf, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours=' . $idCours . ' AND lc.actif=1 UNION SELECT lc.idLeconPdf, lc.actif, lc.titreLeconPdf,cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon_Pdf` as rl INNER JOIN crs_lecon_pdf as lc ON rl.idLeconPdf=lc.idLeconPdf INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ' AND lc.actif=1');
    }
    public static function verifVisiteRele($idLeconPDF)
    {
        $idLeconpdf = htmlspecialchars($idLeconPDF);
        return con()->query("
        SELECT * FROM (
            SELECT pdf.idLeconPdf FROM 	crs_lecon_pdf as pdf INNER JOIN crs_reler_lecon_pdf as rpdf ON rpdf.idLeconPdf=pdf.idLeconPdf 
            UNION 
            SELECT pdf.idLeconPdf FROM 	crs_lecon_pdf as pdf INNER JOIN visite_lecon_pdf as vpdf ON vpdf.idLeconPdf=pdf.idLeconPdf) as lecon    where    lecon.idLeconPdf=" . $idLeconpdf . " limit 1;
        ");
    }
    public static function getAuteur($idLeconPdf)
    {
        $idLeconPdf = htmlspecialchars($idLeconPdf);
        return con()->query("SELECT idUtilisateur FROM crs_lecon_pdf WHERE idLeconPdf =" . $idLeconPdf);
    }
    public static function rechercher($idLeconPdf)
    {
        $idLeconPdf = htmlspecialchars($idLeconPdf);
        return con()->query("SELECT * FROM crs_lecon_pdf WHERE idLeconPdf =" . $idLeconPdf);
    }
    public static function rechercherLeconVidEnr($idCours, $urlPdf, $idUti)
    {
        $idCrs = htmlspecialchars($idCours);
        $urlV = htmlspecialchars($urlPdf);
        $idUt = htmlspecialchars($idUti);
        return con()->query("SELECT * FROM crs_lecon_pdf WHERE idCours =" . $idCrs . " AND  urlPdf ='" . $urlV . "' AND idUtilisateur =" . $idUt);
    }
    public static function filtrer($idCours)
    {
        $idCrs = htmlspecialchars($idCours);
        $var = con()->query("SELECT * FROM crs_lecon_pdf WHERE idCours like '" . $idCrs . "%' ORDER BY idLeconPdf ASC");
        return $var;
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
