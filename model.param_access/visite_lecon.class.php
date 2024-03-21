<?php
include_once('../model.param_access/param_connexion.php');
class visite_lecon
{
    private static  $idVisiteLecon;
    private static  $idLecon;
    private static  $idCours;
    private static  $idUtilisateur;
    private static  $idInscription;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct()
    {
        return self::$con = con();
    }
    //GETTEURS
    public static function getidVisiteLecon()
    {
        return self::$idVisiteLecon;
    }
    public static function getidLecon()
    {
        return self::$idLecon;
    }
    //METHODES
    public static function ajouter($idLecon, $idCours, $iduti, $inscri)
    {
        $idLecn = htmlspecialchars($idLecon);
        $idCours = htmlspecialchars($idCours);
        $idutil = htmlspecialchars($iduti);
        include_once('../model.param_access/crs_lecon.class.php');
        $editeur = crs_lecon::getAuteur($idLecon)->fetch();

        if ($_SESSION['idUtilisateur'] != $editeur['idUtilisateur']) {

            if (self::estvue($idLecon, $inscri, $idutil) == false) {
                $req = con()->prepare('INSERT INTO visite_lecon (idLecon,idCours,idUtilisateur,idInscription) VALUES (?,?,?,?)');
                if ($req->execute(array($idLecn, $idCours, $idutil, $inscri))) {
                } else {
                    echo 'ECHEC AJOUT VUE ';
                }
            }
        }
    }
    //ici
    public static function estvue($idLecon, $inscri, $idUti)
    {
        $vue = con()->query('SELECT idVisiteLecon FROM `visite_lecon` as vlc WHERE vlc.idLecon=' . $idLecon . ' AND vlc.idUtilisateur=' . $idUti . ' AND vlc.idInscription=' . $inscri);
        if ($vue->fetch() != null) {
            return true;
        } else {
            return false;
        }
    }
    public static function vues($idLecon, $idCours, $type, $idClasse)
    {
        return con()->query('
        SELECT * FROM (
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLecon, vlc.idCours, 1 as type, ins.idInscription  FROM visite_lecon as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
        UNION 
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLeconVideo as idLecon, vlc.idCours, 2 as type, ins.idInscription  FROM visite_lecon_video as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
        UNION 
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLeconPdf as idLecon, vlc.idCours, 3 as type,ins.idInscription FROM visite_lecon_pdf as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
        ) AS gsel  WHERE gsel.idClasse="' . $idClasse . '" AND gsel.idLecon="' . $idLecon . '" AND gsel.idCours="' . $idCours . '" AND gsel.type="' . $type . '" GROUP BY gsel.idUtilisateur ASC');
    }

    public static function vuesByIns($idLecon, $idCours, $type, $idClasse, $insc)
    {
        return con()->query('
        SELECT * FROM (
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLecon, vlc.idCours, 1 as type, ins.idInscription FROM `visite_lecon` as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
        UNION 
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLeconVideo as idLecon, vlc.idCours, 2 as type,ins.idInscription FROM `visite_lecon_video` as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
            UNION 
            SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, ins.idClasse,vlc.idLeconPdf as idLecon, vlc.idCours, 3 as type,ins.idInscription FROM `visite_lecon_pdf` as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur
            )

        AS gsel  WHERE gsel.idClasse="' . $idClasse . '" AND gsel.idLecon="' . $idLecon . '" AND gsel.idCours="' . $idCours . '" AND gsel.type="' . $type . '" AND gsel.idInscription="' . $insc . '" GROUP BY gsel.idUtilisateur ASC');
    }
    public static function visiteToutEleve($idClasse, $idCours)
    {
        return con()->query('SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.photoUtilisateur, ut.prenomUtilisateur FROM `visite_lecon` as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur  WHERE ins.idClasse="' . $idClasse . '" AND vlc.idCours="' . $idCours . '" GROUP BY vlc.idUtilisateur');
    }
    public static function visiteUtilCours($idUt, $idCours, $idClasse)
    {
        return con()->query('SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, vlc.idLecon FROM `visite_lecon` as vlc INNER JOIN org_inscription as ins ON ins.idInscription = vlc.idInscription  INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur WHERE vlc.idUtilisateur=' . $idUt . ' AND vlc.idCours=' . $idCours . ' AND ins.idClasse=' . $idClasse . ' ORDER BY vlc.idLecon ASC');
    }

    //DESTRUCTEUR
    public function __destuct()
    {
    }
}
