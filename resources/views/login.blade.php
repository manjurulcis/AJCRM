<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href="{{URL::asset('css')}}/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/{{URL::asset('css')}}/font-awesome.min.css" rel="stylesheet">
    <link href="{{URL::asset('css')}}/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{URL::asset('css')}}/custom.css" rel="stylesheet">
    <link href="{{URL::asset('css')}}/icheck/flat/green.css" rel="stylesheet">


    <script src="{{URL::asset('js')}}/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    {!! Form::open(array('url' => '/admin-login-check', 'method' => 'post')) !!}
                        <h1>Login Form</h1>
                        
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-default submit" >
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>�2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    {!! Form::open(array('url' => '/admin-register', 'method' => 'post')) !!}
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="First Name" required="required" name="fname" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Last name" required="required" name="lname" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="required" name="username" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="required" name="email" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="required" name="password" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Confirm Password" required="required"/>
                        </div>
                        <div>
                            <input type="submit" value="Submit" class="btn btn-default submit" >
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>�2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>