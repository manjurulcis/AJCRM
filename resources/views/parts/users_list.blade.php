<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                User's
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
                    <h2>Daily active users</h2>
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
                                <th class=" no-link last text-center" width="25%"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users_list as $user)
                            <tr class="even pointer">
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td class=" ">{{$user->id}}</td>
                                <td class=" ">{{$user->username}}</td>
                                <td class=" ">{{$user->email}}</td>
                                <td class=" ">{{Date('d-m-Y   h:i:s a',strtotime($user->created_at))}} </td>
                                <td class=" last">
                                    <a href="{{URL::to("profile/view/$user->id")}}" class="btn btn-success">View</a>
                                    <a class="btn btn-warning" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit m-right-xs"></i> Edit </a>                                    
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

                                    <a href="{{URL::to("profile/delete/$user->id")}}" class="btn btn-danger">Delete</a>
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
<!-- footer content -->
<footer>
    <div class="">
        <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
            <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->