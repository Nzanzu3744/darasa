<?php
include_once('../model.param_access/param_connexion.php');
class crs_question {
    private static  $idQuestion;
    private static $idDevoir;
    private static $question;
    private static $ponderation;
    private static $con;
    //CONSTRUCTEUR
    public function __construct(){
        self::$con=con();
    }
    //GETTEURS
    public static function getidQuestion(){
        return self::$idQuestion;
    }
    //METHODES
    public static function ajouter($idDevoir, $question,$ponderation)
    {

        $idDv= htmlspecialchars($idDevoir);
        $qst= $question;
        $pdtion = htmlspecialchars($ponderation);
        $req=self::$con->prepare('INSERT INTO crs_question (idDevoir, question, ponderation) VALUES (?,?,?)');
        ;
        if($req->execute(array($idDv,$qst,$pdtion))){
            //je doit revenir ici pour recuperer le dernier ajoute genre mapping
            self::$question = $qst;
            self::$idDevoir = htmlspecialchars($idDv);
            self::$ponderation = htmlspecialchars($pdtion);
            $idQst = new crs_question();
            $idQst=$idQst->selectionnerByIdDevdDESC($idDv);
            foreach($idQst as $seld){
                return $seld['idQuestion'];
            }
        }else{
            return null;
        }

    }
      public static function selectionnerByIdDevdDESC($idDv){
        return  self::$con->query('SELECT * FROM `crs_question`as qt INNER JOIN crs_devoirs AS dv ON dv.idDevoir=qt.idDevoir WHERE dv.idDevoir="'.$idDv.'" ORDER BY qt.idQuestion DESC');
    }
    //  public static function selectionnerByIdDevASC($idDv){
    //     return  self::$con->query('SELECT * FROM crs_question as qt INNER JOIN crs_devoirs AS dv ON dv.idDevoir=qt.idDevoir WHERE dv.idDevoir="'.$idDv.'" ORDER BY qt.idQuestion ASC');
    // }
    public static function selectionnerByIdDevASC($idDv){
        return  self::$con->query('SELECT qt.idQuestion, qt.idDevoir,qt.question,qt.ponderation,qt.dateCreation, dv.idDevoir, dv.idCours,dv.idPeriode,dv.idUtilisateur,dv.dateCreation,dv.dateRemise,dv.indexation,dv.actif,dv.typedev,dv.ponderation as pondGeneral FROM crs_question as qt INNER JOIN crs_devoirs AS dv ON dv.idDevoir=qt.idDevoir WHERE dv.idDevoir="'.$idDv.'" ORDER BY qt.idQuestion ASC');
    }
    
    public static function modifier($idQuestion,$idDevoir, $question,$ponderation)
    {
        $idQst = htmlspecialchars($idQuestion);
        $pdrtion= htmlspecialchars($ponderation);
        $idDv = htmlspecialchars($idDevoir);
        $qst = $question;
        $req=self::$con->prepare('UPDATE crs_question SET idDevoir=?,question=?,ponderation=? WHERE idQuestion=?');
        if($req->execute(array($idDv,$qst,$pdrtion,$idQst))){  
            self::$idQuestion = $idQst;
            self::$idDevoir = $idDv;
            self::$ponderation = $pdrtion;
            self::$question = $qst;
            return "true";
         }else{
             return "false";
    }
    }
   
    public static function supprimer($idQuestion){
        $idQst = htmlspecialchars($idQuestion);
        if(self::$con->exec('DELETE FROM crs_question WHERE idQuestion="'.$idQst.'"')){
            self::$idQuestion = '';
            return true;
        }else{
            return false;
        }
    }

    public static function selectionner(){
        return  self::$con->query('SELECT * FROM crs_question ORDER BY idQuestion ASC');
    }
    //
    
    //DESTRUCTEUR
    public function __destuct(){
    }
}


