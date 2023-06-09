
<div>
<div style="height:25px"  id='repondre' name='repondre'>
    
</div>
<textarea id="cmtaire" name="cmtaire" class="col-sm-12" style="width:100%; height:70px; padding:1px; margin:px"></textarea>
<button class="btn-xs btn-success" onclick="Orientation('control.param_access/ctr_blog.php?ajt=true&cours=<?=$_GET['cours']?>&profil=<?=$_GET['profil']?>&idCours=<?=$_GET['idCours']?>&cmtaire='+$('#cmtaire').val()+'&cmtp='+$('#cmtp').val(),'#listcmt','')">Envoyé</button>
</div>