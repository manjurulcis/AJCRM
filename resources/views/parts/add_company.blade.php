<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Company <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <!--              Add  Session message-->
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
                    {!! Form::open(array('url' => '/save-company','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">Company Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="company-name" name="cname" placeholder="name of your Company" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('cname'))<p style="color:red;">{!!$errors->first('cname')!!}</p>@endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" name="caddress" placeholder="Company address" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('caddress'))<p style="color:red;">{!!$errors->first('caddress')!!}</p>@endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email" class="form-control col-md-7 col-xs-12" type="email" placeholder="Company's email" name="cemail">
                            @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact no.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="cno" id="cno" placeholder="Contact number">
                            @if ($errors->has('cno'))<p style="color:red;">{!!$errors->first('cno')!!}</p>@endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Give some Description of your Company ..." name="cdescription" id="description"></textarea>
                        </div>
                        @if ($errors->has('cdescription'))<p style="color:red;">{!!$errors->first('cdescription')!!}</p>@endif
                    </div>
                    <div class="form-group">
                        <label for="logo" class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="logo" type="file" name="clogo" >
                            @if ($errors->has('clogo'))<p style="color:red;">{!!$errors->first('clogo')!!}</p>@endif
                        </div>
                        
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" class="btn btn-success"value="Save">
                            <input type="reset" class="btn btn-primary" value="Reset">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#birthday').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>

</div>

