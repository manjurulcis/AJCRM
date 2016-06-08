<?php
//dd($taskInfo);
//dd($commentList);
?>
<script type="text/javascript">
    $('div.alert').delay('1').slideUp(300);
</script>
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Task <small>Information</small></h2>

                    <div class="clearfix"></div>
                </div>
               
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="x_content">
                    <h2 class="title">
                        <a href="">{{$taskInfo->title}}</a>
                    </h2>
                    <div class="byline">
                        <span>6 hours ago</span> by <a>The Boss</a>
                    </div>
                    <p>
                        {{$taskInfo->description}}
                    </p>
                    <div class="ln_solid"></div>

                    <ul class="col-sm-offset-1 media-list">
                        @foreach($commentList as $comment)
                        <li class="media">
                            <div class="media-left media-top">
                                <a href="#">
                                    <img class="media-object" src="{{URL::asset('images')}}/user.png" alt="photo" height="50px" width="50px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{$comment->username}}
                                    @if(Auth::user()->id == $comment->user_id)    
                                    <div class="pull-right">
                                        <!--<a href="#" title="Edit" onclick="editComment()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>-->
                                        <a href="{{url('/comment/delete/'.$comment->id)}}"  title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </div>
                                    @endif
                                </h4>
                                <p class="commentbody">{{$comment->comment}}</p>

                                @if(!empty($comment->file))
                                <p>
                                    <strong>Attachment ::</strong>

                                    @foreach(explode(',',$comment->file) as $file)   
                                    <a href="{{url($file)}}" class="badge bg-primary" download><?php echo basename($file) ?></a>                                                      @endforeach   
                                </p>
                                @endif

                            </div>
                            <!--                            <div class="ln_solid"></div>
                                                        comment section starts
                                                        <ul class="media-list col-sm-offset-1">
                                                            <li class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="{{URL::asset('images')}}/user.png" alt="photo" height="50px" width="50px">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">Md. Rakibul Islam</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="{{URL::asset('images')}}/user.png" alt="photo" height="50px" width="50px">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">{{Auth::user()->username}}</h4>
                            
                                                                    <textarea rows="2" style="width: 100%;border-bottom: none;"></textarea>
                                                                    <div class="row" style="background:linear-gradient(to right, #D7D8D7 , white);border-bottom-left-radius:4em;">
                                                                        <input class="pull-left" type="file" multiple="multiple">
                                                                        <div class="pull-right">
                                                                            <input type="submit" class="btn btn-primarry" value="Submit">
                                                                            <input type="reset" class="btn btn-primarry" value="Clear">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        comment section ends-->
                        </li>
                        @endforeach
                        <li class="media">
                            <div class="media-left media-top">
                                <a href="#">
                                    <img class="media-object" src="{{URL::asset('images')}}/user.png" alt="photo" height="50px" width="50px">
                                </a>
                            </div>
                            <div class="media-body">
                                {!! Form::open(array('url' => '/saveComment','method'=>'post','files'=>true,'class'=>'form-horizontal form-label-left','id'=>'demo-form2')) !!}
                                <h4 class="media-heading">{{Auth::user()->username}}</h4>
                                <input type="hidden" value="{{$taskInfo->id}}" name="task_id">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                <textarea rows="2" style="width: 100%;border-bottom: none;" name="comment"></textarea>
                                <div class="row" style="background:linear-gradient(to right, #D7D8D7 , white);border-bottom-left-radius:4em;">
                                    <input class="pull-left" type="file" multiple="multiple" name="file[]">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-primarry" value="Submit">
                                        <input type="reset" class="btn btn-primarry" value="Clear">
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>