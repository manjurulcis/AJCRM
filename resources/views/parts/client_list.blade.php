<!-- page content -->
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Client List <small>info</small></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" class="tableflat">
                                </th>
                                <th>Name </th>
                                <th>Email </th>
                                <th>Contact No </th>
                                <th>Birth Date </th>
                                <th>Address </th>
                                <th class=" no-link last text-center" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($client_list as $data)
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><img src="{{URL::asset($data->client_photo)}}" height="25px" width="25px"/> {{$data->client_name}}</td>
                                <td class=" ">{{$data->client_email}}</td>
                                <td class=" ">{{$data->contact_no}}</td>
                                <td class="a-right a-right ">{{$data->birthdate}}</td>
                                <td class=" ">{{$data->client_address}}</td>

                                <td class=" last">
                                    <a href="{{url('client/view/'.$data->id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-warning editbtn" data-toggle="modal" data-target="#myModal" title="Edit" value="{{$data->id}}"><i class="fa fa-edit m-right-xs"></i></button>
                                    <a href="{{url('client/delete/'.$data->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                                    {!! Form::open(array('url' => '/update-client','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="client-name">Client Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" name="name" id="client-name" required="required" placeholder="name of your client" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" id="address" name="address" placeholder="Client address" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" placeholder="Client's email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate" class="control-label col-md-3 col-sm-3 col-xs-12">Birth Date </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input type="text" name="bdate" id="birthdate" /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact no. </label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input id="cno" class="form-control col-md-7 col-xs-12" type="text" placeholder="Client's contact no" name="cno">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                            <input id="photo" type="file" name="photo">
                                        </div>
                                    </div>

                                    <div class="form-group modal-footer">
                                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" class="btn btn-success" value="Submit">
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

        <br />
        <br />
        <br />

    </div>
</div>
<!-- /page content -->

<script>
    $(function () {
            $('input[name="bdate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
            });
        });
    $(document).ready(function () {
        $('.editbtn').click(function () {
            var id = $(this).val();
            alert(id);
            $.ajax({
                type: "GET",
                url: base_url + "/client/edit/" + id,
                success: function (data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#client-name').val(data.client_name);
                    $('#address').val(data.client_address);
                    $('#email').val(data.client_email);
                    $('#birthdate').val(data.birthdate);
                    $('#cno').val(data.contact_no);
                    $('#photo').val(data.client_photo);
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