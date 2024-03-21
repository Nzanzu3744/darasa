
                <center><label class="col-sm-6" style="margin-top:40px; color:gray"> ADRESSE</label></center>
                <?php
                
                    include_once('../model.param_access/param_pays.class.php');
                    $idPays = null;
                    $pays = new param_pays();
                    $pays = $pays ->selectionner();
                ?>
                <label for="paysEcole" class=" col-sm-6" style="margin-top:10px"> Pays * :
                    <select id="idPaysEcole" name="idPaysEcole" style="width:100%"  type="text" class="form-control" onchange="Orientation('../control.param_access/ctr_adresse.php?idPays='+$(this).val(),'#lb_idProvinceEcole'); Orientation('../control.param_access/ctr_adresse.php?actuByidPays='+$(this).val(),'#lb_idVilleTerritoire')">
                    <?php
                    foreach($pays as $selP){
                        if($idPays==null){
                            $idPays=$selP['idPays'];
                        }

                    ?>
                    <option value=<?=$selP['idPays']?>><?=$selP['codePays'].' | '.$selP['nomPays']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </label>

                <label  style="margin:0px;" for="idProvinceEcole" id="lb_idProvinceEcole" class=" col-sm-6" style="margin-top:10px"> 
                
                <?php
                    include_once('..//model.param_access/param_province.class.php');
                    $idProvince = null;
                    $prov = new param_province();
                    $prov = $prov ->rechercherPremProvPays($idPays);
                ?>
                Province * :
                <select id="idProvinceEcole" name="idProvinceEcole" style="width:100%"  type="text" class="form-control" onchange="Orientation('../control.param_access/ctr_adresse.php?idProvinceEcole='+$(this).val(),'#lb_idVilleTerritoire')">
                <?php
                foreach($prov as $selP){
                    if($idProvince==null){
                        $idProvince=$selP['idProvince'];
                    }
                ?>
                <option value=<?=$selP['idProvince']?>><?=$selP['nomProvince']?></option>
                <?php
                }
                ?>
                </select>
                
                </label>

                <label for="idVilleTerritoire" id="lb_idVilleTerritoire" style="margin:0px;" class=" col-sm-6" style="margin-top:10px"> Ville/Territoire. * :
                <?php
                    include_once('..//model.param_access/param_ville_territoire.class.php');
  
                    $vilT = new param_ville_territoire();
                    $vilT = $vilT ->rechercherByProv($idProvince);
                ?>
                <select id="idVilleTerritoire" name="idVilleTerritoire" style="width:100%"  type="text" class="form-control">
                <?php
                foreach($vilT as $selVt){
                ?>
                <option value=<?=$selVt['idVilleTerritoire']?>><?=$selVt['nomVilleTerritoire']?></option>
                <?php
                }
                ?>
                </select>
                
                </label>