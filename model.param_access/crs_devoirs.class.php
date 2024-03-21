<?php
include_once('../model.param_access/param_connexion.php');
class crs_devoirs
{
    private static  $idDevoir;
    private static $idCours;
    private static $idPeriode;
    private static $dateCreation;
    private static $dateRemise;
    private static $description;
    private static $actif;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidDevoir()
    {
        return self::$idDevoir;
    }
    //METHODES
    public function ajouter($idCours, $idPer, $dateRemise, $idx, $idUt, $typedev, $ponderation)
    {
        $idCrs = htmlspecialchars($idCours);
        $idPer2 = htmlspecialchars($idPer);
        $dtRms = htmlspecialchars($dateRemise);
        $idx = htmlspecialchars($idx);
        $idUt1 = htmlspecialchars($idUt);
        $typedev = htmlspecialchars($typedev);
        $pond = htmlspecialchars($ponderation);
        if (con()->exec('INSERT INTO crs_devoirs (idCours, idPeriode, dateRemise, indexation, idUtilisateur, typedev, ponderation) VALUES ("' . $idCrs . '","' . $idPer2 . '","' . $dtRms . '","' . $idx . '","' . $idUt1 . '","' . $typedev . '","' . $pond . '")')) {
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idCours = $idCrs;
            self::$idPeriode = $idPer2;
            self::$dateRemise = $dtRms;
            self::$description = $idx;

            $dvoir = new crs_devoirs();
            $dvoir = $dvoir->selectionnerByIdCoursIdUtil($idCrs, $idUt1);
            foreach ($dvoir as $seld) {
                return $seld['idDevoir'];
            }
        } else {
            return null;
        }
    }
    public static function selectionnerByCours($idCours)
    {

        return  con()->query('SELECT dv.idDevoir, dv.actif, dv.typedev, dv.ponderation, dv.dateCreation, dv.idPeriode, dv.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.idCours=' . $idCours . ' UNION SELECT dv.idDevoir,dv.actif,dv.typedev, dv.ponderation,dv.dateCreation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours);
    }
    public static function selectionnerByCoursType_1($idCours)
    {

        return  con()->query('SELECT dv.idDevoir, dv.actif, dv.typedev, dv.ponderation, dv.dateCreation, dv.idPeriode, dv.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE  dv.idCours=' . $idCours . ' UNION SELECT dv.idDevoir,dv.actif,dv.typedev, dv.ponderation,dv.dateCreation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE  rl.idCours=' . $idCours);
    }

    public static function selectionnerByCoursCal($idCours)
    {
        return  con()->exec('SELECT * FROM (SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.idPeriode, dv.dateRemise,  prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.idCours=' . $idCours . ' UNION SELECT dv.idDevoir,dv.actif, dv.dateCreation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ') AS dev ORDER BY dev.idDevoir ASC');
    }
    public static function selectionnerByCoursPeriode($idP02, $idCours)
    {
        return  con()->query('SELECT * FROM (SELECT dv.idDevoir, dv.typedev, dv.actif, dv.dateCreation, dv.ponderation, dv.idPeriode, dv.dateRemise,  prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.idCours=' . $idCours . ' AND dv.idPeriode=' . $idP02 . ' UNION SELECT dv.idDevoir,dv.typedev,dv.actif, dv.dateCreation,  dv.ponderation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ' AND rl.idPeriode=' . $idP02 . ') AS dev ORDER BY dev.idDevoir ASC');
    }
    public static function selectionnerByCoursGroupePeriode($idGroupeP, $idCours)
    {
        return  con()->query('SELECT * FROM (SELECT dv.idDevoir, dv.typedev, dv.actif,dv.dateCreation, dv.ponderation, dv.idPeriode, dv.dateRemise,  prepacrs.cours,an.anneeSco,dv.indexation,gp.idGroupePeriode, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN org_periode as pd ON pd.idPeriode=dv.idPeriode  INNER JOIN param_groupe_periode as gp ON gp.idGroupePeriode=pd.idGroupePeriode INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.idCours=' . $idCours . ' AND gp.idGroupePeriode=' . $idGroupeP . ' UNION SELECT dv.idDevoir,dv.typedev,dv.actif, dv.dateCreation,  dv.ponderation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation,gp.idGroupePeriode, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur  FROM `crs_reler_devoir` as rl INNER JOIN org_periode as pd ON pd.idPeriode=rl.idPeriode  INNER JOIN param_groupe_periode as gp ON gp.idGroupePeriode=pd.idGroupePeriode INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE rl.idCours=' . $idCours . ' AND gp.idGroupePeriode=' . $idGroupeP . ') AS dev ORDER BY dev.idDevoir ASC');
    }
    public static function selectionnerByIdCoursActif($idCours)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.dateRemise, dv.idPeriode,  prepacrs.cours, an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE  dv.actif=1 AND dv.idCours=' . $idCours . ' UNION SELECT dv.idDevoir,dv.actif, dv.dateCreation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.actif=1 AND rl.idCours=' . $idCours);
    }
    public static function selectionnerByIdCoursActiftypedev($idCours)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif,dv.typedev, dv.dateCreation, dv.dateRemise, dv.idPeriode,  prepacrs.cours, an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.typedev=1 AND dv.actif=1 AND dv.idCours=' . $idCours . ' UNION SELECT dv.idDevoir,dv.actif,dv.typedev, dv.dateCreation, rl.idPeriode, rl.dateRemise, prepacrs.cours,an.anneeSco,dv.indexation, rl.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_reler_devoir` as rl INNER JOIN crs_devoirs as dv ON rl.idDevoir=dv.idDevoir INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.typedev=1 AND dv.actif=1 AND rl.idCours=' . $idCours);
    }
    public static function selectionnerByIdCoursIdUtil($idCours, $idUt)
    {
        return  con()->query('SELECT * FROM `crs_devoirs`as dv INNER JOIN crs_cours AS cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours WHERE dv.idUtilisateur=' . $idUt . ' AND dv.idCours=' . $idCours . ' ORDER BY dv.idDevoir DESC LIMIT 1');
    }

    public static function selectionnerDerByIdCours($idCours)
    {
        return  con()->query('SELECT * FROM `crs_devoirs`as dv INNER JOIN crs_cours AS cr ON dv.idCours=cr.idCours WHERE dv.idCours=' . $idCours . ' ORDER BY dv.idDevoir DESC LIMIT 1');
    }

    public static function activer($idDv, $val)
    {
        $idDevoir = htmlspecialchars($idDv);
        $actif = htmlspecialchars($val);
        $req = con()->prepare('UPDATE crs_devoirs SET actif=? WHERE idDevoir=?');
        if ($req->execute(array($actif, $idDevoir))) {
            self::$actif = $actif;
            self::$idDevoir = $idDevoir;
            echo true;
        } else {
            echo false;
        }
    }

    // ID AFFECTATION DOIT ETRE AJOUTE !!!!!!!ICI BAS
    public function modifier($idDevoir, $idCours, $dateCreation, $dateRemise, $descri)
    {
        $idDvr = htmlspecialchars($idDevoir);
        $dtRms = htmlspecialchars($dateRemise);
        $idCrs = htmlspecialchars($idCours);
        $dtCrea = htmlspecialchars($dateCreation);
        $desc = htmlspecialchars($descri);
        if (con()->exec('UPDATE crs_devoirs SET idCours=' . $idCrs . ',dateCreation="' . $dtCrea . '",dateRemise="' . $dtRms . '", description="' . $desc . '" WHERE idDevoir=' . $idCrs)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function supprimer($idDevoir)
    {
        $idDvs = htmlspecialchars($idDevoir);
        if (con()->exec('DELETE FROM `crs_devoirs` WHERE idDevoir="' . $idDvs . '"')) {
            self::$idDevoir = '';
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return  con()->query('SELECT * FROM crs_devoirs ORDER BY idDevoir ASC');
    }
    public static function selectionnerDerByDevoir($idDevoir)
    {
        return  con()->query('SELECT * FROM crs_devoirs WHERE idDevoir=' . $idDevoir . ' ORDER BY idDevoir DESC LIMIT 1');
    }
    public static function selectionnerBytitreDev($cours, $idx)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.dateRemise,  prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.typedev=1 AND  dv.indexation like "%' . $idx . '%" AND prepacrs.cours LIKE "%' . $cours . '%" ORDER BY dv.idDevoir DESC');
    }
    public static function selectionnerByPrepaCours($idPrepaCours)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.dateRemise,  prepacrs.cours, an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.actif=1 AND  prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY dv.idDevoir DESC');
    }
    public static function selectionnerByPrepaCoursTyper($idPrepaCours)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.dateRemise,  prepacrs.cours, an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE dv.typedev=1 AND dv.actif=1 AND  prepacrs.idPrepaCours = ' . $idPrepaCours . ' ORDER BY dv.idDevoir DESC');
    }
    public static function selectionnerByPrepaCoursAll($idPrepaCours)
    {
        return  con()->query('SELECT dv.idDevoir,dv.actif, dv.dateCreation, dv.dateRemise,  prepacrs.cours,an.anneeSco,dv.indexation, dv.idCours, uti.nomUtilisateur, uti.postnomUtilisateur, uti.prenomUtilisateur FROM `crs_devoirs` as dv INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours  INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours INNER JOIN org_affectation as aff ON aff.idAffectation=cr.idAffectation INNER JOIN param_utilisateur as uti ON uti.idUtilisateur=aff.idUtilisateur INNER JOIN org_anneesco as an ON an.idAnneeSco=cr.idAnneeSco WHERE   prepacrs.idPrepaCours =' . $idPrepaCours . ' ORDER BY dv.idDevoir DESC');
    }


    public static function remisC($idDevoir, $idUtil)
    {
        return  con()->query('SELECT dv.idDevoir,repc.idUtilisateur FROM crs_devoirs as dv LEFT JOIN crs_question as qst ON dv.idDevoir=qst.idDevoir LEFT JOIN crs_assertion as ass ON qst.idQuestion = ass.idQuestion LEFT JOIN crs_reponsec as repc ON ass.idAssertion=repc.idAssertion WHERE dv.idDevoir=317 and repc.idReponse=9 LIMIT 1');
    }
    public static function remisT($idDevoir, $idUtil)
    {
        return  con()->query(' SELECT dv.idDevoir,rept.idUtilisateur FROM crs_devoirs as dv LEFT JOIN crs_question as qst ON dv.idDevoir=qst.idDevoir LEFT JOIN crs_reponset as rept ON qst.idQuestion=rept.idQuestion WHERE dv.idDevoir=317 AND rept.idReponse=9 LIMIT 1');
    }
    //
    public static function rechercherr($idDevoir)
    {
        $idDvs = htmlspecialchars($idDevoir);
        return con()->query(" SELECT * FROM crs_devoirs as dv  INNER JOIN crs_cours as cr ON dv.idCours=cr.idCours INNER JOIN crs_prepacours as prepacrs ON prepacrs.idPrepaCours=cr.idPrepaCours WHERE idDevoir ='" . $idDvs . "'");
    }
    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
