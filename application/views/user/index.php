<div class="container">
    <div class="col-xs-6 col-lg-4" id="left-side">
        
        <div class="alert alert-warning alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        
        <form id="expenseForm" name="expenseForm" class="form-horizontal">
            <fieldset>

        <!-- Form Name -->
        <legend>Expenses</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Price</label>  
          <div class="col-md-6">
          <input id="amount" name="amount" type="text" placeholder="How much?" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="category">Category</label>  
          <div class="col-md-6">
          <input id="category" name="category" type="text" placeholder="Categorize it!" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="merchant">Merchant</label>  
          <div class="col-md-6">
          <input id="merchant" name="merchant" type="text" placeholder="From where?" class="form-control input-md" required="">

          </div>
        </div>
                
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="location">Location</label>  
          <div class="col-md-6">
          <input id="location" name="location" type="text" placeholder="What area?" class="form-control input-md" required="">

          </div>
        </div>
                
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="datestamp">Date</label>  
          <div class="col-md-6">
          <input id="datestamp" name="datestamp" type="text" placeholder="What date?" class="form-control input-md" required="">

          </div>
        </div>

        <div class="form-group">
            <label for="date-picker-3" class="control-label">C</label>
            <div class="controls">
                <div class="input-group">
                    <label for="date-picker-3" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                    </label>
                    <input id="date-picker-3" type="text" class="date-picker form-control" />
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="addition"></label>
          <div class="col-md-4">
            <button id="addition" name="addition" class="btn btn-primary">Add Expense</button>
          </div>
        </div>

        </fieldset>
        </form>

            
            
    </div>
    
    <div class="col-xs-12 col-sm-6 col-lg-8" id="right-side">
        <div id="expenseListing"></div>
    </div>
</div>
