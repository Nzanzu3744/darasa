<?php
include_once('../model.param_access/param_connexion.php');
class crs_lecon_video
{
    private static  $idLeconVideo;
    private static  $idCours;
    private static $urlVideo;
    private static $titreLeconVideo;
    private static  $idUtilisateur;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidLeconVideo()
    {
        return self::$idLeconVideo;
    }

    public static function getidCours()
    {
        return self::$idCours;
    }
    //METHODES
    public static function ajouter($idCours, $titreL, $urlVideo, $resumeVideo, $iduti)
    {
        $idCrs = htmlspecialchars($idCours);
        $urlVideo = $urlVideo;
        $resumeVideo = htmlspecialchars($resumeVideo);

        $idutil = htmlspecialchars($iduti);
        $titreLeconVideo = htmlspecialchars($titreL);
        $actif = 1;
        $req = con()->prepare('INSERT INTO crs_lecon_video (idCours, titreLeconVideo, urlVideo, resumeVideo, idUtilisateur, actif) VALUES (?,?,?,?,?,?)');
        if ($req->execute(array($idCrs, $titreLeconVideo, $urlVideo, $resumeVideo, $idutil, $actif))) {
            return true;
        } else {
            return false;
        }
    }
    public static function modifier($idLe, $idCours, $titreL, $urlVideo, $idUti)
    {
        $idLeconVideo = htmlspecialchars($idLe);
        $idCrs = htmlspecialchars($idCours);
        $titreLec = htmlspecialchars($titreL);
        $urlVideo = $urlVideo;
        $idUtr = htmlspecialchars($idUti);
        $req = con()->prepare('UPDATE crs_lecon_video SET idCours=?,titreLeconVideo=?,urlVideo=?, idUtilisateur=?  WHERE idLeconVideo=?');
        if ($req->execute(array($idCrs, $titreLec, $urlVideo, $idUtr, $idLeconVideo))) {
            $idLeconVideo = htmlspecialchars($idLeconVideo);
            self::$idCours = htmlspecialchars($idCours);
            self::$urlVideo = $urlVideo;
            self::$titreLeconVideo = htmlspecialchars($titreL);
            // echo true;  
        } else {
            echo false;
        }
    }
    public static function activer($idLe, $val)
    {
        $idLeconVideo = htmlspecialchars($idLe);
        $value = htmlspecialchars($val);
        $req = con()->prepare('UPDATE crs_lecon_video SET actif=? WHERE idLeconVideo=?');
        if ($req->execute(array($value, $idLeconVideo))) {
            self::$actif = $value;
            self::$idLeconVideo = $idLeconVideo;
            echo true;
        } else {
            echo false;
        }
    }
    public static function supprimer($idLeconVideo)
    {
        $idLeconVid = htmlspecialchars($idLeconVideo);
        if (con()->exec('DELETE FROM `crs_lecon_video` WHERE idLeconVideo=' . $idLeconVid)) {

            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_lecon_video ORDER BY idLeconVideo ASC');
    }
    public static function selectionnerByIdCours()
    {
        return  con()->query('SELECT * FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco LIMIT 1');
    }
    public static function selectionnerByIdCoursAll()
    {
        return  con()->query('SELECT * FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco');
    }
    public static function selectionnerByPrepaCoursAll($idPrepaCours)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco  FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE  prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lc.idLeconVideo DESC');
    }
    public static function selectionnerByPrepaCours($idPrepaCours)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco  FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lc.idLeconVideo DESC');
    }
    public static function selectionnerBytitrelC($cours, $titrelc)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE lc.actif=1 AND lc.titreLeconVideo like "%' . $titrelc . '%" AND prepacrs.cours LIKE "%' . $cours . '%" ORDER BY lc.idLeconVideo DESC');
    }

    public static function selectionnerDerByCours($idCrs)
    {
        return  con()->query('SELECT * FROM crs_lecon_video WHERE idCours=' . $idCrs . '  ORDER BY idLeconVideo DESC LIMIT 1');
    }
    public static function selectionnerDerByLec($idlc)
    {
        return  con()->query('SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, 2 as type FROM crs_lecon_video as lc WHERE lc.idLeconVideo=' . $idlc . ' ORDER BY idLeconVideo DESC LIMIT 1');
    }
    public static function selectionnerByCours($idCours)
    {
        return  con()->query('SELECT * FROM (SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours=' . $idCours . ' UNION SELECT lc.actif, lc.idLeconVideo, lc.titreLeconVideo, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon_video` as rl INNER JOIN crs_lecon_video as lc ON rl.idLeconVideo=lc.idLeconVideo INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ') AS lcvisit ORDER BY lcvisit.idLeconVideo ASC');
    }
    public static function selectionnerByCoursActif($idCours)
    {
        return  con()->query('SELECT lc.idLeconVideo, lc.actif, lc.titreLeconVideo, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE cr.idCours=' . $idCours . ' AND lc.actif=1 UNION SELECT lc.idLeconVideo, lc.actif, lc.titreLeconVideo,cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco FROM `crs_reler_lecon_video` as rl INNER JOIN crs_lecon_video as lc ON rl.idLeconVideo=lc.idLeconVideo INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ' AND lc.actif=1');
    }

    public static function getAuteur($idLeconVideo)
    {
        $idLeconVideo = htmlspecialchars($idLeconVideo);
        return con()->query("SELECT idUtilisateur FROM crs_lecon_video WHERE idLeconVideo =" . $idLeconVideo);
    }
    public static function rechercher($idLeconVideo)
    {
        $idLeconVideo = htmlspecialchars($idLeconVideo);
        return con()->query("SELECT * FROM crs_lecon_video WHERE idLeconVideo =" . $idLeconVideo);
    }
    public static function rechercherLeconVidEnr($idCours, $urlVideo, $idUti)
    {
        $idCrs = htmlspecialchars($idCours);
        $urlV = htmlspecialchars($urlVideo);
        $idUt = htmlspecialchars($idUti);
        return con()->query("SELECT * FROM crs_lecon_video WHERE idCours =" . $idCrs . " AND  urlVideo ='" . $urlV . "' AND idUtilisateur =" . $idUt);
    }
    public static function verifVisiteRele($idLeconvd)
    {
        $idLeconV = htmlspecialchars($idLeconvd);
        return con()->query("
        SELECT * FROM (
            SELECT vd.idLeconVideo FROM 	crs_lecon_video as vd INNER JOIN crs_reler_lecon_video as rvd ON rvd.idLeconVideo=vd.idLeconVideo 
            UNION 
            SELECT vd.idLeconVideo FROM 	crs_lecon_video as vd INNER JOIN visite_lecon_video as vvd ON vvd.idLeconVideo=vd.idLeconVideo) as lecon WHERE lecon.idLeconVideo=" . $idLeconV . " limit 1;
        ");
    }

    public static function filtrer($idCours)
    {
        $idCrs = htmlspecialchars($idCours);
        $var = con()->query("SELECT * FROM crs_lecon_video WHERE idCours like '" . $idCrs . "%' ORDER BY idLeconVideo ASC");
        return $var;
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
