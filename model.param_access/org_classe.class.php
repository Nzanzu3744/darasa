<?php
include_once('../model.param_access/param_connexion.php');
class org_classe {
    private static  $idClasse;
    private static  $idEcole;
    private static $idUnite;
    private static $con;
    //CONSTRUCTEUR
    public  function __construct(){
        return self::$con=con();
    }
    //GETTEURS
    public static function getidClasse(){
        return self::$idClasse;
    }
    //METHODES
    public static  function ajouter($idUnite, $idEcole)
    {
        $idUt = htmlspecialchars($idUnite);
        $idEcole = htmlspecialchars($idEcole);
        self::$con=con();
        $req = self::$con->prepare('INSERT INTO org_classe (idUnite,idEcole) VALUES (?,?)');
        if($req->execute(array($idUt,$idEcole))){
            return true;
        }else{
            return false;
        }

    }
    
    public static  function modifier($idClase, $idUnite, $idEcole)
    {
        $idCls = htmlspecialchars($idClase);
        $idUnt = htmlspecialchars($idUnite);
        $idEcole = htmlspecialchars($idEcole);
        if(self::$con->exec('UPDATE org_classe SET idEcole="'.$idEcole.'", idUnite="'.$idUnt.'" WHERE idClasse="'.$idCls.'"'))
            {
                echo true;  
            }else{
                echo false;
            }
    }
   
    public static  function supprimer($idClasse){
        $idCls = htmlspecialchars($idClasse);
        if(self::$con->exec('DELETE FROM `org_classe` WHERE idClasse="'.$idCls.'"')){
            return true;
        }else{
            return false;
        }
    }

    public static  function selectionner(){
        return  self::$con->query('SELECT * FROM `org_classe` as cls  INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion ');
    }

    
    public static  function selectionnerByEcole($idEcole){
        return  self::$con->query('SELECT * FROM `org_classe` as cls  INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion   WHERE cls.idEcole='.$idEcole);
    }

    
    public static  function selectionnerByProm($idProm){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion WHERE st.idPromotion='.$idProm);
    }
    public static  function selectionnerByPromEcole($idProm,$idEcole){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion WHERE st.idPromotion='.$idProm.' AND cls.idEcole='.$idEcole);
    }
    public static  function selectionnerByUt($idUt,$ansc){
        return  self::$con->query('
        SELECT * FROM (SELECT ut.idUtilisateur, af.idClasse, st.section, un.unite, pm.promotion,af.idAffectation, af.idAnneeSco, an.anneeSco,  ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur  FROM `org_classe` as cls INNER JOIN org_affectation as af ON af.idClasse=cls.idClasse INNER JOIN org_anneesco as an ON af.idAnneeSco=an.idAnneeSco INNER JOIN param_utilisateur as ut ON af.idUtilisateur=ut.idUtilisateur INNER JOIN org_anneesco as ansc ON af.idAnneeSco=ansc.idAnneeSco INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion WHERE af.actif=1

        UNION

        SELECT coa.idUtilisateur, coa.idClasse, st.section, un.unite, pm.promotion,crs.idAffectation, crs.idAnneeSco, an.anneeSco,  ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur, ut.telUtilisateur, ut.mailUtilisateur, ut.idGenre, ut.photoUtilisateur FROM crs_co_animation as coa INNER JOIN crs_cours as crs ON coa.idCours=crs.idCours INNER JOIN org_anneesco as an ON crs.idAnneeSco=an.idAnneeSco INNER JOIN param_utilisateur as ut ON coa.idUtilisateur=ut.idUtilisateur INNER JOIN org_classe as cls ON cls.idClasse=coa.idClasse INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion) AS sel WHERE sel.idUtilisateur='.$idUt.' AND sel.idAnneeSco='.$ansc.'  GROUP BY sel.idClasse

        ');
    }
    public static  function selectionnerByUtIns($idUt){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_inscription as ins ON ins.idClasse=cls.idClasse INNER JOIN org_anneesco as ansc ON ins.idAnneeSco=ansc.idAnneeSco INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion WHERE ins.actif=1 AND ins.idUtilisateur='.$idUt);
    }

    public static  function selectionnerByUtInsEcole($idUt,$idEcole){
        return  self::$con->query('SELECT * FROM `org_classe` as cls INNER JOIN org_inscription as ins ON ins.idClasse=cls.idClasse INNER JOIN org_anneesco as ansc ON ins.idAnneeSco=ansc.idAnneeSco INNER JOIN org_unite as un ON un.idUnite=cls.idUnite INNER JOIN org_section as st ON st.idSection=un.idSection INNER JOIN org_promotion as pm ON pm.idPromotion=st.idPromotion WHERE ins.actif=1 AND ins.idUtilisateur='.$idUt.' AND cls.idEcole ='.$idEcole);
    }
    
    
    public static  function rechercher($idClasse){
        $idCls = htmlspecialchars($idClasse);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idClasse ='".$idCls."' ORDER BY idClasse ASC");

        return $var; 
    }
    public static  function filtrer_Section($idSection){
        $idSt=htmlspecialchars($idSection);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection = '".$idSt."' ORDER BY idClasse ASC");
        return $var;
    }

    public static  function filtrer_Prom($idPromotion){
        $idProm=htmlspecialchars($idPromotion);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idProm."' ORDER BY idClasse ASC");

        return $var;
    }
    public static  function filtrer_Unite($idUnite){
        $idUnt=htmlspecialchars($idUnite);
        $var = self::$con->query("SELECT * FROM org_classe WHERE idSection='".$idUnt."' ORDER BY idClasse ASC");
        return $var;
    }
    //DESTRUCTEUR
    public static  function __destuct(){
    }
}


