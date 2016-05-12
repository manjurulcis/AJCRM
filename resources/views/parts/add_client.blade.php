<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Client <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <?php
                if (Session::has('msg')) {
                    echo "<h4 style='color:red'>* " . Session::get('msg') . "</h4>";
                }
                ?>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="x_content">
                    <br />
                    {!! Form::open(array('url' => '/save-client','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client-name">Client Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="client-name" placeholder="name of your client" class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif     
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" name="address" placeholder="Client address" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('address'))<p style="color:red;">{!!$errors->first('address')!!}</p>@endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email" class="form-control col-md-7 col-xs-12" type="email" placeholder="Client's email" name="email">
                            @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bdate" class="control-label col-md-3 col-sm-3 col-xs-12">Birth Date <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="bdate" /> 
                            @if ($errors->has('bdate'))<p style="color:red;">{!!$errors->first('bdate')!!}</p>@endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact no. <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="cno" class="form-control col-md-7 col-xs-12" type="text" placeholder="Client's contact no" name="cno">
                            @if ($errors->has('cno'))<p style="color:red;">{!!$errors->first('cno')!!}</p>@endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="photo" type="file" name="photo">
                            @if ($errors->has('photo'))<p style="color:red;">{!!$errors->first('photo')!!}</p>@endif 
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" class="btn btn-success" value="Save">
                            <input type="reset" class="btn btn-primary" value="Reset">
                        </div>
                    </div>
                    {!! Form::close() !!}
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
