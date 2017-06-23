/* Loading */
$(document).ready(function(){

    setTimeout(function(){

        $('div#loading').animate({

            top: $(window).height()

        }, 300, 'easeInQuart', function(){

            StartLogo();
            $('div#loading').hide();

        });

    }, 3000);



});