        <?php
        (empty($_SESSION)) ? session_start() : '';
        ?>

        <div class="head navbar">
            <!-- <div id="show" class="col-sm-1"><i class="btn-xs glyphicon glyphicon-tasks" onclick="showme1('.menu');"></i></div> -->

            <nav class="col-sm-10  menu navbar-inverse">
                <div class="nav navbar-nav nav-pills" style=" display: flex;">

                    <li class="dropdown ">
                        <a data-toggle="dropdown" href="#" onclick="showme1('#entete'); Orientation('../control.param_access/ctr_utilisateur.php?profil=true&info=profil','#fenetre1')"><i class="glyphicon glyphicon-user "></i> PROFIL</a>
                    </li>
                    <?php
                    if ($_SESSION['param_utilisateur_afficher'] == 1) {
                    ?>
                        <li class="" onclick="Orientation('../control.param_access/ctr_membre.php?VueMembre=','#panel')"> <a href="#"> <span class="glyphicon glyphicon-user"></span>MEMBRES PAR GROUPE</a> </li>';
                    <?php
                    }

                    if ($_SESSION['org_inscription_afficher'] == 1) {
                    ?>

                        <li><a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?VueClasseIns=true','#panel'); ">ELEVE</a> </li>
                    <?php
                    }

                    if ($_SESSION['org_affectation_afficher'] == 1) {
                    ?>
                        <li class="dropdown ">
                            <a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?VueClasseAff=true','#panel'); ">ENSEIGNANT</a>
                        </li>
                    <?php
                    }
                    if ($_SESSION['dir_directeur_afficher'] == 1) {
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
                            if ($_SESSION['param_ecole_afficher'] == 1 and $_SESSION['idUtilisateur'] <= 0) {
                            ?>
                                <li class="dropdown ">
                                    <a href="#" onclick="Orientation('../control.param_access/ctr_ecole.php?VueEcoleAff=true','#panel'); ">Préparation Ecole</a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION['org_anneesco_afficher'] == 1) {
                            ?>
                                <li><a href="#" onclick="Orientation('../control.param_access/ctr_anneesco.php?AfficheAnnee=true','#panel'); ">Annee Scolaire</a></li>

                            <?php
                            }
                            if ($_SESSION['org_classe_afficher'] == 1 and $_SESSION["idUtilisateur"] <= 0) {
                            ?>
                                <li><a href="#" onclick="Orientation('../vue.param_access/structuration.php','#panel')">Preparation Classe</a></li>

                            <?php
                            }
                            if ($_SESSION['org_classe_afficher'] == 1) {
                            ?>
                                <li><a href="#" onclick="Orientation('../vue.param_access/classe.php','#panel')">Creation Classe</a></li>

                            <?php
                            }
                            if ($_SESSION['crs_prepacours_afficher'] == 1) {
                            ?>
                                <li><a href="#" onclick="Orientation('../control.param_access/ctr_cours.php?vue_prepacours=true','#panel')">Prépation des cours</a></li>
                            <?php
                            }
                            if ($_SESSION['param_groupe_periode_afficher'] == 1 and $_SESSION["idUtilisateur"] <= 0) {
                            ?>
                                <li><a href="#" onclick="Orientation('../control.param_access/ctr_groupe_periode.php?AfficheGroupe_p=true','#panel'); ">Groupe Période</a></li>
                            <?php
                            }
                            if ($_SESSION['param_groupe_periode_afficher'] == 1 and $_SESSION["idUtilisateur"] <= 0) {
                            ?>
                                <!-- <li ><a style="color:#f1f1f1" href="#" onclick="Encour(); ">Genre</a></li> -->
                            <?php
                            }
                            if ($_SESSION['org_periode_afficher'] == 1) {

                            ?>
                                <li><a href="#" onclick="Orientation('../control.param_access/ctr_periode.php?Periode=true','#panel'); ">Calendrier</a></li>
                            <?php
                            }
                            if ($_SESSION['param_permission_afficher'] == 1) {
                            ?>
                                <li><a href="#" onclick="Orientation('../control.param_access/ctr_permission.php?VuePr=','#panel')"> Groupe & Permission </a></li>
                            <?php
                            }
                            if ($_SESSION['param_licence_afficher'] == 1) {
                            ?>
                                <li><a href="#" style="color:green" onclick="Encour()">Activation License </a></li>
                            <?php
                            }



                            ?>
                        </ul>
                    </li>

                    <?php
                    if ($_SESSION['param_table_afficher'] == 1) {
                    ?>
                        <li class="dropdown primary">
                            <a data-toggle="dropdown" href="#">BACK-UP<b class="caret pull-right"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../control.param_access/ctr_backup.php?bkp=true" onclick="Orientation('../control.param_access/ctr_backup.php?pukcab=','')">Export</a></li>
                            </ul>
                        </li>
                    <?php
                    }

                    ?>



                </div>


            </nav>

            <form id="ecole" name="ecole" class="pull-right col-sm-2" style="padding:0px; margin:0px;">

                <select onchange='Orientation("../control.param_access/ctr_con.php?chgEcole=true&idEcole="+$(this).val(),"#app")' id="AutEcole" name="AutEcole" style="background:#212223; height:50px; padding:0px; margin:0px; color: white; width:100%; " class="">

                    <?php
                    $i = 0;
                    $verif = false;
                    if (isset($_SESSION['monEcole'])) {
                        $verif = true;
                    ?>
                        <option style="" value="<?= $_SESSION['monEcole']['idEcole'] ?>"><?= strtoupper($_SESSION['monEcole']['singleEcole']) ?></option>
                        <?php
                    }
                    include_once('../model.param_access/param_ecole.class.php');

                    $annSelect = param_ecole::filtrerecolesByRoleUti($_SESSION['idUtilisateur'])->fetchAll();

                    foreach ($annSelect as $selEco) {

                        if ($_SESSION['monEcole']['idEcole'] != $selEco['idEcole']) {
                        ?>
                            <option style="" value="<?= $selEco['idEcole'] ?>"><?= strtoupper($selEco['singleEcole']) ?></option>
                    <?php
                        }

                        $i++;
                    }

                    ?>
                </select>
                <!-- <input type="submit" value="" style="background:212223; height:50px; width:1px; color:white;" class="btn btn-sm btn-primary  pull-right "> -->

            </form>


            <!-- <img style=' height:30px; width:30px; display:none; margin:0px;' id="loader" class='pull-right' name="loader" src='../images/ajax_loader.gif' /> -->

            <!-- <i class="glyphicon glyphicon-use"></i> -->
            <div id="entete" class="col-sm-12 backgroundTransp heightFen profilRub box-shadow-mx" onmouseleave="showme1('#entete')">
                <button class="btn btn-xs btn-danger col-sm-12px btn_dcx" onclick="Orientation('../control.param_access/ctr_membre.php?dcxion=true','#app')">DECONNEXION
                    <i class=" glyphicon glyphicon-log-out">

                    </i>
                </button>
                <center href="#" class="thumbnail photoProf">
                    <img style="height:100%; width:100%;" id="image" src="../images/<?= $_SESSION['photoUtilisateur'] ?>" class="img-rounded">
                </center>
                <a class="btn-xs" data-toggle="modal" href="#profil" style="margin-left: -5px;"> Edite</a>

                <?php
                include_once('../model.param_access/param_utilisateur.class.php');
                $util = param_utilisateur::rechercherlarge($_SESSION['idUtilisateur'])->fetch();
                ?>
                <div class="sous-profilRub">
                    <p class="" style=" text-align:justify;">
                        <center class="rubriProf">IDENTITE</center>
                        Identifiant :
                        <x class="pull-right">
                            <?= '[' . $util['idUtilisateur'] . ']' ?>
                        </x><br>
                        Nom :
                        <x class="pull-right">
                            <?= $util['nomUtilisateur'] ?>
                        </x><br>
                        Postnom :
                        <x class="pull-right"><?= $util['postnomUtilisateur'] ?>
                        </x><br>
                        Prenom :
                        <x class=" pull-right"><?= $util['prenomUtilisateur'] ?>
                        </x></br>
                        Genre :
                        <x class="pull-right"><?= $util['genre'] ?>
                        </x><br>
                        Date :
                        <x class="pull-right"><?= $util['dateNais'] ?>
                        </x><br>
                        Lieu Nais. :
                        <x class="pull-right"><?= $util['lieuNais'] ?>
                        </x><br>
                        NN Carte d'électeu :
                        <x class="pull-right"><?= $util['nnCarteElect'] ?>
                        </x>
                    </p>
                    <p class="" style=" text-align:justify;">
                        <center class="rubriProf">ADRESSE</center>
                        Pays :
                        <x class=" pull-right"><?= '[' . $util['codePays'] . ']' . $util['nomPays'] ?>
                        </x></br>
                        Province :
                        <x class=" pull-right"><?= $util['nomProvince'] ?>
                        </x></br>
                        Terr/Ville :
                        <x class=" pull-right"><?= $util['nomVilleTerritoire'] ?>
                        </x></br>
                        Autres :
                        <x class=" pull-right"><?= $util['adresse'] ?>
                        </x>
                    </p>
                    <p class="" style=" text-align:justify;">
                        <center class="rubriProf">CONTACTS</center>
                        Tel :
                        <x class="pull-right">
                            <?= $util['telUtilisateur'] ?></x><br>
                        Mail :
                        <a class="pull-right">
                            <?= $util['mailUtilisateur'] ?>
                        </a><br>

                    </p>
                    <center class="rubriProf">ECOLE ENCOURS</center>
                    <p>
                        NOM : <x class="pull-right"><?= $_SESSION['monEcole']['nomEcole'] ?></x><br>
                        BP. : <x class="pull-right"><?= $_SESSION['monEcole']['bpEcole'] ?></x><br>

                    </p>



                </div>

            </div>
        </div>



        <!-- CA C'EST NOTRE HEADER QUE NOUS ALLONS INCLUDE PRESQUE DANS TOUT LE VUE OU RENDU  -->