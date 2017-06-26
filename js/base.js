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



function RoboPing(fase, data, callback){

    $.ajax({
        type: "POST",
        url: site_root + 'scripts/robo.ping.php',
        data: 'fase=' + fase + '&data=' + data,
        datatype: "json",
        success: function(result){

            if(typeof callback !== undefined)
                callback(result);
        }
    })

}
