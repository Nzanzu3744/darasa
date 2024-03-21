function Orientation(lien, vue, form) {
    $.ajax({
        type: 'POST',
        url: lien,
        data: $(form).serializeArray(),
        beforeSend: function () {
            $('#loader').show()
        },
        success: function (serveur) {
            $(vue).html(serveur);
            $('#loader').hide();
        }
    });

};


function Orientation2(lien, vue, form) {
    $.ajax({
        type: 'POST',
        url: lien,

        data: { data1: $(form).serialize() },

        beforeSend: function () {
            $('#loader').show()
        },
        success: function (serveur) {
            $(vue).html(serveur);
            $('#loader').hide();
        }
    });

};


function imprimer(objet) {
    var contenu = document.getElementById(objet).innerHTML;
    var contenu_form = document.body.innerHTML;
    document.body.innerHTML = contenu;
    window.print();
    document.body.innerHTML = contenu_form;
};

function Encour() {
    alert("ATTENTION ! L'option est en Chantier, Contacter le developpeur [NZANZU][+243828409897]");

}
function alerter(info) {
    alert(info);
}

function charge_Image() {
    $("#image01").show("slow");
    $("#image01").addClass("has-success");
    $("#image01").html('<a href="#" class="thumbnail" style="height98%; widht:80%" ><img id="image" src="../images/img.jpg" class="img-rounded"></a>');
}

function showme1(fn1) {
    $(fn1).toggle();
}
function showme2(fn1) {
    $(fn1).show();
    $(fn1).css('display', 'inline-block');
}
function showme3(fn1) {
    $(fn1).hide();
    $(fn1).css('display', 'none');
}
function showme(fn1, fn2, aff) {
    if (aff == 'true') {
        $(fn2).css('width', '75%');
        $(fn1).css('display', 'inline-block');
        $(fn2).css('display', 'inline-block');
    } else if (aff == 'false') {
        $(fn2).css('width', '100%');
        $(fn1).css('display', 'none');
    } else {
        alert("shewme a un Souci")
    }
}

function verifierchamps(url, btn, form) {
    $.ajax({
        type: 'POST',
        url: url,
        data: { data1: $(form).serialize() },
        // beforeSend: function () {
        //     if ($(chp).val() <= 10) {
        //         $(chp).css('champDanger');
        //         $(btn).hide();
        //         alert($(chp).val());
        //     } else {
        //         $(chp).addClass('champSucces');
        //         $(btn).show();
        //         alert($(chp).val());
        //     }
        // },
        success: function (serveur) {
            alert(serveur);

        }
    });

};
