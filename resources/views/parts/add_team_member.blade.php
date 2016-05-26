<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add<small> Team Members</small></h2>
                    <div class="pull-right">
                        <button class="btn btn-default listbtn active" title="list view"><i class="fa fa-th-list" aria-hidden="true"></i></button>
                        <button class="btn btn-default tilesbtn" title="tiles view"><i class="fa fa-th" aria-hidden="true"></i></button>
                    </div>
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
                <div class="x_content list-view">
                    {!! Form::open(array('url' => '/save-team-member','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                    <input type="hidden" name="team_id" value="{{$team_id}}">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th></th>
                                <th>ID</th>
                                <th >Username</th>
                                <th>email</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($users_list as $user)
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat" name="members[]" value="{{$user->id}}">
                                </td>
                                <td class=" ">{{$user->id}}</td>
                                <td class=" ">{{$user->username}}</td>
                                <td class=" ">{{$user->email}}</td>
                            </tr>
                            @endforeach
                        <input type="submit" class="btn btn-info" aria-hidden="true" value="+ Add Selected" />
                        </tbody>
                    </table>

                    {!! Form::close() !!}
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

                        @foreach($users_list as $user)
                        <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                            <div class="well profile_view">
                                <div class="col-sm-12">

                                    <h4 class="brief">
                                        <i><input type="checkbox" class="tableflat pull-right"> {{$user->id}}</i>
                                    </h4>


                                    <div class="left col-xs-7">
                                        <h2>{{$user->username}}</h2>
                                        <p><strong>email: </strong> {{$user->email}}</p>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="{{URL::asset('images/user.png')}}" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-12 emphasis">
                                        <button type="button" class="btn btn-primary btn-xs pull-left"><i class="fa fa-user"></i> View Profile </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
            $(this).addClass('active');
            $('.tiles-view').hide();
            $('.tilesbtn').removeClass('active');
        });
        $('.tilesbtn').click(function () {
            $('.list-view').hide();
            $('.listbtn').removeClass('active');
            $('.tiles-view').show();
            $(this).addClass('active');
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
