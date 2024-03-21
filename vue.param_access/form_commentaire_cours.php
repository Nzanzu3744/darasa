<div>
    <div style="height:20px;width:345px;" id="repondre" name="repondre">

    </div>
    <label class="col-sm-12">
        <textarea id="cmtaire" name="cmtaire" style="width:100%; height:100px; padding:1px; margin:0px; font-size:20px;"></textarea>
    </label>
    <button class="btn-xs btn-success" onclick='Orientation("../control.param_access/ctr_blog.php?ajt=true&profil=<?= $_GET["profil"] ?>&idCours=<?= $_GET["idCours"] ?>&cmtaire="+$("#cmtaire").val()+"&cmtp="+$("#cmtp").val(),"#listcmt","")'>Envoyé</button>
</div>