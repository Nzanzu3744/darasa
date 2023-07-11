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
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite');
    }
    public function selectionnerByProm($idProm){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite WHERE cls.idPromotion='.$idProm);
    }
    public function selectionnerByUt($idUt,$ansc){
        return  self::$con->query('
        SELECT * FROM (SELECT ut.idUtilisateur, af.idClasse, st.section, un.unite, pm.promotion,af.idAffectation, af.idAnneeSco, an.anneeSco,  ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur  FROM `org_classe` as cls INNER JOIN org_affectation as af ON af.idClasse=cls.idClasse INNER JOIN org_anneesco as an ON af.idAnneeSco=an.idAnneeSco INNER JOIN param_utilisateur as ut ON af.idUtilisateur=ut.idUtilisateur INNER JOIN org_anneesco as ansc ON af.idAnneeSco=ansc.idAnneeSco INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite WHERE af.actif=1

        UNION

        SELECT coa.idUtilisateur, coa.idClasse, st.section, un.unite, pm.promotion,crs.idAffectation, crs.idAnneeSco, an.anneeSco,  ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM crs_co_animation as coa INNER JOIN crs_cours as crs ON coa.idCours=crs.idCours INNER JOIN org_anneesco as an ON crs.idAnneeSco=an.idAnneeSco INNER JOIN param_utilisateur as ut ON coa.idUtilisateur=ut.idUtilisateur INNER JOIN org_classe as cls ON cls.idClasse=coa.idClasse INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite) AS sel WHERE sel.idUtilisateur='.$idUt.' AND sel.idAnneeSco='.$ansc.'  GROUP BY sel.idClasse

        ');
    }
    public function selectionnerByUtIns($idUt){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_inscription as ins ON ins.idClasse=cls.idClasse INNER JOIN org_anneesco as ansc ON ins.idAnneeSco=ansc.idAnneeSco INNER JOIN org_promotion as pm ON pm.idPromotion=cls.idPromotion INNER JOIN org_section as st ON st.idSection=cls.idSection INNER JOIN org_unite as un ON un.idUnite=cls.idUnite WHERE ins.actif=1 AND ins.idUtilisateur='.$idUt);
    }
    
    public function rechercher($idClasse){
        $idCls = htmlspecialchars($idClasse);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idClasse ='".$idCls."' ORDER BY idClasse ASC");

        return $var; 
    }
    public function filtrer_Section($idSection){
        $idSt=htmlspecialchars($idSection);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection = '".$idSt."' ORDER BY idClasse ASC");
        return $var;
    }

    public function filtrer_Prom($idPromotion){
        $idProm=htmlspecialchars($idPromotion);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idProm."' ORDER BY idClasse ASC");

        return $var;
    }
    public function filtrer_Unite($idUnite){
        $idUnt=htmlspecialchars($idUnite);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idUnt."' ORDER BY idClasse ASC");
        return $var;
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


