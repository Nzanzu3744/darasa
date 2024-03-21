<?php
include_once('../model.param_access/param_connexion.php');
class crs_reponsec {
    private static  $idReponse;
    private static $idAssertion;
    private static $idInscription;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidReponse(){
        return self::$idReponse;
    }
    //METHODES
    public static function ajouter($idAssertion,$idIns)
    {

        $idAst= htmlspecialchars($idAssertion);
        $idIns = htmlspecialchars($idIns);
        $req=self::$con->prepare('INSERT INTO  crs_reponsec ( idAssertion, idInscription, dateCreation) VALUES (?,?,NOW())');
        if($req->execute(array($idAst,$idIns))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$idAssertion = $idAst;
            self::$idInscription = $idIns;
            $repse = new crs_reponsec();
            $rps=$repse->verification($idAssertion,$idIns);
            foreach($rps as $seld){
                 return $TbAE[] = array($seld['idReponse'],$seld['dateCreation']);
            }

         
        }else{
            return "Echec enreg";
        }

    }
    
    public function modifier($idReponse,$idAssertion,$idUtilisateur)
    {
        $idrpsc = htmlspecialchars($idReponse);
        $idastion= htmlspecialchars($idAssertion);
        $idUtlst= htmlspecialchars($idUtilisateur);
        if(self::$con->exec('UPDATE crs_reponsec SET idAssertion="'.$idastion.'",idUtilisateur = "'.$idUtlst.'"WHERE idReponse="'.$idrpsc.'"'))
           {  
            self::$idAssertion =$idastion;
            self::$idUtilisateur =$idUtlst;
            return true;
         }else{
             return false;
    }
    }

    public function supprimer($idReponse){
        $idrpsc = htmlspecialchars($idReponse);
        if(self::$con->exec('DELETE FROM  crs_reponsec  WHERE idReponse="'.$idrpsc.'"')){
            self::$idReponse = '';
            return true;
        }else{
            return false;
        }
    }

    public function selectionner(){
        return  self::$con->query('SELECT * FROM crs_reponsec ORDER BY idReponse ASC');
    }
    //EN VERIFIER !!!!!!!!!!!
    public function selectionnerByQst($idQst){
        return  self::$con->query('SELECT * FROM crs_reponsec as ass INNER JOIN crs_question as qst ON ass.idAssertion=qst.idAssertion WHERE ass.idAssertion="'.$idQst.'"');
    }
    public function selectionnerByQstAvecEleveClass($idQst,$idClasse){
        return  self::$con->query('SELECT ut.nomUtilisateur, ut.postnomUtilisateur, ut.prenomUtilisateur,ut.photoUtilisateur, gr.genre, rpc.idReponse,ass.correctAssertion, qr.ponderation, ass.assertion FROM  crs_reponsec  as rpc LEFT JOIN crs_assertion as ass ON rpc.idAssertion=ass.idAssertion LEFT JOIN crs_question as qr ON ass.idQuestion=qr.idQuestion LEFT JOIN org_inscription as ins ON ins.idInscription=rpc.idInscription LEFT JOIN param_utilisateur as ut ON ins.idUtilisateur=ut.idUtilisateur LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE qr.idQuestion="'.$idQst.'" AND ins.idClasse="'.$idClasse.'"');
    }

    public static function selectionnerByQstUtiClss($idQst,$idUti,$idClase){
        return  self::$con->query('SELECT ins.idUtilisateur,dv.idDevoir, rep.idAssertion, ins.idAnneeSco as idAnneeScoEval, ins.idClasse as idClasseEval, aff.idClasse as idClasseRep, crs.idAnneeSco as idAnneeScoRep, astion.idQuestion, astion.correctAssertion, rep.dateCreation  FROM crs_reponsec as rep LEFT JOIN org_inscription as ins ON rep.idInscription=ins.idInscription INNER JOIN crs_assertion as astion ON astion.idAssertion=rep.idAssertion LEFT JOIN crs_question as qst ON astion.idQuestion=qst.idQuestion LEFT JOIN crs_devoirs as dv ON dv.idDevoir=qst.idDevoir LEFT JOIN crs_cours as crs ON crs.idCours=dv.idCours LEFT JOIN org_affectation as aff ON aff.idAffectation=crs.idAffectation WHERE qst.idQuestion='.$idQst.' AND ins.idUtilisateur='.$idUti.' AND ins.idClasse='.$idClase);
    }

    public function verification($idAst,$idIns){
        return  self::$con->query('SELECT reps.idReponse, reps.dateCreation FROM crs_reponsec as reps INNER JOIN crs_assertion as ass ON reps.idAssertion=ass.idAssertion WHERE reps.idAssertion='.$idAst.' AND reps.idInscription='.$idIns.'  ORDER BY reps.idReponse DESC LIMIT 1');
    }
    public function rechercher($idReponse){
        $idrpsc = htmlspecialchars($idReponse);
        return $var = self::$con->query("SELECT * FROM crs_reponsec WHERE idReponse =".$idrpsc." ORDER BY idReponse ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


