// JavaScript Document

jQuery(function($) {
     
        $("a#package").click(function(){
            $('#backgroundpopup').show();
            $('#planDiv').slideDown(600); 
        });
    
        $('#closePlan').click(function(){
            $('#backgroundpopup').hide();
            $('#planDiv').slideUp(500); 
        });
        
        $("span.buy").click(function(){
            $('#backgroundpopup').show();
            $('#paymentDiv').slideDown(600); 
        });
    
        $('#closePayment').click(function(){
            $('#backgroundpopup').hide();
            $('#paymentDiv').slideUp(500); 
        });
});