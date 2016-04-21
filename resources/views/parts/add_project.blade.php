<div class="">

    <div class="page-title">
        <div class="title_left">
            <h3>Add Project</h3>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Project <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-name">Project Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="project-name" required="required" placeholder="name of your Project" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Give some Description of your Project ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Client </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_group form-control">
                                    <optgroup label="International">
                                        <option value="AK">Client 1</option>
                                        <option value="HI">Client 2</option>
                                    </optgroup>
                                    <optgroup label="Local">
                                        <option value="CA">Client 3</option>

                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edate" class="control-label col-md-3 col-sm-3 col-xs-12">Deadline </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="enddate" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="logo" type="file" name="logo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="status" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="status" value="0"> &nbsp; Inactive &nbsp;
                                    </label>
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="status" value="1" checked=""> Active
                                    </label>
                                </div>
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
            $('input[name="enddate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script> 

</div>
