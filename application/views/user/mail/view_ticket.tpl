
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>View Ticket
    </div>
     <div class="panel-body">
                <form role="form" class="smart-wizard form-horizontal"  name="compose" id="compose" method="post" action="" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-times-sign"></i> {$tran_errors_check}.
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Ticket Tracking ID  <span class="symbol required"></span>
                            </label>
                            <div class="col-sm-3">
                                <input  class="form-control" name="ticket" id="ticket" type="text" tabindex='10' size="8"  placeholder=""  />
				
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <button class="btn btn-bricky" type="submit"id="view" value="view" name="view" tabindex="3">View</button>
                        </div>
                    </div>
                        
                        
                </form>
                   
        </div>
        
        
    </div>

