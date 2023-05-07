<?php
(empty($_SESSION))?session_start():'';
include_once('param_connexion.php');
class param_groupe {
    private static  $idGroupe;
    private static  $groupe;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidgroupe(){
        return self::$idGroupe;
    }
    public static function getgroupe(){
        return self::$groupe;
    }
    //METHODES
    public function ajouter($groupe)
    {
        $idUtl = $_SESSION['idUtilisateur'];
        $grp=htmlspecialchars($groupe);
        $req=self::$con->prepare('INSERT INTO param_groupe (groupe) VALUES (?)');
        if($req->execute(array($grp))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$groupe=$groupe;
            include_once('param_table.class.php');
            include_once('param_permission.class.php');
            $tble = new param_table();
            $tble = $tble->selectionner();
            $nomTable = $tble->fetchAll();
            $grp = new param_groupe();
            $grp = $grp->selectioneerDerEnreg()->fetch();
            $ajouter = '0';
            $modifier = '0';
            $afficher = '0';
            $sup = '0';
            $pms = new param_permission();
            foreach($nomTable as $selTble ){
                $pms->ajouter($selTble['nomTable'],$grp['idGroupe'],$ajouter,$modifier,$afficher,$sup);

            }
            return $grp['idGroupe'];
        }else{
            return false;
        }

    }
    
    public function modifier($idGroupe,$groupe)
    {
        $idGp = htmlspecialchars($idGroupe);
        $grpe = htmlspecialchars($groupe);
        if(self::$con->exec('UPDATE param_groupe SET groupe="'.$grpe.'"WHERE idGroupe="'.$idGp.'"'))
            {
                self::$groupe=htmlspecialchars($groupe);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public function supprimer($idGroupe){
        $idGp = htmlspecialchars($idGroupe);
        if(self::$con->exec('DELETE FROM `param_groupe` WHERE idGroupe="'.$idGp.'"')){
            self::$idGroupe = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM param_groupe ORDER BY idGroupe ASC');
    }
    public static function selectionDerRolActif($idUtil){
        return  self::$con->query('SELECT * FROM param_groupe as pg LEFT JOIN param_role as pr ON pg.idGroupe=pr.idGroupe LEFT JOIN param_utilisateur as pu ON pr.idUtilisateur=pu.idUtilisateur  WHERE pr.actif=1 AND pu.idUtilisateur='.$idUtil.' ORDER BY pr.idRole DESC LIMIT 1');
    }
    public static function selectioneerDerEnreg(){
        return  self::$con->query('SELECT idGroupe FROM param_groupe ORDER BY idGroupe DESC LIMIT 1');
    }
    public function rechercher($idGroupe){
        $idGp = htmlspecialchars($idGroupe);
        $var = self::$con->query("SELECT * FROM param_groupe WHERE idGroupe ='".$idGp."' ORDER BY idGroupe ASC");
        foreach($var as $sel){
            self::$groupe = $sel['groupe'];
            self::$idGroupe = $sel['idGroupe'];
        }
        return $var; 
    }
    public function filtrer($groupe){
        $gpe=htmlspecialchars($groupe);
        $var = self::$con->query("SELECT * FROM param_groupe WHERE groupe like '".$gpe."%' ORDER BY idGroupe ASC");
        foreach($var as $sel){
            self::$groupe = $sel['groupe'];
            self::$idGroupe = $sel['idGroupe'];
        }
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


