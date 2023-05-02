

<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
        <form id='' style="border: 1px dashed rgba(174, 174, 174, 0.4)" class="pull-right ">
             <div class="col-sm-1" style="padding-right:200px">
                <input style="width:100px" class="col-sm-2 col-lg-2 col-xs-2 form-control" id='pt'  type="text" placeholder="Cote sur 10" />
                <input style="width:100px" onclick="Orientation('../control.param_access/ctr_lecon.php?Subj='+$('#Subj').val()+'&pt='+$('#pt').val())"  class="btn btn-danger" value="OK"/>

            </div> 
                <textarea id="Subj"  style="width:740px" rows="1" max-rows="3" id='eval' name='eval'  class="pull-right  form-control "  type="text" placeholder="SUBJECTION"  ></textarea>
                     
            
        </form>
<script>
$(function () {
$('.textarea').summernote()
})
</script>

