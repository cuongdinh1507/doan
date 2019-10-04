@extends("index")
@section('content')
<div class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="{{asset('img/user.png')}}" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Change Password</h4>
							<form method="POST" class="my-login-validation" novalidate="" id="fomr1">
								<div class="form-group">
									<label for="cPw">Current Password</label>
                                    <input type="password" id="cPw" type="cPw" class="form-control" name="cPw" value="" required autofocus>
                                    <div class="form-text text-danger d-none currentpw">
                                        Your current password is wrong
                                    </div>
                                    <label for="newPw">New Password</label>
                                    <input type="password" id="newPw" type="newPw" class="form-control" name="newPw" value="" required autofocus>
                                    <label for="verifyPw">Confirm Password</label>
									<input type="password" id="verifyPw" type="verifyPw" class="form-control" name="verifyPw" value="" required autofocus>
									<div class="form-text text-danger pwmatch d-none">
                                        Your password doesn't match
									</div>
								</div>

								
                            </form>
                            <div class="form-group m-0">
                                <button class="btn btn-primary btn-block btn-changepw" form="form1">
                                    Change Password
                                </button>
                            </div>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2019
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="{{asset('js/my-login.js')}}"></script>
    <script>
        $(function(){
            $(".btn-changepw").on("click", function(){
                var cp = false,
                    np = false;
                $.get("{!! route("getpw") !!}", { pw: $("#cPw").val() }, function(data){
                    if (data == "ok"){
                        cp = true;
                        if ($("#newPw").val() != $("#verifyPw").val())
                            $(".pwmatch").removeClass('d-none');
                        else   
                            np = true;
                        if ( (cp == np) && (cp == true) )
                            $(this).submit();
                    }
                    else
                        $(".currentpw").removeClass('d-none');
                });
            });
        });
    </script>
</div>
@endsection