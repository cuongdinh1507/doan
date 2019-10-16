<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hydroshare</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/my-login.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <header class="shadow p-2 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="nav-me">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light-me navbar-fixed-top">
                        <a class="navbar-brand" href="{!! route('home') !!}"><img src="{!! asset('img/mk/MK_Logo.png') !!}" alt="" class="img-logo " /></a>
                        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navbar-nav text-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('myresources.create')}}">My resources</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Resources <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                                                document.getElementById('btn-create').click();">
                                                {{ __('Create') }}
                                            </a>
                
                                            <button data-toggle="modal" data-target="#modalCreate" id="btn-create" class="d-none"></button>

                                            <a class="dropdown-item" href="{{route('myresources.create')}}">My resources</a>
                                        </div>
                                    </li>
                                @endguest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Discover <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('discover')}}">Hydroshare</a>
                                        <a class="dropdown-item" href="{{route('discoverMk')}}">MekongWater</a>
                                    </div>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('discover')}}">Discover HydroShare</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('discoverMk')}}">Discover MekongWater</a>
                                </li> --}}
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @else
                                    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bge">
                                                    <div class="">Create a Resource</div>
                                                </div>
                                                <div class="modal-body modal-body-profile" titleid="0" userid="0">
                                                    <form action="{!! route('addNew.add') !!}" method="POST" id="formCreate">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="title" type="text" placeholder="Resource title" class="form-control @error('title') is-invalid @enderror" name="title">
                                
                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <div class="input-group">
                                                                    <select placeholder="Choose your subject" id="subject" type="subject" name="subject" required class="custom-select form-control">
                                                                        <option value="" disabled selected>Select your subject</option>
                                                                    </select>
                                                                </div>
                                                                @error('subject')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="input-group">
                                                                    <select placeholder="Choose your role" id="role" type="role" name="role" required class="custom-select form-control">
                                                                        <option value="" disabled selected>Select your role</option>
                                                                    </select>
                                                                </div>
                                                                @error('role')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" form="formCreate" type="submit">Create</button>
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">
                                                        <div class="brand">
                                                            <img src="{{asset('img/user.png')}}" alt="logo">
                                                        </div>
                                                    </h5>
                                                </div>
                                                <div class="modal-body modal-body-profile" titleid="0" userid="0">
                                                    <form action="{!! route('update.profile') !!}" method="POST" id="FormUpdate">
                                                        @csrf
                                                    </form>
                                                </div>
                                                <div class="modal-footer mx-auto">
                                                    <button class="btn btn-primary" form="FormUpdate" type="submit">Update</button>
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modalPw" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">
                                                        <div class="brand">
                                                            <img src="{{asset('img/user.png')}}" alt="logo">
                                                        </div>
                                                    </h5>
                                                </div>
                                                <div class="modal-body modal-body-pw" titleid="0" userid="0">
                                                    <div class="form-group row">
                                                        <label for="newpw" class="col-md-5 col-form-label text-md-right">{{ __('New Password') }}</label>
                            
                                                        <div class="col-md-7">
                                                            <input id="newpw" type="password" class="form-control @error('newpw') is-invalid @enderror" name="newpw">
                            
                                                            @error('newpw')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cfpw" class="col-md-5 col-form-label text-md-right">{{ __('Confirm password') }}</label>
                            
                                                        <div class="col-md-7">
                                                            <input id="cfpw" type="password" class="form-control @error('cfpw') is-invalid @enderror" name="cfpw">
                            
                                                            @error('cfpw')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mx-auto">
                                                    <button class="btn btn-primary" onclick="changepw()">Change</button>
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(function(){
                                            $("#FormUpdate").append(
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Name"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "name" , maxlength: "30", value: "{!! Auth::user()->name !!}" }),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Email"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "email" , maxlength: "30", value: "{!! Auth::user()->email !!}" }),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Address"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "address" , maxlength: "30", value: "{!! Auth::user()->address !!}" }),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Country"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<select>", { class: "custom-select form-control country", name: "country"  }).append(
                                                            $("<option>", { text: "{!! Auth::user()->country !!}", value: "{!! Auth::user()->country !!}", selected: "true" }),
                                                        ),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Phone"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "phone" , maxlength: "30", value: "{!! Auth::user()->phone !!}" }),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Institution"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "institution" , maxlength: "30", value: "{!! Auth::user()->institution !!}" }),
                                                    ),
                                                ),
                                                $("<div>", { class: "col-md-12 mb-2"}).append(
                                                    $("<label>", { class: "col-md-4 col-form-label text-right d-inline-block", text:"Position"}),
                                                    $("<div>", { class: "col-md-8 d-inline-block" }).append(
                                                        $("<input>", { class: "form-control", name: "position", maxlength: "30", value: "{!! Auth::user()->position !!}" }),
                                                    ),
                                                ),
                                                $("<input>", { class: "d-none", name: "userid", value: "{!! Auth::user()->id !!}"}),
                                            );
                                            $.getJSON("https://raw.githubusercontent.com/tarraq/JSON-data-arrays/master/countries/english/countries-key-value.json", function(data){
                                                $(".country").append(
                                                    $.map(data,function(v,i){
                                                        if ( v != "{!! Auth::user()->country !!}")
                                                            return $("<option>", { value: v, text: v, id: i});
                                                    }),
                                                );
                                            });
                                            changepw = function(){
                                                var newpw = $("#newpw").val(),
                                                    cfpw = $("#cfpw").val();
                                                $(".pw-alert").remove();
                                                if ( newpw == cfpw ){
                                                    if ( newpw.length < 8 )
                                                        $(".modal-body-pw").append(
                                                            $("<div>", { class: "text-danger text-center pw-alert", text: "Your password must have more than 8 characters!"})  
                                                        );
                                                    else {
                                                        $.get("{!! route("changepw") !!}", { newpw: newpw }, function(data){
                                                            $(".modal-body-pw").append(
                                                                $("<div>", { class: "text-success text-center pw-alert", text: "Your password updated successfully!"})  
                                                            );
                                                        });
                                                        setTimeout(function(){
                                                            location.reload();
                                                        },1000);
                                                    }
                                                }
                                                else
                                                    $(".modal-body-pw").append(
                                                        $("<div>", { class: "text-danger text-center pw-alert", text: "Confirm password doesn't match!"})  
                                                    );
                                            };
                                        });
                                    </script>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('toolNservices')}}">Tool & Services</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                                                document.getElementById('btn-profile').click();">
                                                {{ __('Profile') }}
                                            </a>
                
                                            <button data-toggle="modal" data-target="#modalProfile" id="btn-profile" class="d-none"></button>
                
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                                                document.getElementById('btn-pw').click();">
                                                {{ __('Change Password') }}
                                            </a>
                
                                            <button data-toggle="modal" data-target="#modalPw" id="btn-pw" class="d-none"></button>
                
                                            @if ( Auth::user()->isAdmin == 1)
                                                <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                                                document.getElementById('admin-form').submit();">
                                                    {{ __('Dashboard') }}
                                                </a>
                
                                                <form id="admin-form" action="{{ route('admin.dashboard') }}" method="GET" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @if (@session()->has(updateProfile))
        <div class="alert alert-success text-center col-md-8 mx-auto" role="alert">
            <strong>Success</strong> {{session()->get("updateProfile")}}
        </div>
    @endif
    <div id="middle" style="flex: 1 0 auto;">
        @yield('content')
    </div>
    
    {{-- <footer class="py-4 font-small indigo pt-4 mt-4 bge footer " style="flex-shrink: none">
    <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">
                    <!-- Content -->
                    <h5 class="text-uppercase">Hydroshare.org</h5>
                    <p>Contact us</p>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">
                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">
                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">
                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="https://www.hydroshare.org/landingPage/"> hydroshare.org</a>
        </div>
    </footer> --}}
    
    <footer class="footer bg-info mt-5">
        <div class="footer-bottom text-center py-5">

            <ul class="social-list list-unstyled pb-4 mb-0">
                <li class="list-inline-item"><a href="#"><i class="fab fa-github fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-slack fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-product-hunt fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
            </ul>
            <!--//social-list-->

            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <div class="copyright">Do you have any questions? Please do not hesitate to <a
                class="theme-link" href="{!! route('contact.create') !!}">contact us</a> directly. Our team will come back to you within a matter of hours to help you.</div>
            <br>
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a
                    class="theme-link" href="http://data.mekongwater.org" target="_blank">data.mekongwater.org</a> for
                developers</small>
            </div>
    </footer>
</body>
<script>
    $(function(){
        $.get("{!! route('role.get') !!}", (data)=>{
            $("#role").append(
                $.map(data,(v)=>{
                    return $("<option>", { text: v.nameRole, value: v.id});
                }),
            );
        });
        $.get("{!! route('subject.get') !!}", (data)=>{
            $("#subject").append(
                $.map(data,(v)=>{
                    return $("<option>", { text: v.nameSubject, value: v.id});
                }),
            );
        });
    });
</script>
<script src="{{asset('js/C.js')}}"></script>
</html>