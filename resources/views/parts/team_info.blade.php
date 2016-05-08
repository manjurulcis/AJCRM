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
                                <img class="media-object" src="{{URL::asset('images')}}/user.png" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Team Information</h4>
							<br/><br/>
                                   <dl class="dl-horizontal">
										<dt>Name:</dt>
										<dd>...</dd><br/>
										<dt>Company Name:</dt>
										<dd>...</dd><br/>
										<dt>Description:</dt>
										<dd>...</dd>
										
										
									</dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('input[name="bdate"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            });
        });
    </script>

</div>
