<!-- page content -->
<div class="">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Team List <small>info</small></h2>
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
                                <th>Name </th>
                                <th>Company </th>
                                <th>Description </th>
                                <th class=" no-link last text-center" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($team_list as $data)

                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><img src="{{URL::asset($data->logo)}}" height="25px" width="25px"/> {{$data->name}}</td>
                                
                                @if(isset($data->company->name))
                                <td class=" ">{{$data->company->name}}</td>
                                @else
                                <td class=" " style="color:red">Not Listed</td>
                                @endif
                                
                                <td class="a-right a-right ">{{$data->description}}</td>
                                <td class=" last">
                                    <a href="{{url('team/view/'.$data->id)}}" class="btn btn-success" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-warning editbtn" data-toggle="modal" data-target="#myModal" title="Edit" value="{{$data->id}}"><i class="fa fa-edit m-right-xs"></i></button>
                                    <a href="{{url('team/delete/'.$data->id)}}" class="btn btn-danger" title="Delete" onclick="return deleteTeam()"><i class="fa fa-trash"></i></a>
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
                                    {!! Form::open(array('url' => '/update-team','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-name">Team Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" name="tname" id="team-name" required="required" placeholder="name of the team" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">Company <span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <select class="select2_group form-control" name="tcompany" id="company-name">
                                                <optgroup label="Bangladesh">
                                                    @foreach($companies as $data)
                                                    <option value="{{$data->id}}" class="">{{$data->name}}</option>
                                                    @endforeach
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="file" name="tlogo" id="logo" required="required" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <textarea name="tdescription" id="description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Add some description of your team"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group modal-footer">
                                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" class="btn btn-success" value="Update">
                                            <input type="button" value="Cancel" class="btn btn-default" data-dismiss="modal">
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
    function deleteTeam(){
    var r = confirm("Are you sure to delete this Team?");
        if (r) {
        return true;
        }else{
            return false;
        }
    }
    
    $(document).ready(function () {
        $('.editbtn').click(function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: base_url + "/team/edit/" + id,
                success: function (data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#team-name').val(data.name);
                    $('#description').val(data.description);
                    $('#company-name').val(data.company_id);
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