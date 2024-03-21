<?php
include_once('../model.param_access/param_connexion.php');
class org_inscription
{

    private static  $idInscription;
    private static $idClasse;
    private static $idAnneesco;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        self::$con = con();
    }
    //GETTEURS
    public static function getidInscription()
    {
        return self::$idInscription;
    }
    //METHODES
    public static function ajouter($idClasse, $idAnneesco, $idutilisateur)
    {

        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($idAnneesco);
        $idUtil = htmlspecialchars($idutilisateur);
        $actif = 1;
        $req = con()->prepare('INSERT INTO org_inscription (idClasse, idAnneeSco, idUtilisateur, actif) VALUES (?,?,?,?)');
        if ($req->execute(array($idCls, $idAn, $idUtil, $actif))) {
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idAnneesco = htmlspecialchars($idAn);
            self::$idClasse = htmlspecialchars($idCls);
            self::$idUtilisateur = htmlspecialchars($idUtil);
            return 1;
        } else {
            return 0;
        }
    }

    public static function modifier($idInscription, $idClasse, $idAnneesco, $idUtilisateur)
    {
        $idIns = htmlspecialchars($idInscription);
        $idUtil = htmlspecialchars($idUtilisateur);
        $idCls = htmlspecialchars($idClasse);
        $idAn = htmlspecialchars($idAnneesco);
        if (self::$con->exec('UPDATE `org_inscription` SET `idClasse`=' . $idCls . ',`idAnneeSco`=' . $idAn . ',`idUtilisateur`=' . $idUtil . ' WHERE idInscription=' . $idIns)) {
            self::$idInscription = $idUtil;
            self::$idClasse = $idCls;
            self::$idUtilisateur = $idUtil;
            self::$idAnneesco = $idAn;
            return "true";
        } else {
            return "false";
        }
    }


    public static function supprimer($idInscription)
    {
        $idIns = htmlspecialchars($idInscription);
        $reqt = con()->prepare('DELETE FROM org_inscription WHERE idInscription=?');
        try {
            $reqt->execute(array($idIns));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public static function selectionner()
    {
        return  self::$con->query('SELECT * FROM org_inscription ORDER BY idInscription ASC');
    }
    //
    public static function rechercher($idInscription)
    {
        $idIns = htmlspecialchars($idInscription);
        return $var = self::$con->query("SELECT * FROM org_inscription WHERE idInscription =" . $idIns);
    }
    public static function rechercherByUti($idInscription)
    {
        $idIns = htmlspecialchars($idInscription);
        return con()->query(" SELECT*FROM org_inscription AS inscr 
        INNER JOIN org_classe AS cls ON inscr.idClasse = cls.idClasse 
        INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion INNER JOIN org_anneesco AS ann ON inscr.idAnneeSco = ann.idAnneeSco INNER JOIN param_utilisateur AS ut ON inscr.idUtilisateur = ut.idUtilisateur WHERE inscr.idUtilisateur=" . $idIns);
    }
    public static function rechercheInscription($idEcole, $idUtile)
    {
        $idEco = htmlspecialchars($idEcole);
        $idEle = htmlspecialchars($idUtile);
        return con()->query(" SELECT*FROM org_inscription AS inscr 
        INNER JOIN org_classe AS cls ON inscr.idClasse = cls.idClasse 
        INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion INNER JOIN org_anneesco AS ann ON inscr.idAnneeSco = ann.idAnneeSco INNER JOIN param_utilisateur AS ut ON inscr.idUtilisateur = ut.idUtilisateur  WHERE inscr.idUtilisateur=" . $idEle . " AND cls.idEcole=" . $idEco);
    }

    public static function rechercherByClAnnee($idCls, $idAnn)
    {
        $idClass = htmlspecialchars($idCls);
        $idAnnee = htmlspecialchars($idAnn);
        return con()->query("SELECT * FROM org_inscription AS isc 
        INNER JOIN org_classe AS cl ON isc .idClasse = cl.idClasse 
        INNER JOIN param_utilisateur AS ut ON isc .idUtilisateur = ut.idUtilisateur 
        INNER JOIN param_genre AS gr ON ut.idGenre = gr.idGenre 
        WHERE isc.idClasse=" . $idClass . " AND isc.idAnneeSco=" . $idAnnee . " ORDER BY ut.nomUtilisateur ASC");
    }
    public static function rechercherByClAnneeEleve($idCls, $idAnn, $idUtili)
    {
        $idUtil = htmlspecialchars($idUtili);
        $idClass = htmlspecialchars($idCls);
        $idAnnee = htmlspecialchars($idAnn);
        return con()->query("SELECT ut.idUtilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, gr.genre, ut.photoUtilisateur, ut.log, ut.pass, isc.idInscription, isc.actif, isc.dateCreation, ut.dateNais, ut.lieuNais, ut.idVilleTerritoire, ut.adresse, ut.nnCarteElect, ut.nomPere, ut.nomMere, vt.nomVilleTerritoire, pv.nomProvince, py.nomPays, py.codePays, cl.idEcole, unt.unite,sti.section,prm.promotion,anneeSco  FROM org_inscription AS isc 
        INNER JOIN org_anneesco AS ann ON isc .idAnneeSco = ann.idAnneeSco
        INNER JOIN org_classe AS cl ON isc .idClasse = cl.idClasse 
        INNER JOIN org_unite AS unt ON unt.idUnite=cl.idUnite
        INNER JOIN org_section AS sti ON sti.idSection = unt.idSection
        INNER JOIN org_promotion AS prm ON prm.idPromotion = sti.idPromotion
        INNER JOIN param_utilisateur AS ut ON isc .idUtilisateur = ut.idUtilisateur 
        INNER JOIN param_genre AS gr ON ut.idGenre = gr.idGenre 
        INNER JOIN param_ville_territoire as vt ON ut.idVilleTerritoire=vt.idVilleTerritoire
        INNER JOIN param_province as pv ON vt.idProvince=pv.idProvince
        INNER JOIN param_pays as py ON py.idPays=pv.idPays
        WHERE isc.idClasse=" . $idClass . " AND isc.idAnneeSco=" . $idAnnee . " AND ut.idUtilisateur=" . $idUtil);
    }
    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
