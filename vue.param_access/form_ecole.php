<?php
(empty($_SESSION)) ? session_start() : '';
include_once('../model.param_access/param_groupe.class.php');
include_once('../model.param_access/param_genre.class.php');

?>
<form class="form-group well" id="frm_ecole" name="frm_ecole" style="width:100%; height:735px; margin:0px; ;" method="POST" enctype="multipart/form-data" class="form_control">
  <center style="font-size:20px; margin-bottom:20px; color:white">FORMULAIRE ECOLE</center>
  <label for="nomEcole" class=" col-sm-12" style="margin:0x"> Nom Ecole * :<input id="nomEcole" name="nomEcole" style="width:100%" type="text" class="form-control " placeholder="Nom de l' école"></label>

  <label for="singleEcole" style="margin:0px" class=" col-sm-6" style=" padding:2px"> Single : <input id="singleEcole" name="singleEcole" style="width:100%;" type="text" class="form-control " placeholder="Single Ecole"></label>
  <label for="bpEcole" style="margin:0px" class=" col-sm-6" style=" padding:2px"> BP <input id="bpEcole" name="bpEcole" style="width:100%;" style="width:100%" type="text" class="form-control " placeholder="BP"></label>
  <?php
  include_once("../vue.param_access/frm_adresse.php");
  ?>

  <label for="adresseEcole" style="margin:0px;" class=" col-sm-12" style=" padding:2px"> Adresse * :<textarea id="adresseEcole" name="adresseEcole" style="width:100%;height:60px" class="form-control " placeholder="ADRESSE"></textarea></label>

  <span style="margin-top: 40px;margin-bottom: 40px;border-top: 3px dashed white" class="col-sm-12"> </span>

  <label for="tele1" style="margin:0px" class=" col-sm-6">Telephone 1 : <input style="width:100%;" id="tele1" name="tele1" type="txt" class="form-control" placeholder="Télephone 1"></label>

  <label for="tele2" style="margin:0px" class=" col-sm-6">Telephone 2 : <input style="width:100%;" id="tele2" name="tele2" type="txt" class="form-control" placeholder="Télephone 2"></label>

  <label for="mailEcole" style="margin:0px" class=" col-sm-6">Mail : <input style="width:100%" id="mailEcole" name="mailEcole" type="mail" class="form-control" placeholder="Mail de l'école"> </label>

  <label for="logoEcole" style="margin:0px" class=" col-sm-6">Logo : <input style="width:100%" id="logoEcole" name="logoEcole" onchange="" type="file" class=" form-control"></label>


  <label for="deviseEcole" style="margin:0px" class=" col-sm-12"> Devise :<textarea id="deviseEcole" name="deviseEcole" style="width:100%;height:60px" class="form-control " placeholder="Devise"></textarea></label>





  <input type="submit" class="btn btn-success btn-xs pull-left col-sm-4" style="margin-top:3px" value="ENREGISTRER">
  <div id="err" name="err" style='color:red'>

  </div>
</form>


<script>
  $(document).ready(function(e) {
    $("#frm_ecole").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "../control.param_access/ctr_ecole.php?ajouterEco=true&",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          $("#err").fadeOut();
        },
        success: function(data) {
          if (data == 'invalid') {
            // invalid file format.
            $("#err").html("Format fichier invalide !").fadeIn();
          } else if (data == 'champsVide') {
            $("#err").html("Merci de completer les champs").fadeIn();
          } else {

            $("#panel").html(data).fadeIn();
            $("#frm_ecole")[0].reset();
          }
        },
        error: function(e) {
          $("#frmcrs").html(e).fadeIn();
        }
      });
    }));
  });
</script>