<?php
include_once('../model.param_access/prep_discipline.class.php');
    if(isset($_GET['ajouterDs']) AND isset($_GET['idSousDomaine']) AND isset($_GET['lstsous_d'])){
        $ds= new prep_discipline();
        $ds->ajouter($_GET['idSousDomaine'],$_GET['lstsous_d']);
        include_once('../vue.param_access/liste_discipline.php');
    }elseif(isset($_GET['SeleDs'])){
        // sdomaine
        include_once('../model.param_access/prep_discipline.class.php');
        $ds = new prep_discipline();
        $ds = $ds->filtrer($_GET['sdomaine']);
        ?>
            <select id="disci" name="disci" class="form-control" style="width:105%">
                <?php
                foreach($ds as $selds){
                ?>
                    <option  value=<?=$selds['idDiscipline']?>><?=$selds['discipline']?></option>
                <?php
                }
                ?>
            </select>
            <?php
    }else{
        echo "Echec Discipline";
    }
?>