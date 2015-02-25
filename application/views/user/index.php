<div class="container">
    <div class="col-xs-6 col-lg-4" id="left-side">
        <form id="expenseForm" name="expenseForm" class="form-horizontal">
            <fieldset>

        <!-- Form Name -->
        <legend>Expenses</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Amount</label>  
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
          <input id="merchant" name="merchant" type="text" placeholder="Where did you get it?" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="description">Description</label>  
          <div class="col-md-6">
          <input id="description" name="description" type="text" placeholder="Anything else?" class="form-control input-md">

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
