<?php
    // session_start();
?>

        <body style="font-size:13px; background-image: url('../images/logo.png')" id="app" background:>
                    <!-- <div class="page-header" style="height:20px">
                         <center><h3><BOLD>DARASA/COMPLEXE SCOLAIRE NOTRE DAME DE GRACES</BOLD></h3></center>
                    </div> -->
                <div class="col-sm-12">
                
                    <div id="show" class="col-sm-1"><i class="btn-xs glyphicon glyphicon-tasks"  onclick="showme1('.menu')" ></i><i class="btn-xs glyphicon glyphicon-resize-vertical"  onclick="showme1('#titre')" ></i></div>
                    <nav class="col-sm-10 navbar navbar-inverse menu" style="font-size:11px">
                         <ul class="nav navbar-nav nav-pills">
                             <li class="dropdown " id="acc" name="acc" >
                                <a data-toggle="dropdown" id="acceuil" name="acceuil" value="20uey"  onclick="Orientation('../control.param_access/ctr_acceuil.php?acceuil','#app','')"  ><i class="glyphicon glyphicon-home "></i> ACCEUIL</a>
                            </li>
                             <li class="dropdown ">
                                <a data-toggle="dropdown" href="#" onclick="showme1('#entete'); Orientation('../control.param_access/ctr_utilisateur.php?profil=true','#fenetre')"><i class="glyphicon glyphicon-user "></i> PROFIL</a>

                            </li>
                            <?php
                            if($_SESSION['param_utilisateur_afficher']==1){
                            ?>
                            <li class="" onclick="Orientation('../control.param_access/ctr_role.php?VueRl=','#panel')"> <a href="#"> <span class="glyphicon glyphicon-user"></span>MEMBRES PAR GROUPE</a> </li>';
                            <?php
                            }
                            
                            if($_SESSION['org_inscription_afficher']==1){
                            ?>

                           <li><a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?VueClasseIns=true','#panel'); ">ELEVE</a> </li>
                           <?php
                           }
                            
                            if($_SESSION['org_affectation_afficher']==1){
                            ?>
                             <li class="dropdown ">
                                <a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?VueClasseAff=true','#panel'); ">ENSEIGNANT</a>
                            </li>
                             <?php
                            }
                            if($_SESSION['dir_directeur_afficher']==1){
                            ?>
                            <li class="dropdown ">
                                <a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?VueClasseDir=true','#panel'); ">DIRECTION</a>
                            </li>
                          <?php
                            }
                            ?>
                            <li class="dropdown ">
                                <a data-toggle="dropdown" href="#">PARAMETRE<b class="caret pull-right"></b></a>
                                    <ul class="dropdown-menu">
                                    <?php
                                    if($_SESSION['org_classe_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('structuration.php','#panel')">Creation Classe</a></li>
                                    <?php
                                    }
                                    if($_SESSION['org_anneesco_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('../control.param_access/ctr_anneesco.php?AfficheAnnee=true','#panel'); ">Annee Scolaire</a></li>
                                    <?php
                                    }
                                 
                                    if($_SESSION['param_permission_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('../control.param_access/ctr_permission.php?VuePr=','#panel')"> Permission </a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" onclick="Encour()">BLOG</a>
                            </li>
                            <li class="dropdown ">
                                <a class=" data-toggle="dropdown" href="#">BACK-UP<b class="caret pull-right"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#" onclick="Encour()">Export</a></li>
                                    <li><a href="#"onclick="Encour()">import</a></li>
                                    <li class="divise"></li>
                                    <li> <a href=""></a>
                                </ul>
                            </li>
                            <li class="dropdown primary">
                                <a data-toggle="dropdown" href="#">AIDE<b class="caret pull-right"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#"onclick="Encour()">info@darasa.org</a></li>
                                    <li><a href="#"onclick="Encour()">support@darasa.org</a></li>
                                     <li class="divider"></li>
                                    <li><a href="#"onclick="Encour()">Tel: [RDC] +243 828 409 897</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                        
                   
                    </nav>
                     <img style='height:30px; width:30px; display:none; margin:0px;' id="loader" class='pull-right' name="loader" src='../images/ajax_loader.gif'/>
                </div>
                <i class="glyphicon glyphicon-use"></i>
                <div id="entete" class="col-sm-12 " style="display: none; font-size:10px; margin:0px; padding:0px; height:100px; border-bottom: 2px solid black">
                        <center href="#" class="thumbnail" style="width:80px; height:60px; display:inline-block">
                                <img   style="height:100%; width:100%;" id="image" src="../images/<?=$_SESSION['photoUtilisateur']?>" class="img-rounded">
                                <a class="btn-xs" data-toggle="modal" href="#infos"> Edite</a>
                        </center>
                        <!--  -->
                        <div class="" style="height:60px; width:400px; font-size:10px; margin:0px; padding:0px; display:inline-block">
                            <li class=""> Nom : <b><?=$_SESSION['nom']?></b></li>
                            <li class=""> Postnom : <b><?=$_SESSION['postnom']?></b></li>
                            <li class=""> Prenom : <b><?=$_SESSION['prenom']?></b></li>
                            <li class=""> Tel : : <b><?=$_SESSION['telUtilisateur']?></b></li>
                            <li class=""> Mail : <?='<a>'.$_SESSION['mailUtilisateur'].'</a>'?></li>
                            <li class=""> Genre : <b><?=$_SESSION['genre']?></b></li>
                        </div>
                        
                        <!--  -->
                        <button class="btn btn-xs btn-danger pull-right" style="height:30px; width:150px; margin-top:25px;display:inline-block" onclick="Orientation('../control.param_access/ctr_membre.php?dcxion=true','#app')" >DECONNEXION <i class=" glyphicon glyphicon-log-out"></i></button>               
                        <!--  -->
                </div>   
                <div id="fenetre">
                    
                </div>              
                    
<!-- CA C'EST NOTRE HEADER QUE NOUS ALLONS INCLUDE PRESQUE DANS TOUT LE VUE OU RENDU  -->