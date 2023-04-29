function Orientation(lien,vue,form){
    $.ajax({
        type:'POST',
        url:lien,
        data: $(form).serialize(),
        beforeSend:function() {
            $('#loader').show()
            },
        success:function(serveur){
            // $(vue).html(''); 
            $(vue).html(serveur);      
            $('#loader').hide();                                                  
        } 
    });
    
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
        $(fn1).toggle('slow');      
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

