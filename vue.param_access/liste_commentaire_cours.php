<?php
include_once('../model.param_access/blog_commentaire_cours.class.php');
?>
<?php
$cmt= new blog_commentaire_cours();
$cmt=$cmt->selectionCmtCrs($_GET['idCours']);
foreach($cmt as $selCmt){
?>
 <ul class="media-list" style="width:100%">

    <li class="media thumbnail" style="width:100%">
        <div class="media-body" style="width:100%">
            <div class="media thumbnail">
                <div class="rows col-sm-12" style=";color:black; font-size:10px; padding:0px">
                        <center class="pull-left col-sm-1" style="padding:2px">
                            <img  style="width:40px; height:30px;" src="images/<?=$selCmt['photoUtilisateur']?>">
                        </center>
                        <center class="col-sm-10" style="">
                                <?php
                                    echo $selCmt['nomUtilisateur'].' '.$selCmt['postnomUtilisateur'].' '.$selCmt['prenomUtilisateur'].'ID:'.$selCmt['idUtilisateur'].'<br>';
                                    echo $selCmt['dateCreation'];
                                    ?>    
                        </center>
                </div>
                    
                <div class="media-body">
                        <p><?=$selCmt['commentaire']?></p>
                        <div>
                            <button class="btn btn-xs" onclick="Orientation('control.param_access/ctr_blog.php?reponse=true&idut=<?=$selCmt['idUtilisateur']?>&idCmt=<?=$selCmt['idCommentaire']?>&idCours=<?=$_GET['idCours']?>','#repondre','')"><span class="glyphicon glyphicon-share-alt"></span>Repondre</button>
                            <button class="btn btn-xs"><span class="glyphicon glyphicon-heart-empty"></span>Like</button>
                        </div>
                            <!-- REPONSE -->
                        <?php
                        $repCmt= new blog_commentaire_cours();
                        $repCmt=$repCmt->selectionRepCmtCrs($_GET['idCours'], $selCmt['idCommentaire']);
                        foreach($repCmt as $repCmt){
                        ?>
                            <div class="media thumbnail">
                                <div class="rows col-sm-12" style=";color:black; font-size:10px; padding:0px">
                                    <center class="pull-left col-sm-1" style="padding:2px">
                                        <img  style="width:40px; height:30px;" src="images/<?=$repCmt['photoUtilisateur']?>">
                                    </center>
                                    <center class="col-sm-10" style="">
                                        <?php
                                            echo $repCmt['nomUtilisateur'].' '.$repCmt['postnomUtilisateur'].' '.$repCmt['prenomUtilisateur'].'<br>';
                                            echo $repCmt['dateCreation'];
                                        ?>  
                                    </center>
                                </div>
                                <span class="media-body">
                                     <p><?=$repCmt['commentaire']?></p>
                                </span>
                                <!--FIN  -->
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                </div>    
        </div>
    </li>  
</ul>
<?php
}
?>