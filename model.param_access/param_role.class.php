<?php
class param_role {
    private static  $idRole;
    private static $idGroupe;
    private static $idUtilisateur;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidrole(){
        return self::$idRole;
    }
    //METHODES
    public function ajouter($idGroupe,$idutilisateur)
    {

        $idGrp= htmlspecialchars($idGroupe);
        $idUtil = htmlspecialchars($idutilisateur);
        $req=self::$con->prepare('INSERT INTO `param_role`(`idGroupe`, `idUtilisateur`) VALUES (?,?)');
        if($req->execute(array($idGrp,$idUtil))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idGroupe = htmlspecialchars($idGrp);
            self::$idUtilisateur = htmlspecialchars($idUtil);
            return 1;
        }else{
            return 0;
        }

    }
    
    public function modifier($idRole,$idGroupe,$idUtilisateur,$actif)
    {
        $idRl = htmlspecialchars($idRole);
        $idGrp = htmlspecialchars($idGroupe);
        $idUtil= htmlspecialchars($idUtilisateur);
        $act = htmlspecialchars($actif);
        if(self::$con->exec('UPDATE param_role SET idGroupe="'.$idGrp.'",idUtilisateur = "'.$idUtil.'" ,actif = "'.$act.'" WHERE idRole="'.$idRl.'"'))
           {  
            self::$idGroupe = htmlspecialchars($idGrp);
            self::$idUtilisateur = htmlspecialchars($idUtil);
            return true;
         }else{
             return false;
    }
    }
   
    public function supprimer($idRole){
        $idRl = htmlspecialchars($idRole);
        if(self::$con->exec('DELETE FROM `param_role` WHERE idRole="'.$idRl.'"')){
            self::$idRole = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM param_role ORDER BY idRole ASC');
    }
    //
    public function rechercher($idRole){
        $idRl = htmlspecialchars($idRole);
        return $var = self::$con->query("SELECT * FROM param_role WHERE idRole =".$idRl." ORDER BY idRole ASC");
        // foreach($var as $sel){
        //     self::$idRole = $sel['idRole'];
        //     self::$idGroupe = $sel['idGroupe'];
        //     self::$idUtilisateur = $sel['idUtilisateur'];
        //     self::$actif = $sel['actif'];
        // }
        // return $var; 
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


