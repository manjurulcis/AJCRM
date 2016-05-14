<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><small>Daily</small> active user 's</h2>
                    <div class="pull-right">
                        <button class="btn btn-default listbtn" title="list view"><i class="fa fa-th-list" aria-hidden="true"></i></button>
                        <button class="btn btn-default tilesbtn" title="tiles view"><i class="fa fa-th" aria-hidden="true"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
                if (Session::has('msg')) {
                    echo "<h4 style='color:red'>* " . Session::get('msg') . "</h4>";
                }
                ?>
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="x_content list-view">
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
                                    <a href="<?php echo e(URL::to("profile/view/$user->id")); ?>" class="btn btn-success" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#editModal" title="Edit"><i class="fa fa-edit m-right-xs"></i></a>                                    
                                    <!--          Modal -->
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
                                                                <input type="text" id="email" name="email" required="required" value="Email Here(From DB)" class="form-control col-md-7 col-xs-12">
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
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if((Auth::user()->id) == $user->id): ?>
                                    <button href="" class="btn btn-danger" disabled="disabled" title="Delete"><i class="fa fa-trash m-right-xs"></i></button>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to("profile/delete/$user->id")); ?>" class="btn btn-danger" title="Delete"><i class="fa fa-trash m-right-xs"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
                <div class="x_content tiles-view">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <ul class="pagination pagination-split">
                                <li><a href="#">A</a></li>
                                <li><a href="#">B</a></li>
                                <li><a href="#">C</a></li>
                                <li><a href="#">D</a></li>
                                <li><a href="#">E</a></li>
                                <li><a href="#">F</a></li>
                                <li><a href="#">G</a></li>
                                <li><a href="#">H</a></li>
                                <li><a href="#">I</a></li>
                                <li><a href="#">J</a></li>
                                <li><a href="#">K</a></li>
                                <li>...</li>
                                <li><a href="#">S</a></li>
                                <li><a href="#">T</a></li>
                                <li><a href="#">U</a></li>
                                <li><a href="#">V</a></li>
                                <li><a href="#">W</a></li>
                                <li><a href="#">X</a></li>
                                <li><a href="#">Y</a></li>
                                <li><a href="#">Z</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        
                        <?php foreach($users_list as $user): ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i><?php echo e($user->id); ?></i></h4>
                                    <div class="left col-xs-7">
                                        <h2><?php echo e($user->username); ?></h2>
                                        <p><strong>email: </strong> <?php echo e($user->email); ?></p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-phone"></i> Address: </li>
                                            <li><i class="fa fa-phone"></i> Address: </li>

                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="images/img.jpg" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-12 emphasis">
                                        <button type="button" class="btn btn-success btn-xs pull-left"> <i class="fa fa-user"></i><i class="fa fa-comments-o"></i>Comments</button>
                                        <button type="button" class="btn btn-primary btn-xs pull-right"><i class="fa fa-user"></i> View Profile </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

        <br /><br /><br />

    </div>
</div>

<script>
    $(document).ready(function () {
        $('.listbtn').click(function () {
            $('.list-view').show();
            $('.tiles-view').hide();
        });
        $('.tilesbtn').click(function () {
            $('.list-view').hide();
            $('.tiles-view').show();
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
