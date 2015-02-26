        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li><a href="/home">Home</a></li>
                            <?php if ( $gorillaUuid ) : ?>
                                <li><a href="/expenses">Expenses</a></li>
                                <li><a href="/mileage">Mileage</a></li>
                                <li><a href="/user/u/<?= $gorillaUuid ?>">Personal Link</a></li>
                            <?php endif; ?>
                          <li><a href="/help">Help</a></li>
                        </ul>
                        <p class="copyright text-muted small">Copyright &copy; Borke.US 2014. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/static/external/jquery-ui-1.11.3.custom/jquery-ui.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <!-- Custom Scripts -->
        <?php $validScripts = array('expenses', 'mileage'); ?>
        <?php if ( in_array(strtolower( $controller ), $validScripts) ): ?>
            <script src="/static/js/<?= strtolower( $controller ) ?>.js"></script>
        <?php endif; ?>

        <!--Load Script and Stylesheet datePicker -->
        <link type="text/css" href="/static/css/date-picker.css" rel="stylesheet" />
    </body>
<html>