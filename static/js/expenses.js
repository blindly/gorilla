$( "#addition" ).click(function() {
    $.post( "addExpenses", 
    {
        description: $('#description').val(), 
        amount: $('#amount').val(), 
        category: $('#category').val(), 
        merchant: $('#merchant').val(), 
        location: $('#location').val(), 
    } 
    );
});