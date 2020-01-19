@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form  class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" id="loginpermission" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                        <script>

                            $(function(){
                                $(document.body).on('click','#loginpermission',function(){
                                    var email=$('#email').val();
                                    var password=$('#password').val();
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url:"{{url('/api/auth/login')}}",
                                        method: "POST",
                                        dataType: "json",
                                        data:{email:email,password:password,_token:_token},
                                        success:function(data){
                                            console.log(data);
                                            
                                            if(typeof data.access_token === 'undefined'){
                                                alert('Please Enter Your Valid Username And Password')
                                            }else{
                                                location.href = "{{url('/home')}}/"+data.access_token;
                                            }
                                           
                                        },
                                        error: function (error) {
                                            alert('Please Enter Your Valid Username And Password');
                                        }
                                    });
                                    
                                });
                            });
                        
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
