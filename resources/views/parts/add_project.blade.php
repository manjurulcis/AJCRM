<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Project <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    {!! Form::open(array('url' => '/save-project','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-name">Project Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" id="project-name" required="required" placeholder="name of your Project" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Give some Description of your Project ..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Client </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_group form-control" name="client">
                                    <optgroup label="Local">
                                        @foreach($client_info as $data)
                                        <option value="{{$data->client_id}}">{{$data->client_name}}</option>
                                        @endforeach
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
                                        <input type="radio" name="status" value="0"> Inactive </label>
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="status" value="1" checked=""> Active </label>
                                </div>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="submit" class="btn btn-success" value="Submit">
                                <input type="submit" class="btn btn-primary" value="Cancel">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('input[name="enddate"]').daterangepicker({
                locale: {
            format: 'DD/MM/YYYY h:mm A'
        },
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script> 

</div>
