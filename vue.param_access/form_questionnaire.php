

<!--  -->
<script src="../jquery/dist/summernote/summernote-bs4.min.js"></script>
<!--  -->

<div role="" enctype="" class=" row well" style="width:100%;margin:1px" id="utilisa">
    <div style="background:white">
        <center style="margin-left:0px" class="col-sm-12 titres" > QUESTIONNAIRE</center>
    </div>
</div>
  
    <?php
    $nub=1;
    $qtyyT=1;
    while($qtyyT<=$_GET['nbQT']){
        ?>

        <form id=<?='QuestT'.$nub?> style="border: 1px dashed rgba(174, 174, 174, 0.4); width:99%;margin-botton:5px">
             <div>
             <div  class="col-sm-12" style="margin:1px;padding:0px" >
                <labelle for=<?='qstT'.$nub?> class="col-sm-11" style="font-size:20px"> Question :<?=$nub?></labelle>
                <textarea id=<?='qstT'.$nub?> name=<?='qstT'.$nub?>  class="textarea"  type="text" class="form-control" placeholder="Nombre, Ex:2"></textarea>  
            </div>
            </div>
              <input id=<?='pond'.$nub?>  type="text"  placeholder="Point" />
                     
        </form>
          <div class="col-sm-12" style="marging:0px with:50px" >
              
                 <input onclick="Orientation('../control.param_access/ctr_questionnaire.php?n=<?=$nub?>&form=<?='QuestT'.$nub?>&idPond=<?='pond'.$nub?>&AjoutQstTr&idDev='
             +$('#idDev').val()
             +'&modifQst='+$('#modifQst'+<?=$nub?>).val()
             +'&pond='+$('#pond'+<?=$nub?>).val(),'#<?='QuestT'.$nub?>','#<?='QuestT'.$nub?>')"  class="btn btn-success pull-right  col-sm-2 col-lg-2 col-xs-2" value="Valider Question :<?=$nub?>"/>
        
            </div>

        
        <?php
        $qtyyT++;
        $nub++;
    }
    ?>
  
    <?php
     $qtyyC=1;
    while($qtyyC<=$_GET['nbQC']){
    ?>
                     
            <div id="<?='QuestC'.$nub?>" name=<?='QuestC'.$nub?>  class="col-sm-12  " style="border: 2px dashed rgba(174, 174, 174, 0.4) margin:botton:15px" >
                <labelle for=<?='qstC'.$nub?> class="col-sm-12" style="font-size:20px; color: red"> Question :<?=$nub?></labelle>
                <form id="<?='fseria'.$nub?>" name="<?='fseria'.$nub?>">               
                    <textarea id=<?='qstC'.$nub?>  name=<?='qstC'.$nub?> style="margin:0px; padding:0px" class="textarea"  cols="140" ></textarea>
                <form>
               
                <div class="col-sm-12" style="padding-left:1%;margin:0px" >
                    <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk1'.$nub?> onclick="$(this).val()=='on'?value='checked':value='on'" type="checkbox"  />
                        <input id=<?='ass1'.$nub?> type="text" class="form-control" />
                    </div>
                      <div class="col-sm-4"   style="border: 1px dashed gray">
                        <input id=<?='asCk2'.$nub?> onclick="$(this).val()=='on'?value='checked':value='on'" type="checkbox"  />
                        <input  id=<?='ass2'.$nub?> type="text"  class="form-control" />
                    </div>
                     <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk3'.$nub?> onclick="$(this).val()=='on'?value='checked':value='on'" type="checkbox"  />
                        <input id=<?='ass3'.$nub?> type="text" class="form-control" />
                    </div>
                      <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)" >
                        <input id=<?='asCk4'.$nub?> onclick="$(this).val()=='on'?value='checked':value='on'" type="checkbox"  />
                        <input id=<?='ass4'.$nub?> type="text"  class="form-control" />
                    </div>
                     <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk5'.$nub?> onclick="$(this).val()=='on'?value='checked':value='on'" type="checkbox"  />
                        <input id=<?='ass5'.$nub?> type="text" class="form-control" />
                    </div> 
                     <div class="col-sm-4"  style="border: 1px dashed hsl(48, 100%, 41%)">
                        <input id=<?='asCk6'.$nub?> type="checkbox"  />
                        <input id=<?='ass6'.$nub?> type="text" class="form-control" />
                    </div>                   
                
                </div>
                <input  id=<?='pond'.$nub?> type="text" placeholder="Point" />
            

     <input onclick="Orientation('../control.param_access/ctr_questionnaire.php?AjoutQstCh&n=<?=$nub?>&idqstC=<?='qstC'.$nub?>&form=<?='QuestC'.$nub?>&idasCk1=<?='asCk1'.$nub?>&idass1=<?='ass1'.$nub?>&idasCk2=<?='asCk2'.$nub?>&idass2=<?='ass2'.$nub?>&idass3=<?='ass3'.$nub?>&idasCk3=<?='asCk3'.$nub?>&idasCk4=<?='asCk4'.$nub?>&idass4=<?='ass4'.$nub?>&idasCk5=<?='asCk5'.$nub?>&idass5=<?='ass5'.$nub?>&idasCk6=<?='asCk6'.$nub?>&idass6=<?='ass6'.$nub?>&idpond=<?='pond'.$nub?>&pond='+$('#pond'+<?=$nub?>).val()

                +'&modifQst='+$('#modifQst'+<?=$nub?>).val()
                +'&asCk1='+$('#asCk1'+<?=$nub?>).val()
                +'&ass1='+$('#ass1'+<?=$nub?>).val()
                +'&asCk2='+$('#asCk2'+<?=$nub?>).val()
                +'&ass2='+$('#ass2'+<?=$nub?>).val()
                +'&ass3='+$('#ass3'+<?=$nub?>).val()
                +'&asCk3='+$('#asCk3'+<?=$nub?>).val()
                +'&asCk4='+$('#asCk4'+<?=$nub?>).val()
                +'&ass4='+$('#ass4'+<?=$nub?>).val()
                +'&asCk5='+$('#asCk5<?=$nub?>').val()
                +'&ass5='+$('#ass5'+<?=$nub?>).val()
                +'&asCk6='+$('#asCk6'+<?=$nub?>).val()
                +'&ass6='+$('#ass6'+<?=$nub?>).val()
                +'&idDev='+$('#idDev').val()

                ,'#<?='QuestC'.$nub?>','#<?='fseria'.$nub?>')"  class="btn btn-success pull-right  col-sm-2 col-lg-2 col-xs-2" value="Valider Question :<?=$nub?>"/>
            </div>
    </div>
    <?php
        $qtyyC++;
        $nub++;
    }

    ?>

<script>
$(function () {
$('.textarea').summernote()
})
</script>

