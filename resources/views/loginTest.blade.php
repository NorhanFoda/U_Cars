@extends('layouts.app')
@section('content')
    <div class="login-container login-cover">
        <!-- Page container -->
	<div class="page-container">

            <!-- Page content -->
            <div class="page-content">
    
                <!-- Main content -->
                <div class="content-wrapper">
    
                    <!-- Content area -->
                    <div class="content pb-20">
    
                        <!-- Form inside modals -->
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-warning-400 text-warning-400"><i class="icon-bubble-lines3"></i></div>
                                <h5 class="content-group">Forms inside modals <small class="display-block">Login and other forms inside modal</small></h5>
                            </div>
    
    
                            <div class="content-group">
                                <div class="content-divider text-muted form-group"><span>Login form</span></div>
                                <button type="button" class="btn bg-blue btn-block" data-toggle="modal" data-target="#modal-login"><i class="icon-comment position-left"></i> Login</button>
                            </div>
    
    
                            <div class="content-group">
                                <div class="content-divider text-muted form-group"><span>Registration form</span></div>
                                <button type="button" class="btn bg-blue btn-block" data-toggle="modal" data-target="#modal-registration"><i class="icon-comment position-left"></i> Sign Up</button>
                            </div>
    
    
                        
                        </div>
                        <!-- /form inside modals -->
    
    
                        <!-- Login form -->
                        <div id="modal-login" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content login-form">
    
                                    <!-- Form -->
                                    <form class="modal-body" action="index.html">
                                        <div class="text-center">
                                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                                        </div>
    
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Username">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Password">
                                            <div class="form-control-feedback">
                                                <i class="icon-lock2 text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-group login-options">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" checked="checked">
                                                        Remember
                                                    </label>
                                                </div>
    
                                                <div class="col-sm-6 text-right">
                                                    <a href="login_password_recover.html">Forgot password?</a>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-left13 position-right"></i></button>
                                        </div>
    
                                        
    
                                    </form>
                                    <!-- /form -->
    
                                </div>
                            </div>
                        </div>
                        <!-- /login form -->
    
    
                  
                        <!-- Registration form -->
                        <div id="modal-registration" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content login-form">
    
                                    <!-- Form -->
                                    <form class="modal-body" action="index.html">
                                        <div class="text-center">
                                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                            <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
                                        </div>
    
                                        <div class="content-divider text-muted form-group"><span>Your credentials</span></div>
    
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="your name">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Your email">
                                            <div class="form-control-feedback">
                                                <i class="icon-mention text-muted"></i>
                                            </div>
                                        </div>
                                        
    
                                        <div class="content-divider text-muted form-group"><span>Your privacy</span></div>
    
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Create password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Repeat password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="content-divider text-muted form-group"><span>Additions</span></div>
    
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="styled" checked="checked">
                                                    Send me <a href="#">test account settings</a>
                                                </label>
                                            </div>
    
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="styled" checked="checked">
                                                    Subscribe to monthly newsletter
                                                </label>
                                            </div>
    
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="styled">
                                                    Accept <a href="#">terms of service</a>
                                                </label>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-blue btn-block">Register <i class="icon-circle-left2 position-right"></i></button>
                                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                                        </div>
    
                                        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                                    </form>
                                    <!-- /form -->
    
                                </div>
                            </div>
                        </div>
                        <!-- /registration form -->
    
    

    </div>
@endsection