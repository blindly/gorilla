<div class="container-fluid">
    <div class="col-xs-12 col-sm-6 col-lg-6" id="left-side">
        
    <form class="form-horizontal" id="billsForm" name="billsForm">
        <fieldset>

        <!-- Form Name -->
        <legend>Add Bill</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="amount">Amount</label>  
          <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="amount" name="amount" type="text" placeholder="Monthly recurring amount" class="form-control input-md" required="">
            </div>
          </div>

        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="company">Company</label>  
          <div class="col-md-6">
          <input id="company" name="company" type="text" placeholder="Name of company" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="dueDate">Due Date</label>
          <div class="col-md-6">
            <select id="dueDate" name="dueDate" class="form-control">
              <option value="1">1st</option>
              <option value="5">5th</option>
              <option value="10">10th</option>
              <option value="15">15th</option>
              <option value="20">20th</option>
              <option value="25">25th</option>
            </select>
          </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="button1id">Add</label>
          <div class="col-md-8">
            <button id="add" name="add" class="btn btn-success">Add</button>
            <button id="clear" name="clear" class="btn btn-warning">Clear</button>
          </div>
        </div>

        </fieldset>
    </form>

            
    </div>
    
    <div class="col-xs-12 col-sm-6 col-lg-6" id="right-side"> 

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
                    Monthly Bills
                </h3>
            </div>
            <div class="panel-body"></div>
            
            <form id="deleteBills" name="deleteBills">
                <div id="billsListing">
                </div>
            </form>
        </div>
        
    </div>
</div>
