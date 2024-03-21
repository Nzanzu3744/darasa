<div id='listcmt'>
    <?php

    if ($_GET['profil'] == 'ense') {
    ?>
        <center cdiv class="form-inline" style="background:red;color:white;width:100%;  height:20px; padding:1px; margin:0px;"></center>
    <?php
    } else if ($_GET['profil'] == 'eleve') {
    ?>
        <center cdiv class="form-inline" style="background:blue;color:white;width:100%  height:20px; padding:1px; margin:0px;"></center>
    <?php
    } else if ($_GET['profil'] == 'direct') {
    ?>
        <center cdiv class="form-inline" style="background:green;color:white;width:100%;  height:20px; padding:1px; margin:0px;"></center>
    <?php
    } else {
    ?>
        <center cdiv class="form-inline" style="background:back;color:white;width:100%;  height:20px; padding:1px; margin:0px;"></center>
    <?php
    }
    ?>

    <div class="form-inline  table-responsive" style="width:100%;  height:852PX; padding:1px; margin:0px">
        <?php
        include("../vue.param_access/liste_commentaire_cours.php");
        ?>
    </div>
    <div class="media thumbnail well " style="width:100%;  height:150px; padding:0px; margin:0px">
        <?php
        include_once("../vue.param_access/form_commentaire_cours.php");
        ?>
    </div>
</div>