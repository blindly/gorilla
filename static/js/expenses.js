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
        type: "POST",
        url: "https://gorilla.borke.us/index.php/user/expenses",
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
});