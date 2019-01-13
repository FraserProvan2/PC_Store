//for card
$(function () {
    $('#form-payment').card({
        container: '.card-wrapper'
    })
})
    
//for express shipping
cart_total = $('#total').html().replace(',', '');
total = parseFloat(cart_total);

console.log(total);

$(function(){
    $('#customRadioInline2').click(function(){
        if ($(this).is(':checked')){
            $("#total").html(total + 25);
        }
    });
    $('#customRadioInline1').click(function(){
        if ($(this).is(':checked')){
            $("#total").html(total);
        }
    });
});