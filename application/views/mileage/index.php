<div class="container">
    
    <div class="col-xs-12 col-sm-6 col-lg-7" id="left-side">
        
        <form id="mileageForm" name="mileageForm" class="form-horizontal">
            <fieldset>

        <!-- Form Name -->
        <legend>New Fill-up</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Total</label>  
          <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="amount" name="amount" type="text" placeholder="How much total?" class="form-control input-md" required="">
            </div>
          </div>
            
        </div>
                
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Price Per Gallon</label>  
          <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="gallon" name="gallon" type="text" placeholder="How much a gallon?" class="form-control input-md" required="">
            </div>
          </div>
            
        </div>
                
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="type">Type</label>
          <div class="col-md-5">
            <select id="type" name="type" class="form-control input-md">
              <option value="87">Regular</option>
              <option value="89">Plus</option>
              <option value="91">Premium</option>
            </select>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="odometer">Odometer</label>  
            <div class="col-md-6">
                <input id="odometer" name="odometer" type="text" placeholder="How many miles?" class="form-control input-md" required="">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="merchant">Gas Station</label>  
          <div class="col-md-6">
          <input id="merchant" name="merchant" type="text" placeholder="From where?" class="form-control input-md" required="">

          </div>
        </div>
                
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="location">City</label>  
          <div class="col-md-6">
          <input id="location" name="location" type="text" placeholder="What area?" class="form-control input-md" required="">

          </div>
        </div>
                
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="datestamp">Date</label>  
          <div class="col-md-6">
            <input id="datestamp" name="datestamp" type="text" placeholder="What date?" class="date-picker form-control input-md" required="">

          </div>
        </div>

        <!-- Button 
        <div class="form-group">
          <label class="col-md-4 control-label" for="addition"></label>
          <div class="col-md-4">
            <button id="addition" name="addition" class="btn btn-primary">Add Expense</button>
          </div>
        </div>-->
                
        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="checkboxes">Deductable</label>
          <div class="col-md-4">
          <div class="checkbox">
            <label for="checkboxes-0">
              <input type="checkbox" name="deductable" id="deductable-0" value="1">
              Yes
            </label>
            </div>
          </div>
        </div>
                
        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="addition"></label>
          <div class="col-md-8">
            <button id="addition" name="addition" class="btn btn-success">Add</button>
            <button id="reset" name="reset" class="btn btn-danger" type="reset">Clear</button>
            
          </div>
        </div>

        </fieldset>
        </form>
            
    </div>
    
    <!-- <div class="col-xs-12 col-sm-6 col-lg-8" id="right-side"> -->
    <div class="col-xs-12 col-sm-6 col-lg-7" id="right-side">

        <!-- Alerts -->
        <div id="successbox" class="alert alert-success alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        
        <div id="failbox" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        
        <!-- End Alerts -->
        
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="text-center">
                    Mileage
                </h3>
            </div>
            <div class="panel-body"></div>
            <div id="mileageListing"></div>
        </div>
        
    </div>
</div>
