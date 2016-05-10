<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Project <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{URL::asset($project_info->logo)}}" alt="Project logo" height="250px" width="250px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Client Information</h4>
                            <br/><br/>
                            <dl class="dl-horizontal">

                                <dt>Name:</dt>
                                <dd class="lead">{{$project_info->project_title}}</dd><br/>

                                <dt>Status:</dt>
                                @if($project_info->project_status)
                                <dd style="color:green">Active</dd>
                                @else
                                <dd>Inactive</dd>
                                @endif
                                <br/>

                                <dt>Client:</dt>
                                <dd>{{$project_info->client_name}}</dd><br/>
                                <dt>Deadline:</dt>
                                <dd style="color:red">{{date("d M ,Y",strtotime($project_info->end_time))}}</dd><br/>

                                <dt>Project Description:</dt>
                                <dd>{{$project_info->project_desc}}</dd><br/>


                                <dt>Logged:</dt>
                                <dd>{{date("d M ,Y",strtotime($project_info->created_at))}}</dd><br/>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
