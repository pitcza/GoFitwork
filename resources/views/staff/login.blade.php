<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 11 Multi Auth</title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>
    <body>
        <main> 
            <div class="content"> 
                <div class="container"> 
                    <div class="forms">
                        <h1> LOGIN </h1>
                        <h2> Welcome to GoFitwork! </h2>
                        <div class="form-content">
                            <form action="{{ route('account.authenticate')}}" method="POST">
                                @csrf
                                <div class="email">
                                    <input type="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" id="username"> 
                                    <label for="username" class="labelline">Username</label>
                                    @error('username')
                                                    <p class="invalid-feedback"> {{ $message }} </p>
                                                @enderror
                                </div>
                                <div class="password">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value=""> 
                                    <label for="password" class="labelline_1">Password</label>
                                                @error('password')
                                                    <p class="invalid-feedback"> {{ $message }} </p>
                                                @enderror
                                </div>
        
                                <div class="login-btn">
                                    {{-- <a routerLink="/main" class="main">
                                        <h2> Login </h2>
                                    </a> --}}
                                    <button class="main" type="submit">Log in now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
                <div class="logo"> 
                    <img src="assets/Img/vector.png"> 
                </div>
        </main>
    </body>
</html>