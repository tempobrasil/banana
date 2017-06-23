/* Controla Backgrounds */

var bg_time = 1 * (60 * 1000); //Tempo mostrando cada imagem (3min)
var bg_fade_speed = 3 * (1000); //tempo da transição (3seg)


var bgs_qtd;
var bgs_current = -1;
$(document).ready(function(){

    bgs_qtd = $('div#bgs > div').length;

    //mostra primeiro
    bgs_next();

    setInterval(function(){

        bgs_next();

    }, bg_time);

});

function bgs_next(){

    var next;

    if(bgs_current == -1) {
        next = 0;
    } else {

        if( bgs_current == (bgs_qtd -1) ) {
            next = 1;
        } else {
            next = bgs_current + 1;
        }

    }

    if(next != bgs_current){

        $('div#bgs > div').eq(bgs_current).fadeOut( (bg_fade_speed/2) , function(){

            $('div#bgs > div').eq(next).fadeIn(bg_fade_speed);

            bgs_current = next;

        })

    }

}