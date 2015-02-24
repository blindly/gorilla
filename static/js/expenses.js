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
    
    $.ajax({
        type: "GET",
        url: "https://gorilla.borke.us/index.php/user/addExpenses",
        data: myExpenses.join('&'),
        success: function()
        {
          console.log("AJAX request was successfull");
        },
          error:function()
        {
          console.log("AJAX request was a failure");
        }
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