<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Team
                <small>
                    List
                </small>
            </h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Team List <small>info</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" class="tableflat">
                                </th>
                                <th>ID </th>
                                <th>Name </th>
                                <th>Company </th>
                                <th>Logo </th>
                                <th>Description </th>
                                <th class=" no-link last text-center" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="even pointer selected">
                                <td class="a-center ">
                                    <input type="checkbox" checked class="tableflat">
                                </td>
                                <td class=" ">121000210</td>
                                <td class=" ">Team 1</td>
                                <td class=" ">Company 1</td>
                                <td class=" ">Logo 1</td>
                                <td class="a-right a-right ">Desc1</td>
                                <td class=" last">
                                    <a href="" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr class="odd pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" ">121000208</td>
                                <td class=" ">Team 2</td>
                                <td class=" ">Company 2</td>
                                <td class=" ">Logo2</td>
                                <td class="a-right a-right ">Desc2</td>
                                <td class=" last">
                                    <a href="" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

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