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
                                <img class="media-object" src="{{URL::asset($company_info->logo)}}" alt="Company logo" height="250px" width="250px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Company Information</h4>
                            <br/><br/>
                            <dl class="dl-horizontal">

                                <dt>Name:</dt>
                                <dd>{{$company_info->name}}</dd><br/>
                                <dt>Address:</dt>
                                <dd>{{$company_info->address}}</dd><br/>
                                <dt>Email:</dt>
                                <dd>{{$company_info->email}}</dd><br/>
                                <dt>Contact No.:</dt>
                                <dd>{{$company_info->contact_no}}</dd><br/>
                                <dt>Description:</dt>
                                <dd>{{$company_info->description}}</dd><br/>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
