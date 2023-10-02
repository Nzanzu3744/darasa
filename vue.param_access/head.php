        <section style="font-size:13px; background-image: url('images/logo.png')" id="app" background:>                
            <div id="show" class="col-sm-1"><i class="btn-xs glyphicon glyphicon-tasks" style="font-size:20px"  onclick="showme1('.menu');showme3('#titre');showme3('#entete')" ></i></div>
                    <nav class="col-sm-10 navbar navbar-inverse menu" style="font-size:14px">
                         <ul class="nav navbar-nav nav-pills">
                             
                             <li class="dropdown ">
                                <a data-toggle="dropdown" href="#" onclick="showme1('#entete'); Orientation('control.param_access/ctr_utilisateur.php?profil=true&info=profil','#fenetre1')"><i class="glyphicon glyphicon-user "></i> PROFIL</a>
                            </li>
                            <?php
                            if($_SESSION['param_utilisateur_afficher']==1){
                            ?>
                            <li class="" onclick="Orientation('control.param_access/ctr_role.php?VueRl=','#panel')"> <a href="#"> <span class="glyphicon glyphicon-user"></span>MEMBRES PAR GROUPE</a> </li>';
                            <?php
                            }
                            
                            if($_SESSION['org_inscription_afficher']==1){
                            ?>

                           <li><a href="#" onclick="Orientation('control.param_access/ctr_cours.php?VueClasseIns=true','#panel'); ">ELEVE</a> </li>
                           <?php
                           }
                            
                            if($_SESSION['org_affectation_afficher']==1){
                            ?>
                             <li class="dropdown ">
                                <a href="#" onclick="Orientation('control.param_access/ctr_cours.php?VueClasseAff=true','#panel'); ">ENSEIGNANT</a>
                            </li>
                             <?php
                            }
                            if($_SESSION['dir_directeur_afficher']==1){
                            ?>
                            <li class="dropdown ">
                                <a href="#" onclick="Orientation('control.param_access/ctr_cours.php?VueClasseDir=true','#panel'); ">DIRECTION</a>
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
                                    <li><a href="#" onclick="Orientation('vue.param_access/structuration.php','#panel')">Creation Classe</a></li>
                                    <?php
                                    }
                                    if($_SESSION['org_anneesco_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('control.param_access/ctr_anneesco.php?AfficheAnnee=true','#panel'); ">Annee Scolaire</a></li>
                                    <?php
                                    }
                                    if($_SESSION['param_groupe_periode_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('control.param_access/ctr_groupe_periode.php?AfficheGroupe_p=true','#panel'); ">Groupe Période</a></li>
                                    <?php
                                    } 
                                    if($_SESSION['org_periode_afficher']==1){
                                        
                                    ?>
                                    <li><a href="#" onclick="Orientation('control.param_access/ctr_periode.php?Periode=true','#panel'); ">Calendrier</a></li>
                                    <?php
                                    }
                                 
                                    if($_SESSION['param_permission_afficher']==1){
                                    ?>
                                    <li><a href="#" onclick="Orientation('control.param_access/ctr_permission.php?VuePr=','#panel')"> Permission </a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#" onclick="Encour()">BLOG</a>
                            </li>
                            <?php
                            if($_SESSION['param_table_afficher']==1){
                            ?>
                            <li class="dropdown primary">
                                <a data-toggle="dropdown" href="#">BACK-UP<b class="caret pull-right"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#" onclick="Orientation('control.param_access/ctr_backup.php?pukcab=','')">Export</a></li>
                                    <li><a href="#"onclick="Encour()">import</a></li>
                                     <li class="divider"></li>
                                    
                                </ul>
                            </li>
                            <?php
                            }

                            ?>
                            <li class="dropdown primary">
                                <a data-toggle="dropdown" href="#">AIDE<b class="caret pull-right"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="#"onclick="Orientation('control.param_access/ctr_infos.php?infos','#panel')">info@notredame.org</a></li>
                                    <li><a href="#"onclick="Orientation('control.param_access/ctr_contact.php?contact','#panel')">contact@notredame.org</a></li>
                                     <li class="divider"></li>
                                    <li><a href="#"onclick="Encour()">Tel: [RDC] +243 828 409 897</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                        
                   
                </nav>
                     <img style='height:30px; width:30px; display:none; margin:0px;' id="loader" class='pull-right' name="loader" src='images/ajax_loader.gif'/>
           
                <i class="glyphicon glyphicon-use"></i>
                <div id="entete" class="col-sm-12 " style="display: none; font-size:10px; margin:0px; padding:0px; height:100px; border-bottom: 2px solid black">
                        <center href="#" class="thumbnail" style="width:80px; height:60px; display:inline-block">
                                <img   style="height:100%; width:100%;" id="image" src="images/<?=$_SESSION['photoUtilisateur']?>" class="img-rounded">
                                <a class="btn-xs" data-toggle="modal" href="#profil"> Edite</a>
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
                        <button class="btn btn-xs btn-danger pull-right" style="height:30px; width:150px; margin-top:25px;display:inline-block" onclick="Orientation('control.param_access/ctr_membre.php?dcxion=true','#app')" >DECONNEXION <i class=" glyphicon glyphicon-log-out"></i></button>               
                        <!--  -->
                </div>             
                    
<!-- CA C'EST NOTRE HEADER QUE NOUS ALLONS INCLUDE PRESQUE DANS TOUT LE VUE OU RENDU  -->