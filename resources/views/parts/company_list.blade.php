<!-- page content -->
<div class="">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Company <small>List</small></h2>
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
                                <th>Address </th>
                                <th>Contact no </th>
                                <th>Email </th>
                                <th>Description </th>
                                <th class=" no-link last" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($company_list as $data)
                            <tr class="odd pointer">
                                <td class="a-center">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><img src="{{URL::asset($data->logo)}}" height="25px" width="25px"/> {{$data->name}}</td>
                                <td class=" ">{{$data->address}}</td>
                                <td class=" ">{{$data->contact_no}}</td>
                                <td class=" ">{{$data->email}}</td>
                                <td class="a-right a-right ">{{$data->description}}</td>
                                <td class=" last">
                                    <a href="{{url('/company/view/'.$data->id)}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="Edit"><i class="fa fa-edit m-right-xs"></i></a>
                                    <a href="{{url('/company/delete/'.$data->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">Workout</h4>
                                                </div>
                                                <form class="form-horizontal" action="#" >
                                                    <div class="modal-body">


                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="address" placeholder="Address of Company">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description" class="col-sm-2 control-label">Description</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="col-sm-12" rows="4" placeholder="Add some Description"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cno" class="col-sm-2 control-label">Contact no</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="cno" placeholder="Contact No.">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="logo" class="col-sm-2 control-label">Logo</label>
                                                            <div class="">
                                                                <input type="file" id="logo">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="Save"/>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br /><br /><br />

    </div>
</div>
<!-- /page content -->

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(recipient + " Information");

    });

    $(document).ready(function () {
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