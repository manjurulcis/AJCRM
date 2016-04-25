<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><small>Daily</small> active user 's</h2>
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
                                <th >Username</th>
                                <th>email </th>
                                <th>Joined at </th>
                                <th class=" no-link last text-center" width="17%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($users_list as $user): ?>
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" "><?php echo e($user->id); ?></td>
                                <td class=" "><?php echo e($user->username); ?></td>
                                <td class=" "><?php echo e($user->email); ?></td>
                                <td class=" "><?php echo e(Date('d-m-Y   h:i:s a',strtotime($user->created_at))); ?> </td>
                                <td class=" last">
                                    <a href="<?php echo e(URL::to("profile/view/$user->id")); ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit m-right-xs"></i></a>                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="username" required="required" value="Username Here(From DB)" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" id="last-name" name="email" required="required" value="Email Here(From DB)" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input id="password" class="form-control col-md-7 col-xs-12" type="text" name="password" value="Password Here(From DB)">
                                                            </div>
                                                        </div>

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                <button type="submit" class="btn btn-success">Save changes</button>
                                                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="<?php echo e(URL::to("profile/delete/$user->id")); ?>" class="btn btn-danger"><i class="fa fa-trash m-right-xs"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
