<div class="container">
    <div class="col-xs-6 col-lg-4" id="left-side">
        <form id="expenseForm" name="expenseForm" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Expenses</legend>

                <!-- Text input-->
                <!-- 
                <div class="control-group">
                  <label class="control-label" for="description">Description</label>
                  <div class="controls">
                    <input id="description" name="description" type="text" placeholder="" class="input-medium">
                  </div>
                </div>
                -->

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="amount">Amount</label>
                  <div class="controls">
                    <input id="amount" name="amount" type="text" placeholder="How much did you spend?" class="input-xlarge">

                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="category">Category</label>
                  <div class="controls">
                    <input id="category" name="category" type="text" placeholder="Broad category of purchase" class="input-xlarge">

                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="merchant">Merchant</label>
                  <div class="controls">
                    <input id="merchant" name="merchant" type="text" placeholder="What store did you get it from?" class="input-xlarge">

                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="location">Location</label>
                  <div class="controls">
                    <input id="location" name="location" type="text" placeholder="Where was this?" class="input-xlarge">

                  </div>
                </div>
                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="description">Description</label>
                  <div class="controls">
                    <input id="description" name="description" type="text" placeholder="Any additional details?" class="input-xlarge">

                  </div>
                </div>

                <!-- Text input-->
                <!--
                <div class="control-group">
                  <label class="control-label" for="location">Date / Time</label>
                  <div class="controls">
                    <input id="date" name="date" type="text" placeholder="" class="input-large form_datetime">
                  </div>
                </div>
                -->

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="addition"></label>
                  <div class="controls">
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
