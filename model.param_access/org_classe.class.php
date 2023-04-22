<?php
include_once('param_connexion.php');
class org_classe {
    private static  $idClasse;
    private static  $idPromotion;
    private static $idSection;
    private static $idUnite;
    private static $commentaire;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidClasse(){
        return self::$idClasse;
    }
    //METHODES
    public function ajouter($idPromotion,$idSection, $idUnite, $commentaire)
    {
        $idPmt = htmlspecialchars($idPromotion);
        $idSt = htmlspecialchars($idSection);
        $idUt = htmlspecialchars($idUnite);
        $cmt = htmlspecialchars($commentaire);
        $req = self::$con->prepare('INSERT INTO org_classe (idPromotion, idSection, idUnite) VALUES (?,?,?)');
        if($req->execute(array($idPmt,$idSt,$idUt))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idPromotion=$idPromotion;
            self::$idSection=$idSt;
            self::$idUnite=$idUt;
            self::$commentaire=$cmt;
            return true;
        }else{
            return false;
        }

    }
    
    public function modifier($idClase,$idPromotion,$idSection, $idUnite, $commentaire)
    {
        $idCls = htmlspecialchars($idClase);
        $idPmt = htmlspecialchars($idPromotion);
        $idSt = htmlspecialchars($idSection);
        $idUt = htmlspecialchars($idUnite);
        $cmt = htmlspecialchars($commentaire);
        if(self::$con->exec('UPDATE org_classe SET idPromotion="'.$idPmt.'", idSection="'.$idSt.'", idUnite="'.$idUt.'",  commentaire="'.$cmt.'" WHERE idClasse="'.$idCls.'"'))
            {
                $idCls = htmlspecialchars($idClasse);
                self::$idPromotion=htmlspecialchars($idPromotion);
                self::$idSection=htmlspecialchars($idSection);
                self::$idUnite=htmlspecialchars($idUnite);
                self::$commentaire =htmlspecialchars($commentaire);
                echo true;  
            }else{
                echo false;
            }
    }
   
    public function supprimer($idClasse){
        $idCls = htmlspecialchars($idClasse);
        if(self::$con->exec('DELETE FROM `org_classe` WHERE idClasse="'.$idCls.'"')){
            self::$idClasse = '';
            self::$idPromotion='';
            self::$idSection='';
            self::$idUnite='';
            self::$commentaire ='';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM org_classe ORDER BY idClasse ASC');
    }
    public function selectionnerByUt($idUt,$ansc){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_affectation as af ON af.idClasse=cls.idClasse INNER JOIN org_anneesco as ansc ON af.idAnneeSco=ansc.idAnneeSco INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite WHERE af.actif=1 AND af.idUtilisateur="'.$idUt.'" AND ansc.idAnneeSco="'.$ansc.'" ORDER BY ansc.idAnneeSco DESC');
    }
    public function selectionnerByUtIns($idUt){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_inscription as ins ON ins.idClasse=cls.idClasse INNER JOIN org_anneesco as ansc ON ins.idAnneeSco=ansc.idAnneeSco INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite WHERE ins.actif=1 AND ins.idUtilisateur='.$idUt);
    }
    
    public function rechercher($idClasse){
        $idCls = htmlspecialchars($idClasse);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idClasse ='".$idCls."' ORDER BY idClasse ASC");
        // foreach($var as $sel){
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$idClasse = $sel['idClasse'];
        //     self::$commentaire = $sel['commentaire'];
        // }
        return $var; 
    }
    public function filtrer_Section($idSection){
        $idSt=htmlspecialchars($idSection);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection = '".$idSt."' ORDER BY idClasse ASC");
        // foreach($var as $sel){
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$idClasse = $sel['idClasse'];
        // }
        return $var;
    }

    public function filtrer_Prom($idPromotion){
        $idProm=htmlspecialchars($idPromotion);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idProm."' ORDER BY idClasse ASC");
        // foreach($var as $sel){
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$idClasse = $sel['idClasse'];
        // }
        return $var;
    }
    public function filtrer_Unite($idUnite){
        $idUnt=htmlspecialchars($idUnite);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idUnt."' ORDER BY idClasse ASC");
        // foreach($var as $sel){
        //     self::$idPromotion = $sel['idPromotion'];
        //     self::$idClasse = $sel['idClasse'];
        // }
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


