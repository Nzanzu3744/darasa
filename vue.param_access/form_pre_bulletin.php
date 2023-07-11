
<div class="col-sm-12">
 <div class="col-sm-12 well ">
        <form class="col-sm-10 table-responsive " style="height:150px; margin:0px" id="srlListeElve" name="srlListeElve">
        
           <?php
           include_once('../vue.param_access/liste_eleve_blt.php');
           ?>
        </form>
         <div class="col-sm-2 " style="height:150px margin:0px;padding:0px">
           <input type="button"  class="col-sm-12 form-cotrol  btn btn-sm btn-success" style="margin-top:29px" onclick="Orientation2('control.param_access/ctr_bulletin.php?aff_blt=true&idClasse=<?=$_GET['idClasse']?>&idAnneeSco=<?=$_GET['idAnneeSco']?>&maClasse=<?=$_GET['maClasse']?>','#monBlt','#srlListeElve')" value="Valider">
           <input type="button"  class="col-sm-12 form-cotrol  btn btn-sm btn-default" style="margin-top:3px" onclick="Encour()" value="Annuler">
           <input type="button"  class="col-sm-12 form-cotrol   btn btn-sm btn-default " style="margin-top:3px" value="Imprumer" onclick="imprimer('monBlt')">
         
        </div>
            
    </div> 

<!--  -->

    <div class="col-sm-12 table-responsive " style="height:550px; margin:0px; background:white; padding:10px" id="monBlt" name="monBlt">
    
         <div style="height:1500px; margin:10px; border:1px solid black" >
        <center class="titres" style="font-size:30px; padding:15%" >Bonjour Mr.(Mm) <?=' <b> '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</b>  !'?><br> Cocher les élèves pour les quels vous voulez imprimé les bulletins. </center>

        </div>  
    </div>      
    
</div>
