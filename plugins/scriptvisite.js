
function RechVisite(cle){
  $.ajax({
            type : "GET", 
            url : "../../C/controlvisite.php?RechVisite="+cle,
            success:function(serveur)
            {
              console.log(serveur);
              $("#div_tab_vi").html('');
              $("#div_tab_vi").html(serveur);
            }
        });  
}
function verifierfiche(cle){
  // alert(11);
  $.ajax({
            type : "GET", 
            url : "../../C/controlvisite.php?VerifiFic="+cle,
            success:function(serveur)
            {
              // alert(serveur);
              if(serveur==1){
                $("#Fiche").css('Border','green');
                $("#Fiche").css('color','green');
              }
              if(serveur==0){
                $("#Fiche").css('Border','red');
                $("#Fiche").css('color','red');
              }
             
            }
        });  
}
function ajoutervisite(nv,rem,fich){
  // alert(nv);
  // alert(rem);
  // alert(fich);
  $.ajax({
            type : "GET", 
            url : "../../C/controlvisite.php?nVi="+nv+'&fich='+fich+'&rem='+rem,
            success:function(serveur)
            {
              
              // alert(serveur);
              if(serveur==1){
                RechVisite('');
               alert('Enregistrement reussi !');

              }
              if(serveur==0){
                alert('Enregistrement a echouée');
              }
             
            }
        });  
}
// function ModifierClient(id){
//   $.ajax({
//       type:'POST',
//       url:'../../C/controlclient.php',
//       data: $('#formclient').serialize(),
//       success:function(serveur){
        
//         if (serveur==1){
//           rechercheclient('');
//           $('#resultat').css('color','green').text("L'Modification  réussi !");
//           $('#resultat').show();
//           $('#resultat').fadeOut(3000);
//         }
//         if(serveur==0){
//           rechercheclient('');
//           $('#resultat').css('color','red').text("L'Modification echouée !");
//           $('#resultat').show();
//         }
//       } 
//     });
// }

// function ajouterClient(){
//   $.ajax({
//       type:'POST',
//       url:'../../C/controlclient.php',
//       data: $('#formclient').serialize(),
//       success:function(serveur){
        
//         if (serveur==true){
//           rechercheclient('');
//           $('#resultat').css('color','green').text("L'enregistrement réussi !");
//           $('#resultat').show();
//           $('#resultat').fadeOut(3000);
//         }
//         if(serveur==false){
//           rechercheclient('');
//           $('#resultat').css('color','red').text("L'enregistrement echoué !");
//           $('#resultat').show();
//         }
//         rechercheclient('');
//       } 
//     });
// }
// //REcuperation du fomulaire
// function modifierClient(id){
//   // alert(id);
//   $.ajax({
//       type:'get',
//       url:'../../C/controlclient.php?idclientMod='+id,
//       success:function(serveur){
//         // alert(serveur);
//         if (serveur!=''){
//           $('#frmclient1').html('');
//           $('#frmclient1').html(serveur);
//           $('#resultat').css('color','green').text("Selection reussi");
//           $('#resultat').show();
//           $('#resultat').fadeOut(6000);
//         }
//       } 
//     });
// }
// //Enregistrement
// function EnregmodifierClient(id){
//   // alert(id);
//   $.ajax({
//       type:'POST',
//       url:'../../C/controlclient.php?EnrgMod='+id,
//       data: $('#formclient').serialize(),
//       success:function(serveur){
        
//         if (serveur==true){
//           rechercheclient('');
//           $('#resultat').css('color','green').text("L'enregistrement réussi !");
//           $('#resultat').show();
//           $('#resultat').fadeOut(3000);
//         }
//         if(serveur==false){
//           rechercheclient('');
//           $('#resultat').css('color','red').text("L'enregistrement echoué !");
//           $('#resultat').show();
//         }
//       } 
//     });
// }
// function annulerMod(){
//   $.ajax({
//       type:'get',
//       url:'../../C/controlclient.php?AnnalerMod=1',
//       success:function(serveur){
//           $('#frmclient1').html('');
//           $('#frmclient1').html(serveur);
//           $('#resultat').css('color','red').text("Annule Modification");
//           $('#resultat').show();
//           $('#resultat').fadeOut(6000);
//         }
      
//     });
// }


// function recIDClient(id){
// 	$.ajax({
// 		type:'get',
// 		url:'../../C/controlclient.php?id='+id,
    
//     success:function(server){
//       if(server == true){
//         rechercheclient('');
//         console.log(server);
//         alert("Suppression réussie !");
//       }else{
//         console.log(server);
//         rechercheclient('');
//         alert("Suppression echoué !");
//       }
//     }
// 	})
// }
// function verifierjeton(cle){

//     $.ajax({
//     type:'get',
//     url:'../../C/controlclient.php?idjeton='+cle,
//     success:function(server){
//       // alert(server);

//       if(server==1){     
//         $('#Jeton').css('color','green');
//         $('#Jeton').css('border-color','green');
//       }
//       if(server==0){
//        $('#Jeton').css('color','red');       
//        $('#Jeton').css('border-color','red');       
//       }
//     }
//   })
// }