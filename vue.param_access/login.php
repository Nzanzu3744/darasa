<!DOCTYPE HTML>
    <html>
        <head>
        

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="../bootstrap/dist/css/monstyle.css" rel=stylesheet>
            <script src="../jquery/dist/jquery.min.js"></script>
            <!--    -->
            <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
            <!--  -->
            
            <script src="script.js"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        </head>
        <body style="font-size:13px;background-image:src('../images/nzanzu.png')" id="app">
                <div class="form-inline well col-lg-6 col-sm-6 col-xs-12 col-lg-offset-3 col-sm-offset-3" style="height:280px;margin-top:10%; font-size:20px">
                            <labelle class="col-sm-12" for="lg "> Login :</labelle>
                                
                                    <div class="form-group col-sm-12">
                                        <input id="lg" type="text" class="form-control" style="width:100%" placeholder="Groupe ici">
                                    </div>
                            
                            <labelle class="col-sm-12"  for="ps"> Mot depasse : </labelle>
                                    <div class="form-group col-sm-12" style="padding-bottom:30px">
                                        <input id="ps" type="password" style="width:100%"  class="form-control col-sm-12" placeholder="Groupe ici">
                                    </div>
                            
                                <div class="row" style="margin-top:20px" > </div>  
                                    <button id="btn_enreg_lecon" onclick="Orientation('../control.param_access/ctr_con.php?lgdfds='+$('#lg').val()+'&ps='+$('#ps').val(),'#app')"  class="btn btn-success pull-right col-sm-6">Valider</button>
                                    <button onclick="Encour()" class="btn btn-primary pull-left col-sm-6">Annuler</button>
                               
                    </div> 
</footer>
    </body>
    
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</html>  
