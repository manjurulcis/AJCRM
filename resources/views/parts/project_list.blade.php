<!-- page content -->
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Project List <small>info</small></h2>
                    <div class="clearfix"></div>
                </div>
                
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
                            <tr class="even pointer selected">
                                <td class="a-center ">
                                    <input type="checkbox" checked class="tableflat">
                                </td>
                                <td class=" "><i class="fa fa-paw fa-2x" aria-hidden="true"></i> Project1</td>
                                <td class=" ">Client1</td>
                                <td class=" ">Active</td>
                                <td class="a-right a-right ">12-05-2016</td>
                                <td class=" last">
                                    <a href="" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @foreach($project_info as $data)
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><img src="{{URL::asset($data->logo)}}" height="25px" width="25px"> {{$data->project_title}}</td>
                                <td class=" ">{{$data->client_name}}</td>
                                @if($data->project_status)
                                <td class=" ">Active</td>
                                @else
                                <td class=" ">Inactive</td>
                                @endif
                                <td class="a-right a-right ">{{$data->end_time}}</td>
                                <td class=" last">
                                    <a href="" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i></a>
                                    <a href="{{URL::to('project/delete/'.$data->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
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