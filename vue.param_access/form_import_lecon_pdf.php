<form class="form-group col-sm-12" id="frm_lecVid" name="frm_lecVid" style="height:540px; margin:0px;background:white ;" method="POST" enctype="multipart/form-data" class="form_control">

  <div class="text-center" style="font-size:20px">
    <input style='width:0px;height:0px' id="idCours" name="idCours" value="<?= $_GET['idCours'] ?>">
    <b>
      <?= " [ " . $_GET['cours'] . "]</b> à  " . $_GET['maClasse'] ?>
    </b>
  </div>
  <x for="" class=" col-sm-12">
    <?php
    include_once('../vue.param_access/enteteDL.php');
    ?>
  </x>
  <label for="titreLeconPdf" class=" col-sm-12" style="margin:0x; color:red"> Titre :<input id="titreLeconPdf" name="titreLeconPdf" style="width:100%; height:30px; font-size:18px" type="text" class="form-control " /></label>


  <label for="urlPdf" class=" col-sm-12" style=" margin:0px; color:red"> Pdf* : <input id="Pdf" name="Pdf" style="width:100%;" type="file" class="form-control " placeholder="urlPdf"></label>

  <label for="rsmLeconPdf" class=" col-sm-12" style="margin:0x; color:red"> RESUME :<textarea id="rsmLeconPdf" name="rsmLeconPdf" style="width:100%; height:150px" type="text" class="textarea"></textarea></label>



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

        url: "../control.param_access/ctr_lecon_pdf.php?reg_lpdf",
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