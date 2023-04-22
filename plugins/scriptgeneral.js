function enregistretaux(taux){
    
  $.ajax({
      type:'get',
      url:'../../C/controlgeneral.php?tauxAj='+taux,
      success:function(serveur){
        // alert(serveur);
          $('#div_taux').html('');
          $('#div_taux').html(serveur);
      } 
    });
}
 function enregistrefonct(variable){
  $.ajax({
      type:'get',
      url:'../../C/controlgeneral.php?FocntAj='+variable,
      success:function(serveur){
        // alert(serveur);
          $('#div_fonct').html('');
          $('#div_fonct').html(serveur);
      } 
    });
}


 function supprimerfonc(fonct){
  // alert(fonct);
  $.ajax({
      type:'get',
      url:'../../C/controlgeneral.php?supfonct='+fonct,
      success:function(serveur){
        // alert(serveur);
          $('#div_fonct').html('');
          $('#div_fonct').html(serveur);
      } 
    });
}

function supprimerTaux(SupTaux){
  // alert(SupTaux);
  $.ajax({
      type:'get',
      url:'../../C/controlgeneral.php?SupTaux='+SupTaux,
      success:function(serveur){
        // alert(serveur);
          $('#div_taux').html('');
          $('#div_taux').html(serveur);
      } 
    });
}




function recherchefiche(){
      $.ajax({
      type:'get',
      url:'../../C/controlgeneral.php?taux='+taux,
      success:function(serveur){
        if (serveur==true) {
          recherchefiche(id,'');
          actualiseform(id);
          $('#resultat').css('color','green').text("L'enregistrement réussi !");
          $('#resultat').show();
          $('#resultat').fadeOut(3000);
          console.log(serveur);
        }else{
          $('#resultat').css('color','red').text("L'enregistrement echoué !");
          $('#resultat').show();
          $('#resultat').fadeOut(20000);
          console.log(serveur);

        }
      } 
    });
}

