@extends('layouts.bootstrap')

@section('body')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    {{$errors->first()}}
                </div>
                @endif

                <div class="card">
                    <div class="card-header text-center">Sign In</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Username" id="username" class="form-control" name="username" required autofocus>
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Sign In</button>
                            <!-- <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>-->
                        </form>
                    </div>
                </div>
                <b>Login Account</b><br>
                username : user / admin<br>
                pass : 123123123
            </div>
        </div>
    </div>
</main>
@endsection
