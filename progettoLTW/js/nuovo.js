$("#features").on('change', function() {
    var n1 = document.getElementById('nicoPart').value;
    var n2 = document.getElementById('nicoOtt').value;
    var lt = document.getElementById('ltOtt').value;
    var p_Ar = document.getElementById('p_Ar').value;

    var p_H20 = document.getElementById('p_H20').value;


    var n3 = 0,
        ne1 = 0,
        H20 = 0,
        AR = 0,
        neG = 0,
        niG = 0,
        ARG = 0,
        H20G = 0;
    H20 = (p_H20 * lt) / 100;
    AR = (p_Ar * lt) / 100;
    var result = "";

    var formatNico = "",
        formatNeutro = "",
        formatArOtt = "",
        formatH20Ott = "",
        formatNicoG = "",
        formatNeutroG = "",
        formatArG = "",
        formatH20G = "";
    if ((p_Ar != 0) | (p_H20 != 0 & (n1 != 0 & n2 != 0))) {

        if ((n1 > 0) & (n2 > 0) & (p_H20 != 0)) { // se c'è l'acqua
            n3 = (lt * n2) / n1;
            ne1 = lt - n3;
            ne1 = ne1 - H20 - AR;

            neG = (20 * ne1);
            niG = (20 * n3);
            ARG = (20 * AR);
            H20G = (20 * H20);

            formatNico = n3.toFixed(2);
            formatNeutro = ne1.toFixed(2);
            formatArOtt = AR.toFixed(2);
            formatH20Ott = H20.toFixed(2);

            formatNicoG = niG.toFixed(0);
            formatNeutroG = neG.toFixed(0);
            formatArG = ARG.toFixed(0);
            formatH20G = H20G.toFixed(0);


        } else if ((n1 == 0) & (n2 == 0)) {
            H20 = (p_H20 * lt) / 100;
            AR = (p_Ar * lt) / 100;
            ne1 = lt - (AR + H20);
            /*converto In  gocce anche qui*/
            neG = (20 * ne1);
            ARG = (20 * AR);
            H20G = (20 * H20);

            formatNeutro = ne1.toFixed(2);
            formatArOtt = AR.toFixed(2);
            formatH20Ott = H20.toFixed(2);


            formatNeutroG = neG.toFixed(0);
            formatArG = ARG.toFixed(0);
            formatH20G = H20G.toFixed(0);


        } else { // ci entra sempre se non esiste H20
            n3 = (lt * n2) / n1; /*formula algorittimo*/
            ne1 = lt - n3;
            ne1 = ne1 - AR;
            /* CREO LE GOCCE */
            neG = (20 * ne1);
            niG = (20 * n3);
            ARG = (20 * AR);


            formatNico = n3.toFixed(2);
            formatNeutro = ne1.toFixed(2);
            formatArOtt = AR.toFixed(2);


            formatNicoG = niG.toFixed(0);
            formatNeutroG = neG.toFixed(0);
            formatArG = ARG.toFixed(0);


            //res = document.getElemnt(div che ho fatti)
            //document.res.appendChild()
        }

    }
    $('#nicoResult').val(formatNico);
    $('#nicoResultGocce').val(formatNicoG);
    $('#neutroResult').val(formatNeutro);
    $('#neutroResultGocce').val(formatNeutroG);
    $('#aromaResult').val(formatArOtt);
    $('#aromaResultGocce').val(formatArG);
    $('#H20Result').val(formatH20Ott);
    $('#H20ResultGocce').val(formatH20G);
});



$("#TDEE").on('change', function() {
    var kg = document.getElementById('peso').value;
    var cm = document.getElementById('altezza').value;
    var eta = document.getElementById('eta').value;
    var attivita = document.getElementById('attivita').value;

    if (document.getElementById('uomo').checked) {
        var bmr = parseInt((9.99 * kg) + (6.25 * cm) - (4.92 * eta) + 5);
    } else if (document.getElementById('donna').checked) {
        var bmr = parseInt((9.99 * kg) + (6.25 * cm) - (4.92 * eta) - 161);
    }
    var tdee = parseInt(bmr * attivita);
    var pro = parseInt(1.1 * kg);
    var fat = parseInt(((25 * tdee) / 100) / 9);
    var tdeeSenza = tdee - (pro * 4) - (25 * tdee) / 100;
    var cho = parseInt(tdeeSenza / 4)

    $('#bmr').val(bmr);
    $('#tdee').val(tdee);
    $('#pro').val(pro);
    $('#fat').val(fat);
    $('#cho').val(cho);


});




var TxtType = function(el, toRotate, period) { // costruttore
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];
    if (i == 4) exit();

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    // se clicco la scritti ricarica la pagina
    this.el.innerHTML = '<a onClick="location.href=location.href" class="wrap">' + this.txt + '</a>';

    var that = this;
    var delta = 120 - Math.random() * 100;

    if (this.isDeleting) {
        delta /= 5;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};



$(document).ready(function() {
    $("#iPhoneBtn").on('click', function() {
        var image_x = document.getElementById('mani');
        image_x.parentNode.removeChild(image_x);
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        $("#iPhoneBtn").attr("disabled", "disabled").off('click');
    });

   // $("#scrollante").attr("disabled", "disabled").off('click');
   
});

function myFunction() {
   $("#scrollante").removeClass("mb-5");
   $("#scrollante").addClass("nonee");
}

setTimeout(function(){
  myFunction();
}, 3000)




$(function() {
    $("#fotoLuca").on({
        mouseenter: function() {
            $(this).attr('src', 'img/fotoLucaSfocata.jpg');
        },
        mouseleave: function() {
            $(this).attr('src', 'img/fotoLuca.jpg');
        }
    });

});
$(function() {
    $("#fotoValerio").on({
        mouseenter: function() {
            $(this).attr('src', 'img/fotoValerioSfocata.jpg');
        },
        mouseleave: function() {
            $(this).attr('src', 'img/fotoValerio.jpg');
        }
    });

});