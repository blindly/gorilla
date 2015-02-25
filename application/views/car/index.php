<div class="container">
    
    <!-- <div class="col-xs-6 col-lg-4" id="left-side"> -->
    <div class="col-xs-6 col-lg-5" id="left-side">
        
        <form id="carForm" name="carForm" class="form-horizontal">
            <fieldset>

        <!-- Form Name -->
        <legend>New Fill-up</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Price</label>  
          <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="amount" name="amount" type="text" placeholder="How much?" class="form-control input-md" required="">
            </div>
          </div>
            
        </div>
                
        <!-- Multiple Radios -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="type">Type</label>
          <div class="col-md-4">
          <div class="radio">
            <label for="type-0">
              <input type="radio" name="type" id="type-0" value="87" checked="checked">
              Regular
            </label>
            </div>
          <div class="radio">
            <label for="type-1">
              <input type="radio" name="type" id="type-1" value="89">
              Plus
            </label>
            </div>
          <div class="radio">
            <label for="type-2">
              <input type="radio" name="type" id="type-2" value="91">
              Premium
            </label>
            </div>
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


        <div id="messagebox" class="alert alert-success alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="text-center">
                    Current Expenses
                </h3>
            </div>
            <div class="panel-body"></div>
            <div id="expenseListing"></div>
        </div>
        
    </div>
</div>
