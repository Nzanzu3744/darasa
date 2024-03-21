<?php
include_once('../model.param_access/org_unite.class.php');
?>
<div class="form-inline  col-sm-12" style="height:300px; border:1px solid blue">

    <div class="form-inline well col-sm-5" id="" name="" style="padding: 1px; height:270px">
        <label for="prm" class="col-sm-12"> UNITE </label>

        <input id="unit" name="unit" type="text" class="form-control col-sm-12" placeholder="Unite ici">
        <center class="col-sm-12"> <label>Liste Sections</label></center>
        <form id="frm_unite" name="frm_unite" class="table-responsive  col-sm-12" style="height:150px">
            <?php
            include_once("../vue.param_access/liste_section_unite.php");
            ?>
        </form>

        <input id="" type="button" style="margin-top:10px; width: 70px" onclick='Orientation2("../control.param_access/ctr_unite.php?ajouterU=true&unit="+$("#unit").val(),"#unite01","#frm_unite")' class="btn btn-xs btn-success pullright col-sm-6" value="Valider" />
    </div>

    <center><label> Liste Unites</label></center>

    <div class="table-responsive  col-sm-7" style="height:250px">


        <table class="table table-bordered table-striped table-condensed">

            <thead>

                <tr>
                    <th>N</th>
                    <th>Section</th>
                    <th>Promotion</th>
                    <th>Unite</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $units = new org_unite();
                $n = 0;
                foreach ($units->selectionner()  as $sel) {
                    $n++;
                ?>
                    <tr>
                        <td><?= $n ?></td>
                        <th><?= ($sel['idSection'] == 1) ? $sel['section'] . ' ere' : $sel['section'] . ' eme' ?></th>
                        <th><?= strtoupper($sel['promotion']) ?></th>
                        <th><?= strtoupper($sel['unite']) ?></th>
                        <td class="dropdown active pull-right">
                            <button data-toggle="dropdown" href="#"> Option<b class="caret pull-right"></b></button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#" style="color:red" onclick='Orientation("../control.param_access/ctr_unite.php?SuprU=true&idUnit=<?= $sel["idUnite"] ?>","#unite01")'>Supprimer</a></li>

                            </ul>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
</div>