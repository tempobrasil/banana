/* Loading */
$(document).ready(function(){

    $('div#loading').animate({

        top: $(window).height()

    }, 300, 'easeInQuart', function(){

        StartLogo();
        $('div#loading').hide();

    });

});



function RoboPing(fase, data, callback){

    $.ajax({
        type: "POST",
        url: site_root + 'scripts/robo.ping.php',
        data: 'fase=' + fase + '&data=' + data,
        datatype: "json",
        success: function(result){

            if(typeof(callback) !== "undefined")
                callback(result);
        }
    })

}

function NumeroComZero(num){
    var zeros = "00000";
    num = num.toString();

    return zeros.substr(0, (zeros.length - num.length)) + num;

}
