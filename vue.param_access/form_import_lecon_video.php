<form class="form-group col-sm-12" id="frm_lecVid" name="frm_lecVid" style="height:600px; margin:0px; padding:0px; background:white ;" method="POST" enctype="multipart/form-data" class="form_control">

  <div class="text-center" style="font-size:20px">
    <input style='width:0px;height:0px' id="idCours" name="idCours" value="<?= $_GET['idCours'] ?>">
    <!-- <b>
      <?= " [ " . $_GET['cours'] . "]</b> à  " . $_GET['maClasse'] ?>
    </b> -->
  </div>
  <x for="" class=" col-sm-12">
    <?php
    include_once('../vue.param_access/enteteDL.php');
    ?>
  </x>
  <label for="titreLeconVideo" class=" col-sm-12" style="margin:0x;color:green"> Titre* :<input id="titreLeconVideo" name="titreLeconVideo" style="width:100%; height:30px; font-size:18px" type="text" class="form-control " /></label>


  <label for="urlVideo" class=" col-sm-12" style=" margin:0px; color:green"> Video* : <input id="video" name="video" style="width:100%;" type="file" class="form-control " placeholder="urlVideo"></label>

  <label for="rsmLeconVideo" class=" col-sm-12" style="margin:0x;color:green"> Résumé :<textarea id="rsmLeconVideo" name="rsmLeconVideo" style="width:100%; height:300px" type="text" class="textarea"></textarea></label>



  <input type="submit" id="reg_lvid" name="reg_lvid" class="btn btn-success btn-xs pull-right col-sm-4" style="margin-top:3px" value="ENREGISTRER">
  <div id="err" name="err" style='color:red'>

  </div>
</form>

<script>
  $(function() {
    $('.textarea').summernote()
  })
</script>

<script>
  $(document).ready(function(e) {
    $("#frm_lecVid").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({

        url: "../control.param_access/ctr_lecon_video.php?reg_lvid",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loader').show();
          $("#err").fadeOut();
        },
        success: function(data) {

          $('#loader').hide();
          if (data == 'invalid') {
            // invalid file format.
            $("#err").html("Format fichier invalide !").fadeIn();
          } else if (data == 'champsVide') {
            $("#err").html("Merci de completer les champs").fadeIn();
          } else {
            $.ajax({
              url: "../control.param_access/ctr_lecon.php?leconsgauche_ense&maClasse=<?= $_GET["maClasse"] ?>&idCours=<?= $_GET["idCours"] ?>",
              type: "POST",
              success: function(data) {
                $("#leconsgauche").html(data).fadeIn();;
              }
            });
            $("#editLeco").html(data).fadeIn();
            $("#frm_lecVid")[0].reset();
          }
        },
        error: function(e) {
          $("#frmcrs").html(e).fadeIn();
        }
      });
    }));
  });
</script>