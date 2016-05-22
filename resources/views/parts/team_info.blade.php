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
                            <br/><br/>
                            <dl class="dl-horizontal">

                                <dt>Name:</dt>
                                <dd>{{$team_info->name}}</dd><br/>
                                <dt>Company Name:</dt>
                                <dd>{{$team_info->company->name}}</dd><br/>
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
