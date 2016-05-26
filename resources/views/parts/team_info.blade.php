<?php
//dd($team_info);
?>
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Team <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{URL::asset($team_info->logo)}}" alt="Team logo" height="250px" width="250px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Team Information</h4>
                            <a  type="button" href="{{url('team-member/add',$team_info->id)}}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Team member</a>
                            <br/><br/>
                            <dl class="dl-horizontal">

                                <dt>Name:</dt>
                                <dd>{{$team_info->name}}</dd><br/>
                                <dt>Company Name:</dt>
                                @if(isset($team_info->company->name))
                                <dd>{{$team_info->company->name}}</dd><br/>
                                @else
                                <dd style="color:red">Not Listed</dd><br/>
                                @endif
                                
                                <dt>Description:</dt>
                                <dd>{{$team_info->description}}</dd><br/>
                                <dt>Created Date:</dt>
                                <dd>{{date("d M ,Y",strtotime($team_info->created_at))}}</dd>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
