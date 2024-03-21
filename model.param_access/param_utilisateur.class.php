<?php
include_once('../model.param_access/param_connexion.php');
include_once("../control.param_access/mes_methodes.php");
class param_utilisateur
{
    private static $idUtilisateur;
    private static $nomUtilisateur;
    private static $postnomUtilisateur;
    private static $prenomUtilisateur;
    private static $idGenre;
    private static $tel;
    private static $mailUtilisateur;
    private static $photoUtilisateur;
    private static $nompere;
    private static $nommere;
    private static $idVilleTerritoire;
    private static $adresse;
    private static $dateNais;
    private static $lieuNais;
    private static $nnCarteEle;
    private static $log;
    private static $pass;
    private static $con;

    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidutilisateur()
    {
        return self::$idUtilisateur;
    }
    public static function ajouter($nomUtilisateur, $postnomUtilisateur, $prenomUtilisateur, $idGenre, $tel, $mailUtilisateur, $photoUtilisateur, $nompere, $nommere, $idVilleTerritoire, $adresse, $dateNais, $lieuNais, $nnCarteEle)
    {

        $nomUt = htmlspecialchars($nomUtilisateur);
        $postnomUt = htmlspecialchars($postnomUtilisateur);
        $prenomUt = htmlspecialchars($prenomUtilisateur);
        $idGenre = htmlspecialchars($idGenre);
        $tel = htmlspecialchars($tel);
        $mailUt = htmlspecialchars($mailUtilisateur);
        $photoUt = htmlspecialchars($photoUtilisateur);
        $nompere = htmlspecialchars($nompere);
        $nommere = htmlspecialchars($nommere);
        $idVilleTerritoire = htmlspecialchars($idVilleTerritoire);
        $adresse = htmlspecialchars($adresse);
        $dateNais = htmlspecialchars($dateNais);
        $lieuNais = htmlspecialchars($lieuNais);
        $nnCarteEle = htmlspecialchars($nnCarteEle);

        $intiallog = initialog($nomUt, $postnomUt, $prenomUt);
        $log =   $intiallog;
        // $pass =   hashagepass($intiallog);
        $pass =  $intiallog;

        $req = con()->prepare('INSERT INTO param_utilisateur(nomUtilisateur, postnomUtilisateur, prenomUtilisateur, idGenre,telUtilisateur, mailUtilisateur, photoUtilisateur,nomPere,nomMere,idVilleTerritoire,adresse,dateNais,lieuNais,nnCarteElect, log, pass) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        if ($req->execute(array($nomUt, $postnomUt, $prenomUt, $idGenre, $tel, $mailUt, $photoUt, $nompere, $nommere, $idVilleTerritoire, $adresse, $dateNais, $lieuNais, $nnCarteEle, $log, $pass))) {
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$nomUtilisateur = $nomUt;
            self::$postnomUtilisateur = $postnomUt;
            self::$prenomUtilisateur = $prenomUtilisateur;
            self::$idGenre = $idGenre;
            self::$tel = $tel;
            self::$mailUtilisateur = $mailUt;
            self::$photoUtilisateur = $photoUt;
            self::$log = $nomUt;
            self::$pass = $nomUt;
            return true;
        } else {
            return false;
        }
    }

    public static function modifier($idUtilisateur, $nomUtilisateur, $postnomUtilisateur, $prenomUtilisateur, $idGenre, $tel, $mailUtilisateur, $photoUtilisateur, $log, $pass)
    {
        $idUt = htmlspecialchars($idUtilisateur);
        $nomUt = htmlspecialchars($nomUtilisateur);
        $postnomUt = htmlspecialchars($postnomUtilisateur);
        $prenomUt = htmlspecialchars($prenomUtilisateur);
        $idGenre = htmlspecialchars($idGenre);
        $tel = htmlspecialchars($tel);
        $mailUt = htmlspecialchars($mailUtilisateur);
        $photoUt = htmlspecialchars($photoUtilisateur);
        $log = htmlspecialchars($log);
        // $pass = htmlspecialchars(hashagepass($pass));
        $pass = htmlspecialchars($pass);
        if (self::$con->exec('UPDATE param_utilisateur SET nomUtilisateur="' . $nomUt . '",postnomUtilisateur="' . $postnomUt . '",prenomUtilisateur="' . $prenomUt . '",telUtilisateur="' . $tel . '",mailUtilisateur="' . $mailUt . '",idGenre="' . $idGenre . '",photoUtilisateur="' . $photoUt . '",log="' . $log . '",pass="' . $pass . '" WHERE idUtilisateur="' . $idUt . '"')) {
            self::$idUtilisateur = htmlspecialchars($idUtilisateur);
            self::$nomUtilisateur = htmlspecialchars($nomUtilisateur);
            self::$postnomUtilisateur = htmlspecialchars($postnomUtilisateur);
            self::$prenomUtilisateur = htmlspecialchars($prenomUtilisateur);
            self::$mailUtilisateur = htmlspecialchars($mailUtilisateur);
            self::$photoUtilisateur = htmlspecialchars($photoUtilisateur);
            self::$log = htmlspecialchars($log);
            self::$pass = htmlspecialchars($pass);
            return true;
        } else {
            return false;
        }
    }
    public static function modifierSP($idUtilisateur, $nomUtilisateur, $postnomUtilisateur, $prenomUtilisateur, $idGenre, $tel, $mailUtilisateur, $log, $pass)
    {
        $idUt = htmlspecialchars($idUtilisateur);
        $nomUt = htmlspecialchars($nomUtilisateur);
        $postnomUt = htmlspecialchars($postnomUtilisateur);
        $prenomUt = htmlspecialchars($prenomUtilisateur);
        $idGenre = htmlspecialchars($idGenre);
        $tel = htmlspecialchars($tel);
        $mailUt = htmlspecialchars($mailUtilisateur);
        $log = htmlspecialchars($log);
        $pass = htmlspecialchars($pass);
        if (self::$con->exec('UPDATE param_utilisateur SET nomUtilisateur="' . $nomUt . '",postnomUtilisateur="' . $postnomUt . '",prenomUtilisateur="' . $prenomUt . '",idGenre="' . $idGenre . '",telUtilisateur="' . $tel . '",mailUtilisateur="' . $mailUt . '",log="' . $log . '",pass="' . $pass . '" WHERE idUtilisateur="' . $idUt . '"')) {
            self::$idUtilisateur = htmlspecialchars($idUtilisateur);
            self::$nomUtilisateur = htmlspecialchars($nomUtilisateur);
            self::$postnomUtilisateur = htmlspecialchars($postnomUtilisateur);
            self::$prenomUtilisateur = htmlspecialchars($prenomUtilisateur);
            self::$mailUtilisateur = htmlspecialchars($mailUtilisateur);
            self::$log = htmlspecialchars($log);
            self::$pass = htmlspecialchars($pass);
            return true;
        } else {
            return false;
        }
    }

    public static function supprimer($idUtilisateur)
    {
        $id = htmlspecialchars($idUtilisateur);
        if (self::$con->exec('DELETE FROM param_utilisateur WHERE idUtilisateur="' . $id . '"')) {
            self::$idUtilisateur = null;
            self::$nomUtilisateur = null;
            self::$postnomUtilisateur = null;
            self::$prenomUtilisateur = null;
            self::$mailUtilisateur = null;
            self::$photoUtilisateur = null;
            self::$log = null;
            self::$pass = null;
            return true;
        } else {
            return false;
        }
    }

    public static function selectionner()
    {
        return con()->query('SELECT * FROM param_utilisateur ORDER BY idUtilisateur DESC');
    }
    public static function selectionnerAdmin()
    {
        return con()->query('SELECT * FROM param_utilisateur WHERE idUtilisateur<=0 ORDER BY idUtilisateur DESC');
    }
    public static function selectionnerByIdGroupeRoleActif($idGroupe)
    {
        return con()->query('SELECT pu.idUtilisateur,pu.nomUtilisateur,pu.postnomUtilisateur,pu.prenomUtilisateur,pu.telUtilisateur,pu.mailUtilisateur,pu.idGenre,pu.photoUtilisateur,pu.dateNais, pr.idRole,pr.idGroupe FROM param_utilisateur as pu LEFT JOIN param_role as pr ON pu.idUtilisateur=pr.idUtilisateur LEFT JOIN param_groupe as pg ON pr.idGroupe=pg.idGroupe WHERE pr.actifRole=1 AND pg.idGroupe=' . $idGroupe . ' ORDER BY pu.idUtilisateur DESC');
    }

    public static function selectionnerByIdGroupeRoleActifUtil($idGroupe, $idUtili)
    {
        return con()->query('SELECT pu.idUtilisateur,pu.nomUtilisateur,pu.postnomUtilisateur,pu.prenomUtilisateur,pu.telUtilisateur,pu.mailUtilisateur,pu.idGenre,pu.photoUtilisateur,pu.dateNais,pu.log,pu.pass, pr.idRole,pr.idGroupe FROM param_utilisateur as pu LEFT JOIN param_role as pr ON pu.idUtilisateur=pr.idUtilisateur LEFT JOIN param_groupe as pg ON pr.idGroupe=pg.idGroupe WHERE pr.actifRole=1 AND pg.idGroupe=' . $idGroupe . ' AND pu.idUtilisateur=' . $idUtili . ' ORDER BY pu.idUtilisateur DESC');
    }

    public static function selectionnerDsc()
    {
        $var =  con()->query('SELECT * FROM param_utilisateur ORDER BY idUtilisateur DESC LIMIT 1');
        foreach ($var as $sel) {
            self::$idUtilisateur = $sel['idUtilisateur'];
            self::$nomUtilisateur = $sel['nomUtilisateur'];
            self::$postnomUtilisateur = $sel['postnomUtilisateur'];
            self::$prenomUtilisateur = $sel['prenomUtilisateur'];
            self::$mailUtilisateur = $sel['mailUtilisateur'];
            self::$photoUtilisateur = $sel['photoUtilisateur'];
            self::$log = $sel['log'];
            self::$pass = $sel['pass'];
        }
        return $var;
    }
    public static function selectionnerUtByCrs($crs)
    {
        return  self::$con->query('SELECT ut.idutilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.photoUtilisateur, gr.genre  FROM param_utilisateur as ut LEFT JOIN org_affectation as aff ON aff.idUtilisateur=ut.idUtilisateur  LEFT JOIN param_genre as gr ON ut.idGenre=gr.IdGenre INNER JOIN crs_cours as crs ON aff.idAffectation=crs.idAffectation WHERE crs.idCours=' . $crs);
    }

    public static function rechercher($idUtilisateur)
    {
        $idUtil = htmlspecialchars($idUtilisateur);
        $var = self::$con->query("SELECT * FROM param_utilisateur WHERE idUtilisateur =" . $idUtil);
        return $var->fetch();
    }
    public static function filtrer_id($idUtilisateur)
    {
        $idUtil = htmlspecialchars($idUtilisateur);
        return con()->query("SELECT * FROM param_utilisateur WHERE idUtilisateur ='" . $idUtil . "'");
    }
    public static function filtrer_id_ecole($idUtilisateur, $idecol)
    {
        $idUtil = htmlspecialchars($idUtilisateur);
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE ut.idUtilisateur ='" . $idUtil . "' AND pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }

    public static function filtrer_eleve_ecole($idecol)
    {
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }
    public static function log($lg, $ps)
    {

        $lg = htmlspecialchars($lg);
        // $psa = htmlspecialchars(hashagepass($ps));
        $psa = htmlspecialchars($ps);
        $var = self::$con->query('SELECT * FROM param_utilisateur as ut LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE log="' . $lg . '"AND pass="' . $psa . '"AND actif=1');
        return $var->fetch();
    }

    public static function filtrer_nom($nomUtilisateur)
    {
        $nomUtilisateur = htmlspecialchars($nomUtilisateur);
        return self::$con->query("SELECT * FROM param_utilisateur WHERE nomUtilisateur like '%" . $nomUtilisateur . "%' ORDER BY nomUtilisateur ASC");
    }
    public static function filtrer_nom_ecole($nomUtilisateur, $idecol)
    {
        $nomUtil = htmlspecialchars($nomUtilisateur);
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE ut.nomUtilisateur LIKE '%" . $nomUtil . "%' AND pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }
    public static function filtrer_postnom($postnomUtilisateur)
    {
        $postnomUtilisateur = htmlspecialchars($postnomUtilisateur);
        return self::$con->query("SELECT * FROM param_utilisateur WHERE postnomUtilisateur like '%" . $postnomUtilisateur . "%' ORDER BY postnomUtilisateur ASC");
    }
    public static function filtrer_postnom_ecole($postnomUtilisateur, $idecol)
    {
        $nomUtil = htmlspecialchars($postnomUtilisateur);
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE ut.postnomUtilisateur LIKE '%" . $nomUtil . "%' AND pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }
    public static function filtrer_prenom($prenomUtilisateur)
    {
        $prenomUtilisateur = htmlspecialchars($prenomUtilisateur);
        return self::$con->query("SELECT * FROM param_utilisateur WHERE prenomUtilisateur like '%" . $prenomUtilisateur . "%' ORDER BY prenomUtilisateur ASC");
    }
    public static function filtrer_prenom_ecole($prenomUtilisateur, $idecol)
    {
        $nomUtil = htmlspecialchars($prenomUtilisateur);
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE ut.postnomUtilisateur LIKE '%" . $nomUtil . "%' AND pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }
    public static function filtrer_tous($rehe)
    {
        $reh = htmlspecialchars($rehe);
        return self::$con->query("SELECT * FROM param_utilisateur WHERE idUtilisateur='" . $reh . "' OR nomUtilisateur like '%" . $reh . "%' OR postnomUtilisateur like '%" . $reh . "%' OR prenomUtilisateur like '%" . $reh . "%' ORDER BY nomUtilisateur ASC");
    }
    public static function filtrer_tous_ecole($rehe, $idecol)
    {
        $reh = htmlspecialchars($rehe);
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT * FROM (SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur,
        pg.idEcole FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE ut.idUtilisateur='" . $reh . "' OR ut.nomUtilisateur like '%" . $reh . "%' OR ut.postnomUtilisateur like '%" . $reh . "%' OR ut.prenomUtilisateur like '%" . $reh . "%' ) as sel WHERE sel.idEcole=" . $idecole . " GROUP BY sel.idUtilisateur");
    }
    public static function rechercherlarge($idUtili)
    {
        $idUtil = htmlspecialchars($idUtili);

        return con()->query("SELECT ut.idUtilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, gr.genre, ut.photoUtilisateur, ut.log, ut.pass, ut.dateNais, ut.lieuNais, ut.idVilleTerritoire, ut.adresse, ut.nnCarteElect, ut.nomPere, ut.nomMere, vt.nomVilleTerritoire, pv.nomProvince, py.nomPays, py.codePays FROM param_utilisateur AS ut 
        INNER JOIN param_genre AS gr ON ut.idGenre = gr.idGenre 
        INNER JOIN param_ville_territoire as vt ON ut.idVilleTerritoire=vt.idVilleTerritoire
        INNER JOIN param_province as pv ON vt.idProvince=pv.idProvince
        INNER JOIN param_pays as py ON py.idPays=pv.idPays
        WHERE ut.idUtilisateur=" . $idUtil);
    }
    public static function  filtrer_non_ecole($idecol)
    {
        $idecole = htmlspecialchars($idecol);
        return con()->query("SELECT 
        ut.idUtilisateur,
        ut.nomUtilisateur,
        ut.postnomUtilisateur,
        ut.prenomUtilisateur,
        ut.telUtilisateur,
        ut.photoUtilisateur,
        ut.mailUtilisateur FROM param_utilisateur as ut INNER JOIN param_role as pr ON ut.idUtilisateur=pr.idUtilisateur  INNER JOIN param_groupe as pg ON pg.idGroupe=pr.idGroupe  WHERE pg.idEcole='" . $idecole . "' GROUP BY ut.idUtilisateur");
    }
    public function __destuct()
    {
    }
}
