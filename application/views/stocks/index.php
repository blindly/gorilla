<div class="container-fluid">
    <div class="col-xs-12 col-sm-6 col-lg-6" id="left-side">
        
        <form id="stocksForm" name="stocksForm" class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <legend>New Stock</legend>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="stock">Stock</label>  
                    <div class="col-md-6">
                        <input id="stock" name="stock" type="text" placeholder="Stock Ticker" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="addition"></label>
                  <div class="col-md-8">
                    <button id="addition" name="addition" class="btn btn-success">Add</button>
                    <button id="reset" name="reset" class="btn btn-warning" type="reset">Clear</button>

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
                    Current Expenses
                </h3>
            </div>
            <div class="panel-body"></div>
            
            <form id="deleteForm" name="deleteForm">
                <div id="stocklisting">
                </div>
            </form>
        </div>
        
    </div>
</div>
