<?php
include_once('param_connexion.php');
class crs_reponset {
    private static  $idReponse;
    private static $idQuestion;
    private static $idInscription;
    private static $reponse;
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
    public static function ajouter($idQuestion,$idIns,$reponse)
    {

        $idQst= htmlspecialchars($idQuestion);
        $idIns = htmlspecialchars($idIns);
        $rept= $reponse;
        $req=self::$con->prepare('INSERT INTO  `crs_reponset` ( `idQuestion`, `idInscription`, `reponse`, dateCreation ) VALUES (?,?,?,NOW())');
        if($req->execute(array($idQst,$idIns,$rept))){
            self::$idQuestion =$idQst;
            self::$idInscription =$idIns;
            self::$reponse =$rept;

            $repse = new crs_reponset();
            $rps=$repse->verification($idQst,$idIns);
            foreach($rps as $seld){
                return $TbAE[] = array($seld['idReponse'],$seld['dateCreation']);
            }

           
        }else{
            return "Echec enreg";
        }

    }
 
    public function selectionnerByQst($idQst){
        return  self::$con->query('SELECT * FROM crs_reponset as ret INNER JOIN crs_question as qst ON ret.idQuestion=qst.idQuestion WHERE ret.idQuestion="'.$idQst.'"');
    }
    public function selectionnerByQstAvecEleve($idQst){
        return  self::$con->query('SELECT * FROM crs_reponset as ret INNER JOIN crs_question as qst ON ret.idQuestion=qst.idQuestion LEFT JOIN org_inscription as ins ON ret.idInscription=ins.idInscription LEFT JOIN param_utilisateur as ut ON ins.idUtilisateur = ut.idUtilisateur LEFT JOIN param_genre as gr ON gr.idGenre=ut.idGenre WHERE ret.idQuestion="'.$idQst.'"');
    }

    public function selectionnerByQstUti($idQst,$iuti){
        return  self::$con->query('SELECT rep.idInscription, rep.reponse, rep.idReponse, rep.idQuestion,  rep.dateCreation FROM crs_reponset as rep  LEFT JOIN org_inscription as ins ON rep.idInscription=ins.idInscription INNER JOIN crs_question as qst ON rep.idQuestion=qst.idQuestion WHERE rep.idQuestion='.$idQst.' AND ins.idUtilisateur='.$iuti);
    }
    // public function selectionnerByQstUti($idQst,$iuti){
    //     return  self::$con->query('SELECT rep.idUtilisateur, rep.reponse, rep.idReponse, rep.idQuestion,  rep.dateCreation FROM crs_reponset as rep INNER JOIN crs_question as qst ON rep.idQuestion=qst.idQuestion WHERE rep.idQuestion='.$idQst.' AND rep.idUtilisateur='.$iuti);
    // }
  public function verification($idQst,$idIns){
        return  self::$con->query('SELECT rt.idReponse, rt.dateCreation FROM crs_reponset as rt INNER JOIN crs_question as qst ON rt.idQuestion=qst.idQuestion WHERE rt.idQuestion='.$idQst.' AND rt.idInscription='.$idIns.'  ORDER BY rt.idReponse DESC LIMIT 1');
    }
    //
    public function rechercher($idReponse){
        $ididUtlst = htmlspecialchars($idReponse);
        return $var = self::$con->query("SELECT * FROM crs_reponset WHERE idReponse =".$ididUtlst." ORDER BY idReponse ASC");
    }
    //DESTRUCTEUR
    public function __destuct(){
    }
}


