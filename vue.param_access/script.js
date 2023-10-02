function Orientation(lien,vue,form){
    $.ajax({
        type:'POST',
        url:lien,
        data: $(form).serializeArray(),
        beforeSend:function() {
            $('#loader').show()
            },
        success:function(serveur){
            $(vue).html(serveur);      
            $('#loader').hide();                                                  
        } 
    });
    
};


function Orientation2(lien,vue,form){
    $.ajax({
        type:'POST',
        url:lien,

       data : { data1:$(form).serialize()},

        beforeSend:function() {
            $('#loader').show()
            },
        success:function(serveur){
            $(vue).html(serveur);      
            $('#loader').hide();                                                  
        } 
    });
    
};


  function imprimer(objet){
    var contenu = document.getElementById(objet).innerHTML;
    var contenu_form = document.body.innerHTML;
    document.body.innerHTML = contenu;
    window.print();
    document.body.innerHTML = contenu_form;
};

function Encour(){
    alert("ATTENTION ! L'option est en Chantier, Contacter le developpeur [NZANZU][+243828409897]" );

}

function charge_Image(){
    $("#image01").show("slow");
    $("#image01").addClass("has-success");
    $("#image01").html('<a href="#" class="thumbnail" style="height98%; widht:80%" ><img id="image" src="../images/img.jpg" class="img-rounded"></a>');
}

 function showme1(fn1){
        $(fn1).toggle();      
}
 function showme2(fn1){
        $(fn1).show();      
}
function showme3(fn1){
        $(fn1).hide();      
}
  function showme(fn1,fn2,aff){
    if(aff=='true'){
        $(fn2).css('width','82%');
        $(fn1).css('display','inline-block');
        $(fn2).css('display','inline-block');
    }else if(aff=='false'){
        $(fn2).css('width','100%');
        $(fn1).css('display','none');
    }else{
        alert("shewme a un Souci")
    }
  }
