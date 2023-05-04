

<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->

        <div id='' style="border: 1px dashed green" class="col-sm-12 col-lg-12 col-xs-12">
        
             <div class="col-sm-2">
                <center style="color:green">CODE LECON :<?=$_GET['idLecon']?> EST BIEN ENR.</center>
                <input  class="col-sm-2 col-lg-2 col-xs-2 form-control" id='pt'  type="text" placeholder="Cote sur 10" />
                <input class="btn btn-success col-sm-2 col-lg-2 col-xs-2  form-control" type="button" onclick="Orientation('../control.param_access/ctr_lecon.php?Subj='+$('#Subj').val()+'&pt='+$('#pt').val())"  class="btn btn-danger" value="OK"/>

            </div>
            <div class="col-sm-9 col-lg-9 col-xs-9"> 
            <textarea id="Subj" class="form-control" rows="4" max-rows="4" id='eval' name='eval'  type="text" placeholder="SUBJECTION"  ></textarea>
           </div>
           <center class="col-sm-1 col-lg-1 col-xs-1"> 
           <labelle for="actif"> ACTIF <labelle>
            <input id="actif" class=" form-control" onchange="Encour()"  type="checkbox" ></textarea>
           </center>
        </div>
<script>
$(function () {
$('.textarea').summernote()
})
</script>

