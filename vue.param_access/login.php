<section class="centrer box-shadow-mx" style="text-align:center; background: white; height:460px; width:800px">



    <img style="width:100%; height:180px;border-radius: 0% 40% 40% 0%;" src="<?= (isset($_GET['dcxion']) ? '../images/directeur.gif' : 'images/directeur.gif') ?>" class="" />
    <label class=" e-" style="width:100%; height:10px">
        E-ecole
    </label>
    <form id="login1" name="login1" class="row " style="height:200px;border-radius: 60% 0% 0% 0%; background-color: #EFF3F5;width:100%;margin:0; padding:20px" method="post" action=<?= (isset($_GET['dcxion'])) ? '../control.param_access/ctr_con.php' : 'control.param_access/ctr_con.php ' ?>>
        <!-- login input -->
        <center style="font-size:15px; width:100%;padding:10px">
            SAISISER VOS COORDONNES ICI

            <center style="width: 100%;">
                <label class="form-label" for="login" style="margin-left: 0px;">

                    <input id="lg" name="lg" type="text" class="form-control form-control-lg" placeholder="Entrer votre login" />
                </label>

                <!-- Password input -->

                <label class="form-label col-12" for="login" style="margin-left: 0px;">

                    <input id="ps" name="ps" type="password" class="form-control form-control-lg" placeholder="Entrer votre mot depasse" />
                </label>
            </center>


            <!-- Checkbox -->
            <input type="submit" id="bt_log" name="bt_log" class="btn btn-primary  btn-floating " value="Envoyer" />
        </center>


    </form>
    <!-- <center class="contenaire " style="margin-top:-50px ;">
        <div class="ftautreSite">
            <img class="logoAutreSite" id="fb" src="images/logos/facebook.png" onclick=Encour() /><br>
            <label for="fb">Facebook</label>
        </div>
        <div class="ftautreSite">
            <img class="logoAutreSite" src="images/logos/whatsapp.png" onclick=Encour() /><br>
            <label>Whatsapp</label>
        </div>
        <div class=" ftautreSite">
            <img class="logoAutreSite" src="images/logos/youtub.png" onclick=Encour() /><br>
            <label>Youtub</label>
        </div>
        <div class=" ftautreSite">
            <img class="logoAutreSite" src="images/logos/instagram.png" onclick=Encour() /><br>
            <label>Instgram</label>
        </div>
        <div class=" ftautreSite">
            <img class="logoAutreSite" src="images/logos/twetter.png" onclick=Encour() /><br>
            <label>Twetter</label>
        </div>
        <div class=" ftautreSite">
            <img class="logoAutreSite" src="images/logos/tiktok.png" onclick=Encour() /><br>
            <label>TikTok</label>
        </div>
    </center> -->
    <i class="pull-right" style=" position:relative;  left: 0;  bottom: 0;  width: 100%;"> @ contact Dév : +243 828 409 897</i>


</section>