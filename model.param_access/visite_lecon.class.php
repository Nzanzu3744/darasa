<?php
include_once('param_connexion.php');
class visite_lecon {
    private static  $idVisiteLecon;
    private static  $idLecon;
    private static  $idUtilisateur;
    private static $dateCreation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidVisiteLecon(){
        return self::$idVisiteLecon;
    }
    public static function getidLecon(){
        return self::$idLecon;
    }
    //METHODES
    public static function ajouter($idLecon,$iduti)
    {
        $idLecn=htmlspecialchars($idLecon);
        $idutil=htmlspecialchars($iduti);
        include_once('../model.param_access/crs_lecon.class.php');
        $editeur= new crs_lecon();
        $editeur=$editeur->getAuteur($idLecon)->fetch();

        if($_SESSION['idUtilisateur']!=$editeur['idUtilisateur']){
            $vue= new visite_lecon();
            $vue=$vue->estvue($idLecon, $idutil);
            if($vue==false){
                  $req=self::$con->prepare('INSERT INTO visite_lecon (idLecon,idUtilisateur) VALUES (?,?)');
                    if($req->execute(array($idLecn,$idutil))){
                        self::$idLecon=$idLecn;
                        self::$idUtilisateur=$idutil;               
                    }else{
                        return 'ECHEC AJOUT VUE ';
                    }  
            }
        }
    }
   
    public static function estvue($idLecon, $idUti){
        $vue = self::$con->query('SELECT idVisiteLecon FROM `visite_lecon` as vlc WHERE vlc.idLecon='.$idLecon.' AND vlc.idUtilisateur='.$idUti);
        if($vue->fetch()!=null){
            return true; 
        }else {
            return false;
        }
           
    }
    public static function vues($idLecon){
        return $vue = self::$con->query('SELECT * FROM `visite_lecon` as vlc INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur WHERE vlc.idLecon='.$idLecon);           
    }
    public static function visiLecteurAll(){
        return $vue = self::$con->query('SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, vlc.idVisiteLecon,lcs.idLecon,crs.idCours  FROM `visite_lecon` as vlc INNER JOIN crs_lecon as lcs ON lcs.idLecon=vlc.idLecon INNER JOIN crs_cours as crs ON lcs.idCours=crs.idCours INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur GROUP BY ut.idUtilisateur UNION SELECT ut.idUtilisateur, ut.nomUtilisateur,ut.postnomUtilisateur, ut.prenomUtilisateur, vlc.idVisiteLecon,lcs.idLecon,crs.idCours  FROM `visite_lecon` as vlc INNER JOIN `crs_reler_lecon` as rl ON vlc.idLecon= rl.idLecon INNER JOIN crs_lecon as lcs ON rl.idLecon=lcs.idLecon INNER JOIN crs_cours as crs ON lcs.idCours=crs.idCours INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur GROUP BY ut.idUtilisateur');           
    }
    public static function vueVisiLecteurUtilCours($idUt,$idCours){
        return $vue = self::$con->query('SELECT ut.idUtilisateur, ut.nomUtilisateur, ut.prenomUtilisateur, vlc.idVisiteLecon,lcs.idLecon,crs.idCours  FROM `visite_lecon` as vlc INNER JOIN crs_lecon as lcs ON lcs.idLecon=vlc.idLecon INNER JOIN crs_cours as crs ON lcs.idCours=crs.idCours INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur WHERE vlc.idUtilisateur='.$idUt.' AND lcs.idCours="'.$idCours.'"UNION SELECT ut.idUtilisateur, ut.nomUtilisateur, ut.prenomUtilisateur, vlc.idVisiteLecon,lcs.idLecon,crs.idCours FROM `visite_lecon` as vlc INNER JOIN `crs_reler_lecon` as rl ON vlc.idLecon= rl.idLecon INNER JOIN crs_lecon as lcs ON rl.idLecon=lcs.idLecon INNER JOIN crs_cours as crs ON lcs.idCours=crs.idCours INNER JOIN param_utilisateur as ut ON vlc.idUtilisateur = ut.idUtilisateur WHERE vlc.idUtilisateur='.$idUt.' AND lcs.idCours="'.$idCours.'" GROUP BY ut.idUtilisateur');           
    }

    //DESTRUCTEUR
    public function __destuct(){
    }
}


