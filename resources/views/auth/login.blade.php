@extends('layouts.master2')

@section('title')
تسجيل الدخول
@stop

@section('content')
		<div class="container-fluid bg-light">
			<div class="row no-gutter justify-content-center">
                <div class="col-md-6">
					<div class="login d-flex align-items-center py-2">
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex justify-content-center"><h1 class="main-logo1 ml-1 mr-0 my-auto tx-35">Invoices System</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2 class="text-center">مرحبا بك</h2>
												<h5 class="font-weight-semibold mb-4"> تسجيل الدخول</h5>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                        <div class="form-group">
                                                        <label>البريد الالكترو ني</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    <div class="form-group">
                                                    <label>كلمة المرور</label> 
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <label class="form-check-label" for="remember">
                                                                        {{ __('تذكرني') }}
                                                                    </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                    </button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
		</div>
@endsection
@section('js')
@endsection
