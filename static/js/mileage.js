$( document ).ready( function() {

    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#mileageForm").submit(function(event){

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
            url: "/mileage/add",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it worked!");
            
            $('#successbox').html('<p>Fill-up added successfully :)</p>');
            $('#successbox').css('display','block');
            $('#successbox').hide( "drop", { direction: "down" }, "slow" );
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
            
            $('#failbox').html('<p>Fill-up failed to add :(</p>');
            $('#failbox').css('display','block');
            $('#failbox').hide( "drop", { direction: "down" }, "slow" );
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
              url:"/mileage/listing",
              cache:0,
              success:function(result){
                     document.getElementById("mileageListing").innerHTML=result;
               }
        }); 
        
    });
        
    // Refresh list of expenses
    $.ajax({
          url:"/mileage/listing",
          cache:0,
          success:function(result){
                 document.getElementById("mileageListing").innerHTML=result;
           }
    });
    
    // Date Picker
    $(".date-picker").datepicker();
    $(".date-picker").datepicker("option", "dateFormat", "yy-mm-dd");

    $(".date-picker").on("change", function () {
        var id = $(this).attr("id");
        var val = $("label[for='" + id + "']").text();
        $("#msg").text(val + " changed");
    });
    
});