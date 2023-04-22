

<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->
<?php
include_once('../model.param_access/crs_assertion.class.php');
if(isset($_GET['AjoutQstTr'])){
?>

 <div>
 <div id="<?='QuestT'.$_GET['n']?>" name="<?='QuestT'.$_GET['n']?>" class="col-sm-12" style="margin:1px;padding:0px" >
    <labelle for=<?='qstT'.$_GET['n']?> class="col-sm-11" style="font-size:20px"> Question :<?=$_GET['n']?></labelle>
    <textarea id=<?='qstT'.$_GET['n']?> name=<?='qstT'.$_GET['n']?>  class="textarea" type="text" class="form-control" placeholder=""><?=$_POST['qstT'.$_GET['n']]?></textarea>  
</div>
<div class="col-sm-12" style="marging:0px with:50px" >
    <input id=<?=$_GET['idPond']?> placeholder="Point" value='<?=$_GET['pond']?>'/>
</div>
</div>


<?php
}else if(isset($_GET['AjoutQstCh'])){

                    $ass = new crs_assertion();
                    if(!empty($_GET['ass1'])){
                    ?>
                    <input disabled style="color:red" id="modif1<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass1'],($_GET['asCk1']=='on')?0:1)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass2'])){
                      ?>
                    <input disabled style="color:red" id="modif2<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass2'],($_GET['asCk2']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass3'])){
                        ?>
                    <input disabled style="color:red" id="modif3<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass3'],($_GET['asCk3']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass4'])){
                         ?>
                    <input disabled style="color:red" id="modif4<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass4'],($_GET['asCk4']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass5'])){
                         ?>
                    <input disabled style="color:red" id="modif5<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass5'],($_GET['asCk5']=='checked')?1:0)?>'/>
                    <?php
                    }
                    if(!empty($_GET['ass6'])){
                         ?>
                    <input disabled style="color:red" id="modif6<?=$_GET['n']?>" value='<?=$ass->ajouter($idQest,$_GET['ass6'],($_GET['asCk6']=='checked')?1:0)?>'/>
                    <?php
                    }
?>

<labelle for=<?='qstC'.$_GET['n']?> class="col-sm-12" style="font-size:20px"> Question :<?=$_GET['n']?></labelle>
    <form id="<?='QuestC'.$_GET['n']?>" name="<?='QuestC'.$_GET['n']?>">
    <textarea id=<?='qstC'.$_GET['n']?> name=<?='qstC'.$_GET['n']?>  class="textarea"  cols="140" placeholder=""><?=$_POST['qstC'.$_GET['n']]?></textarea>
    </form>
    <div class="col-sm-12" style="padding-left:1%" >
        <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input value='<?=$_GET['asCk1']?>' <?=$_GET['asCk1']?> id=<?=$_GET['idasCk1']?>  type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=<?=$_GET['idass1']?> type="text" class="form-control" value='<?=$_GET['ass1']?>'/>
        </div>
            <div class="col-sm-4"   style="border: 1px dashed gray">
            <input id=<?=$_GET['idasCk2']?> value='<?=$_GET['asCk2']?>' <?=$_GET['asCk2']?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'"/>
            <input  id=<?=$_GET['idass2']?> type="text"  class="form-control" value='<?=$_GET['ass2']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk3']?> value='<?=$_GET['asCk3']?>' <?=$_GET['asCk3']?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'"/>
            <input id=<?=$_GET['idass3']?> type="text" class="form-control" value='<?=$_GET['ass3']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
            <input id=<?=$_GET['idasCk4']?> value='<?=$_GET['asCk4']?>' <?=$_GET['asCk4']?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'"/>
            <input id=<?=$_GET['idass4']?> type="text"  class="form-control" value='<?=$_GET['ass4']?>'/>
        </div>
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk5']?> value='<?=$_GET['asCk5']?>' <?=$_GET['asCk4']?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'" />
            <input id=<?=$_GET['idass5']?> type="text" class="form-control" value='<?=$_GET['ass5']?>'/>
        </div> 
            <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
            <input id=<?=$_GET['idasCk6']?> value='<?=$_GET['asCk6']?>' <?=$_GET['asCk6']?> type="checkbox" onclick="$(this).val()=='on'?value='checked':value='on'"/>
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


