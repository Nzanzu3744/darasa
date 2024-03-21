<?php
include_once('../model.param_access/param_connexion.php');
class crs_lecon
{
    private static  $idLecon;
    private static  $idCours;
    private static $lecon;
    private static $titreLecon;
    private static  $idUtilisateur;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidLecon()
    {
        return self::$idLecon;
    }
    public static function getidCours()
    {
        return self::$idCours;
    }
    //METHODES
    public static function ajouter($idCours, $titreL, $lecon, $iduti)
    {
        $idCrs = htmlspecialchars($idCours);
        $lecon = $lecon;

        $idutil = htmlspecialchars($iduti);
        $titreLecon = htmlspecialchars($titreL);
        $actif = 1;
        $req = con()->prepare('INSERT INTO crs_lecon (idCours, titreLecon, lecon, idUtilisateur, actif) VALUES (?,?,?,?,?)');
        if ($req->execute(array($idCrs, $titreLecon, $lecon, $idutil, $actif))) {
            self::$idCours = $idCours;
            self::$lecon = $lecon;
            self::$idUtilisateur = $idutil;
            self::$actif = $actif;
            $lc = new crs_lecon();
            $lc = $lc->selectionnerDerByCours($idCrs);
            foreach ($lc as $selc) {
                return $selc['idLecon'];
            }
        } else {
            return false;
        }
    }

    public static function modifier($idLe, $idCours, $titreL, $lecon, $idUti)
    {
        $idLecon = htmlspecialchars($idLe);
        $idCrs = htmlspecialchars($idCours);
        $titreLec = htmlspecialchars($titreL);
        $lecon = $lecon;
        $idUtr = htmlspecialchars($idUti);
        $req = con()->prepare('UPDATE crs_lecon SET idCours=?,titreLecon=?,lecon=?, idUtilisateur=?  WHERE idLecon=?');
        if ($req->execute(array($idCrs, $titreLec, $lecon, $idUtr, $idLecon))) {
            $idLecon = htmlspecialchars($idLecon);
            self::$idCours = htmlspecialchars($idCours);
            self::$lecon = $lecon;
            self::$titreLecon = htmlspecialchars($titreL);
            // echo true;  
        } else {
            echo false;
        }
    }
    public static function activer($idLe, $val)
    {
        $idLecon = htmlspecialchars($idLe);
        $value = htmlspecialchars($val);
        $req = con()->prepare('UPDATE crs_lecon SET actif=? WHERE idLecon=?');
        if ($req->execute(array($value, $idLecon))) {
            self::$actif = $value;
            self::$idLecon = $idLecon;
            echo true;
        } else {
            echo false;
        }
    }
    public static function supprimer($idLecon)
    {
        $idLecon = htmlspecialchars($idLecon);
        if (con()->exec('DELETE FROM `crs_lecon` WHERE idLecon="' . $idLecon . '"')) {
            self::$idLecon = '';
            self::$lecon = "";
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_lecon ORDER BY idLecon ASC');
    }
    public static function selectionnerByIdCours()
    {
        return  con()->query('SELECT * FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco LIMIT 1');
    }
    public static function selectionnerByIdCoursAll()
    {
        return  con()->query('SELECT *  FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco');
    }
    public static function selectionnerByPrepaCoursAll($idPrepaCours)
    {
        return  con()->query('  SELECT * FROM (
            SELECT lc.actif, lc.idLecon, lc.titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type  FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconVideo as idLecon,  lc.titreLeconVideo as titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type  FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconPdf as idLecon, lc.titreLeconPdf as titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type  FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco) as lcg  WHERE lcg.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lcg.idLecon DESC');
    }
    public static function selectionnerByPrepaCours($idPrepaCours)
    {
        return  con()->query('
        SELECT * FROM (
            SELECT lc.actif, lc.idLecon, lc.titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type  FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconVideo as idLecon,  lc.titreLeconVideo as titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type  FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconPdf as idLecon, lc.titreLeconPdf as titreLecon, prepacrs.cours, prepacrs.idPrepaCours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type  FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco) as lcg  WHERE lcg.actif=1 AND lcg.idPrepaCours = ' . $idPrepaCours . ' ORDER BY lcg.idLecon DESC');
    }
    public static function selectionnerBytlecoIdPrep($idPrepcours, $titreLecon)
    {
        return  con()->query('
         SELECT * FROM (
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLecon, lc.titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_reler_lecon` as rl INNER JOIN crs_lecon as lc ON rl.idLecon=lc.idLecon INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_reler_lecon_video` as rl INNER JOIN crs_lecon_video as lc ON rl.idLeconVideo=lc.idLeconVideo INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco 
            UNION
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT prepacrs.idPrepaCours, prepacrs.cours,lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_reler_lecon_pdf` as rl INNER JOIN crs_lecon_pdf as lc ON rl.idLeconPdf=lc.idLeconPdf INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
        ) AS lcg WHERE lcg.actif=1 AND lcg.titreLecon like "%' . $titreLecon . '%" AND lcg.idPrepaCours =' . $idPrepcours . ' ORDER BY lcg.idLecon DESC');
    }

    public static function selectionnerDerByCours($idCrs)
    {
        return  con()->query('SELECT * FROM crs_lecon WHERE idCours=' . $idCrs . '  ORDER BY idLecon DESC LIMIT 1');
    }
    public static function selectionnerDerByLec($idlc)
    {
        return  con()->query('SELECT lc.actif, lc.idLecon, lc.titreLecon, 1 as type FROM crs_lecon as lc WHERE lc.idLecon=' . $idlc . ' ORDER BY lc.idLecon DESC LIMIT 1');
    }
    public static function selectionnerByCours($idCours)
    {
        return  con()->query('
        SELECT * FROM (
            SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLecon, lc.titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_reler_lecon` as rl INNER JOIN crs_lecon as lc ON rl.idLecon=lc.idLecon INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_reler_lecon_video` as rl INNER JOIN crs_lecon_video as lc ON rl.idLeconVideo=lc.idLeconVideo INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco 
            UNION
            SELECT lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_reler_lecon_pdf` as rl INNER JOIN crs_lecon_pdf as lc ON rl.idLeconPdf=lc.idLeconPdf INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
        ) AS lcvisit WHERE lcvisit.idCours=' . $idCours . ' ORDER BY lcvisit.idLecon DESC');
    }

    public static function selectionnerByCoursActif($idCours)
    {
        return  con()->query('
        SELECT * FROM (
            SELECT lc.actif, lc.idLecon, lc.titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLecon, lc.titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 1 as type FROM `crs_reler_lecon` as rl INNER JOIN crs_lecon as lc ON rl.idLecon=lc.idLecon INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION
            SELECT lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_lecon_video` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLeconVideo as idLecon , lc.titreLeconVideo as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 2 as type FROM `crs_reler_lecon_video` as rl INNER JOIN crs_lecon_video as lc ON rl.idLeconVideo=lc.idLeconVideo INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco 
            UNION
            SELECT lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_lecon_pdf` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
            UNION 
            SELECT lc.actif, lc.idLeconPdf as idLecon , lc.titreLeconPdf as titreLecon, rl.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco, 3 as type FROM `crs_reler_lecon_pdf` as rl INNER JOIN crs_lecon_pdf as lc ON rl.idLeconPdf=lc.idLeconPdf INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco
        ) AS lcvisit WHERE lcvisit.actif=1 AND lcvisit.idCours=' . $idCours . ' ORDER BY lcvisit.idLecon DESC');
    }
    public static function getAuteur($idLecon)
    {
        $idLecon = htmlspecialchars($idLecon);
        return con()->query("SELECT idUtilisateur FROM crs_lecon WHERE idLecon =" . $idLecon);
    }
    public static function rechercher($idLecon)
    {
        $idLecon = htmlspecialchars($idLecon);
        $var = con()->query("SELECT * FROM crs_lecon WHERE idLecon =" . $idLecon);
        return $var;
    }
    public static function rechercherId($idLecon)
    {
        return  con()->query('SELECT lc.actif, lc.idLecon, lc.titreLecon, prepacrs.cours, cr.idCours,uti.nomUtilisateur,uti.postnomUtilisateur, uti.prenomUtilisateur,an.anneeSco,lc.lecon, cr.url FROM `crs_lecon` as lc INNER JOIN crs_cours as cr ON lc.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE   lc.idLecon =' . $idLecon . ' limit 1');
    }
    public static function filtrer($idCours)
    {
        $idCrs = htmlspecialchars($idCours);
        $var = con()->query("SELECT * FROM crs_lecon WHERE idCours like '" . $idCrs . "%' ORDER BY idLecon ASC");
        return $var;
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
