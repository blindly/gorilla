$( document ).ready( function() {

    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#billsForm").submit(function(event){

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, checkbox, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "/bills/add",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it added!");
                        
            $('#successbox').html('<p>Bill added successfully :)</p>');
            $('#successbox').css('display','block');

            // Load List of Bills
            $.ajax({
                  url:"/bills/listing",
                  cache:0,
                  success:function(result){
                         document.getElementById("billsListing").innerHTML=result;
                   }
            });
            
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
            
            $('#failbox').html('<p>Error adding bills :(</p>');
            $('#failbox').css('display','block');
            
            // Load List of Bills
            $.ajax({
                  url:"/bills/listing",
                  cache:0,
                  success:function(result){
                         document.getElementById("billsListing").innerHTML=result;
                   }
            });
            
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
    });
    
    // Bind to the submit event of our form
    $("#deleteBills").submit(function(event){

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

        // Fire off the request to form
        request = $.ajax({
            url: "/bills/delete",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it deleted!");
                        
            $('#successbox').html('<p>Bill removed successfully :)</p>');
            $('#successbox').css('display','block');
            
            // Load List of Bills
            $.ajax({
                  url:"/bills/listing",
                  cache:0,
                  success:function(result){
                         document.getElementById("billsListing").innerHTML=result;
                   }
            });

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
            
            $('#failbox').html('<p>Error removing bill :(</p>');
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
        
    });
    
    // Refresh list of bills
    $.ajax({
          url:"/bills/listing",
          cache:0,
          success:function(result){
                 document.getElementById("billsListing").innerHTML=result;
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
    
    $('#billsTable tr').click(function(event) {
        $(this).toggleClass('selected');
        if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
        }
    });
});