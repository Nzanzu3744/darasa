<?php
include_once('../model.param_access/org_section.class.php');
?>
<div class="form-inline  col-sm-12" style="height:300px;">

    <div class="form-inline well col-sm-5" style="padding: 1px; height:270px">
        <label for="section" class="col-sm-12"> SECTION </label>

        <input id="section" type="text" class="form-control" placeholder="Section ici">
        <center class="col-sm-12"> <label>Liste Promotions</label></center>
        <form id="frm_section" name="frm_section" class="table-responsive  col-sm-12" style="height:150px">
            <?php
            include_once("../vue.param_access/liste_promotion_section.php");
            ?>
        </form>
        <input type="button" style="margin-top:10px;width: 70px" onclick='Orientation2("../control.param_access/ctr_section.php?ajouterS=true&sectn="+$("#section").val(),"#sect","#frm_section"); Orientation("../control.param_access/ctr_classe.php?actual_section_unit=","#unite01")' class="btn btn-xs btn-success col-sm-6" value="Valider">
    </div>

    <center><label> Liste Sections</label></center>
    <div class="table-responsive  col-sm-7" style="height:250px">

        <table class="table table-bordered table-striped table-condensed">

            <thead>

                <tr>
                    <th>N</th>
                    <th>Section</th>
                    <th>Promotion</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grps = new org_section();
                $n = 0;
                foreach ($grps->selectionner()  as $sel) {
                    $n++;
                ?>
                    <tr>
                        <td><?= $n ?></td>
                        <th><?= ($sel['idSection'] == 1) ? $sel['section'] . ' ere' : $sel['section'] . ' eme' ?></th>
                        <th><?= strtoupper($sel['promotion']) ?></th>

                        <td class="dropdown active pull-right">
                            <button class="" data-toggle="dropdown" href="#">Option<b class="caret pull-right"></b></button>
                            <ul class="dropdown-menu ">

                                <li><a href="#" style="color:red" onclick='Orientation("../control.param_access/ctr_section.php?supsect=true&idsectn=<?= $sel["idSection"] ?>","#sect"); Orientation("../control.param_access/ctr_classe.php?actual_section_unit=","#unite01")'> Supprimer</a></li>

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