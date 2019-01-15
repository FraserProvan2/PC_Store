//for card
$(function () {
    $('#form-payment').card({
        container: '.card-wrapper'
    })
})
    
//for express shipping
total = parseFloat($('#total').html().replace(',', '').replace('£', ''));
total_w_express = (total + 25).toFixed(2);

total = numberWithCommas(total);
total_w_express  = numberWithCommas(total_w_express);

$(function(){
    $('#customRadioInline2').click(function(){
        if ($(this).is(':checked')){
            $("#total").html('£' + total_w_express);
        }
    });

    if ($('#customRadioInline2').is(':checked')){
        $("#total").html('£' + total_w_express);
    }

    $('#customRadioInline1').click(function(){
        if ($(this).is(':checked')){
            $("#total").html('£' + total);
        }
    });
});

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}