<?php
include_once('param_connexion.php');
class param_utilisateur {
    private static  $idUtilisateur;
    private static  $nomUtilisateur;
    private static  $postnomUtilisateur;
    private static  $prenomUtilisateur;
    private static  $mailUtilisateur;
    private static  $photoUtilisateur;
    private static  $log;
    private static  $pass;
    private static $con;
 
    public function __construct(){
        self::$idUtilisateur='';
        self::$nomUtilisateur='';
        self:: $postnomUtilisateur='';
        self:: $prenomUtilisateur='';
        self:: $mailUtilisateur='';
        self:: $photoUtilisateur='';
        self:: $log='';
        self:: $pass='';
        self::$con=con();
    }
    //GETTEURS
    public static function getidutilisateur(){
        return self::$idUtilisateur;
    }
    public static function ajouter($nomUtilisateur,$postnomUtilisateur, $prenomUtilisateur,$mailUtilisateur,$photoUtilisateur)
    {

        $nomUt=htmlspecialchars($nomUtilisateur);
        $postnomUt=htmlspecialchars($postnomUtilisateur);
        $prenomUt=htmlspecialchars($prenomUtilisateur);
        $mailUt=htmlspecialchars($mailUtilisateur);
        $photoUt=htmlspecialchars($photoUtilisateur);
        $log=$nomUtilisateur;
        $pass=$nomUtilisateur;
        $req=self::$con->prepare('INSERT INTO `param_utilisateur`(`nomUtilisateur`, `postnomUtilisateur`, `prenomUtilisateur`, `mailUtilisateur`, `photoUtilisateur`, `log`, `pass`) VALUES (?,?,?,?,?,?,?)');
        if($req->execute(array($nomUt,$postnomUt,$prenomUt,$mailUt,$photoUt,$log,$pass))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$nomUtilisateur=htmlspecialchars($nomUtilisateur);
            self::$postnomUtilisateur=htmlspecialchars($postnomUtilisateur);
            self::$prenomUtilisateur=htmlspecialchars($prenomUtilisateur);
            self::$mailUtilisateur=htmlspecialchars($mailUtilisateur);
            self::$photoUtilisateur=htmlspecialchars($photoUtilisateur);
            self::$log=self::$nomUtilisateur;
            self::$pass=self::$nomUtilisateur;
            return true;
        }else{
            return false;
        }

    }
    
    public static function modifier($idUtilisateur,$nomUtilisateur,$postnomUtilisateur, $prenomUtilisateur,$mailUtilisateur,$photoUtilisateur,$log,$pass)
    {
        $idUt=htmlspecialchars($idUtilisateur);
        $nomUt=htmlspecialchars($nomUtilisateur);
        $postnomUt=htmlspecialchars($postnomUtilisateur);
        $prenomUt=htmlspecialchars($prenomUtilisateur);
        $mailUt=htmlspecialchars($mailUtilisateur);
        $photoUt=htmlspecialchars($photoUtilisateur);
        $log=htmlspecialchars($log);
        $pass=htmlspecialchars($pass);
            if(self::$con->exec('UPDATE param_utilisateur SET nomUtilisateur="'.$nomUt.'",postnomUtilisateur="'.self::$postnomUt.'",prenomUtilisateur="'.$prenomUt.'",mailUtilisateur="'.$mailUt.'",photoUtilisateur="'.$photoUt.'",log="'.$log.'",pass="'.$pass.'"WHERE idUtilisateur="'.$idUt.'"'))
            {
                self::$idUtilisateur=htmlspecialchars($idUtilisateur);
                self::$nomUtilisateur=htmlspecialchars($nomUtilisateur);
                self::$postnomUtilisateur=htmlspecialchars($postnomUtilisateur);
                self::$prenomUtilisateur=htmlspecialchars($prenomUtilisateur);
                self::$mailUtilisateur=htmlspecialchars($mailUtilisateur);
                self::$photoUtilisateur=htmlspecialchars($photoUtilisateur);
                self::$log=htmlspecialchars($log);
                self::$pass=htmlspecialchars($pass);
                echo true;
            }else{
                echo false;
            }
    }
   
    public static function supprimer($idUtilisateur){
        $id = htmlspecialchars($idUtilisateur);
        if(self::$con->exec('DELETE FROM `param_utilisateur` WHERE idUtilisateur="'.$id.'"')){
            self::$idUtilisateur=null;
            self::$nomUtilisateur=null;
            self:: $postnomUtilisateur=null;
            self:: $prenomUtilisateur=null;
            self:: $mailUtilisateur=null;
            self:: $photoUtilisateur=null;
            self:: $log=null;
            self:: $pass=null;
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM param_utilisateur ORDER BY idUtilisateur DESC');
    }
   
    public static function selectionnerByIdGroupe($idGroupe){
        return  self::$con->query('SELECT * FROM param_utilisateur as pu LEFT JOIN param_role as pr ON pu.idUtilisateur=pr.idUtilisateur LEFT JOIN param_groupe as pg ON pr.idGroupe=pg.idGroupe WHERE pg.idGroupe='.$idGroupe.' ORDER BY pu.idUtilisateur DESC');
    }
    public static function selectionnerByIdGroupeRoleActif($idGroupe){
        return  self::$con->query('SELECT * FROM param_utilisateur as pu LEFT JOIN param_role as pr ON pu.idUtilisateur=pr.idUtilisateur LEFT JOIN param_groupe as pg ON pr.idGroupe=pg.idGroupe WHERE pr.actif=1 AND pg.idGroupe='.$idGroupe.' ORDER BY pu.idUtilisateur DESC');
    }


    public static function selectionnerDsc(){
        $var =  self::$con->query('SELECT * FROM `param_utilisateur` ORDER BY idUtilisateur DESC LIMIT 1');
        foreach($var as $sel){
            self::$idUtilisateur=$sel['idUtilisateur'];
            self::$nomUtilisateur=$sel['nomUtilisateur'];
            self:: $postnomUtilisateur=$sel['postnomUtilisateur'];
            self:: $prenomUtilisateur=$sel['prenomUtilisateur'];
            self:: $mailUtilisateur=$sel['mailUtilisateur'];
            self:: $photoUtilisateur=$sel['photoUtilisateur'];
            self:: $log=$sel['log'];
            self:: $pass=$sel['pass'];
        }
        return $var;
    }
     public static function selectionnerUtByCrs($crs){
        return  self::$con->query('SELECT ut.idutilisateur, ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.photoUtilisateur, gr.genre  FROM param_utilisateur as ut LEFT JOIN org_affectation as aff ON aff.idUtilisateur=ut.idUtilisateur  LEFT JOIN param_genre as gr ON ut.idGenre=gr.IdGenre INNER JOIN crs_cours as crs ON aff.idAffectation=crs.idAffectation WHERE crs.idCours='.$crs );
    }
    
    public static function rechercher($idUtilisateur){
        $idUtil=htmlspecialchars($idUtilisateur);
        $var = self::$con->query("SELECT * FROM param_utilisateur WHERE idUtilisateur =".$idUtil);
        return $var->fetch();
        // foreach($var as $sel){
        //     self::$idUtilisateur=$sel['idUtilisateur'];
        //     self::$nomUtilisateur=$sel['nomUtilisateur'];
        //     self:: $postnomUtilisateur=$sel['postnomUtilisateur'];
        //     self:: $prenomUtilisateur=$sel['prenomUtilisateur'];
        //     self:: $mailUtilisateur=$sel['mailUtilisateur'];
        //     self:: $photoUtilisateur=$sel['photoUtilisateur'];
        //     self:: $log=$sel['log'];
        //     self:: $pass=$sel['pass'];
        // }
        
    }
     public static function log($lg,$ps){
        $lg=htmlspecialchars($lg);
        $psa=htmlspecialchars($ps);
        $var = self::$con->query("SELECT * FROM param_utilisateur as ut LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE log='".$lg."'AND pass='".$psa."' AND actif=1");
        return $var->fetch();
        
    }
    
    public static function filtrer_nom($nomUtilisateur){
        $nomUtilisateur= htmlspecialchars($nomUtilisateur);        
        return self::$con->query("SELECT * FROM param_utilisateur WHERE nomUtilisateur like '".$nomUtilisateur."%' ORDER BY nomUtilisateur ASC");
    }
    public static function filtrer_postnom($postnomUtilisateur){
        $postnomUtilisateur = htmlspecialchars($postnomUtilisateur);        
        return self::$con->query("SELECT * FROM param_utilisateur WHERE postnomUtilisateur like '".$postnomUtilisateur."%' ORDER BY postnomUtilisateur ASC");
    }
    public static function filtrer_prenom($prenomUtilisateur){
        $prenomUtilisateur = htmlspecialchars($prenomUtilisateur);
        return self::$con->query("SELECT * FROM param_utilisateur WHERE prenomUtilisateur like '".$prenomUtilisateur."%' ORDER BY prenomUtilisateur ASC");
    }
    public function __destuct(){
    }
}


