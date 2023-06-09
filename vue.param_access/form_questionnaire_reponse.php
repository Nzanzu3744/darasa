<?php
if(isset($_GET['AjouterRepTr'])){
?>

 <div>
 <div  class="col-sm-12" style="margin:1px;padding:0px" >
    <labelle for=<?=$_GET['idQst']?> class="col-sm-11" style="font-size:20px"> Question :<?=$_GET['n']?></labelle>
    <textarea id=<?=$_GET['idQst']?>  class="textarea" type="text" class="form-control" placeholder=""><?=$_GET['qst']?></textarea>  
</div>
<div class="col-sm-12" style="marging:0px with:50px" >
    <input id=<?=$_GET['idPond']?> placeholder="Point" value='<?=$_GET['pond']?>'/>
</div>
</div>


<?php
}else if(isset($_GET['AjoutQstCh'])){
?>
<labelle for=<?=$_GET['idqst']?> class="col-sm-12" style="font-size:20px"> Question :<?=$_GET['n']?></labelle>
    <textarea id=<?=$_GET['idqst']?>  class="textarea"  cols="140" placeholder=""><?=$_GET['qst']?></textarea>
    <div class="col-sm-12" style="padding-left:1%" >
        <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk1']?> type="checkbox"  value='<?=$_GET['asCk1']?>'/>
            <input id=<?=$_GET['idass1']?> type="text" class="form-control" value='<?=$_GET['ass1']?>'/>
        </div>
            <div class="col-sm-4"   style="border: 1px dashed gray">
            <input id=<?=$_GET['idasCk2']?> type="checkbox"  value='<?=$_GET['asCk2']?>'/>
            <input  id=<?=$_GET['idass2']?> type="text"  class="form-control" value='<?=$_GET['ass2']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk3']?> type="checkbox"  value='<?=$_GET['asCk3']?>'/>
            <input id=<?=$_GET['idass3']?> type="text" class="form-control" value='<?=$_GET['ass3']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
            <input id=<?=$_GET['idasCk4']?> type="checkbox"  value='<?=$_GET['asCk4']?>'/>
            <input id=<?=$_GET['idass4']?> type="text"  class="form-control" value='<?=$_GET['ass4']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk5']?> type="checkbox"  value='<?=$_GET['asCk5']?>'/>
            <input id=<?=$_GET['idass5']?> type="text" class="form-control" value='<?=$_GET['ass5']?>'/>
        </div> 
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk6']?> type="checkbox"  value='<?=$_GET['asCk6']?>'/>
            <input id=<?=$_GET['idass6']?> type="text" class="form-control" value='<?=$_GET['ass6']?>'/>
        </div>                   
    
    </div>
    <div>
        <input id=<?=$_GET['idpond']?> type="text"placeholder="Point" value='<?=$_GET['pond']?>'/>
    </div>


<?php
}
?>
<script>
$(function () {
$('.textarea').summernote()
})
</script>


