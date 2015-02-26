$( document ).ready( function() {

    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#expenseForm").submit(function(event){

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "/expenses/add",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it worked!");
            
            setTimeout(function(){ jQuery("#div").hide(); }, 3000);
            
            $('#successbox').html('<p>Expense added successfully :)</p>');
            $('#successbox').css('display','block');

            setTimeout(function(){ 
                $('#successbox').delay( 2000 ).hide( "drop", { direction: "right" }, "slow" );
            }, 3000);
            
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
            
            $('#failbox').html('<p>Error adding expenses :(</p>');
            $('#failbox').css('display','block');
            
            setTimeout(function(){ 
                $('#failbox').delay( 2000 ).hide( "drop", { direction: "right" }, "slow" );
            }, 3000);
            
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

        // Prevent default posting of form
        event.preventDefault();
        
        // Load List of Expenses
        $.ajax({
              url:"/expenses/listing",
              cache:0,
              success:function(result){
                     document.getElementById("expenseListing").innerHTML=result;
               }
        }); 
        
    });
        
    // Refresh list of expenses
    $.ajax({
          url:"/expenses/listing",
          cache:0,
          success:function(result){
                 document.getElementById("expenseListing").innerHTML=result;
           }
    });
    
    // Get Date
    $(".date-picker").datepicker();
    $(".date-picker").datepicker("option", "dateFormat", "yy-mm-dd");

    $(".date-picker").on("change", function () {
        var id = $(this).attr("id");
        var val = $("label[for='" + id + "']").text();
        $("#msg").text(val + " changed");
    });
    
    // Checkbox Handler
    $('#deleteForm tr')
        .filter(':has(:checkbox:checked)')
        .addClass('selected')
        .end()
        .click(function(event) {
        $(this).toggleClass('selected');
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).attr('checked', function() {
                return !this.checked;
            });
        }
    });
    
});