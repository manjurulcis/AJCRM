<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Client <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client-name">Client Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="client-name" required="required" placeholder="name of your client" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="caddress" placeholder="Client address" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class="form-control col-md-7 col-xs-12" required="required" type="email" placeholder="Client's email" name="cemail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bdate" class="control-label col-md-3 col-sm-3 col-xs-12">Birth Date </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="bdate" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact no. </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="cno" class="form-control col-md-7 col-xs-12" type="text" placeholder="Client's contact no" name="cno">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="photo" type="file" name="photo">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="submit" class="btn btn-primary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('input[name="bdate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script> 

</div>
