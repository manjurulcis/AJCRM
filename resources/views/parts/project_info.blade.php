<?php
//dd($tasklist);
?>

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
                            <h4 class="media-heading">Project Information</h4>
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
                                @if(isset($project_info->client->client_name))
                                <dd>{{$project_info->client->client_name}}</dd><br/>
                                @else
                                <dd style="color:red">Not Listed</dd><br/>
                                @endif

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
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Project <small>Tasks</small></h2>
                    <div class="panel_toolbox">

                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add new task
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">New Task</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(array('url' => '/saveTask','method'=>'post','class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                                        <input type="hidden" name="project_id" value="{{$project_info->id}}">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input type="text" name="title" id="title" required="required" placeholder="name of your Project" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <textarea name="description" id="description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 120px;" placeholder="Give some Description of your Task ..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group modal-footer">
                                            <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                                <input type="submit" class="btn btn-success" value="Save">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        @if($tasklist->isEmpty())
                        <li>
                            <p>There's no task in this project</p>
                        </li>
                        @else
                        @foreach($tasklist as $task)
                        <li>
                            <div class="block">
                                <div class="tags">
                                    <a href="{{url('/task/view/'.$task->id)}}" class="tag">
                                        <span>{{date('d M,Y',strtotime($task->created_at))}}</span>
                                    </a>
                                </div>
                                <div class="block_content">

                                    <h2 class="title">
                                        <a href="{{url('/task/view/'.$task->id)}}">{{$task->title}}</a>
                                    </h2>
                                    <div class="byline">
                                        <span>6 hours ago</span> by <a>The Boss</a>
                                    </div>
                                    <p>
                                        {{$task->description}}
                                        .....    <a href="{{url('/task/view/'.$task->id)}}" class="text-info">View more... </a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
