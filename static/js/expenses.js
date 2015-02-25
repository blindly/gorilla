$( "#addition" ).click(function() {
    /*
    $.post( "addExpenses", 
    {
        description: $('#description').val(), 
        amount: $('#amount').val(), 
        category: $('#category').val(), 
        merchant: $('#merchant').val(), 
        location: $('#location').val(), 
    });
    */
    
    var description = 'description=' . $('#description').val();
    var amount = 'amount=' . $('#amount').val();
    var category = 'category=' . $('#category').val();
    var merchant = 'merchant=' . $('#merchant').val();
    var location = 'location=' . $('#location').val();
    var myExpenses = new Array(description, location, category, merchant, location);
    
    $.post("/index.php/user/addExpenses",
    {
        description: $('#description').val(), 
        amount: $('#amount').val(), 
        category: $('#category').val(), 
        merchant: $('#merchant').val(), 
        location: $('#location').val(), 
    },
    function(data, textStatus, jqXHR)
    {
        //data - response from server
    }).fail(function(jqXHR, textStatus, errorThrown) 
    {
        alert(textStatus);
    });
    
/*
         $.ajax(
        {
            url: "send_sms.php",
            type: "GET",
            data: "from=6504378632&body="+smsMessage+"&to="+smsTo, //The data your sending to some-page.php

        success: function()
        {
          console.log("AJAX request was successfull");
        },
          error:function()
        {
          console.log("AJAX request was a failure");
        }
    });
*/
    
});