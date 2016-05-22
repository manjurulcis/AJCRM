<!-- page content -->
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Project List <small>info</small></h2>
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
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" class="tableflat">
                                </th>
                                <th>Title </th>
                                <th>Client </th>
                                <th>Status </th>
                                <th>Deadline </th>
                                <th class=" no-link last text-center" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($project_info as $data)
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><img src="{{URL::asset($data->logo)}}" height="25px" width="25px"> {{$data->project_title}}</td>
                                <td class=" ">{{$data->client->client_name}}</td>
                                @if($data->project_status)
                                <td class=" ">Active</td>
                                @else
                                <td class=" ">Inactive</td>
                                @endif
                                <td class="a-right a-right ">{{date('d-M-Y',strtotime($data->end_time))}}</td>
                                <td class=" last">
                                    <a href="{{URL::to('project/view/'.$data->id)}}" class="btn btn-success" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-warning editbtn" data-toggle="modal" data-target="#myModal" title="Edit" value="{{$data->id}}"><i class="fa fa-edit m-right-xs"></i></button>
                                    <a href="{{URL::to('project/delete/'.$data->id)}}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(array('url' => '/update-project','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-name">Project Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" name="name" id="project-name" required="required" placeholder="name of your Project" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Project Description</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <textarea name="description" id="description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Give some Description of your Project ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client"> Client </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <select class="select2_group form-control" name="client" id="client">
                                                <optgroup label="Local">
                                                    @foreach($client_info as $data)
                                                    <option value="{{$data->id}}">{{$data->client_name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="edate" class="control-label col-md-3 col-sm-3 col-xs-12" for="enddate">Deadline </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" name="enddate" id="enddate" /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo" class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input id="logo" type="file" name="logo">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <div id="status" class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-default active" id="btn-inactive" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                    <input type="radio" name="status" value="0" checked="true"> Inactive </label>
                                                <label class="btn btn-default" id="btn-active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                    <input type="radio" name="status" value="1"> Active </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group modal-footer">
                                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" class="btn btn-success" value="Update">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br /><br /><br />

    </div>
</div>
<!-- /page content -->

<script>
    $(function () {
        $('input[name="enddate"]').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY h:mm A'
            },
            singleDatePicker: true,
            showDropdowns: true
        });
    });

    $(document).ready(function () {
        $('.editbtn').click(function () {
            var id = $(this).val();
            alert(id);
            $.ajax({
                type: "GET",
                url: base_url + "/project/edit/" + id,
                success: function (data) {
                    console.log(data);
                    $('#id').val(data.id);
                    if (data.project_status) {
                        $("#btn-inactive").removeClass("active");
                        $("#btn-active").addClass('active');
                    } else {
                        $("#btn-inactive").addClass("active");
                        $("#btn-active").removeClass('active');
                    }
                    $('#project-name').val(data.project_title);
                    $('#description').val(data.project_desc);
                    $('#client').val(data.client_id);
                    $('#enddate').val(data.end_time);
                    $('#logo').val(data.logo);
                }
            });
        });

        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf"
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>