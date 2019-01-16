//for card
$(function () {
    $('#form-payment').card({
        container: '.card-wrapper'
    })
})
   
if($("#total").length != 0) {
   //remove strings
    total = parseFloat($('#total').html().replace(',', '').replace('£', ''));

    //create floats in number format
    total_normal = numberWithCommas((total).toFixed(2));
    total_w_express  = numberWithCommas((total + 25).toFixed(2));
}
  
//adds payment to total w/ shipping to total div
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
            $("#total").html('£' + total_normal);
        }
    });
});

//makes float number format
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}