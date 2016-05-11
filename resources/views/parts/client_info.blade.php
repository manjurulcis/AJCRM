<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Client <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{URL::asset($client_info->client_photo)}}" alt="Team logo" height="250px" width="250px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Client Information</h4>
                            <br/><br/>
                            <dl class="dl-horizontal">

                                <dt>Name:</dt>
                                <dd>{{$client_info->client_name}}</dd><br/>

                                <dt>Address:</dt>
                                <dd>{{$client_info->client_address}}</dd><br/>

                                <dt>Email:</dt>
                                <dd>{{$client_info->client_email}}</dd><br/>

                                <dt>Contact No.:</dt>
                                <dd>{{$client_info->contact_no}}</dd><br/>

                                <dt>Birth Date:</dt>
                                <dd>{{date("d M ,Y",strtotime($client_info->birthdate))}}</dd><br/>

                                <dt>Joined:</dt>
                                <dd>{{date("d M ,Y",strtotime($client_info->created_at))}}</dd><br/>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
